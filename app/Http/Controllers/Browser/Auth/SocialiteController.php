<?php

namespace App\Http\Controllers\Browser\Auth;

use Str;
use Auth;
use Hash;
use App\Models\User;
use App\Models\Profile;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;
use Laravel\Socialite\Facades\Socialite;
use App\Services\Shared\VerificationServices;

class SocialiteController extends Controller
{
  protected $defaultPassword = 'Secret';
  private const TYPE_EMAIL = 'EMAIL_VERIFICATION';

  public function __construct(VerificationServices $sVerificationToken){
    $this->sVerificationToken = $sVerificationToken;
  }

  public function redirect($provider)
  {
    return Socialite::driver($provider)->redirect();
  }

  public function handleCallback($provider)
  {
    $socialUser = Socialite::driver($provider)->stateless()->user();

    $user = User::where('email', $socialUser->getEmail())->first();
    
    if ($user) {
      return $this->login($socialUser, $provider);
    } else {
      return $this->register($socialUser, $provider);
    }
  }

  private function register($user, $provider)
  {
    $name = $this->split_name($user->getName());

    $user = User::create([
      'email' => $user->getEmail(),
      'password' => Hash::make($this->defaultPassword),
      "{$provider}_id" => $user->getId(),
    ]);

    $role = Role::where('name','user')->first();
    $user->syncRoles($role);
    $permissions = $user->getPermissionsViaRoles();
    $user->syncPermissions($permissions);

    $vToken = $this->sVerificationToken->generateToken($user, self::TYPE_EMAIL);
    $this->sVerificationToken->revokeToken($vToken);

    $profile = Profile::create([
      'first_name' => $name[0],
      'last_name' => $name[1],
      'user_id' => $user->id,
      'slug' => generate_profile_slug()
    ]);
    
    Auth::guard('web')->attempt(['email' => $user->email, 'password' => $this->defaultPassword]);
    Auth::logoutOtherDevices($this->defaultPassword);

    return redirect()->route('browser.home.index');
  }

  private function login($userDetails, $provider)
  {
    if (Auth::guard('web')->attempt(['email' => $userDetails->getEmail(), 'password' => $this->defaultPassword , "{$provider}_id" => $userDetails->getId()])) {
      // Auth::logoutOtherDevices($this->defaultPassword);
      $user = current_user();
      if (!$user["{$provider}_id"]) $user->update(["{$provider}_id" => $userDetails->getId()]);
      
      $intended_url = Session::get('url.intended');
      if ($intended_url) {
        Session::forget('url.intended');
        return redirect($intended_url);
      } else {
        return redirect()->route('browser.home.index');
      }
    }
    return redirect()->back()->withErrors(['message' => 'Email or password is incorrect.']);
  }

  public function split_name($name) 
  {
    $name = trim($name);
    $last_name = (strpos($name, ' ') === false) ? '' : preg_replace('#.*\s([\w-]*)$#', '$1', $name);
    $first_name = trim( preg_replace('#'.$last_name.'#', '', $name ) );
    return array($first_name, $last_name);
  }
}

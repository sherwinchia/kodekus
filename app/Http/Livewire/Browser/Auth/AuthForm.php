<?php

namespace App\Http\Livewire\Browser\Auth;

use App\Models\User;
use App\Models\Profile;
use Livewire\Component;
use Spatie\Permission\Models\Role;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Services\Browser\EmailServices;
use Illuminate\Support\Facades\Session;
use Spatie\Permission\Models\Permission;
use App\Services\Shared\VerificationServices;

class AuthForm extends Component
{
  private const TYPE_EMAIL = 'EMAIL_VERIFICATION';
  private const TYPE_PASSWORD = 'PASSWORD_RESET';
  
  public $full_name;
  public $first_name;
  public $last_name;
  public $email;
  public $password;
  public $password_confirmation;

  public $forgotPasswordEmail;
  public $forgotPasswordMessage;
  
  public $form = 'login';
  public $stage;

  protected $rules = [
    'first_name' => 'required|string',
    'last_name' => 'string|nullable',
    'email' => 'required|email|unique:users,email',
    'password' => 'required|confirmed|min:6',
  ];

  public function mount($form)
  {
    if ($form == 'login' || $form == 'register' || $form == 'forgot-password') {
      $this->changeForm($form);
    }
  }

  public function changeForm($form)
  {
    $this->first_name = null;
    $this->last_name = null;
    $this->email = null;
    $this->password = null;
    $this->password_confirmation = null;
    $this->forgotPasswordEmail = null;
    $this->forgotPasswordMessage = null;

    $this->resetValidation();

    $this->form = $form;
  }

  public function login()
  {
    $this->validate([
      'email' => 'required|email',
      'password' => 'required',
    ]);

	  if (Auth::guard('web')->attempt(['email' => $this->email, 'password' => $this->password])) {
      $user = current_user();

      $intended_url = Session::get('url.intended');
      if ($intended_url) {
        Session::forget('url.intended');
        return redirect($intended_url);
      } else {
        return redirect()->route('browser.home.index');
      }

	  }else{
	    $this->addError('error', 'Email or password is incorrect!');
	  }
  }

  public function register()
  {
    $full_name = $this->split_name($this->full_name);
    $this->first_name = $full_name[0];
    $this->last_name = $full_name[1];

    $data = $this->validate($this->rules);

    $user = User::create([
      'email' => $data['email'],
      'password' => Hash::make($data['password']),
    ]);

    $role = Role::where('name','user')->first();
    $user->syncRoles($role);
    $permissions = $user->getPermissionsViaRoles();
    $user->syncPermissions($permissions);

    $profile = Profile::create([
      'user_id' => $user->id,
      'first_name' => $data['first_name'],
      'last_name' => $data['last_name'],
      'slug' => generate_profile_slug()
    ]);

    $sVerification = resolve(VerificationServices::class);
    $vToken = $sVerification->generateToken($user,self::TYPE_EMAIL);

    $sEmail = resolve(EmailServices::class);
    $sEmail->activation($user, $vToken);

    Auth::guard('web')->login($user);

    $this->form = null;
    $this->stage = 'registered';
  }

  public function forgotPassword()
  {
    $this->forgotPasswordMessage = null;

    $this->validate(
      ['forgotPasswordEmail' => 'required|email|exists:users,email'],
      [
        'forgotPasswordEmail.required' => 'The email field is required.',
        'forgotPasswordEmail.email' => 'The email is not a valid email.',
        'forgotPasswordEmail.exists' => 'The email does not exist.',
      ]
    );

    $user = User::where('email', $this->forgotPasswordEmail)->first();

    $sVerification = resolve(VerificationServices::class);

    $vToken = $sVerification->generateToken($user,self::TYPE_PASSWORD);


      $sEmail = resolve(EmailServices::class);
      $sEmail->forgotPassword($user, $vToken);
  
      $this->forgotPasswordMessage = 'The password reset link has been sent successfully.';
  }


  public function split_name($name) 
  {
    $name = trim($name);
    $last_name = (strpos($name, ' ') === false) ? '' : preg_replace('#.*\s([\w-]*)$#', '$1', $name);
    $first_name = trim( preg_replace('#'.$last_name.'#', '', $name ) );
    return array($first_name, $last_name);
  }
  
  public function render()
  {
      return view('livewire.browser.auth.auth-form');
  }
}

<?php

namespace App\Http\Livewire\Browser\Auth;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

use App\Models\User;
use App\Models\Profile;
use Illuminate\Support\Facades\Hash;
use App\Services\Shared\VerificationServices;
use App\Services\Browser\EmailServices;

class AuthForm extends Component
{
  private const TYPE_EMAIL = 'EMAIL_VERIFICATION';
  private const TYPE_PASSWORD = 'PASSWORD_RESET';
  
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

      return redirect()->route('browser.home.index');

	  }else{
	    $this->addError('error', 'Email or password is incorrect!');
	  }
  }

  public function register()
  {
    $data = $this->validate($this->rules);

    $user = User::create([
      'email' => $data['email'],
      'password' => Hash::make($data['password']),
      'role' => 'user'
    ]);

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
  
  public function render()
  {
      return view('livewire.browser.auth.auth-form');
  }
}

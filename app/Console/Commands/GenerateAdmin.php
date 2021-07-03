<?php

namespace App\Console\Commands;

use App\Models\User;
use App\Models\Profile;

use Spatie\Permission\Models\Role;

use Carbon;
use Validator;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Hash;

class GenerateAdmin extends Command{
  /**
   * The name and signature of the console command.
   *
   * @var string
   */
  protected $signature = 'generate:admin';

  /**
   * The console command description.
   *
   * @var string
   */
  protected $description = 'Create a user with admin privileges access';

  /**
   * Create a new command instance.
   *
   * @return void
   */
  public function __construct(){
    parent::__construct();
  }

  /**
   * Execute the console command.
   *
   * @return mixed
   */
  public function handle(){
		$email = $this->ask('Enter admin email?');
    $first_name = $this->ask("Enter admin's first name?");
    $last_name = $this->ask("Enter admin's last name?");
    $password = $this->secret('Enter admin password?');
    $confirmPassword = $this->secret('Confirm password?');


    // Passwords don't match
    if ($password != $confirmPassword) {
      $this->error("Passwords don't match");
      return;
    }

    // Email has error
    if (!filter_var($email, FILTER_VALIDATE_EMAIL) || User::where('email', $email)->count() != 0) {
      $this->error("Email is invalid or has been taken");
      return;
    }


    $admin = User::create([
      'email' => $email,
      'password' => Hash::make($password),
    ]);

    $profile = Profile::create([
      'user_id' => $admin->id,
      'first_name' => $first_name,
      'last_name' => $last_name,
      'slug' => generate_profile_slug()
    ]);

    $role = Role::where('name','admin')->first();

    $admin->syncRoles($role);

    

    if($admin){
      $this->info('Admin has been created successfully.');
    }else{
      $this->error("An error occurred, please try again later");
      return;
    }
  }
}

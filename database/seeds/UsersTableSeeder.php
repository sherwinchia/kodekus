<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

use App\Models\User;
use App\Models\Profile;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::truncate();

        $user1 = User::create([
          'email' => 'sherwin@admin.com',
          'password' => Hash::make('sherwin23'),
          'role' => 'admin'
        ]);

        Profile::create([
          'first_name' => 'Sherwin',
          'last_name' => 'Variancia',
          'user_id' => $user1->id
        ]);

        $user2 = User::create([
          'email' => 'john@mail.com',
          'password' => Hash::make('sherwin23'),
          'role' => 'user'
        ]);

        Profile::create([
          'first_name' => 'John',
          'last_name' => 'Doe',
          'user_id' => $user2->id
        ]);

    }
}

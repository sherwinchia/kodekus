<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

use App\Models\User;

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

        User::create([
          'name' => 'Sherwin',
          'email' => 'sherwin@admin.com',
          'password' => Hash::make('sherwin23'),
          'role' => 'admin'
        ]);

        User::create([
          'name' => 'John',
          'email' => 'john@admin.com',
          'password' => Hash::make('sherwin23'),
          'role' => 'user'
        ]);
    }
}

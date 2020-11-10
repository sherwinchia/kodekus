<?php

use App\Models\User;
use App\Models\Profile;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Hash;

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
        Profile::truncate();

        $user1 = User::create([
          'email' => 'sherwin@admin.com',
          'password' => Hash::make('sherwin23'),
        ]);

        Profile::create([
          'first_name' => 'Sherwin',
          'last_name' => 'Variancia',
          'slug' => 'sherwin-variancia',
          'user_id' => $user1->id
        ]);

        $role1 = Role::where('name','admin')->first();
        $user1->syncRoles($role1);
        
        $user2 = User::create([
          'email' => 'john@mail.com',
          'password' => Hash::make('sherwin23'),
        ]);

        Profile::create([
          'first_name' => 'John',
          'last_name' => 'Doe',
          'slug' => 'john-doe',
          'user_id' => $user2->id
        ]);

        $role2 = Role::where('name','content-writer')->first();
        $user2->syncRoles($role2);

    }
}

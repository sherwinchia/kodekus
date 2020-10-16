<?php

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      // Role::truncate();

      Role::create(['name' => 'admin']);

      Role::create(['name' => 'user']);

      Role::create(['name' => 'content-writer']);
    }
}

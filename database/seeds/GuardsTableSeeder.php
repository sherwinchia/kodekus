<?php

use App\Models\Guard;
use Illuminate\Database\Seeder;

class GuardsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      Guard::truncate();
      
      Guard::create(['name' => 'web']);
      Guard::create(['name' => 'admin']);
    }
}

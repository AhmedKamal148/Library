<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
  //     \App\Models\Section::insert(['section_name' => 'test', 'image_name' => '1.jpg']);
  
    factory('App\Section',100);   
    }
}
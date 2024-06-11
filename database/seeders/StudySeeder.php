<?php

namespace Database\Seeders;

use Database\Factories\StudyFactory;
use Illuminate\Database\Seeder;

class StudySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {   
        StudyFactory::factory()->times(20)->create();
    }
}

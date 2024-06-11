<?php

namespace Database\Seeders;

use App\Models\Students;
use Illuminate\Database\Seeder;

class StudentsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        Students::factory()->times(6000)->create();
    }
}

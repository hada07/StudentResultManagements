<?php

namespace Database\Seeders;

use App\Models\Lecturers;
use Illuminate\Database\Seeder;

class LecturersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Lecturers::factory()->times(100)->create();
    }
}

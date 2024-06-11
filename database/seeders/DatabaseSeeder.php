<?php

namespace Database\Seeders;

use App\Models\Lecturers;
use App\Models\Subjects;
use Faker\Factory;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create()
        $this->call(UsersSeeder::class);
        $this->call(StudentsSeeder::class);
        $this->call(LecturersSeeder::class);
        $this->call(SubjectsSeeder::class);
        $studentId = DB::table('students')->pluck('id');
        $subjectId = DB::table('subjects')->pluck('id');
        $lecturerId = DB::table('lecturers')->pluck('id');
        $subjectDistinct = Subjects::groupBy('name')->get(['name', 'id']);
        foreach (range(1,  6000) as $index) {
            // $mark = rand(50, 100) / 10;
            // $mark_4 = 1;
            // $mark_char = '';
            // if ($mark > 8.5) {
            //     $mark_4 = 4;
            //     $mark_char = 'A';
            // } else if ($mark < 8.5 && $mark >= 8) {
            //     $mark_4 = 3.5;
            //     $mark_char = 'B+';
            // } else if ($mark < 8 && $mark >= 7) {
            //     $mark_4 = 3;
            //     $mark_char = 'B';
            // } else if ($mark < 7 &&  $mark > 6.5) {
            //     $mark_4 = 2.5;
            //     $mark_char = 'C+';
            // } else if ($mark < 6.5 && $mark >= 6) {
            //     $mark_4 = 2;
            //     $mark_char = 'C';
            // } else {
            //     $mark_4 = 1.5;
            //     $mark_char = 'D';
            // }
                // if ($stop == 1) {
                //     $countRegister = count(DB::table('study')->where('subjects_id', $subject->id)->get());
                //     $subjectDistinct = Subjects::groupBy('name')->get(['name', 'id'])->where('quantily', '>', $countRegister);
                //     continue;
                // }
                DB::table('study')->insert([
                    'students_id' => $index,
                    'subjects_id' => rand(1, 100),
                    'mark' =>null,
                    'mark_4' => null,
                    'mark_char' =>null,
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);
        }
        $subjectDistinct = Subjects::get(['name', 'id']);
        foreach ($subjectDistinct as $subject) {
            DB::table('teach')->insert([
                'lecturer_id' =>rand(1, 100),
                'subject_id' => $subject->id,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}

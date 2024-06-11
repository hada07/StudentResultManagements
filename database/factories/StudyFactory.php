<?php

namespace Database\Factories;

use App\Models\Model;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\DB;

class StudyFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Model::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        
        return [
            DB::table('study')->insert(
                [
                    'student_id' => $this(App\Models\Students::class)->create()->id,
                    'subject_id' =>$this(App\Models\Subjects::class)->create()->id,
                ]
                )
            ];
    }
}

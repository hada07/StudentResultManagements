<?php

namespace Database\Factories;

use App\Models\Lecturers;
use Illuminate\Database\Eloquent\Factories\Factory;

class LecturersFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Lecturers::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $first_name = array('Trần', 'Lê', 'Nguyễn', 'Lê', 'Phạm', 'Phan', 'Vũ', 'Đặng', 'Bùi', 'Đỗ', 'Hồ', 'Ngô', 'Dương', 'Ngô', 'Dương', 'Lý');
        $middle_name = array('Văn', 'Đình', 'Bá', 'Trọng', 'Minh');
        $last_name = array('Anh', 'Linh', 'Vũ', 'Trường', 'Trọng', 'Quân', 'Minh', 'Tân', 'Thảo', 'Thủy', 'Thịnh', 'Vương');
        $address = array('Hưng Yên', 'Bắc Ninh', 'Hà nội', 'Hải Phòng', 'Hải Dương', 'Lào Cai', 'Hòa bình', 'Thái Nguyên', 'Thanh hóa', 'Huế', 'Vinh', 'Điện biên', 'Sơn La', 'Cao Bằng');
        return [
            'college_id' => 'GV1902'. $this->faker->unique()->numberBetween(1000,9999),
            'name' => $this->faker->randomElement($first_name).' '.$this->faker->randomElement($middle_name).' '.$this->faker->randomElement($last_name),
            'level' => $this->faker->randomElement($array = array('Thạc sĩ', 'Tiến sĩ', 'Giáo sư')),
            'mobile' => '0'.$this->faker->numberBetween(923234832, 999999999),   
            'address' => $this->faker->randomElement($address),
            'isAcept' => $this->faker->boolean(),
        ];
    }
}

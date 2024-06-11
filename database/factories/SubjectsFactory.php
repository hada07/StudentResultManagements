<?php

namespace Database\Factories;

use App\Models\Subjects;
use Illuminate\Database\Eloquent\Factories\Factory;

class SubjectsFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Subjects::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $subjects = array('Giải tích 1', 'Giải tích 2', 'Đại số', 'Nhập môn lập trình', 'Lập trình nâng cao', 'Cơ sở dữ liệu', 'Lập trình hướng đối tương', 
        'Triết học Mác Lênin', 'Kinh tế chính trị', 'Toán rời rạc', 'Xác suất thống kê', 'Toán trong công nghệ', 'Tín hiệu hệ thống', 'An toàn thông tin', 'Thu thập và phân tích yêu cầu',
        'Hệ quản trị cơ sở dữ liệu', 'Trí tuệ nhân tạo', 'Phân tích thiết kế hướng đối tượng',
    'Tư tưởng Hồ Chí Minh', 'Lịch sử đảng cộng sản Việt Nam', 'Giải tích 2', 'Kiến trúc máy tính', 'Nguyên lý hệ điều hành', 
    'Mạng máy tính', 'Công nghệ phần mềm', 'Phát triển Ứng dụng web', 'Phát triển ứng dụng di dộng', 'Quản lý dự án phần mềm', 'Lập trình mạng'
    ,'Xử lý tiếng nói', 'Xử lý ảnh', 'Chương trình dịch', 'Tích hợp dịch vụ', 'Nhập môn an toàn thông tin', 
    'Các hệ thông thương mại điện tử');
        return [
            'subject_id' => 'INT'.$this->faker->unique()->numberBetween(1000, 9999),
            'name' => $this->faker->randomElement($subjects),
            'description' => $this->faker->text(),
            'credit' => $this->faker->numberBetween(1, 4),
            'quantily' => $this->faker->randomElement(array(70, 75, 80)),
        ];
    }
}

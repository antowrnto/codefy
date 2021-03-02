<?php

namespace Database\Factories;

use App\Models\Course;
use Illuminate\Database\Eloquent\Factories\Factory;

class CourseFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Course::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'title' => $this->faker->text(65),
            'slug' => $this->faker->slug(15),
            'description' => $this->faker->text(2540),
            'language' => 'ID',
            'programming_language' => 'Python',
            'data' => '{null}',
            'pricing' => '120.000',
            'dificulty' => 'medium',
            'duration' => '13 Hours',
            'series_id' => rand(1, 15),
            'mentor_id' => 1,
        ];
    }
}

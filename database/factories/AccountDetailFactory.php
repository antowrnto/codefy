<?php

namespace Database\Factories;

use App\Models\AccountDetail;
use Illuminate\Database\Eloquent\Factories\Factory;

class AccountDetailFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = AccountDetail::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'user_id' => 1,
            'username' => $this->faker->text(12) ,
            'school' => $this->faker->text(12) ,
            'bio' => $this->faker->text(12) ,
            'birth_day' => $this->faker->text(12) ,
            'city' => $this->faker->text(12) ,
            'link_twitter' => $this->faker->text(12) ,
            'link_facebook' => $this->faker->text(12) ,
            'link_instagram' => $this->faker->text(12) ,
            'link_linkedin' => $this->faker->text(12) ,
            'language' => $this->faker->text(12) ,
            'role' => $this->faker->text(12) ,
        ];
    }
}

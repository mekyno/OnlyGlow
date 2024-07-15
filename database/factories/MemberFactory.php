<?php

namespace Database\Factories;

use App\Models\Member;
use App\Models\MemberCategory;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class MemberFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Member::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->name,
            'email' => $this->faker->unique()->safeEmail,
            'phone_number' => $this->faker->phoneNumber,
            'icon' => $this->faker->randomElement(['icon1', 'icon2', 'icon3', 'icon4']),
            'member_category_id' => MemberCategory::first()->id, // Assuming the 'Nové' category is the first one
        ];
    }
}

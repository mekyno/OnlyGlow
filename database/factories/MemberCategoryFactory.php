<?php

namespace Database\Factories;

use App\Models\MemberCategory;
use Illuminate\Database\Eloquent\Factories\Factory;

class MemberCategoryFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = MemberCategory::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->word,
        ];
    }
}

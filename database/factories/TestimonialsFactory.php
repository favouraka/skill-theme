<?php

namespace Database\Factories;

use App\Models\Testimonials;
use Illuminate\Database\Eloquent\Factories\Factory;

class TestimonialsFactory extends Factory
{
    protected $model = Testimonials::class;

    public function definition(): array
    {
        return [
            'name' => $this->faker->name(),
            'age' => $this->faker->numberBetween(25, 65),
            'description' => $this->faker->jobTitle(),
            'content' => $this->faker->realText(200),
            'image' => 'https://source.unsplash.com/random/150x150/?portrait&' . $this->faker->numberBetween(1, 1000),
        ];
    }
}

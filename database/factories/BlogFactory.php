<?php

namespace Database\Factories;

use App\Models\Blog;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class BlogFactory extends Factory
{
    protected $model = Blog::class;

    public function definition()
    {
        $title = $this->faker->sentence;
        return [
            'title' => $title,
            'slug' => Str::slug($title),
            'content' => $this->faker->paragraphs(3, true),
            'author' => $this->faker->name,
            'is_visible' => $this->faker->boolean(80),
            'featured_image' => $this->faker->imageUrl(),
            'excerpt' => $this->faker->paragraph,
            'tags' => json_encode($this->faker->words(3)),
            'published_at' => $this->faker->dateTimeBetween('-1 year', 'now'),
        ];
    }
}

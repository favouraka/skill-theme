<?php

namespace Database\Seeders;

use App\Models\Testimonials;
use Illuminate\Database\Seeder;

class TestimonialsSeeder extends Seeder
{
    public function run(): void
    {
        Testimonials::factory(8)->create();
    }
}

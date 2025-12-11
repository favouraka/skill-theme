<?php

namespace Database\Seeders;

use App\Models\SocialMedia;
use Illuminate\Database\Seeder;

class SocialMediaSeeder extends Seeder
{
    public function run()
    {
        $socialMedia = [
            [
                'platform' => 'facebook',
                'url' => 'https://facebook.com',
                'is_active' => true
            ],
            [
                'platform' => 'twitter',
                'url' => 'https://twitter.com',
                'is_active' => true
            ],
            [
                'platform' => 'instagram',
                'url' => 'https://instagram.com',
                'is_active' => true
            ]
        ];

        foreach ($socialMedia as $item) {
            SocialMedia::updateOrCreate(
                ['platform' => $item['platform']],
                $item
            );
        }
    }
}
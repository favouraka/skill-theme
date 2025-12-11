<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SocialMedia extends Model
{
    use HasFactory;

    protected $fillable = [
        'platform',
        'url',
        'is_active'
    ];

    protected $casts = [
        'is_active' => 'boolean'
    ];

    public static function getActiveSocialMedia()
    {
        return self::where('is_active', true)
            ->whereNotNull('url')
            ->where('url', '!=', '')
            ->orderBy('created_at')
            ->get();
    }
}
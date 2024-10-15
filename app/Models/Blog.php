<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'content', 'slug'];

    public function getRouteKeyName()
    {
        return 'slug';
    }

    public function categories()
    {
        return $this->belongsToMany(Category::class);
    }
{
    use HasFactory;

    protected $fillable = ['title', 'content', 'featured_image'];

    public function categories()
    {
        return $this->belongsToMany(Category::class);
    }
}

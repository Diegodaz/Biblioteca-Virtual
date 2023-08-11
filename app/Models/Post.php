<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $guared = ['id', 'created_at', 'updated_at'];

    const MODERATION = 1, PUBLISHED = 2;

    protected $fillable = [
        'name', 'slug', 'extract', 'body', 'status',
        'user_id', 'category_id'
    ];

    public function getRouteKeyName()
    {
        return 'slug';
    }


    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }


    public function tags()

    {
        return $this->belongsToMany(Tag::class);
    }


    public function image()
    {
        return $this->morphOne(Image::class, 'imageable');
    }
}

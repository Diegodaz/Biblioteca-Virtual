<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Paper extends Model
{
    use HasFactory;

    protected $guared = ['id', 'created_at', 'updated_at'];

    const MODERATION = 1, PUBLISHED = 2;

    protected $fillable = [
        'name',
        'slug',
        'extract',
        'body',
        'status',
        'url',
        'user_id',
        'category_id',
        'author_id',
    ];

    public function getRouteKeyName()
    {
        return 'slug';
    }

    /**
     * Relacion uno a muchos inversa
     */

    /**
     * The `user()` function returns the user that owns the post
     *
     * @return A collection of all the answers for the question.
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * The `category()` function returns the category that the post belongs to
     *
     * @return The category that the post belongs to.
     */
    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    /**
     * Relacion muchos a muchos
     */

    /**
     * > This function returns a collection of all the tags associated with the current post
     *
     * @return A collection of tags.
     */
    public function tags()
    {
        return $this->belongsToMany(Tag::class);
    }

    /**
     * A book belongs to many authors.
     *
     * @return A collection of authors
     */
    public function authors()
    {
        return $this->belongsToMany(Author::class);
    }
}

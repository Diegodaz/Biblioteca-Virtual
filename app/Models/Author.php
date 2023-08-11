<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Author extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'linkedin_url',
        'email',
    ];

    public function papers()
    {
        return $this->belongsToMany(Paper::class);
    }
}

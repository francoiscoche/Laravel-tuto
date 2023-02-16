<?php

namespace App\Models;

use App\Models\Tag;
use App\Models\Image;
use App\Models\Comment;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Post extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'content'];

    // ManyToOne
    // public function comments()
    // {
    //     return $this->hasMany(Comment::class);
    // }

    // OneToOne
    public function image()
    {
        return $this->hasOne(Image::class);

    }

    // ManyToMany (bien définir la table pivot)
    public function tags()
    {
        return $this->belongsToMany(Tag::class);
    }

    // Polymorphic
    public function comments()
    {
        return $this->morphMany(Comment::class, 'commentable');
    }
}

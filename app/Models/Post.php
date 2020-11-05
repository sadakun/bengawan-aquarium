<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\SluggableScopeHelpers;
use Cviebrock\EloquentSluggable\Sluggable;

use App\Models\Comment;
use App\Models\User;
use App\Models\Post;
use App\Models\Category;
use App\Models\Tag;

class Post extends Model
{
    use HasFactory, Sluggable, SluggableScopeHelpers;

    protected $guarded = [];

    protected $fillable = [
        'user_id',
        'post_image',
        'title',
        'body',
        'category_id',
    ];

    public function sluggable()
    {
        return [
            'slug' => [
                'source' => 'title',
                'onUpdate' => true,
            ]
        ];
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    #example using mutator for image path
    /* public function setPostImageAttribute($value)
        {
            $this->attributes['post_image'] = asset($value);
    }*/

    #example using accessor for image path
    /*public function getPostImage($value)
    {
        return asset($value);
    }*/

    #accessor image path if our dir is in local path or http
    public function getPostImageAttribute($value)
    {
        if(strpos($value, 'https://') !== FALSE || strpos($value, 'http://') !== FALSE)
            {
                return $value;
            }
        return asset('' . $value);
    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    public function categories()
    {
        return $this->belongsTo(Category::class);
    }

    public function tags()
    {
        return $this->belongsToMany(Tag::class);
    }
}

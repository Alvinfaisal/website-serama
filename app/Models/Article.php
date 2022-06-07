<?php

namespace App\Models;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
  use HasFactory;
  use Sluggable;

  // model dari table/migrations articles
  protected $table = 'articles';

  // field" ini bisa diisi dari sebuah request atau view yang dilakukan oleh user/client
  protected $fillable = ['user_id', 'title', 'slug', 'description', 'body', 'images', 'viewCount'];

  public function sluggable(): array
  {
    return [
      'slug' => [
        'source' => 'title'
      ]
    ];
  }

  protected $casts = [
    'images' => 'array'
  ];

  public function path()
  {
    return "/article/$this->slug";
  }

  public function user()
  {
    return $this->belongsTo(User::class);
  }

  public function categories()
  {
    return $this->belongsToMany(Category::class);
  }

  public function tags()
  {
    return $this->belongsToMany(Tag::class);
  }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
  use HasFactory, SoftDeletes;

  // model dari table/migrations products
  protected $table = 'products';

  // Memberi tahu laravel field ini hanya dapat diisi dengan format date
  protected $dates = [
    'updated_at',
    'created_at',
    'deleted_at',
  ];

  // Memeberi tahu laravel bahwa field" ini bisa diisi dari sebuah request atau view yang dilakukan oleh user/client
  protected $fillable = [
    'name',
    'price',
    'description',
    'slug',
  ];

  // membuat relasi

  // relasi dengan model ProductGallery - one to many - satu Product bisa punya banyak data relasi dimodel ProductGallery
  public function product_galleries()
  {
    return $this->hasMany(ProductGallery::class, 'products_id', 'id');
  }

  
}

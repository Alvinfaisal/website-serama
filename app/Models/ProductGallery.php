<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductGallery extends Model
{
  use HasFactory;

  // model dari table/migrations products
  protected $table = 'product_galleries';

  // Memberi tahu laravel field ini hanya dapat diisi dengan format date
  protected $dates = [
    'updated_at',
    'created_at',
    'deleted_at',
  ];

  // Memeberi tahu laravel bahwa field" ini bisa diisi dari sebuah request atau view yang dilakukan oleh user/client
  protected $fillable = [
    'products_id',
    'url',
    'is_featured',
  ];
}

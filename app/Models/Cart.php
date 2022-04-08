<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
  use HasFactory;

  // model dari table transaction_items
  protected $table = 'carts';

  // Memeberi tahu laravel bahwa field" ini bisa diisi dari sebuah request atau view yang dilakukan oleh user/client
  protected $fillable = [
    'users_id',
    'products_id',
  ];

  // membuat relasi

  public function user()
  {
    return $this->belongsTo(User::class, 'users_id', 'id');
  }

  // relasi dengan model Product - one to one - satu data Cart 
  public function product()
  {
    return $this->hasOne(Product::class, 'id', 'products_id');
  }
}

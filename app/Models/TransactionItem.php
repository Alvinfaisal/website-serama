<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class TransactionItem extends Model
{
  use HasFactory;


  // model dari table transaction_items
  protected $table = 'transaction_items';

  // Memberi tahu laravel field ini hanya dapat diisi dengan format date
  protected $dates = [
    'updated_at',
    'created_at',
  ];

  // Memeberi tahu laravel bahwa field" ini bisa diisi dari sebuah request atau view yang dilakukan oleh user/client
  protected $fillable = [
    'users_id',
    'products_id',
    'transactions_id',
  ];

  // membuat relasi


  public function user()
  {
    return $this->belongsTo(User::class, 'users_id', 'id');
  }

  public function product()
  {
    return $this->hasOne(Product::class, 'id', 'products_id');
  }
}

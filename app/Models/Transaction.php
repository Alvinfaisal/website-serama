<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Transaction extends Model
{
  use HasFactory, SoftDeletes;

  // model dari table/migrations transactions
  protected $table = 'transactions';

  // Memberi tahu laravel field ini hanya dapat diisi dengan format date
  protected $dates = [
    'updated_at',
    'created_at',
    'deleted_at',
  ];

  // Memeberi tahu laravel bahwa field" ini bisa diisi dari sebuah request atau view yang dilakukan oleh user/client
  protected $fillable = [
    'users_id',
    'name',
    'email',
    'address',
    'phone',
    'courier',
    'payment',
    'payment_url',
    'total_price',
    'status'
  ];

  // membuat relasi

  public function user()
  {
    return $this->belongsTo(User::class, 'users_id', 'id');
  }
}

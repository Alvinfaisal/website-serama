<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTransactionsTable extends Migration
{
  /**
   * Run the migrations.
   *
   * @return void
   */
  public function up()
  {
    Schema::create('transactions', function (Blueprint $table) {
      $table->id();

      // relasi dengan tabel user
      $table->bigInteger('users_id');

      // field data diri pembeli
      $table->string('name')->nullable();
      $table->string('email')->nullable();
      $table->text('address')->nullable();
      $table->string('phone')->nullable();

      // field kurir
      $table->string('courier')->nullable();

      // field pembayaran atau payment menggunakan midtrans
      $table->string('payment')->default('MIDTRANS');
      $table->string('payment_url')->nullable();

      $table->bigInteger('total_price')->default(0);
      $table->string('status')->default('PENDING');

      $table->softDeletes();
      $table->timestamps();
    });
  }

  /**
   * Reverse the migrations.
   *
   * @return void
   */
  public function down()
  {
    Schema::dropIfExists('transactions');
  }
}

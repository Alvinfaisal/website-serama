<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductGalleriesTable extends Migration
{
  /**
   * Run the migrations.
   *
   * @return void
   */
  public function up()
  {
    Schema::create('product_galleries', function (Blueprint $table) {
      $table->id();

      // relasi dengan tabel products
      $table->bigInteger('products_id')->nullable();

      $table->string('url')->nullable();
      $table->boolean('is_featured')->default(false)->nullable();

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
    Schema::dropIfExists('product_galleries');
  }
}

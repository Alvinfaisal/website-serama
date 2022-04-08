<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRolesToUsersTable extends Migration
{
  /**
   * Run the migrations.
   *
   * @return void
   */
  public function up()
  {
    Schema::table('users', function (Blueprint $table) {
      // Menambahkan field roles setelah field email untuk membedakan user dan admin
      $table->string('roles')->after('email')->default('USER');
    });
  }

  /**
   * Reverse the migrations.
   *
   * @return void
   */
  public function down()
  {
    Schema::table('users', function (Blueprint $table) {
      // fungsi untuk mengahapus field roles diatas ketika dijalankan perintah rollback
      $table->dropColumn('roles');
    });
  }
}

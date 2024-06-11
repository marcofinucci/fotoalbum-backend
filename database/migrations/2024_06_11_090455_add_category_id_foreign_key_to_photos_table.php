<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
  /**
   * Run the migrations.
   */
  public function up(): void
  {
    Schema::table('photos', function (Blueprint $table) {
      // 1. Crea la colonna category_id
      $table->unsignedBigInteger('category_id')->nullable()->after('id');

      // 2. Assegna la chiave esterna alla colonna category_id
      $table->foreign('category_id')
        ->references('id')
        ->on('categories')
        ->nullOnDelete();
    });
  }

  /**
   * Reverse the migrations.
   */
  public function down(): void
  {
    Schema::table('photos', function (Blueprint $table) {
      // 1. Cancella la foreign key
      $table->dropForeign('photos_category_id_foreign');
      // 2. Cancella la colonna category_id
      $table->dropColumn('category_id');
    });
  }
};

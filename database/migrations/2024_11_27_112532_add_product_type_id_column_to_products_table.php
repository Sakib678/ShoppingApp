<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
   Schema::table('products', function (Blueprint $table) {
            $table->foreignId('product_type_id');
            $table->foreign('product_type_id')->references('id')->on('product_types')
               ->onDelete('cascade')->onUpdate('cascade');
    });
}

public function down()
    {
    Schema::table('products', function (Blueprint $table) {
            $table->dropForeign(['product_type_id']);
            $table->dropColumn('product_type_id');
    });
}
};

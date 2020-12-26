<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product', function (Blueprint $table) {
            $table->id();
            
            $table->unsignedBigInteger('type_id');
            $table->unsignedBigInteger('subid');

            $table->string('kode');
            $table->string('nama');
            $table->decimal('harga',8);
            $table->string('status')->default('Aktif');
            $table->integer('stok');
            $table->timestamps();

            $table->foreign('type_id')->references('id')->on('types');
            // $table->foreign('subid')->references('id')->on('subtype');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('product');
    }
}

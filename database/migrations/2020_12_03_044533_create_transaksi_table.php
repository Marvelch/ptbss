<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTransaksiTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transaksi', function (Blueprint $table) {
            $table->string('kodepenerimaan')->unique();
            $table->date('tanggal');
            $table->unsignedBigInteger('idsupplier');
            $table->foreign('idsupplier')->references('id')->on('supplier');
            $table->unsignedBigInteger('idproduct');
            $table->foreign('idproduct')->references('id')->on('product');
            $table->integer('qty');
            $table->decimal('subtotal',19,2);
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
        Schema::dropIfExists('transaksi');
    }
}

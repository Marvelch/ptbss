<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKartustokTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kartustok', function (Blueprint $table) {
            $table->id();
            $table->string('kode_product')->nullable();
            $table->date('tanggal');
            $table->string('kode_transaksi')->nullable();
            $table->integer('masuk');
            $table->integer('keluar');
            $table->integer('saldo');
            $table->string('keterangan');
            $table->timestamps();

            $table->foreign('kode_product')->references('kode')->on('product');
            // $table->foreign('kode_invoice')->references('no_invoice')->on('invoice');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('kartustok');
    }
}

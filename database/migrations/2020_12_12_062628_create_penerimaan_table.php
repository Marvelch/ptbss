<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePenerimaanTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('penerimaan', function (Blueprint $table) {
            $table->id();
            $table->string('no_rpo', 30);

            $table->string('rel_kodepermintaan');
            $table->foreign('rel_kodepermintaan')->references('kodepermintaan')->on('permintaan');
            
            $table->date('tanggal');
            $table->string('sales_order');
            $table->string('delivery_order');
            $table->timestamps();

            $table->unique('no_rpo');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('penerimaan');
    }
}

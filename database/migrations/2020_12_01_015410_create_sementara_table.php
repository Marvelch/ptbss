<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\Auth;

class CreateSementaraTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sementara', function (Blueprint $table) {
            $userId = Auth::id();

            $table->id();
            $table->integer('idproduct')->nullable();
            $table->integer('idsupplier')->nullable();
            $table->unsignedBigInteger('iduser');
            $table->foreign('iduser')->references('id')->on('users');
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
        Schema::dropIfExists('sementara:');
    }
}

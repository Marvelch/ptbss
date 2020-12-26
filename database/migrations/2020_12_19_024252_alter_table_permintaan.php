<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterTablePermintaan extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('permintaan', function (Blueprint $table) {
            $table->bigInteger('sisa')->nullable();
            $table->bigInteger('dikirim')->nullable();
            $table->bigInteger('diterima')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('permintaan', function (Blueprint $table) {
            $table->dropColumn('sisa')->null;
            $table->dropColumn('dikirim')->null;
            $table->dropColumn('diterima')->null;
        });
    }
}

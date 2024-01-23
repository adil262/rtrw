<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Arsiprtrw extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('arsiprtrw', function (Blueprint $table) {
            $table->id();
            $table->string('nama_arsip');
            $table->text('deskripsi');    
            $table->integer('id_rt_rw');
            $table->string('file_arsip');
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
        Schema::dropIfExists('arsiprtrw');
    }
}

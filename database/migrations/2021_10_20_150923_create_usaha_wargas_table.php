<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\QueryException;

class CreateUsahaWargasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('usaha_wargas', function (Blueprint $table) {
            $table->id();
            $table->integer('id_warga');
            $table->string('judul');
            $table->text('deskripsi');
            $table->string('foto');
            $table->string('no_hp_usaha');
            $table->string('status');
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
        Schema::dropIfExists('usaha_wargas');
    }
}

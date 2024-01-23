<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAsetWargasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('aset_wargas', function (Blueprint $table) {
            $table->id();
            $table->string('nama_aset', 250);
            $table->integer('jumlah');
            $table->string('foto', 250);
            $table->enum('status', ['dipinjam', 'tersedia']);
            $table->integer('id_peminjaman');
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
        Schema::dropIfExists('aset_wargas');
    }
}

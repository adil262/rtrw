<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRiwayatIuransTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('riwayat_iurans', function (Blueprint $table) {
            $table->bigIncrements('id_iuran');
            $table->string('nama_iuran');
            $table->integer('periode');
            $table->integer('jumlah');
            $table->enum('status_jumlah',['Tetap','Tidak Tetap']);
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
        Schema::dropIfExists('riwayat_iuran');
    }
}

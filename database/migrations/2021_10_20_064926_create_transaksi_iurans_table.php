<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTransaksiIuransTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transaksi_iurans', function (Blueprint $table) {
            $table->bigIncrements('id_transaksi_iuran');
            $table->integer('id_warga');
            $table->integer('id_iuran');
            $table->date('tgl_iuran');
            $table->string('bukti');
            $table->enum('status',['Lunas','Belum Lunas']);
            $table->enum('metode_pembayaran',['Transfer','Langsung']);
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
        Schema::dropIfExists('transaksi_iuran');
    }
}

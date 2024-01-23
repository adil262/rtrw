<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Wargas extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::dropIfExists('wargas');
        Schema::create('wargas', function (Blueprint $table) {
            $table->id('id_warga');
            $table->enum('level', ['Anak', 'Kepala Keluarga', 'Istri']);
            $table->string('nama');
            $table->string('password');
            $table->char('nik', 16);
            $table->date('tanggal_lahir');
            $table->enum('status', ['Pindah', 'Meninggal', 'Aktif']);
            $table->string('kelurahan');
            $table->string('foto');
            $table->enum('jenis_kelamin', ['Laki-Laki', 'Perempuan']);
            $table->enum('role', ['Lurah', 'RT', 'RW', 'Warga']);
            $table->string('agama');
            $table->string('pekerjaan');
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
    }
}

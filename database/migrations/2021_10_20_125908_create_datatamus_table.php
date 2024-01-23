<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDatatamusTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('datatamus', function (Blueprint $table) {
            $table->id();
            $table->String("nik");
            $table->String("nama");
            $table->String("alamat");
            $table->String("jk");
            $table->Date("tanggal_lahir");
            $table->Date("tanggal_masuk");
            $table->Date("tanggal_keluar");
            $table->Text("keperluan");
            $table->String("bukti");
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
        Schema::dropIfExists('datatamus');
    }
}

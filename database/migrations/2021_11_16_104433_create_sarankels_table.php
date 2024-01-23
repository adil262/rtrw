<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSarankelsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void 
     */
    public function up()
    {
        Schema::create('sarankels', function (Blueprint $table) {
            $table->bigIncrements("id_sarankel");
            $table->integer("id_warga");
            $table->String("keluhan");
            $table->String("foto");
            $table->String("status");
            $table->Date("tanggal_create");
            $table->Date("tanggal_finish");
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
        Schema::dropIfExists('sarankels');
    }
}

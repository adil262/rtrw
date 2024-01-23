<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddIdRtrwsToWargas extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('wargas', function (Blueprint $table) {
            $table->foreignId('id_rtrws')->nullable()->after('id_warga');
            $table->foreignId('id_rumahs')->nullable()->after('id_warga');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('wargas', function (Blueprint $table) {
            $table->dropColumn('id_rtrws');
            $table->dropColumn('id_rumahs');
        });
    }
}

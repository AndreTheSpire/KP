<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Absensi', function (Blueprint $table) {
            $table->increments("absen_id");
            $table->integer("minggu");
            $table->foreignId("murid_id");
            $table->foreignId("kelas_id");
            $table->integer("status_absen");
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
        Schema::dropIfExists('Absensi');
    }
};

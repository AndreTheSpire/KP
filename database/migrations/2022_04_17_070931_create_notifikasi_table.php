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
        Schema::create('Notifikasi', function (Blueprint $table) {
            $table->increments("notifikasi_id");
            $table->integer("notifikasi_kelas");
            $table->integer("notifikasi_jenis");
            $table->foreignId("notifikasi_jenis_id");
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('Notifikasi');
    }
};

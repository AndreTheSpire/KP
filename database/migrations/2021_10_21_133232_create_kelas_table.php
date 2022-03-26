<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKelasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Kelas', function (Blueprint $table) {
            $table->increments('kelas_id');
            $table->foreignId('pengguna_id');
            $table->string('kelas_kode')->unique();
            $table->string('kelas_nama');
            $table->string('kelas_deskripsi');
            $table->dateTime('waktu_mulai');
            $table->dateTime('waktu_selesai');
            $table->boolean('status');
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
        Schema::dropIfExists('Kelas');
    }
}

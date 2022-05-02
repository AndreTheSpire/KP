<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTugasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Tugas', function (Blueprint $table) {
            $table->increments('tugas_id');
            $table->foreignId('kelas_id');
            $table->string('tugas_nama');
            $table->dateTime('tanggat_waktu');
            $table->longText('tugas_keterangan');
            $table->string('lampiran');
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
        Schema::dropIfExists('Tugas');
    }
}

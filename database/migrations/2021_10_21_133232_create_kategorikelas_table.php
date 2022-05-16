<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKategorikelasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('KategoriKelas', function (Blueprint $table) {
            $table->increments('kategorikelas_id');
            $table->string('kategorikelas_nama');
            $table->foreignId("pelajaran_id");
            $table->integer('kategorikelas_harga');
            $table->integer('kategorikelas_pertemuan');
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
        Schema::dropIfExists('Pelajaran');
    }
}

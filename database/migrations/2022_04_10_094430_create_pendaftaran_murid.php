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
        Schema::create('PendaftaranMurid', function (Blueprint $table) {
            $table->increments('pendaftaranmurid_id');
            $table->foreignId("pengguna_id");
            $table->foreignId("kategorikelas_id");
            $table->foreignId("pelajaran_id");
            $table->string('pendaftaranmurid_status', 225);
            $table->string('pendaftaranmurid_buktibayar', 225);
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
        Schema::dropIfExists('PendaftaranMurid');
    }
};

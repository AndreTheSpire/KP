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
        Schema::create('Pengguna', function (Blueprint $table) {
            $table->increments('pengguna_id');
            $table->string('pengguna_nama', 100);
            $table->string('pengguna_email', 150);
            $table->string('pengguna_password', 225);
            $table->string('pengguna_nohp', 225);
            $table->date('pengguna_tanggallahir', 225);
            $table->string('pengguna_alamat', 225);
            $table->string('pengguna_jeniskelamin', 225);
            $table->string('pengguna_peran');
            $table->string('pengguna_KTP');
            $table->string('pengguna_CV');
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
        Schema::dropIfExists('Pengguna');
    }
};

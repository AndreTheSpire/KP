<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDtugasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('D_tugas', function (Blueprint $table) {
            $table->increments('D_tugas_id');
            $table->foreignId('tugas_id');
            $table->foreignId('murid_id');
            $table->string('url_pengumpulan', 255)->nullable();
            $table->tinyInteger('nilai');
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
        Schema::dropIfExists('D_tugas');
    }
}

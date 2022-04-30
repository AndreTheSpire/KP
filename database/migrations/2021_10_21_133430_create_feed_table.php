<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFeedTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Feed', function (Blueprint $table) {
            $table->increments('feed_id');
            $table->foreignId('kelas_id');
            $table->foreignId('pengguna_id');
            $table->longText('keterangan');
            $table->string('lampiran');
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
        Schema::dropIfExists('Feed');
    }
}

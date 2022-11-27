<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Nilai extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
         Schema::create('nilai', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('siswa_id')->unsigned();
            $table->integer('mapel_id')->unsigned();
            $table->integer('nilai');
            $table->foreign('siswa_id')
                    ->references('id')
                    ->on('siswa')
                    ->onUpdate('cascade')
                    ->onDelete('cascade');
            $table->foreign('mapel_id')
                    ->references('id')
                    ->on('mapels')
                    ->onUpdate('cascade')
                    ->onDelete('cascade');
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
        Schema::dropIfExists('nilai');
    }
}

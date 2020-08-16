<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSoalsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('soals', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('soal');
            $table->integer('id_kelas');
            $table->integer('id_materi');
            $table->integer('id_mapel');
            $table->string('jawaban_A');
            $table->string('jawaban_B');
            $table->string('jawaban_C');
            $table->string('jawaban_D');
            $table->string('jawaban');
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
        Schema::dropIfExists('soals');
    }
}

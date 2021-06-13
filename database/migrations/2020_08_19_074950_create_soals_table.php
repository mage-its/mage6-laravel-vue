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
            $table->enum('difficulty', ['easy', 'normal', 'hard', 'king']);
            $table->enum('jenis_soal', ['program','fisika', 'logika']);
            $table->string('text_soal');
            $table->string('answer_soal');
            $table->string('image_soal')->nullable();
            $table->enum('status_soal', ['ujicoba','asli']);
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

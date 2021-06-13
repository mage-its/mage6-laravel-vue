<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserAnswersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_answers', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('no_soal'); //nomor soal (1-20)
            $table->unsignedBigInteger('userid');
            $table->unsignedBigInteger('soalid');
            $table->integer('tries')->default(0);
            $table->string('last_answer')->nullable();
            $table->boolean('correct')->default(FALSE);
            $table->string('status')->default('locked');
            $table->boolean('paid')->default(FALSE);
            $table->timestamps();

            $table->foreign('userid')->references('id')->on('users');
            $table->foreign('soalid')->references('id')->on('soals');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('user_answers');
    }
}

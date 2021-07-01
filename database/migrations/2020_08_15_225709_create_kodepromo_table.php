<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKodepromoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kodepromo', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('kode');
            $table->integer('diskon_price');
            $table->integer('usage')->default(0);
            $table->enum('category', ['devcom', 'olim', 'esport', 'all'])->default('all');
            $table->integer('max')->default(100);
            $table->boolean('status');
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
        Schema::dropIfExists('kodepromo');
    }
}

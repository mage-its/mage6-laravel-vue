<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOlimTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('olim', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('no_peserta')->nullable();
            $table->string('asal_sekolah')->nullable();
            $table->string('asal_alamat')->nullable();
            $table->string('asal_kota')->nullable();
            $table->string('nama_tim')->nullable();
            $table->string('nama_ketua')->nullable();
            $table->string('hp_ketua')->nullable();
            $table->string('wa_ketua')->nullable();
            $table->string('line_ketua')->nullable();
            $table->string('nama_anggota1')->nullable();
            $table->string('nama_anggota2')->nullable();
            $table->enum('asal_info',['Media Sosial (Facebook)', 'Guru', 'Roadshow', 'Other', 'Media Sosial (Instagram)', 'Media Sosial (Twitter)'])->nullable();
            $table->string('info')->nullable();
            $table->string('path_ktpketua')->nullable();
            $table->string('path_ktpanggota1')->nullable();
            $table->string('path_ktpanggota2')->nullable();
            $table->string('path_buktibayar')->nullable();
            $table->boolean('status')->default(FALSE);
            $table->boolean('is_submitted')->default(FALSE);
            $table->string('price')->nullable();
            $table->string('nama_bayar')->nullable();
            $table->boolean('status_bayar')->default(FALSE);
            $table->unsignedBigInteger('userid');
            $table->timestamps();

            $table->foreign('userid')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('olim');
    }
}

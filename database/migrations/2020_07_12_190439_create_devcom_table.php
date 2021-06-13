<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDevcomTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dev_com', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('no_peserta')->nullable();
            $table->enum('kat',['Mahasiswa','Siswa'])->nullable();
            $table->enum('cabang_lomba',['Game','App','IOT'])->nullable();
            $table->string('asal_perguruan')->nullable();
            $table->string('asal_alamat')->nullable();
            $table->string('asal_kota')->nullable();
            $table->string('nama_tim')->nullable();
            $table->string('nama_pembimbing')->nullable();
            $table->string('hp_pembimbing')->nullable();
            $table->string('wa_pembimbing')->nullable();
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
            $table->string('path_abstrak')->nullable();
            $table->string('path_proposal')->nullable();
            $table->string('path_progress')->nullable();
            $table->string('link_karya')->nullable();
            $table->string('link_video')->nullable();
            $table->boolean('status')->default(FALSE);
            $table->boolean('is_submitted')->default(FALSE);
            $table->boolean('sudah_upload')->default(FALSE);
            $table->string('price')->nullable();
            $table->string('nama_bayar')->nullable();
            $table->boolean('status_bayar')->default(FALSE);
            $table->boolean('verif_bayar')->default(FALSE);
            $table->boolean('status_kestari')->default(FALSE);
            $table->boolean('status_acara')->default(FALSE);
            $table->integer('tahap')->default(1);
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
        Schema::dropIfExists('dev_com');
    }
}

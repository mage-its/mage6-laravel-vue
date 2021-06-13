<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Esports extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'esport';

     /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'no_peserta', 
        'cabang_lomba',
        'asal_sekolah',
        'nama_tim',
        'nama_ketua',
        'hp_ketua',
        'wa_ketua',
        'line_ketua',
        'nama_anggota1',
        'id_anggota1',
        'nama_anggota2',
        'id_anggota2',
        'nama_anggota3',
        'id_anggota3',
        'nama_anggota4',
        'id_anggota4',
        'nama_cadangan',
        'id_cadangan',
        'asal_info',
        'info',
        'path_kartupelajar',
        'path_buktibayar',
        'path_screenshot_akun',
        'status',
        'is_submitted',
        'price',
        'status_bayar',
        'userid'
        ];

    protected $casts = [
        'status' => 'boolean',
        'is_submitted' => 'boolean'
    ]; 
}

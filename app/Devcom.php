<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Devcom extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'dev_com';

     /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'no_peserta', 
        'kat',
        'cabang_lomba',
        'judul',
        'asal_sekolah',
        'asal_alamat',
        'asal_kota',
        'nama_tim',
        'nama_pembimbing',
        'hp_pembimbing',
        'wa_pembimbing',
        'nama_ketua',
        'hp_ketua',
        'wa_ketua',
        'line_ketua',
        'nama_anggota1',
        'nama_anggota2',
        'asal_info',
        'info',
        'path_kartupelajar',
        'path_buktibayar',
        'path_abstrak',
        'status',
        'is_submitted',
        'status_bayar',
        'status_upload',
        'status_kestari',
        'status_acara',
        'price',
        'userid',
        'tahap'
        ];

    protected $casts = [
        'status' => 'boolean',
        'is_submitted' => 'boolean',
        'sudah_upload' => 'boolean',
        'status_kestari' => 'boolean',
        'status_acara' => 'boolean',
        'tahap' => 'integer'
    ];
}

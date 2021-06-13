<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Olim extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'olim';

     /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'no_peserta', 
        'asal_sekolah',
        'asal_alamat',
        'asal_kota',
        'nama_tim',
        'nama_ketua',
        'hp_ketua',
        'wa_ketua',
        'line_ketua',
        'nama_anggota1',
        'nama_anggota2',
        'asal_info',
        'info',
        'path_ktpketua',
        'path_ktpanggota1',
        'path_ktpanggota2',
        'path_buktibayar',
        'status',
        'is_submitted',
        'userid',
        'status_bayar',
        'price',
        ];

    protected $casts = [
        'status' => 'boolean',
        'is_submitted' => 'boolean',
        'status_bayar' => 'boolean'
    ];
}

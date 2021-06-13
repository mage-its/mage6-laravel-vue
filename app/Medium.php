<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Medium extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'medium';

     /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'judul',
        'konten',
        'path_gambar'    
    ];    

    protected $casts = [
        'id' => 'integer'
    ];
}

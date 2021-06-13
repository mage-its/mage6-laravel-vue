<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Soal extends Model
{
    protected $table = 'soals';

    protected $fillable = [
        'difficulty',
        'jenis_soal',
        'text_soal',
        'answer_soal',
        'image_soal',
        'status_soal'         
        ];

}

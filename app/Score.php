<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Score extends Model
{
    protected $table = 'score';

    protected $fillable = [
        'score', 'userid', 'tahap'        
        ];

    protected $casts = [
        'score' => 'integer'
    ];

}

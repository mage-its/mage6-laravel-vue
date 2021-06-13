<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserAnswers extends Model
{
    protected $table = 'user_answers';

    protected $fillable = [
        'no_soal',
        'userid',
        'soalid',
        'tries',
        'last_answer',
        'correct',
        'status',
        'paid'
        ];
    
    protected $casts = [
        'userid' => 'integer',
        'status' => 'string'
    ];
}

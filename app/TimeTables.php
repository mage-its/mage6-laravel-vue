<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TimeTables extends Model
{
    protected $table = 'time_tables';
    
    protected $fillable = [
        'start',
        'end'        
        ];
}

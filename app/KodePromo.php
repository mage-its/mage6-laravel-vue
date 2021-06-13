<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class KodePromo extends Model
{
    protected $table = 'kodepromo';

    protected $fillable = [
        'kode', 'diskon_price', 'usage', 'status', 'max', 'group'
    ];    

    protected $casts = [
        'usage' => 'integer',
        'max' => 'integer',
        'group' => 'string'
    ];
}

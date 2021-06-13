<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class KodeBayar extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'kodebayar';


     /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'no', 'price'
    ];
}

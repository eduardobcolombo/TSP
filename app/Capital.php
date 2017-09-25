<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Capital extends Model
{
    protected $fillable = [
        'name',
        'latitude',
        'longitude'
    ];

    protected $table = "capital";

}

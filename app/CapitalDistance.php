<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CapitalDistance extends Model
{
    protected $fillable = [
        'capital_id',
        'capital_id_until',
        'distance'
    ];

    protected $table = "capital_distances";
}

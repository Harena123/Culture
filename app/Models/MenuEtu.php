<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MenuEtu extends Model
{
    protected $table = 'menu_etu';

    protected $fillable = [
        'id',
        'menu',
        'etudiants',
        'dates',
    ];

    public $incrementing= false;

    public $timestamps = false;
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Matiere extends Model
{
    protected $table = 'matieres';

    protected $fillable = [
        'id',
        'nom',
        'coefficient',
    ];

    public $incrementing= false;

    public $timestamps = false;
}

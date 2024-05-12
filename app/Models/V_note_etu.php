<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class V_note_etu extends Model
{
    protected $table = 'v_note_etus';

    protected $fillable = [
        'id',
        'Nom',
        'prenom',
        'Id_matieres',
        'Matieres',
        'notes',
        'coeff',

    ];

    public $incrementing= false;

    public $timestamps = false;
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Etudiant extends Model
{
    protected $table = 'etudiants';

    protected $fillable = [
        'id',
        'Nom',
        'prenom',
        'dateNaissance',
    ];

    public $incrementing= false;

    public $timestamps = false;
}

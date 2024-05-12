<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Note extends Model
{
    protected $table = 'notes';

    protected $fillable = [
        'id',
        'notes',
        'matieres',
        'etu',
    ];

    public $incrementing= false;

    public $timestamps = false;
}

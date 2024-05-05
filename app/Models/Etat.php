<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Etat extends Model
{
    public $table = 'etats';

    public $fillable = [
        'id',
        'descri',
        'test'
    ];

    protected $casts = [
        'descri' => 'string'
    ];

    public static array $rules = [
        'descri' => 'nullable|string|max:30',
        'test' => 'nullable'
    ];

    
}

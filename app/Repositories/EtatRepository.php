<?php

namespace App\Repositories;

use App\Models\Etat;
use App\Repositories\BaseRepository;

class EtatRepository extends BaseRepository
{
    protected $fieldSearchable = [
        'id',
        'descri',
        'test'
    ];

    public function getFieldsSearchable(): array
    {
        return $this->fieldSearchable;
    }

    public function model(): string
    {
        return Etat::class;
    }
}

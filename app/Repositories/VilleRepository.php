<?php

namespace App\Repositories;

use App\Models\Ville;
use App\Repositories\BaseRepository;

class VilleRepository extends BaseRepository
{
    protected $fieldSearchable = [
        'nom'
    ];

    public function getFieldsSearchable(): array
    {
        return $this->fieldSearchable;
    }

    public function model(): string
    {
        return Ville::class;
    }
}

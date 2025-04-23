<?php

namespace App\Models;

use CodeIgniter\Model;

class FactureModel extends Model
{
    protected $table = 'factures';
    protected $primaryKey = 'id';
    protected $allowedFields = ['client', 'Total'];
    protected $useTimestamps = false;

    protected $validationRules = [
        'client' => 'required',
        'Total'  => 'required|greater_than[0]',
    ];

    protected $validationMessages = [
        'client' => [
            'required' => 'Le champ client est obligatoire.'
        ],
        'Total' => [
            'required' => 'Le total est obligatoire.',
            'greater_than' => 'Le total doit être supérieur à 0.'
        ]
    ];
}

<?php

namespace App\Models;

use CodeIgniter\Model;

class LigneFactureModel extends Model
{
    protected $table = 'ligne_factures'; // Adjust this if your table name is different
    protected $primaryKey = 'id';
    protected $allowedFields = ['facture_id', 'description', 'quantite', 'prix_unitaire'];
    protected $useTimestamps = false;

    // Optional: validation rules
    protected $validationRules = [
        'facture_id'    => 'required|integer',
        'description'   => 'required|string',
        'quantite'      => 'required|integer|greater_than[0]',
        'prix_unitaire' => 'required|integer|greater_than[0]',
    ];
}

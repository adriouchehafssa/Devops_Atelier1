<?php

namespace App\Models;

use CodeIgniter\Model;

class BonLaivraisonModel extends Model
{
    protected $table = 'bon_livraison'; 
    protected $primaryKey = 'id'; 
    protected $allowedFields = [
        'numero',
        'date_livraison',
        'client_id',
        'adresse_livraison'
    ];

    protected $useTimestamps = false; // active si tu veux gérer automatiquement created_at/updated_at
    protected $returnType = 'array'; // ou 'object' selon ta préférence

    // Règles de validation
    protected $validationRules = [
        'numero' => 'required|is_unique[bon_livraison.numero]',
        'date_livraison' => 'required|valid_date',
        'client_id' => 'required|is_not_unique[clients.id]', // Vérifie que le client existe dans la table clients
        'adresse_livraison' => 'required|min_length[3]'
    ];

    protected $validationMessages = [
        'client_id' => [
            'is_not_unique' => 'Le client spécifié n\'existe pas.'
        ]
    ];

    protected $skipValidation = false; // doit être false pour que la validation soit active
}




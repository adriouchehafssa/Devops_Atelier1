<?php
namespace App\Models;
use CodeIgniter\Model;

class LigneCommandeModel extends Model
{
    protected $table = 'ligne_commande'; 
    protected $primaryKey = 'id'; 
    protected $allowedFields = [
        'commande_id',
        'produit_id',
        'quantite',
        'prix_unitaire',
        'total'
    ];

    protected $useTimestamps = false; 
    protected $returnType = 'array'; 

    // Règles de validation
    protected $validationRules = [
        'commande_id' => 'required|is_not_unique[commandes.id]', 
        'produit_id' => 'required|is_not_unique[produits.id]', 
        'quantite' => 'required|integer|min_length[1]', 
        'prix_unitaire' => 'required|decimal', 
        'total' => 'required|decimal' 
    ];

    protected $validationMessages = [
        'commande_id' => [
            'is_not_unique' => 'La commande spécifiée n\'existe pas.'
        ],
        'produit_id' => [
            'is_not_unique' => 'Le produit spécifié n\'existe pas.'
        ],
        'quantite' => [
            'integer' => 'La quantité doit être un entier.',
            'min_length' => 'La quantité doit être d\'au moins 1.'
        ],
        'prix_unitaire' => [
            'decimal' => 'Le prix unitaire doit être un nombre décimal.'
        ],
        'total' => [
            'decimal' => 'Le total doit être un nombre décimal.'
        ]
    ];

    protected $skipValidation = false; 
}

<?php

namespace App\Models;

use CodeIgniter\Model;

class PanierModel extends Model
{
    protected $table      = 'paniers';
    protected $primaryKey = 'id';

    protected $allowedFields = ['id_client', 'date_commande'];
    protected $useTimestamps = true;

public function ajouterArticlesAuProduit($idClient, $idProduit, $quantite)
{
    // Étape 1 : Chercher s’il existe déjà un panier ouvert pour ce client (sans date_commande)
    $panier = $this->where('id_client', $idClient)
                   ->where('date_commande', null)
                   ->first();

    // Étape 2 : Si aucun panier trouvé, en créer un
    if (!$panier) {
        $idPanier = $this->insert([
            'id_client' => $idClient,
            'date_commande' => null,
        ]);
    } else {
        $idPanier = $panier['id'];
    }

    // Étape 3 : Ajouter les produits dans une table d’association panier_produits
    $db = \Config\Database::connect();
    $builder = $db->table('panier_produits');

    // Vérifier si le produit existe déjà dans ce panier
    $existant = $builder->where('id_panier', $idPanier)
                        ->where('id_produit', $idProduit)
                        ->get()
                        ->getRow();

    if ($existant) {
        // Si le produit est déjà dans le panier, augmenter la quantité
        $builder->where('id_panier', $idPanier)
                ->where('id_produit', $idProduit)
                ->update([
                    'quantite' => $existant->quantite + $quantite
                ]);
    } else {
        // Sinon, insérer un nouveau produit dans le panier
        $builder->insert([
            'id_panier' => $idPanier,
            'id_produit' => $idProduit,
            'quantite' => $quantite
        ]);
    }

    return true;
}
}
?>
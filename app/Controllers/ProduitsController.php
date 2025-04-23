<?php

namespace App\Controllers;

use App\Models\ProduitsModel;

class ProduitsController extends BaseController
{
    public function ajouterArticlesInventaire()
    {
        // Charger le modèle ProduitsModel
        $produitsModel = new ProduitsModel();

        // Exemple : ajouter 20 articles au produit avec id = 1
        $result = $produitsModel->ajouterArticlesAuProduit(1, 20);

        // Vérifier si l'ajout a réussi
        if ($result) {
            // Retourner un message JSON de succès
            return $this->response->setJSON(['status' => 'success', 'message' => 'Quantité d\'article ajoutée avec succès']);
        } else {
            // Retourner un message JSON d'échec
            return $this->response->setJSON(['status' => 'error', 'message' => 'Erreur lors de l\'ajout de la quantité']);
        }
    }
}

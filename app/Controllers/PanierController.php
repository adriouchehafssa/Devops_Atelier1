<?php

namespace App\Controllers;

use App\Models\PanierModel;

class PanierController extends BaseController
{
    public function ajouterArticles()
    {
        // Charger le modèle PanierModel
        $panierModel = new PanierModel();

        // Exemple d'ajout d'articles : client avec id_client = 1, produit avec id_produit = 2, et ajouter 5 articles
        $result = $panierModel->ajouterArticlesAuProduit(1, 2, 5);

        // Vérifier si l'ajout a réussi
        if ($result) {
            // Retourner un message JSON de succès
            return $this->response->setJSON(['status' => 'success', 'message' => 'Article ajouté avec succès']);
        } else {
            // Retourner un message JSON d'échec
            return $this->response->setJSON(['status' => 'error', 'message' => 'Erreur lors de l\'ajout de l\'article']);
        }
    }
}

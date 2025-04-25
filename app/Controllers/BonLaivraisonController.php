<?php

namespace App\Controllers;
use App\Models\BonLaivraisonModel;

class BonLaivraisonController extends BaseController
{
    public function ajouter()
    {
        $model = new BonLaivraisonModel();

        $data = [
            'numero' => $this->request->getPost('numero'),
            'date_livraison' => $this->request->getPost('date_livraison'),
            'client_id' => $this->request->getPost('client_id'),
            'adresse_livraison' => $this->request->getPost('adresse_livraison')
        ];

        // Insertion avec validation automatique du modèle
        if ($model->insert($data)) {
            echo "Bon de livraison inséré.";
        } else {
            echo "Erreur : ";
            print_r($model->errors()); 
        }
    }
}

<?php

namespace App\Controllers;

use App\Models\FactureModel;
use CodeIgniter\RESTful\ResourceController;

class FactureController extends ResourceController
{
    protected $modelName = 'App\Models\FactureModel';
    protected $format    = 'json';

    public function create()
    {
        $data = $this->request->getJSON(true); 

        if (!$this->model->insert($data)) {
            return $this->failValidationErrors($this->model->errors());
        }

        return $this->respondCreated([
            'message' => 'Facture créée avec succès.',
            'id'      => $this->model->getInsertID()
        ]);
    }

    public function index()
    {
        $factures = $this->model->findAll();
        return $this->respond($factures);
    }

    public function show($id = null)
    {
        $facture = $this->model->find($id);

        if (!$facture) {
            return $this->failNotFound("Facture non trouvée avec l'ID : $id");
        }

        return $this->respond($facture);
    }

   

public function delete($id = null)
{
    $facture = $this->model->find($id);

    if (!$facture) {
        return $this->failNotFound("Facture non trouvée avec l'ID : $id");
    }

    $this->model->delete($id);

    return $this->respondDeleted([
        'message' => 'Facture supprimée avec succès.'
    ]);
}

}

<?php

namespace App\Controllers;

use App\Models\LigneFactureModel;

class LigneFactureController extends BaseController
{
    public function index()
    {
        $model = new LigneFactureModel();
        $data['lignes'] = $model->findAll();

        return view('ligne_facture_list', $data);
    }

    public function create()
    {
        return view('create_ligne_facture');
    }

    public function store()
    {
        $model = new LigneFactureModel();

        $data = [
            'facture_id'  => $this->request->getPost('facture_id'),
            'description' => $this->request->getPost('description'),
            'quantity'    => $this->request->getPost('quantity'),
            'price'       => $this->request->getPost('price'),
        ];

        $model->insert($data);

        return redirect()->to('/lignefacture');
    }
}

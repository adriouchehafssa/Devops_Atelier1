<?php

namespace App\Controllers;

use App\Models\ProductModel;
use CodeIgniter\Controller;

class ProductController extends Controller
{
    public function index()
    {
        $model = new ProductModel();
        $data['products'] = $model->findAll();
        return $this->response->setJSON($data);
    }

    public function create()
    {
        $model = new ProductModel();
        $model = new ProductModel();
        $data = [
            'description'    => $this->request->getPost('description'),
            'prix'   => $this->request->getPost('prix'),
            'message'    => $this->request->getPost('message'),
        ];

        $model->insert($data);

        return $this->response->setJSON(['status' => 'Message reçu !']);
    }
      
}

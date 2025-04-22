<?php

namespace App\Controllers;

use App\Models\CategoryModel;
use CodeIgniter\Controller;

class CategoryController extends Controller
{
    public function index()
    {
        $model = new CategoryModel();
        $data['categories'] = $model->findAll();
        return $this->response->setJSON($data);
    }

    public function create()
    {
        $model = new CategoryModel();
        $model->insert([
            'name' => $this->request->getPost('name')
        ]);
        return $this->response->setJSON(['message' => 'Catégorie créée !']);
    }
}

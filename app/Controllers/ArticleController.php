<?php

namespace App\Controllers;

use App\Models\ArticleModel;
use CodeIgniter\Controller;

class ArticleController extends Controller
{
    public function add()
    {
        $model = new ArticleModel();
        $data = [
            'ref'       => $this->request->getPost('ref'),
            'nom'       => $this->request->getPost('nom'),
            'qtestock'  => $this->request->getPost('qtestock'),
        ];

        $model->insert($data);

        return $this->response->setJSON(['status' => 'Article ajouté']);
    }

    public function all()
    {
        $model = new ArticleModel();
        $articles = $model->findAll();
        return $this->response->setJSON($articles);
    }
}

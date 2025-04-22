<?php

namespace App\Controllers;

use App\Models\ContactModel;
use CodeIgniter\Controller;

class ContactController extends Controller
{
    public function submit()
    {
        $model = new ContactModel();
        $data = [
            'name'    => $this->request->getPost('name'),
            'email'   => $this->request->getPost('email'),
            'message' => $this->request->getPost('message'),
        ];

        $model->insert($data);

        return $this->response->setJSON(['status' => 'Message reçu !']);
    }

    public function list()
    {
        $model = new ContactModel();
        $contacts = $model->findAll();
        return $this->response->setJSON($contacts);
    }
}

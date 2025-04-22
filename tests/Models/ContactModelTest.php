<?php

namespace Tests\Models;

use CodeIgniter\Test\CIUnitTestCase;
use App\Models\ContactModel;

class ContactModelTest extends CIUnitTestCase
{
    public function testFindAllReturnsArray()
    {
        $model = new ContactModel();
        $contacts = $model->findAll();
        $this->assertIsArray($contacts, "La méthode findAll() doit retourner un tableau.");
    }

    public function testInsertContact()
    {
        $model = new ContactModel();
        $data = [
            'name' => 'Dounia',
            'email' => 'dounia@example.com',
            'message' => 'Ceci est un message test'
        ];
        $id = $model->insert($data);
        $this->assertGreaterThan(0, $id, "L'insertion doit retourner un ID > 0.");
    }
}

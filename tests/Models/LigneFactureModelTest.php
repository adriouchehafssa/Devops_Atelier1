<?php

namespace Tests\Models;

use CodeIgniter\Test\CIUnitTestCase;
use App\Models\LigneFactureModel;

class LigneFactureModelTest extends CIUnitTestCase
{
    public function testFindAllReturnsArray()
    {
        $model = new LigneFactureModel();
        $result = $model->findAll();
        $this->assertIsArray($result, "La méthode findAll() doit retourner un tableau.");
    }

    public function testInsertLigneFacture()
    {
        $model = new LigneFactureModel();
        $data = [
            'facture_id'  => 1, // change this based on your actual FK
            'description' => 'Article test',
            'quantite'    => 3,
            'prix_unitaire' => 150,
        ];
        $id = $model->insert($data);
        $this->assertGreaterThan(0, $id, "L'insertion doit retourner un ID > 0.");
    }
}

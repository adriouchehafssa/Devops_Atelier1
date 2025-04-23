<?php

namespace Tests\Models;

use CodeIgniter\Test\CIUnitTestCase;
use App\Models\ProductModel;

class ProductmodelTest extends CIUnitTestCase
{
    protected ProductModel $model;
    protected $db;

    protected function setUp(): void
    {
        parent::setUp();
        $this->model = new ProductModel();
        $this->db = \Config\Database::connect();
        $this->db->query('TRUNCATE TABLE products');
    }

    public function testFindAllReturnsArray()
    {
        $products = $this->model->findAll();
        $this->assertIsArray($products, "La méthode findAll() doit retourner un tableau.");
    }

    public function testInsertProduct()
    {
        $data = [
            'description' => 'chat',
            'prix'        => 200,
            'message'     => 'Ceci est un message test'
        ];
        
        $id = $this->model->insert($data, true);

        $this->assertGreaterThan($id, "L'insertion doit retourner un ID > 0.");
    }
}

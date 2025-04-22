<?php

namespace Tests\Models;

use CodeIgniter\Test\CIUnitTestCase;
use App\Models\CategoryModel;

class CategoryModelTest extends CIUnitTestCase
{
    public function testFindAllReturnsArray()
    {
        $model = new CategoryModel();
        $result = $model->findAll();
        $this->assertIsArray($result, "La méthode findAll() doit retourner un tableau.");
    }

    public function testInsertCategory()
    {
        $model = new CategoryModel();
        $data = ['name' => 'Test Category'];
        $id = $model->insert($data);
        $this->assertGreaterThan(0, $id, "L'insertion doit retourner un ID > 0.");
    }
}

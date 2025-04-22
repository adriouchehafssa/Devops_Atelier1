<?php
namespace Tests\Models;

use CodeIgniter\Test\CIUnitTestCase; // Remplace TestCase par CIUnitTestCase
use App\Models\UserModel;

class UserModelTest extends CIUnitTestCase
{
    public function testFindAllReturnsArray()
    {
        $model = new UserModel();
        $users = $model->findAll();
        $this->assertIsArray($users, "La méthode findAll() doit retourner un tableau.");
    }

    public function testInsertUser()
    {
        $model = new UserModel();
        $data = [
            'name'  => 'Test User',
            'email' => 'test@example.com',
        ];
        $id = $model->insert($data);
        $this->assertGreaterThan(0, $id, "L'ID inséré doit être > 0.");
    }
}

<?php

namespace Tests\Models;

use CodeIgniter\Test\CIUnitTestCase;
use App\Models\CommandModel;

class CommandModelTest extends CIUnitTestCase
{
    public function testFindAllReturnsArray()
    {
        $model = new CommandModel();
        $result = $model->findAll();
        $this->assertIsArray($result, "La méthode findAll() doit retourner un tableau.");
    }

    public function testInsertCommand()
    {
        $model = new CommandModel();
        $data = [
            'reference' => 'CMD9999',
            'amount'    => 200,
        ];
        $id = $model->insert($data);
        $this->assertGreaterThan(0, $id, "L'insertion doit retourner un ID > 0.");
    }
}

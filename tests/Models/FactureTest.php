<?php

namespace Tests\Models;

use App\Models\FactureModel;
use CodeIgniter\Test\CIUnitTestCase;

class FactureTest extends CIUnitTestCase
{
    public function testInsertFactureValidData()
    {
        $model = new FactureModel();

        $data = [
            'client' => 'Ali',
            'Total'  => 150.00
        ];

        $this->assertTrue($model->insert($data) !== false);
    }

    public function testInsertFactureWithoutClient()
    {
        $model = new FactureModel();

        $data = [
            'Total' => 100
        ];

        $this->assertFalse($model->insert($data));
    }

    public function testInsertFactureWithZeroTotal()
    {
        $model = new FactureModel();

        $data = [
            'client' => 'reda',
            'Total'  => 0
        ];

        $this->assertFalse($model->insert($data));
    }

public function testDeleteFacture()
{
    $model = new FactureModel();

    $id = $model->insert([
        'client' => 'Ali',
        'Total'  => 150
    ]);

    $this->assertTrue($model->delete($id));

    $this->assertNull($model->find($id));
}

}

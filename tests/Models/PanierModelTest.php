<?php

namespace Tests\Models;

use CodeIgniter\Test\CIUnitTestCase;
use App\Models\PanierModel;

class PanierModelTest extends CIUnitTestCase
{
    protected $panierModel;

    protected function setUp(): void
    {
        parent::setUp();
        $this->panierModel = new PanierModel();
    }

    public function testInsertPanier()
    {
        $data = [
            'id_client'     => 1,
            'date_commande' => null,
        ];

        $id = $this->panierModel->insert($data);

        $this->assertIsInt($id, 'L\'insertion doit retourner un ID entier.');
        $this->assertGreaterThan(0, $id, 'L\'ID du panier doit être supérieur à 0.');

        $panier = $this->panierModel->find($id);
        $this->assertNotNull($panier);
        $this->assertEquals(1, $panier['id_client']);
    }

    public function testUpdatePanierCommande()
    {
        $id = $this->panierModel->insert([
            'id_client'     => 2,
            'date_commande' => null,
        ]);

        $now = date('Y-m-d H:i:s');
        $this->panierModel->update($id, ['date_commande' => $now]);

        $panier = $this->panierModel->find($id);
        $this->assertEquals($now, $panier['date_commande']);
    }
}
?>
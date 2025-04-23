<?php 

namespace App\Tests\Models;

use CodeIgniter\Test\CIUnitTestCase;
use App\Models\BonLaivraisonModel;

class BonLaivraisonTest extends CIUnitTestCase
{
    protected $refresh = true;

    public function testInsertBonLivraisonClientInexistant()
    {
        $model = new BonLaivraisonModel();

        $data = [
            'numero' => 'BL-2025-003',
            'date_livraison' => '2025-04-27',
            'client_id' => 2, // ID inexistant
            'adresse_livraison' => 'Adresse fictive2'
        ];

        $result = $model->insert($data);

        // Puisque la validation est activée, l'insertion devrait échouer
        $this->assertFalse($result, "L'insertion aurait dû échouer avec un client inexistant.");

        // Vérifie le message d'erreur de validation
        $errors = $model->errors();
        $this->assertArrayHasKey('client_id', $errors);
        $this->assertEquals("Le client spécifié n'existe pas.", $errors['client_id']);
    }
}

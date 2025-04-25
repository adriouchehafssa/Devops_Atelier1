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
            'numero' => 'BA-2025-003',
            'date_livraison' => '2025-04-30',
            'client_id' => 99999, // ID inexistant
            'adresse_livraison' => 'Adresse fictive '
        ];

        $result = $model->insert($data);

        
        $this->assertFalse($result, "L'insertion aurait dû échouer avec un client inexistant.");
        // Vérifie le message d'erreur de validation
        $errors = $model->errors();
        $this->assertArrayHasKey('client_id', $errors);
        $this->assertEquals("Le client spécifié n'existe pas.", $errors['client_id']);
    }
    public function testValidationAdresseLivraisonTropCourte()
    {
     $model = new BonLaivraisonModel();
     $data = [
        'numero' => 'BA-2025-005',
        'date_livraison' => '2025-05-05',
        'client_id' => 2, // Supposons que le client existe
        'adresse_livraison' => 'Adresse long' // Adresse 
     ];
     $result = $model->insert($data);
     $this->assertFalse($result, "L'insertion aurait dû échouer avec une adresse trop courte.");

     $errors = $model->errors();
     $this->assertArrayHasKey('adresse_livraison', $errors);
     $this->assertEquals("L'adresse de livraison doit comporter au moins 3 caractères.", $errors['adresse_livraison']);
    }

}

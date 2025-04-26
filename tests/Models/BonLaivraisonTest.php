<?php 

namespace App\Tests\Models;

use CodeIgniter\Test\CIUnitTestCase;
use App\Models\BonLaivraisonModel;

class BonLaivraisonTest extends CIUnitTestCase
{
    protected $refresh = true;

    public function testFindBonLivraisonParNumero()
    {
        $model = new BonLaivraisonModel();
    
        //bon de livraison avec le numéro 'BA-2025-005' dans la base de données.
        $numero = 'BA-2025-006';
    
        $bonLivraison = $model->where('numero', $numero)->first();
    
        $this->assertNotEmpty($bonLivraison, "Le bon de livraison avec le numéro {$numero} n'a pas été trouvé.");
    
        // Vérifie que le numéro correspond bien à celui qu'on recherche
        $this->assertEquals($numero, $bonLivraison['numero'], "Le numéro du bon de livraison ne correspond pas à celui recherché.");
    
        // Vérifie que les autres champs sont valides (par exemple, 'client_id' et 'adresse_livraison')
        $this->assertArrayHasKey('client_id', $bonLivraison, "Le champ 'client_id' est manquant.");
        $this->assertArrayHasKey('adresse_livraison', $bonLivraison, "Le champ 'adresse_livraison' est manquant.");
    }
    

}

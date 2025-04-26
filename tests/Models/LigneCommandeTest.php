<?php 

namespace App\Tests\Models;

use CodeIgniter\Test\CIUnitTestCase;
use App\Models\LigneCommandeModel;

class LigneCommandeTest extends CIUnitTestCase
{
    protected $refresh = true;

    public function testFindLigneCommandeParId()
    {
        $model = new LigneCommandeModel();
        $id = 1;
        $ligneCommande = $model->find($id);
    
        $this->assertNotEmpty($ligneCommande, "La ligne de commande avec l'ID {$id} n'a pas été trouvée.");
    
        // Vérifie que l'ID correspond bien à celui qu'on recherche
        $this->assertEquals($id, $ligneCommande['id'], "L'ID de la ligne de commande ne correspond pas à celui recherché.");
    
        // Vérifie que les autres champs sont valides (par exemple, 'commande_id', 'produit_id', 'quantite', 'prix_unitaire', 'total')
        $this->assertArrayHasKey('commande_id', $ligneCommande, "Le champ 'commande_id' est manquant.");
        $this->assertArrayHasKey('produit_id', $ligneCommande, "Le champ 'produit_id' est manquant.");
        $this->assertArrayHasKey('quantite', $ligneCommande, "Le champ 'quantite' est manquant.");
        $this->assertArrayHasKey('prix_unitaire', $ligneCommande, "Le champ 'prix_unitaire' est manquant.");
        $this->assertArrayHasKey('total', $ligneCommande, "Le champ 'total' est manquant.");

        // Vérifie que le total est correct (quantite * prix_unitaire)
        $expectedTotal = $ligneCommande['quantite'] * $ligneCommande['prix_unitaire'];
        $this->assertEquals($expectedTotal, $ligneCommande['total'], "Le total calculé est incorrect.");
    }
}

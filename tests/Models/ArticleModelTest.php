<?php

namespace Tests\Models;

use CodeIgniter\Test\CIUnitTestCase;
use App\Models\ArticleModel;

class ArticleModelTest extends CIUnitTestCase
{
    public function testArticleNameIsNotNull()
    {
        $model = new ArticleModel();

        // Insertion d’un article
        $data = [
            'ref' => 'ART-002',
            'nom' => 'Ordinateur',
            'qtestock' => 50
        ];
        $model->insert($data);

        // Récupération de l’article
        $article = $model->where('ref', 'ART-002')->first();

        // Vérification que le nom n’est pas null
        $this->assertNotNull($article['nom'], "Le nom de l'article ne doit pas être null !");
    }
}

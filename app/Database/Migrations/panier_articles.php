<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreatePanierArticlesTable extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id'         => ['type' => 'INT', 'auto_increment' => true],
            'id_panier'  => ['type' => 'INT'],
            'id_article' => ['type' => 'INT'],
            'quantite'   => ['type' => 'INT', 'default' => 1],
        ]);
        $this->forge->addKey('id', true);
        $this->forge->createTable('panier_articles');
    }

    public function down()
    {
        $this->forge->dropTable('panier_articles');
    }
}

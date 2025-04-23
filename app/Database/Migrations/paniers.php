<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Paniers extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id'            => ['type' => 'INT', 'auto_increment' => true],
            'id_client'     => ['type' => 'INT'],
            'date_commande' => ['type' => 'DATETIME', 'null' => true],
            'created_at'    => ['type' => 'DATETIME', 'null' => true],
            'updated_at'    => ['type' => 'DATETIME', 'null' => true],
        ]);
        $this->forge->addKey('id', true);
        $this->forge->createTable('paniers');
    }

    public function down()
    {
        $this->forge->dropTable('paniers');
    }
}

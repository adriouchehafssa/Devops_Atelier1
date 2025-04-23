<?php

namespace App\Models;

use CodeIgniter\Model;

class PanierModel extends Model
{
    protected $table      = 'paniers';
    protected $primaryKey = 'id';

    protected $allowedFields = ['id_client', 'date_commande'];
    protected $useTimestamps = true;
}

?>
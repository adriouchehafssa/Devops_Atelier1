<?php

namespace App\Models;

use CodeIgniter\Model;

class ProductModel extends Model
{
    protected $table = 'products';
    protected $primaryKey = 'id';

    protected $allowedFields = ['description', 'prix','message'];
    protected $useTimestamps = false;

    protected $returnType = 'array';
}

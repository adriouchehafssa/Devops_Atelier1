<?php

namespace App\Models;

use CodeIgniter\Model;

class ContactModel extends Model
{
    protected $table = 'contacts';
    protected $primaryKey = 'id';

    protected $allowedFields = ['name', 'email', 'message'];
    protected $useTimestamps = false;

    protected $returnType = 'array';
}

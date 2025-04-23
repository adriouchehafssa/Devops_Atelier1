<?php
namespace App\Models;
use CodeIgniter\Model;

class CommandModel extends Model
{
    protected $table = 'commands';
    protected $primaryKey = 'id';
    protected $allowedFields = ['reference', 'amount'];
}
?>

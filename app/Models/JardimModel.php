<?php

namespace App\Models;

use CodeIgniter\Model;

class JardimModel extends Model
{
    protected $table = 'jardim';
    protected $primaryKey = 'id';
    protected $allowedFields = ['login_id', 'nivel', 'pontos', 'pontos_gastos',  'created_at', 'updated_at'];
    protected $useTimestamps = true;
}

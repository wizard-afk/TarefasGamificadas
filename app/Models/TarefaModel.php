<?php

namespace App\Models;

use CodeIgniter\Model;

class TarefaModel extends Model
{
    protected $table            = 'tarefas';
    protected $primaryKey       = 'TarefaId';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = [
        'TarefaId',
        'Titulo',
        'Descricao',
        'LoginId',
        'created_at',
        'dificuldade',
        'tempo_estimado',
        'pontos',
        'concluida',
    ];

    protected $useTimestamps = false;
}

<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AddColunaConcluidaEmTarefas extends Migration
{
    public function up()
    {
        $this->forge->addColumn('tarefas', [
            'concluida' => [
                'type'    => 'BOOLEAN',
                'default' => false,
                'null'    => false,
            ],
        ]);
    }

    public function down()
    {
        $this->forge->dropColumn('tarefas', 'concluida');
    }
}

<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AddGamificationFieldsToTarefas extends Migration
{
    public function up()
    {
        $this->forge->addColumn('tarefas', [
            'dificuldade' => [
                'type'       => 'ENUM',
                'constraint' => ['facil', 'medio', 'dificil'],
                'default'    => 'medio',
            ],
            'tempo_estimado' => [
                'type'       => 'VARCHAR',
                'constraint' => 10, // Ex: "5m", "1h"
                'default'    => '30m',
            ],
            'pontos' => [
                'type'       => 'INT',
                'default'    => 0,
            ],
        ]);
    }

    public function down()
    {
        $this->forge->dropColumn('tarefas', ['dificuldade', 'tempo_estimado', 'pontos']);
    }
}

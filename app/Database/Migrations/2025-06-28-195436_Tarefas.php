<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Tarefas extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'TarefaId' => [
                'type'           => 'INT',
                'constraint'     => 11,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'Titulo' => [
                'type'       => 'VARCHAR',
                'constraint' => 255,
            ],
            'Descricao' => [
                'type' => 'TEXT',
            ],
            'LoginId' => [
                'type'       => 'INT',
                'constraint' => 11,
                'unsigned'   => true,
            ],
            'created_at' => [
                'type' => 'DATETIME',
                'null' => true,
            ],
        ]);
        $this->forge->addKey('TarefaId', true);
        $this->forge->createTable('tarefas');
    }

    public function down()
    {
        //
    }
}

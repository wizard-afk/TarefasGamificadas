<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateJardimUsuario extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id'         => ['type' => 'INT', 'unsigned' => true, 'auto_increment' => true],
            'login_id'   => ['type' => 'INT', 'unsigned' => true],
            'nivel'      => ['type' => 'INT', 'default' => 1],
            'pontos'     => ['type' => 'INT', 'default' => 0],
            'created_at' => ['type' => 'DATETIME', 'null' => true],
            'updated_at' => ['type' => 'DATETIME', 'null' => true],
        ]);

        $this->forge->addKey('id', true);

        $this->forge->createTable('jardim');
    }

    public function down()
    {
        $this->forge->dropTable('jardim');
    }
}

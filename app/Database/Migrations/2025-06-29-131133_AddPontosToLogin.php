<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AddPontosToLogin extends Migration
{
    public function up()
    {
        $this->forge->addColumn('login', [
            'Pontos' => [
                'type'       => 'INT',
                'constraint' => 11,
                'default'    => 0,
            ],
        ]);
    }

    public function down()
    {
        $this->forge->dropColumn('login', 'Pontos');
    }
}

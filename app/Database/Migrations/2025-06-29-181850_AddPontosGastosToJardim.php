<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AddPontosGastosToJardim extends Migration
{
    public function up()
    {
        $this->forge->addColumn('jardim', [
            'pontos_gastos' => [
                'type'       => 'INT',
                'default'    => 0,
                'null'       => false,
                'after'      => 'nivel',
            ]
        ]);
    }

    public function down()
    {
        $this->forge->dropColumn('jardim', 'pontos_gastos');
    }
}

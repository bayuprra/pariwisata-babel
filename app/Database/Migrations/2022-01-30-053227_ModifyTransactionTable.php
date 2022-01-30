<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class ModifyTransactionTable extends Migration
{
    public function up()
    {
        $data = [
            'date_start'    => [
                'type'      => 'DATE'
            ],
            'date_finish'   => [
                'type'      => 'DATE'
            ],
            'phone'         => [
                'type'      => 'VARCHAR',
                'constraint' => 255
            ]
        ];

        $this->forge->modifyColumn('transactions', $data);
    }

    public function down()
    {
        //
    }
}

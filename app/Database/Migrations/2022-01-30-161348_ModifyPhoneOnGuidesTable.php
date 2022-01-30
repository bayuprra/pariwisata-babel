<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class ModifyPhoneOnGuidesTable extends Migration
{
    public function up()
    {
        $data = [
            'phone'         => [
                'type'      => 'VARCHAR',
                'constraint' => 255
            ]
        ];

        $this->forge->modifyColumn('guides', $data);
    }

    public function down()
    {
        //
    }
}

<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class ModifyGuidesTable extends Migration
{
    public function up()
    {
        $data = [
            'package'       => [
                'type'       => 'VARCHAR',
                'constraint' => '500',
            ],
            'description'       => [
                'type'       => 'VARCHAR',
                'constraint' => '500',
            ],
        ];
        $this->forge->addColumn('guides', $data);
    }

    public function down()
    {
        $this->forge->dropColumn('guides', 'package,description');
    }
}

<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class ModifyPlaceTable extends Migration
{
    public function up()
    {
        $data = [

            'category'       => [
                'type'       => 'VARCHAR',
                'constraint' => '100',
            ],
            'description'       => [
                'type'       => 'VARCHAR',
                'constraint' => '250',
            ],
        ];
        $this->forge->addColumn('places', $data);
    }

    public function down()
    {
        $this->forge->dropColumn('places', 'category,description');
    }
}

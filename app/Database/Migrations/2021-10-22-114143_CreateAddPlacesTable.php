<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateAddPlacesTable extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id'          => [
                'type'           => 'INT',
                'constraint'     => 5,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'name'       => [
                'type'       => 'VARCHAR',
                'constraint' => '100',
            ],
            'district'       => [
                'type'       => 'VARCHAR',
                'constraint' => '100',
            ],
            'sub_district'       => [
                'type'       => 'VARCHAR',
                'constraint' => '100',
            ],
            'village'       => [
                'type'       => 'VARCHAR',
                'constraint' => '100',
            ],
            'rt/rw'       => [
                'type'       => 'VARCHAR',
                'constraint' => '100',
            ],
            'emergency_number'       => [
                'type'       => 'int',
                'constraint' => '100',
            ],
            'fee'       => [
                'type'       => 'VARCHAR',
                'constraint' => '100',
            ],
            'operational_hour'       => [
                'type'       => 'VARCHAR',
                'constraint' => '100',
            ],
            'maps'       => [
                'type'       => 'VARCHAR',
                'constraint' => '250',
            ],
            'maps'       => [
                'type'       => 'VARCHAR',
                'constraint' => '250',
            ],
            'user_id'       => [
                'type'       => 'INT',
                'constraint' => 5,
            ],

        ]);
        $this->forge->addKey('id', true);
        $this->forge->createTable('add_places');
    }

    public function down()
    {
        $this->forge->dropTable('add_places');
    }
}

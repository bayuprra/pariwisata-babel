<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateEventsTable extends Migration
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
            'date'       => [
                'type'       => 'DATETIME',
            ],
            'content'       => [
                'type'       => 'VARCHAR',
                'constraint' => '250',
            ],
            'picture'       => [
                'type'       => 'VARCHAR',
                'constraint' => '250',
            ],
        ]);
        $this->forge->addKey('id', true);
        $this->forge->createTable('events');
    }
    public function down()
    {
        $this->forge->dropTable('events');
    }
}

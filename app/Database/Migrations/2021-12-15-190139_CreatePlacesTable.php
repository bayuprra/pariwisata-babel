<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreatePlacesTable extends Migration
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
            'fee'       => [
                'type'       => 'VARCHAR',
                'constraint' => '100',
            ],
            'street' => [
                'type'              => 'VARCHAR',
                'constraint'        => '100',
            ],
            'maps'       => [
                'type'       => 'VARCHAR',
                'constraint' => '250',
            ],
            'picture'       => [
                'type'       => 'VARCHAR',
                'constraint' => '250',
            ],
            'user_id'       => [
                'type'           => 'INT',
                'constraint'     => 5,
                'unsigned'       => true,
            ],
            'is_approve'    => [
                'type'          => 'BOOLEAN',
                'default'       => false,
            ],
        ]);
        $this->forge->addKey('id', true);
        $this->forge->addForeignKey('user_id', 'users', 'id');
        $this->forge->createTable('places');
    }

    public function down()
    {
        $this->forge->dropTable('places');
    }
}

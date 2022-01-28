<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class ModifyPlacesReviewsTable extends Migration
{
    public function up()
    {
        $this->forge->dropTable('place_reviews');
        $this->forge->dropTable('places');

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
        $this->forge->addForeignKey('user_id', 'users', 'id',  'CASCADE', 'CASCADE');
        $this->forge->createTable('places');

        $this->forge->addField([
            'id'          => [
                'type'           => 'INT',
                'constraint'     => 5,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'rating'       => [
                'type'       => 'VARCHAR',
                'constraint' => '100',
            ],
            'comment'       => [
                'type'       => 'TEXT',
            ],
            'place_id'          => [
                'type'           => 'INT',
                'constraint'     => 5,
                'unsigned'       => true,
            ],
            'user_id'          => [
                'type'           => 'INT',
                'constraint'     => 5,
                'unsigned'       => true,
            ],
        ]);
        $this->forge->addKey('id', true);
        $this->forge->addForeignKey('place_id', 'places', 'id', 'CASCADE', 'CASCADE');
        $this->forge->addForeignKey('user_id', 'users', 'id', 'CASCADE', 'CASCADE');
        $this->forge->createTable('place_reviews');
    }

    public function down()
    {
        $this->forge->dropTable('place_reviews');
        $this->forge->dropTable('places');
    }
}

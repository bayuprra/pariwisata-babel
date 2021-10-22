<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreatePlaceReviewsTable extends Migration
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
            'rating'       => [
                'type'       => 'VARCHAR',
                'constraint' => '100',
            ],
            'comment'       => [
                'type'       => 'VARCHAR',
                'constraint' => '250',
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
        $this->forge->addForeignKey('place_id', 'places', 'id');
        $this->forge->addForeignKey('user_id', 'users', 'id');
        $this->forge->createTable('place_reviews');
    }

    public function down()
    {
        $this->forge->dropTable('place_reviews');
    }
}

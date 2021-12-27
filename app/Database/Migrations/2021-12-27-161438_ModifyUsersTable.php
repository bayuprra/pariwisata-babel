<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class ModifyUsersTable extends Migration
{
    public function up()
    {
        $fields = array(
            'picture' => [
                'type'       => 'VARCHAR',
                'constraint' => '100',
                'null'       => true
            ]
        );

        $this->forge->modifyColumn('users', $fields);
    }

    public function down()
    {
        //
    }
}

<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateGuideImagesTable extends Migration
{
    public function up()
    {
        //
        $add = [
            'gender' => [
                'type'              => 'VARCHAR',
                'constraint'        => 255,
            ],
            'religion' => [
                'type'              => 'VARCHAR',
                'constraint'        => 255,
            ],
            'address' => [
                'type'              => 'VARCHAR',
                'constraint'        => 255,
            ],
            'age' => [
                'type'              => 'VARCHAR',
                'constraint'        => 255,
            ],
            'email' => [
                'type'              => 'VARCHAR',
                'constraint'        => 255,
            ],
            'facebook' => [
                'type'              => 'VARCHAR',
                'constraint'        => 255,
            ],
            'instagram' => [
                'type'              => 'VARCHAR',
                'constraint'        => 255,
            ],
            'twitter' => [
                'type'              => 'VARCHAR',
                'constraint'        => 255,
            ]
        ];

        $this->forge->addColumn('guides', $add);
    }


    public function down()
    {
        // $this->forge->dropColumn('guides', '');
        // i dunno what must i do on function down
    }
}

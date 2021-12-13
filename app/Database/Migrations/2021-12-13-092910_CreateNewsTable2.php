<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateNewsTable2 extends Migration
{
    public function up()
    {
        //
        $this->forge->dropColumn('news', 'preview');
    }

    public function down()
    {
    }
}

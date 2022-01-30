<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class DeleteColumnsOnGuidesTable extends Migration
{
    public function up()
    {
        $this->forge->dropColumn('guides', 'package,description');
    }

    public function down()
    {
        //
    }
}

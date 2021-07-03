<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Admins extends Migration
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
            'email'       => [
                    'type'       => 'VARCHAR',
                    'constraint' => '100',
            ],
            'name'       => [
                    'type'       => 'VARCHAR',
                    'constraint' => '100',
            ],
            'password'       => [
                    'type'       => 'VARCHAR',
                    'constraint' => '100',
            ],
        ]);
        $this->forge->addKey('id', true);
        $this->forge->createTable('admins');
    }

    public function down()
    {
        $this->forge->dropTable('admins');
    }
}

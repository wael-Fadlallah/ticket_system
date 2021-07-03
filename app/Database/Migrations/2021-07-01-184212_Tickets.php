<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Contact extends Migration
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
            'user_email'       => [
                    'type'       => 'VARCHAR',
                    'constraint' => '100',
            ],
            'name'       => [
                    'type'       => 'VARCHAR',
                    'constraint' => '100',
            ],
            'subject'       => [
                    'type'       => 'VARCHAR',
                    'constraint' => '100',
                    'null' => true,
            ],
            'message' => [
                    'type' => 'TEXT',
            ],
            'urlIdentifier' => [
                    'type' => 'INT',
                    'constraint'     => 15,
            ],
    ]);
    $this->forge->addKey('id', true);
    $this->forge->createTable('tickets');
    }

    public function down()
    {
        $this->forge->dropTable('tickets');
    }
}

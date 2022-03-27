<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class User extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => TRUE,
                'auto_increment' => TRUE,
                'null' => FALSE,
            ],
            'name' => [
                'type' => 'VARCHAR',
                'constraint' => '120',
                'null' => FALSE,
            ],
            'email' => [
                'type' => 'VARCHAR',
                'constraint' => '120',
                'null' => FALSE,
            ],
            'phone_number' => [
                'type' => 'VARCHAR',
                'constraint' => '120',
            ],
            'address' => [
                'type' => 'VARCHAR',
                'constraint' => '120',
            ],
            'role' => [
                'type' => 'ENUM("admin","editor","user")',
                'default' => 'user',
                'null' => FALSE,
            ],
            'password' => [
                'type' => 'VARCHAR',
                'constraint' => '120',
            ],
            'status' => [
                'type' => 'VARCHAR',
                'constraint' => '20',
            ],
        ]);
        $this->forge->addKey('id', TRUE);
        $this->forge->createTable('users');
    }

    public function down()
    {
        $this->forge->dropTable('users');
    }
}

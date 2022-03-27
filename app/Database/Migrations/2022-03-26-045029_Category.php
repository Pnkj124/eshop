<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Category extends Migration
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
            'code' => [
                'type' => 'VARCHAR',
                'constraint' => '120',
                'null' => FALSE,
            ],
            'description' => [
                'type' => 'TEXT',
                'null' => TRUE,
            ],
            'parent_category_id' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => TRUE,
                'null' => TRUE,
            ],
            'status' => [
                'type'           => 'ENUM',
                'constraint'     => ['published', 'draft'],
                'default'        => 'draft',
            ],
        ]);
        $this->forge->addKey('id', TRUE);
        $this->forge->createTable('categories');
    }

    public function down()
    {
        $this->forge->dropTable('categories');
    }
}

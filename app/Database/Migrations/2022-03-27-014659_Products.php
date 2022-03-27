<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Products extends Migration
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
            'code' => [
                'type' => 'VARCHAR',
                'constraint' => '120',
                'null' => FALSE,
            ],
            'title' => [
                'type' => 'VARCHAR',
                'constraint' => '120',
                'null' => FALSE,
            ],
            'short_description' => [
                'type' => 'TEXT',
                'null' => TRUE,
            ],
            'long_description' => [
                'type' => 'TEXT',
                'null' => TRUE,
            ],
            'price' => [
                'type' => 'DECIMAL',
                'constraint' => '18',
                'null' => FALSE,
            ],
            'quantity' => [
                'type' => 'INT',
                'constraint' => '18',
                'null' => FALSE,
            ],
            'image' => [
                'type' => 'VARCHAR',
                'constraint' => '120',
                'null' => TRUE,
            ],
            'category_id' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => TRUE,
                'null' => FALSE,
            ],
            'brand_id' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => TRUE,
                'null' => FALSE,
            ],
            'publish_status' => [
                'type'           => 'ENUM',
                'constraint'     => ['published', 'draft'],
                'default'        => 'draft',
            ],
            'publish_date' => [
                'type' => 'TIMESTAMP',
            ],
        ]);
        $this->forge->addKey('id', TRUE);
        $this->forge->createTable('products');
    }

    public function down()
    {
        $this->forge->dropTable('products');
    }
}

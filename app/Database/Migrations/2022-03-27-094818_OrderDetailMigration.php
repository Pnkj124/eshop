<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class OrderDetailMigration extends Migration
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
            'product_price' => [
                'type' => 'DECIMAL',
                'constraint' => '18',
                'null' => FALSE,
            ],
            'order_id' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => TRUE,
                'null' => FALSE,
            ],
            'sales_quantity' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => TRUE,
                'null' => FALSE,
            ],
            'product_id' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => TRUE,
                'null' => FALSE,
            ],
            'product_name' => [
                'type' => 'VARCHAR',
                'constraint' => 120,
                'null' => FALSE,
            ],
            'product_image' => [
                'type' => 'VARCHAR',
                'constraint' => 120,
                'null' => FALSE,
            ],

        ]);
        $this->forge->addKey('id', TRUE);
        $this->forge->createTable('order_details');
    }

    public function down()
    {
        $this->forge->dropTable('order_details');
    }
}

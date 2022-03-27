<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class OrderMigration extends Migration
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
            'order_total' => [
                'type' => 'DECIMAL',
                'constraint' => '18',
                'null' => FALSE,
            ],
            'actions' => [
                'type' => 'VARCHAR',
                'constraint' => '120',
                'null' => FALSE,
            ],
            'customer_id' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => TRUE,
                'null' => FALSE,
            ],

        ]);
        $this->forge->addKey('id', TRUE);
        $this->forge->createTable('orders');
    }

    public function down()
    {
        $this->forge->dropTable('orders');
    }
}

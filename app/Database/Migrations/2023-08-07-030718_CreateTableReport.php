<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateTableReport extends Migration
{
    public function up()
    {
        $fields = [
            "id" => [
                "type" => "INT",
                "unsigned" => true,
                "auto_increment" => true,
            ],
            "id_user" => [
                'type' => 'INT',
                'unsigned' => true,
            ],
            "pesan" => [
                "type" => "TEXT",
            ],
            "id_services" => [
                "type" => "INT",
                "unsigned" => true,
            ],
            "urgency" => [
                "type" => "VARCHAR",
                "constraint" => "200",
                'null' => true,
            ],
            "created_at" => [
                "type" => "DATETIME",
            ],
            "status" => [
                "type" => "VARCHAR",
                "constraint" => "200",
                'null' => true,
            ],
            "status_date" => [
                "type" => "DATETIME",
                'null' => true,
            ],
        ];
        $this->forge->addKey('id', true);
        $this->forge->addField($fields);
        $this->forge->addForeignKey('id_user', 'users', 'id');
        $this->forge->addForeignKey('id_services', 'services', 'id');
        $this->forge->createTable('reports', true); //If NOT EXISTS create table products
    }

    public function down()
    {
        $this->forge->dropTable('reports', true);
    }
}

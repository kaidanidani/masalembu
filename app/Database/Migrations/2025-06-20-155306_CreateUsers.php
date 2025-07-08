<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;
echo "Running CreateUsers migration...\n";


class CreateUsers extends Migration
{
    public function up()
    {
       $this->forge->addField([
    'id'            => ['type' => 'INT', 'unsigned' => true, 'auto_increment' => true],
    'nama'          => ['type' => 'VARCHAR', 'constraint' => 100],
    'tanggal_lahir' => ['type' => 'DATE'],
    'alamat'        => ['type' => 'VARCHAR', 'constraint' => 255],
    'email'         => ['type' => 'VARCHAR', 'constraint' => 100, 'unique' => true],
    'password'      => ['type' => 'VARCHAR', 'constraint' => 255],
    'role'          => ['type' => 'VARCHAR', 'constraint' => 50, 'default' => 'user'], // ✅ Tambah ini
    'created_at'    => ['type' => 'DATETIME', 'null' => true],
    'updated_at'    => ['type' => 'DATETIME', 'null' => true],
    ]);

        $this->forge->addKey('id', true);
        $this->forge->createTable('users');
    }

    public function down()
    {
        $this->forge->dropTable('users');
    }
}

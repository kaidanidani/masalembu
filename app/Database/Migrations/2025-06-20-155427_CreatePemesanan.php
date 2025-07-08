<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreatePemesanan extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id'                => ['type' => 'INT', 'unsigned' => true, 'auto_increment' => true],
            'user_id'          => ['type' => 'INT', 'unsigned' => true],
            'nama_lengkap'     => ['type' => 'VARCHAR', 'constraint' => 100],
            'no_hp'            => ['type' => 'VARCHAR', 'constraint' => 20],
            'email'            => ['type' => 'VARCHAR', 'constraint' => 100],
            'alamat'           => ['type' => 'TEXT'],
            'paket_wisata'     => ['type' => 'VARCHAR', 'constraint' => 100],
            'tanggal_berangkat'=> ['type' => 'DATE'],
            'tanggal_pulang'   => ['type' => 'DATE'],
            'jumlah_penumpang' => ['type' => 'INT'],
            'transportasi'     => ['type' => 'VARCHAR', 'constraint' => 100, 'null' => true],
            'penginapan'       => ['type' => 'VARCHAR', 'constraint' => 100, 'null' => true],
            'makanan'          => ['type' => 'VARCHAR', 'constraint' => 100, 'null' => true],
            'kendaraan'        => ['type' => 'VARCHAR', 'constraint' => 100, 'null' => true],
            'asuransi'         => ['type' => 'VARCHAR', 'constraint' => 100, 'null' => true],
            'catatan'          => ['type' => 'TEXT', 'null' => true],
            'bank'             => ['type' => 'VARCHAR', 'constraint' => 100],
            'harga_paket'      => ['type' => 'INT'],
            'biaya_admin'      => ['type' => 'INT'],
            'total_bayar'      => ['type' => 'INT'],
            'created_at'       => ['type' => 'DATETIME', 'null' => true],
            'updated_at'       => ['type' => 'DATETIME', 'null' => true],
        ]);
        $this->forge->addKey('id', true);
        $this->forge->createTable('pemesanan');
    }

    public function down()
    {
        $this->forge->dropTable('pemesanan');
    }
}

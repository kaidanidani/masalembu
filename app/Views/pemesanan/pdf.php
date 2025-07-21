<!DOCTYPE html>
<html>

<head>
    <style>
        body {
            font-family: sans-serif;
            font-size: 12px;
            position: relative;
        }

        .kop {
            text-align: center;
            border-bottom: 2px solid #000;
            padding-bottom: 10px;
            margin-bottom: 20px;
        }

        .kop img {
            float: left;
            width: 70px;
            height: auto;
            margin-right: 15px;
            margin-bottom: 0 15px 10px 0;
        }

        .kop h2 {
            margin: 0;
            font-size: 18px;
        }

        .kop p {
            margin: 2px 0;
            font-size: 11px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 10px;
        }

        td {
            padding: 6px;
            vertical-align: top;
        }

        .section-title {
            background: #f2f2f2;
            font-weight: bold;
        }

        .watermark {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            z-index: 0;
            opacity: 0.05;
            display: flex;
            flex-direction: column;
            justify-content: space-evenly;
            /* ✅ Renggang antar baris */
            align-items: center;
            pointer-events: none;
        }

        .watermark .row {
            display: flex;
            justify-content: space-evenly;
            /* ⬅️ Rata kiri kanan */
        }

        .watermark span {
            font-size: 50px;
            font-weight: bold;
            color: #777;
            transform: rotate(-30deg);
            white-space: nowrap;
        }

        .content {
            position: relative;
            z-index: 1;
        }
    </style>
</head>

<body>

    <!-- Watermark -->
    <div class="watermark">
        <?php for ($i = 0; $i < 8; $i++): ?>
            <div class="row">
                <?php for ($j = 0; $j < 3; $j++): ?>
                    <span>MASALEMBU ECO LUNAS</span>
                <?php endfor; ?>
            </div>
        <?php endfor; ?>
    </div>

    <!-- Kop Surat -->
    <div class="kop clearfix" style="display: flex; align-items: center;">
        <img src="<?= $base64Logo ?>" width="70" alt="Logo">
        <div style="flex:1; text-align: center;">
            <h2>Masalembu Ekowisata</h2>
            <p>Jl. Datuk Kaidani, Masalima, Masalembu Kab. Sumenep 69492</p>
            <p>Email: masalembueco@gmail.com | Telp: 0823-2222-90627</p>
        </div>
    </div>

    <!-- Isi Bukti Pemesanan -->
    <div class="content">
        <h3 style="text-align:center; margin-bottom: 20px;">Bukti Pemesanan</h3>

        <table>
            <tr class="section-title">
                <td colspan="2">Informasi Pemesan</td>
            </tr>
            <tr>
                <td>Nama</td>
                <td>: <?= esc($pemesanan['nama_lengkap']) ?></td>
            </tr>
            <tr>
                <td>HP</td>
                <td>: <?= esc($pemesanan['no_hp']) ?></td>
            </tr>
            <tr>
                <td>Email</td>
                <td>: <?= esc($pemesanan['email']) ?></td>
            </tr>
            <tr>
                <td>Alamat</td>
                <td>: <?= esc($pemesanan['alamat']) ?></td>
            </tr>

            <tr class="section-title">
                <td colspan="2">Perjalanan</td>
            </tr>
            <tr>
                <td>Paket</td>
                <td>: <?= esc($pemesanan['paket_wisata']) ?></td>
            </tr>
            <tr>
                <td>Keberangkatan</td>
                <td>: <?= date('d F Y', strtotime($pemesanan['tanggal_berangkat'])) ?></td>
            </tr>
            <tr>
                <td>Kepulangan</td>
                <td>: <?= date('d F Y', strtotime($pemesanan['tanggal_pulang'])) ?></td>
            </tr>
            <tr>
                <td>Jumlah Penumpang</td>
                <td>: <?= esc($pemesanan['jumlah_penumpang']) ?> Orang</td>
            </tr>

            <!-- Informasi Transportasi & Akomodasi -->
            <tr class="section-title">
                <td colspan="2">Informasi Transportasi & Akomodasi</td>
            </tr>
            <tr>
                <td>Transportasi</td>
                <td>: <?= esc($pemesanan['transportasi'] ?? 'Kapal Laut') ?></td>
            </tr>
            <tr>
                <td>Penginapan</td>
                <td>: <?= esc($pemesanan['penginapan'] ?? 'Home Stay') ?></td>
            </tr>

            <!-- Informasi Fasilitas Tambahan -->
            <tr class="section-title">
                <td colspan="2">Informasi Fasilitas Tambahan</td>
            </tr>
            <tr>
                <td>Penyewaan Kendaraan</td>
                <td>: <?= esc($pemesanan['kendaraan'] ?? '-') ?></td>
            </tr>
            <tr>
                <td>Asuransi Perjalanan</td>
                <td>: <?= esc($pemesanan['asuransi'] ?? '-') ?></td>
            </tr>

            <tr class="section-title">
                <td colspan="2">Pembayaran</td>
            </tr>
            <tr>
                <td>Harga</td>
                <td>: Rp <?= number_format($pemesanan['harga_paket']) ?></td>
            </tr>
            <tr>
                <td>Admin</td>
                <td>: Rp <?= number_format($pemesanan['biaya_admin']) ?></td>
            </tr>
            <tr>
                <td><strong>Total</strong></td>
                <td><strong>: Rp <?= number_format($pemesanan['total_bayar']) ?></strong></td>
            </tr>
        </table>

        <p style="margin-top:20px;"><em>*Tunjukkan bukti ini saat keberangkatan ke Masalembu</em></p>
    </div>

</body>

</html>
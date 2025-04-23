<h1 class="mt-4">Laporan Pemesanan Tiket</h1>
<div class="card">
    <div class="card-body">
    
<div class="row">
    <div class="col-md-12">
        <a href="cetak_pesan.php" target="_blank" class="btn btn-primary"><i class="fa fa-print"></i> Cetak Data</a>
        <a href="excel_pesan.php" target="_blank" class="btn btn-secondary"><i class="fa fa-print"></i> Export Excel</a>
        <a href="pdf_pesan.php" target="_blank" class="btn btn-danger"><i class="fa fa-print"></i> Export Pdf</a><br><br>
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
        <tr>
                        <th>No</th>
                        <th>Nama Penumpang</th>
                        <th>Nama Kereta</th>
                        <th>Asal</th>
                        <th>Tujuan</th>
                        <th>Jumlah Tiket</th>
                        <th>Total Bayar</th>
                        <th>Status Pembayaran</th>
                        <th>Waktu Pemesanan</th>
                    </tr>
                </thead>
                <tbody>
                    <!-- ini kode untuk menampilkan data pemesanan yang dilakukan user -->
                    <?php
                    $i = 1;
                    $query = mysqli_query($koneksi, "
                        SELECT pemesanan.*, user.nama, kereta.nama_kereta, jadwal.asal, jadwal.tujuan
                        FROM pemesanan 
                        LEFT JOIN user ON pemesanan.id_user = user.id_user
                        LEFT JOIN jadwal ON pemesanan.id_jadwal = jadwal.id_jadwal
                        LEFT JOIN kereta ON jadwal.id_kereta = kereta.id_kereta
                        ORDER BY pemesanan.waktu_pemesanan DESC
                    ");

                    while ($data = mysqli_fetch_array($query)) {
                    ?>
                        <tr>
                            <td><?= $i++; ?></td>
                            <td><?= $data['nama']; ?></td>
                            <td><?= $data['nama_kereta']; ?></td>
                            <td><?= $data['asal']; ?></td>
                            <td><?= $data['tujuan']; ?></td>
                            <td><?= $data['jumlah_tiket']; ?></td>
                            <td>Rp<?= number_format($data['total_bayar'], 0, ',', '.'); ?></td>
                            <td><?= ucfirst($data['status_bayar']); ?></td>
                            <td><?= $data['waktu_pemesanan']; ?></td>
                        </tr>
                    <?php
                    }
                    ?>
        </table>
    </div>
</div>
    </div>
</div>
<h1 class="mt-4">Laporan Pembayaran Tiket</h1>
<div class="card">
    <div class="card-body">
    
<div class="row">
    <div class="col-md-12">
        <a href="cetak.php" target="_blank" class="btn btn-primary"><i class="fa fa-print"></i> Cetak Data</a>
        <a href="excel.php" target="_blank" class="btn btn-secondary"><i class="fa fa-print"></i> Export Excel</a>
        <a href="pdf.php" target="_blank" class="btn btn-danger"><i class="fa fa-print"></i> Export Pdf</a><br><br>
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
            <tr>
                <th>No</th>
                <th>Total Bayar</th>
                <th>Metode Pembayaran</th>
                <th>Status Bayar</th>
                <th>Bukti Bayar</th>
                <th>Waktu Bayar</th>
                <!-- <th>Aksi</th> -->
            </tr>
            <!-- ini kode untuk menampilkan data pembayaran yang dilakukan user -->
            <?php
            $i = 1;
                $query = mysqli_query($koneksi, "SELECT * FROM pembayaran LEFT JOIN pemesanan on pembayaran.id_pemesanan = pemesanan.id_pemesanan");
                while($data = mysqli_fetch_array($query)){
                    ?>
                    <tr>
                        <td><?php echo $i++; ?></td>
                        <td><?php echo $data['total_bayar']; ?></td>
                        <td><?php echo $data['metodebayar']; ?></td>
                        <td><?php echo $data['status']; ?></td>
                        
                        <td>
                            <a href="uploads/<?php echo $data['bukti_bayar']; ?>" target="_blank">
                                <img src="uploads/<?php echo $data['bukti_bayar']; ?>" width="100" height="100" style="object-fit: cover;">
                            </a>
                        </td>
                        <td><?php echo $data['waktu_bayar']; ?></td>
                       
                    </tr>
            <?php
                }
            ?>
        </table>
    </div>
</div>
    </div>
</div>
<h1 class="mt-4">Pembayaran</h1>
<div class="card">
    <div class="card-body">
    
<div class="row">
    <div class="col-md-12">
        <!-- <a href="?page=pembayaran_tambah" class="btn btn-primary">Bayar</a><br><br> -->
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
            <tr>
                <th>No</th>
                <th>Total Bayar</th>
                <th>Metode Pembayaran</th>
                <th>Status Bayar</th>
                <th>Bukti Bayar</th>
                <th>Waktu Bayar</th>
                <th>Aksi</th>
            </tr>
            <!-- ini kode untuk menampilkan data pembayaran yang telah dilakukan oleh pengguna -->
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
                        <td>
                        <?php
                                if($data['status'] != 'berhasil') {
                            ?>
                            <a href="?page=pembayaranadmin_ubah&&id=<?php echo $data['id_pembayaran']; ?>" class="btn btn-info">Ubah</a>
                            <a onclick="return confirm('Apakah anda yakin menghapus data ini?')" href="?page=pembayaranadmin_hapus&&id=<?php echo $data['id_pembayaran']; ?>" class="btn btn-danger">Hapus</a>
                            <?php
                                }
                            ?>
                        </td>
                    </tr>
            <?php
                }
            ?>
        </table>
    </div>
</div>
    </div>
</div>
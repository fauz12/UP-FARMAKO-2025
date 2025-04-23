<h1 class="mt-4">Data Kursi</h1>
<div class="card">
    <div class="card-body">
    
<div class="row">
    <div class="col-md-12">
        <a href="?page=kursi_tambah" class="btn btn-primary">Pesan</a><br><br>
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
            <tr>
                <th>No</th>
                <th>Nama Kereta</th>
                <th>Total Bayar</th>
                <th>Nama Penumpang</th>
                <th>No Kursi</th>
                <!-- <th>Aksi</th> -->
            </tr>
            <!-- ini kode untuk menampilkan data kursi -->
            <?php
            $i = 1;
                $query = mysqli_query($koneksi, "SELECT * FROM penumpang LEFT JOIN pemesanan on penumpang.id_pemesanan = pemesanan.id_pemesanan LEFT JOIN kereta on penumpang.id_kereta = kereta.id_kereta");
                while($data = mysqli_fetch_array($query)){
                    ?>
                    <tr>
                        <td><?php echo $i++; ?></td>
                        <td><?php echo $data['nama_kereta']; ?></td>
                        <td><?php echo $data['total_bayar']; ?></td>
                        <td><?php echo $data['nama_penumpang']; ?></td>
                        <td><?php echo $data['no_kursi']; ?></td>
                    
                    </tr>
            <?php
                }
            ?>
        </table>
    </div>
</div>
    </div>
</div>
<h1 class="mt-4">Jadwal Kereta</h1>
<div class="card">
    <div class="card-body">
    
<div class="row">
    <div class="col-md-12">
        <!-- <a href="?page=jadwal_tambah" class="btn btn-primary">+ Tambah Jadwal</a><br><br> -->
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
            <tr>
                <th>No</th>
                <th>Nama Kereta</th>
                <th>Kota Asal</th>
                <th>Kota Tujuan</th>
                <th>Tanggal Berangkat</th>
                <th>Waktu Berangkat</th>
                <th>Waktu Tiba</th>
                <th>Harga</th>
                <th>Order</th>
            </tr>
            <!-- ini kode untuk menampilkan data jadwal ditampilan user -->
            <?php
            $i = 1;
                $query = mysqli_query($koneksi, "SELECT * FROM jadwal LEFT JOIN kereta on jadwal.id_kereta = kereta.id_kereta");
                while($data = mysqli_fetch_array($query)){
                    ?>
                    <tr>
                        <td><?php echo $i++; ?></td>
                        <td><?php echo $data['nama_kereta']; ?></td>
                        <td><?php echo $data['asal']; ?></td>
                        <td><?php echo $data['tujuan']; ?></td>
                        <td><?php echo $data['tgl_berangkat']; ?></td>
                        <td><?php echo $data['waktu_berangkat']; ?></td>
                        <td><?php echo $data['waktu_tiba']; ?></td>
                        <td><?php echo $data['harga']; ?></td>
                        <td>
                            <a href="?page=tambah_pesan" class="btn btn-info">Order Now</a>
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


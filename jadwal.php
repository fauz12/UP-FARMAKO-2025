<h1 class="mt-4">Data Jadwal</h1>
<div class="card">
    <div class="card-body">
    
<div class="row">
    <div class="col-md-12">
        <a href="?page=jadwal_tambah" class="btn btn-primary">+ Tambah Jadwal</a><br><br>
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
                <th>Aksi</th>
            </tr>
            <!-- ini kode untuk menampilkan data jadwal -->
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
                            <a href="?page=jadwal_ubah&&id=<?php echo $data['id_jadwal']; ?>" class="btn btn-info">Ubah</a>
                            <a onclick="return confirm('Apakah anda yakin menghapus data ini?')" href="?page=jadwal_hapus&&id=<?php echo $data['id_jadwal']; ?>" class="btn btn-danger">Hapus</a>
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
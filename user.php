<h1 class="mt-4">Data Pengguna</h1>
<div class="card">
    <div class="card-body">
    
<div class="row">
    <div class="col-md-12">
        <a href="?page=user_tambah" class="btn btn-primary">+ Tambah Data</a><br><br>
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
            <tr>
                <th>No</th>
                <th>Nama Lengkap</th>
                <!-- <th>Username</th> -->
                <th>Email</th>
                <!-- <th>Alamat</th>
                <th>No. Telepon</th> -->
                <th>Role</th>
                <th>Aksi</th>
            </tr>
            <!-- ini kode untuk menampilkan data user dihalaman admin -->
            <?php
            $i = 1;
                $query = mysqli_query($koneksi, "SELECT * FROM user");
                while($data = mysqli_fetch_array($query)){
                    ?>
                    <tr>
                        <td><?php echo $i++; ?></td>
                        <td><?php echo $data['nama']; ?></td>
                        <td><?php echo $data['email']; ?></td>
                        <td><?php echo $data['role']; ?></td>
                        <td>
                            <!-- <a href="?page=user_ubah&&id=" class="btn btn-info">Ubah</a> -->
                            <a onclick="return confirm('Apakah anda yakin menghapus data ini?')" href="?page=user_hapus&&id=<?php echo $data['id_user']; ?>" class="btn btn-danger">Hapus</a>
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
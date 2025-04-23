<h1 class="mt-4">Tambah Pengguna</h1>
<div class="card">
    <div class="card-body">
    <div class="row">
    <div class="col-md-12">
       <form method="post">
            <!-- ini kode untuk menambah data jadwal -->
        <?php
            if(isset($_POST['submit'])){
                $id_kereta = $_POST['id_kereta'];
                $asal = $_POST['asal'];
                $tujuan = $_POST['tujuan'];
                $tgl_berangkat = $_POST['tgl_berangkat'];
                $waktu_berangkat = $_POST['waktu_berangkat'];
                $waktu_tiba = $_POST['waktu_tiba'];
                $harga = $_POST['harga'];
                $query = mysqli_query($koneksi, "INSERT INTO jadwal(id_kereta,asal,tujuan,tgl_berangkat,waktu_berangkat,waktu_tiba,harga) VALUES ('$id_kereta','$asal','$tujuan','$tgl_berangkat','$waktu_berangkat','$waktu_tiba','$harga')");

                if($query) {
                    echo "<script>alert('Tambah Data Berhasil.')</script>";
                }else {
                    echo "<script>alert('Tambah Data Gagal.')</script>";
                }
            }
        ?>

            <div class="row mb-3">
                <div class="col-md-2">Nama Kereta</div>
                <div class="col-md-8">
                    <select name="id_kereta" class="form-control">
                        <?php
                            $ker = mysqli_query($koneksi, "SELECT * FROM kereta");
                            while($nama_kereta = mysqli_fetch_array($ker)) {
                                ?>
                                <option value="<?php echo $nama_kereta['id_kereta']; ?>"><?php echo $nama_kereta['nama_kereta']; ?></option>
                        <?php    
                            }
                        ?>
                    </select>
                </div>
            </div>
            <div class="row mb-3">
                <div class="col-md-2">Kota Asal</div>
                <div class="col-md-8"><input type="text" class="form-control" name="asal"></div>
            </div>
            <div class="row mb-3">
                <div class="col-md-2">Kota Tujuan</div>
                <div class="col-md-8"><input type="text" class="form-control" name="tujuan"></div>
            </div>
            <div class="row mb-3">
                <div class="col-md-2">Tanggal Berangkat</div>
                <div class="col-md-8"><input type="date" class="form-control" name="tgl_berangkat"></div>
            </div>
            <div class="row mb-3">
                <div class="col-md-2">Waktu Berangkat</div>
                <div class="col-md-8"><input type="time" class="form-control" name="waktu_berangkat"></div>
            </div>
            <div class="row mb-3">
                <div class="col-md-2">Waktu Tiba</div>
                <div class="col-md-8"><input type="time" class="form-control" name="waktu_tiba"></div>
            </div>
            <div class="row mb-3">
                <div class="col-md-2">Harga</div>
                <div class="col-md-8"><input type="number" class="form-control" name="harga"></div>
            </div>
           <div class="row">
            <div class="col-md-2"></div>
            <div class="col-md-8">
                <button type="submit" class="btn btn-primary" name="submit" value="submit">Simpan</button>
                <button type="reset" class="btn btn-secondary">Reset</button>
                <a href="?page=jadwal" class="btn btn-danger">Kembali</a>
                </div>
           </div>
        </form>
        </div>
    </div>
    </div>
</div>
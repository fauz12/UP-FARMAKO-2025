<h1 class="mt-4">Jadwal</h1>
<div class="card">
    <div class="card-body">
    <div class="row">
    <div class="col-md-12">
       <form method="post">
            <!-- ini kode untuk mengubah data jadwal -->
        <?php
        $id = $_GET['id'];
            if(isset($_POST['submit'])){
                $id_kereta = $_POST['id_kereta'];
                $asal = $_POST['asal'];
                $tujuan = $_POST['tujuan'];
                $tgl_berangkat = $_POST['tgl_berangkat'];
                $waktu_berangkat = $_POST['waktu_berangkat'];
                $waktu_tiba = $_POST['waktu_tiba'];
                $harga = $_POST['harga'];
                $query = mysqli_query($koneksi, "UPDATE jadwal set id_kereta='$id_kereta', asal='$asal', tujuan='$tujuan', tgl_berangkat='$tgl_berangkat', waktu_berangkat='$waktu_berangkat', waktu_tiba='$waktu_tiba', harga='$harga' WHERE id_jadwal=$id");

                if($query) {
                    echo "<script>alert('Ubah Data Berhasil.')</script>";
                }else {
                    echo "<script>alert('Ubah Data Gagal.')</script>";
                }
            }
            $query = mysqli_query($koneksi, "SELECT * FROM jadwal WHERE id_jadwal = $id");
            $data = mysqli_fetch_array($query);
        ?>


            <div class="row mb-3">
                <div class="col-md-2">Nama Kereta</div>
                <div class="col-md-8">
                    <select name="id_kereta" class="form-control">
                        <?php
                            $ker = mysqli_query($koneksi, "SELECT * FROM kereta");
                            while($nama_kereta = mysqli_fetch_array($ker)) {
                                ?>
                                <option <?php if($nama_kereta['id_kereta'] == $data['id_kereta']) echo 'selected'; ?> value="<?php echo $nama_kereta['id_kereta']; ?>"><?php echo $nama_kereta['nama_kereta']; ?></option>
                        <?php    
                            }
                        ?>
                    </select>
                </div>
            </div>
            <div class="row mb-3">
                <div class="col-md-2">Kota Asal</div>
                <div class="col-md-8"><input type="text" class="form-control" value="<?php echo $data['asal']; ?>" name="asal"></div>
            </div>
            <div class="row mb-3">
                <div class="col-md-2">Kota Tujuan</div>
                <div class="col-md-8"><input type="text" class="form-control" value="<?php echo $data['tujuan']; ?>" name="tujuan"></div>
            </div>
            <div class="row mb-3">
                <div class="col-md-2">Tanggal Berangkat</div>
                <div class="col-md-8"><input type="date" class="form-control" value="<?php echo $data['tgl_berangkat']; ?>" name="tgl_berangkat"></div>
            </div>
            <div class="row mb-3">
                <div class="col-md-2">Waktu Berangkat</div>
                <div class="col-md-8"><input type="time" class="form-control" value="<?php echo $data['waktu_berangkat']; ?>" name="waktu_berangkat"></div>
            </div>
            <div class="row mb-3">
                <div class="col-md-2">Waktu Tiba</div>
                <div class="col-md-8"><input type="time" class="form-control" value="<?php echo $data['waktu_tiba']; ?>" name="waktu_tiba"></div>
            </div>
            <div class="row mb-3">
                <div class="col-md-2">Harga</div>
                <div class="col-md-8"><input type="number" class="form-control" value="<?php echo $data['harga']; ?>" name="harga"></div>
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
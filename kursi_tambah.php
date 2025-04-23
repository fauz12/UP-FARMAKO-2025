<h1 class="mt-4">Tambah Kereta</h1>
<div class="card">
    <div class="card-body">
    <div class="row">
    <div class="col-md-12">
       <form method="post">
        <!-- ini kode untuk menambahkan data kursi -->
        <?php
            if(isset($_POST['submit'])){
                $id_kereta = $_POST['id_kereta'];
                $id_pemesanan = $_POST['id_pemesanan'];
                $nama_penumpang = $_POST['nama_penumpang'];
                $no_kursi = $_POST['no_kursi'];
                $query = mysqli_query($koneksi, "INSERT INTO penumpang(id_kereta,id_pemesanan,nama_penumpang,no_kursi) VALUES ('$id_kereta','$id_pemesanan','$nama_penumpang','$no_kursi')");

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
                <div class="col-md-2">Total Bayar</div>
                <div class="col-md-8">
                    <select name="id_pemesanan" class="form-control">
                        <?php
                            $pem = mysqli_query($koneksi, "SELECT * FROM pemesanan");
                            while($total_bayar = mysqli_fetch_array($pem)) {
                                ?>
                                <option value="<?php echo $total_bayar['id_pemesanan']; ?>"><?php echo $total_bayar['total_bayar']; ?></option>
                        <?php    
                            }
                        ?>
                    </select>
                </div>
            </div>
            <div class="row mb-3">
                <div class="col-md-2">Nama Penumpang</div>
                <div class="col-md-8"><input type="text" class="form-control" name="nama_penumpang"></div>
            </div>
            <div class="row mb-3">
                <div class="col-md-2">No Kursi</div>
                <div class="col-md-8"><input type="number" class="form-control" name="no_kursi"></div>
            </div>
           <div class="row">
            <div class="col-md-2"></div>
            <div class="col-md-8">
                <button type="submit" class="btn btn-primary" name="submit" value="submit">Simpan</button>
                <button type="reset" class="btn btn-secondary">Reset</button>
                <a href="?page=kursi" class="btn btn-danger">Kembali</a>
                </div>
           </div>
        </form>
        </div>
    </div>
    </div>
</div>
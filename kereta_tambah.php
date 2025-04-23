<h1 class="mt-4">Tambah Kereta</h1>
<div class="card">
    <div class="card-body">
    <div class="row">
    <div class="col-md-12">
       <form method="post">
        <!-- ini kode untuk menambahkan data kereta -->
        <?php
            if(isset($_POST['submit'])){
                $nama_kereta = $_POST['nama_kereta'];
                $jenis = $_POST['jenis'];
                $kapasitas = $_POST['kapasitas'];
                $query = mysqli_query($koneksi, "INSERT INTO kereta(nama_kereta,jenis,kapasitas) VALUES ('$nama_kereta','$jenis','$kapasitas')");

                if($query) {
                    echo "<script>alert('Tambah Data Berhasil.')</script>";
                }else {
                    echo "<script>alert('Tambah Data Gagal.')</script>";
                }
            }
        ?>


            <div class="row mb-3">
                <div class="col-md-2">Nama Kereta</div>
                <div class="col-md-8"><input type="text" class="form-control" name="nama_kereta"></div>
            </div>
            <div class="row mb-3">
                <div class="col-md-2">Jenis</div>
                <div class="col-md-8">
                    <select name="jenis" class="form-control">
                        <option value="ekonomi">Ekonomi</option>
                        <option value="bisnis">Bisnis</option>
                        <option value="vip">VIP</option>
                    </select>
                </div>
            </div>
            <div class="row mb-3">
                <div class="col-md-2">Kapasitas</div>
                <div class="col-md-8"><input type="number" class="form-control" name="kapasitas"></div>
            </div>
           <div class="row">
            <div class="col-md-2"></div>
            <div class="col-md-8">
                <button type="submit" class="btn btn-primary" name="submit" value="submit">Simpan</button>
                <button type="reset" class="btn btn-secondary">Reset</button>
                <a href="?page=kereta" class="btn btn-danger">Kembali</a>
                </div>
           </div>
        </form>
        </div>
    </div>
    </div>
</div>
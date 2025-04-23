<h1 class="mt-4">Ubah Kereta</h1>
<div class="card">
    <div class="card-body">
    <div class="row">
    <div class="col-md-12">
       <form method="post">
        <!-- ini kode untuk mengubah data kereta -->
        <?php
            $id = $_GET['id'];
            if(isset($_POST['submit'])){
                $nama_kereta = $_POST['nama_kereta'];
                $jenis = $_POST['jenis'];
                $kapasitas = $_POST['kapasitas'];
                $query = mysqli_query($koneksi, "UPDATE kereta set nama_kereta='$nama_kereta', jenis='$jenis', kapasitas='$kapasitas' where id_kereta=$id");

                if($query) {
                    echo "<script>alert('Ubah Data Berhasil.')</script>";
                }else {
                    echo "<script>alert('Ubah Data Gagal.')</script>";
                }
            }
            $query = mysqli_query($koneksi, "SELECT * FROM kereta WHERE id_kereta=$id");
            $data = mysqli_fetch_array($query);
        ?>


            <div class="row mb-3">
                <div class="col-md-2">Nama Kereta</div>
                <div class="col-md-8"><input type="text" class="form-control" value="<?php echo $data['nama_kereta']; ?>" name="nama_kereta"></div>
            </div>
            <div class="row mb-3">
                <div class="col-md-2">Jenis</div>
                <div class="col-md-8">
                    <select name="jenis" class="form-control">
                        <option value="ekonomi" <?php if($data['jenis'] == 'ekonomi') echo 'selected'; ?>>Ekonomi</option>
                        <option value="bisnis" <?php if($data['jenis'] == 'bisnis') echo 'selected'; ?>>Bisnis</option>
                        <option value="vip" <?php if($data['jenis'] == 'vip') echo 'selected'; ?>>VIP</option>
                    </select>
                </div>
            </div>
            <div class="row mb-3">
                <div class="col-md-2">Kapasitas</div>
                <div class="col-md-8"><input type="number" class="form-control" value="<?php echo $data['kapasitas']; ?>" name="kapasitas"></div>
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
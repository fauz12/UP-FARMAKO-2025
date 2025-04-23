<h1 class="mt-4">Pesan Tiket</h1>
<div class="card">
    <div class="card-body">
    <div class="row">
    <div class="col-md-12">
       <form method="post">
        <!-- ini kode untuk mengubah status pembayaran  -->
        <?php
        $id = $_GET['id'];
            if(isset($_POST['submit'])){
                $status = $_POST['status'];
               
                $query = mysqli_query($koneksi, "UPDATE pembayaran set status ='$status' WHERE id_pembayaran=$id");

                if($query) {
                    echo "<script>alert('Ubah Data Berhasil.')</script>";
                }else {
                    echo "<script>alert('Ubah Data Gagal.')</script>";
                }
            }

            $query= mysqli_query($koneksi, "SELECT * FROM pembayaran WHERE id_pembayaran=$id");
            $data=mysqli_fetch_array($query);
        ?>

             
           
            <div class="row mb-3">
                <div class="col-md-2">Status Bayar</div>
                <div class="col-md-8">
                    <select name="status" class="form-control">
                        <!-- <option name="diproses">Diproses</option> -->
                        <option value="berhasil" <?php if($data['status'] == 'berhasil') echo 'selected'; ?>>Berhasil</option>
                        <option value="gagal" <?php if($data['status'] == 'gagal') echo 'selected'; ?>>Gagal</option>
                        
                    </select>
                </div>
            </div>
            
           <div class="row">
            <div class="col-md-2"></div>
            <div class="col-md-8">
                <button type="submit" class="btn btn-primary" name="submit" value="submit">Simpan</button>
                <button type="reset" class="btn btn-secondary">Reset</button>
                <a href="?page=pembayaranadmin" class="btn btn-danger">Kembali</a>
                </div>
           </div>
        </form>
        </div>
    </div>
    </div>
</div>
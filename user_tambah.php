<h1 class="mt-4">Tambah Pengguna</h1>
<div class="card">
    <div class="card-body">
    <div class="row">
    <div class="col-md-12">
       <form method="post">
        <!-- ini kode tambah untuk admin menambah data user -->
        <?php
            if(isset($_POST['submit'])){
                $nama = $_POST['nama'];
                $password = md5($_POST['password']);
                $email = $_POST['email'];
                $role = $_POST['role'];
                $query = mysqli_query($koneksi, "INSERT INTO user(nama,password,email,role) VALUES ('$nama','$password','$email','$role')");

                if($query) {
                    echo "<script>alert('Tambah Data Berhasil.')</script>";
                }else {
                    echo "<script>alert('Tambah Data Gagal.')</script>";
                }
            }
        ?>
        <!-- ini kode penutupnya -->

            <div class="row mb-3">
                <div class="col-md-2">Nama Lengkap</div>
                <div class="col-md-8"><input type="text" class="form-control" name="nama"></div>
            </div>
            <div class="row mb-3">
                <div class="col-md-2">Email</div>
                <div class="col-md-8"><input type="text" class="form-control" name="email"></div>
            </div>
            <div class="row mb-3">
                <div class="col-md-2">Password</div>
                <div class="col-md-8"><input type="text" class="form-control" name="password"></div>
            </div>
            <div class="row mb-3">
                <div class="col-md-2">Role</div>
                <div class="col-md-8">
                    <select name="role" class="form-control">
                        <option value="admin">Admin</option>
                        <option value="user">User</option>
                    </select>
                </div>
            </div>
           <div class="row">
            <div class="col-md-2"></div>
            <div class="col-md-8">
                <button type="submit" class="btn btn-primary" name="submit" value="submit">Simpan</button>
                <button type="reset" class="btn btn-secondary">Reset</button>
                <a href="?page=user" class="btn btn-danger">Kembali</a>
                </div>
           </div>
        </form>
        </div>
    </div>
    </div>
</div>
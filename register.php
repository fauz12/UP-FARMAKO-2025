<?php
    include "koneksi.php";
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Register Ke Tiketku</title>
        <link href="css/styles.css" rel="stylesheet" />
        <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
    </head>
    <body class="bg-primary">
        <div id="layoutAuthentication">
            <div id="layoutAuthentication_content">
                <main>
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-lg-5">
                                <div class="card shadow-lg border-0 rounded-lg mt-5">
                                    <div class="card-header"><h3 class="text-center font-weight-light my-4">Register Tiketku</h3></div>
                                    <div class="card-body">
                                        <!-- ini kode untuk mendaftar akun pengguna -->
                                        <?php
                                            if(isset($_POST['register'])){
                                                $nama = $_POST['nama'];
                                                $email = $_POST['email'];
                                                $role = $_POST['role'];
                                                $password = md5( $_POST['password']);

                                                $insert = mysqli_query($koneksi, "INSERT INTO user(nama,email,password,role) VALUES('$nama','$email','$password','$role')");
                                                
                                                if($insert){
                                                    echo '<script>alert("Selamat, Register Berhasil. Silahkan Login"); location.href="login.php"</script>';
                                                }else{
                                                    echo '<script>alert("Register Gagal, silahkan ulangi kembali.")</script>';
                                                }
                                            }
                                        ?>
                                        <form method="post">
                                            <div class="form-group">
                                            <label class="small mb-1">Nama Lengkap</label>
                                                <input class="form-control" required type="text" name="nama" placeholder="Masukkan Nama Lengkap" />
                                                
                                            </div>
                                            <div class="form-group">
                                            <label class="small mb-1">Email</label>
                                                <input class="form-control" required type="text" name="email" placeholder="Masukkan Email" />
                                                
                                            
                                            </div>
                                            <div class="form-group">
                                            <label class="small mb-1" for="inputPassword">Password</label>
                                                <input class="form-control" required id="inputPassword" name="password" type="password" placeholder="Masukkan Password" />
                                                
                                            </div>
                                            <div class="form-group">
                                            <label class="small mb-1">Role</label>
                                                <select name="role" required class="form-control">
                                                    <option value="user">User</option>
                                                    <!-- <option value="admin">Admin</option> -->
                                                </select>
                                                
                                            </div>
                                           
                                            <div class="d-flex align-items-center justify-content-between mt-4 mb-0">
                                                <button class="btn btn-primary" type="submit" name="register" value="register">Register</button>
                                                <a class="btn btn-danger" href="login.php">Login</a>
                                            </div>
                                        </form>
                                    </div>
                                    <div class="card-footer text-center py-3">
                                        <div class="small">
                                            &copy; 2025 Tiketku.
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </main>
            </div>
          
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="js/scripts.js"></script>
    </body>
</html>

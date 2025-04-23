<?php
session_start();
    include "koneksi.php";
    if(!isset($_SESSION['user'])){
        header('location:login.php');
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Tiket Digital</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/style.min.css" rel="stylesheet" />
    <link href="css/styles.css" rel="stylesheet" />
    <style>
        body {
            background-color: #f4f6f9;
            font-family: 'Segoe UI', sans-serif;
        }
        .navbar {
            background: linear-gradient(to right, #0d47a1, #1976d2);
        }
        .sidebar {
            background: #ffffffcc;
            backdrop-filter: blur(10px);
            border-right: 1px solid rgba(0, 0, 0, 0.05);
        }
        .sidebar .nav-link {
            color: #333;
            border-radius: 8px;
            padding: 10px 15px;
            transition: all 0.3s ease;
        }
        .sidebar .nav-link:hover,
        .sidebar .nav-link.active {
            background-color: #007bff;
            color: #fff;
        }
        .footer {
            background-color: #fff;
            border-top: 1px solid #dee2e6;
        }
        .nav-heading {
            font-weight: bold;
            margin-bottom: 1rem;
            font-size: 1.1rem;
            color: #444;
        }
        .sidebar .nav-item + .nav-item {
            margin-top: 0.3rem;
        }
        .user-info {
            margin-top: 2rem;
            font-size: 0.9rem;
            color: #555;
        }
        @media (max-width: 768px) {
            .sidebar {
                position: absolute;
                z-index: 1000;
                width: 100%;
                height: auto;
            }
        }
        .btn-light:hover {
            background-color: #e2e6ea;
            color: #000;
            transition: all 0.3s ease;
        }

    </style>
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-dark shadow-sm">
    <div class="container-fluid">
        <a class="navbar-brand fw-semibold d-flex align-items-center" href="index.php">
            <!-- <img src="img/logoo.png" alt="Logo Tiket" width="30" height="30" class="me-2"> -->
            <span>TiketKu</span>
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item">
                <a class="btn btn-light text-dark d-flex align-items-center gap-2 px-3 py-2 rounded-pill shadow-sm" href="logout.php">
                    <i class="fas fa-sign-out-alt"></i>
                    <span class="fw-semibold">Logout</span>
                </a>

                </li>
            </ul>
        </div>
    </div>
</nav>

<div class="container-fluid">
    <div class="row">
        <!-- Sidebar -->
        <nav class="col-md-3 col-xl-2 sidebar p-4">
            <div class="nav-heading">Menu Navigasi</div>
            <ul class="nav flex-column">
                <li class="nav-item">
                    <a href="?" class="nav-link"><i class="fas fa-tachometer-alt me-2"></i>Dashboard</a>
                </li>
                <!-- ini kode untuk membagi fitur antara user dengan admin -->
                <?php 
                    if ($_SESSION['user']['role'] == 'admin') { 
                    ?>
                        <li><a href="?page=kereta" class="nav-link"><i class="fas fa-train me-2"></i>Kereta</a></li>
                        <li><a href="?page=jadwal" class="nav-link"><i class="fas fa-calendar-alt me-2"></i>Tambah Jadwal</a></li>
                        <li><a href="?page=user" class="nav-link"><i class="fas fa-user me-2"></i>Data Pengguna</a></li>  
                        <li><a href="?page=kursiadmin" class="nav-link"><i class="fas fa-chair me-2"></i>Data Kursi</a></li>  
                        <li><a href="?page=verifikasi" class="nav-link"><i class="fas fa-clipboard-list me-2"></i>Verifikasi tiket</a></li>  
                        <li><a href="?page=pembayaranadmin" class="nav-link"><i class="fas fa-credit-card me-2"></i>Verifikasi bayar</a></li>
                        <li><a href="?page=laporan_pesan" class="nav-link"><i class="fas fa-file-alt me-2"></i>Log Pemesanan</a></li>
                        <li><a href="?page=laporan_bayar" class="nav-link"><i class="fas fa-file-alt me-2"></i>Log Pembayaran</a></li>
                    <?php 
                    } else { // level user
                    ?>
                        <li><a href="?page=jadwaluser" class="nav-link"><i class="fas fa-calendar-alt me-2"></i>Jadwal Tiket</a></li>
                        <li><a href="?page=pesan" class="nav-link"><i class="fas fa-clipboard-list me-2"></i>Pesanan</a></li>   
                        <li><a href="?page=kursi" class="nav-link"><i class="fas fa-chair me-2"></i>Kursi</a></li>   
                        <li><a href="?page=pembayaran" class="nav-link"><i class="fas fa-credit-card me-2"></i>Pembayaran</a></li>   
                    <?php 
                    } 
                ?>
                <!-- ini kode penutupnya -->
            </ul>
            <div class="user-info">
                <!-- ini kode untuk memanggil nama pengguna dan role dari pengguna -->
                Logged in as:<br><strong><?php echo $_SESSION['user']['nama']; ?></strong>
            </div>
        </nav>

        <!-- Main content -->
        <main class="col-md-9 ms-sm-auto col-lg-10 px-md-5 py-4">
            <!-- ini kode untuk memanggil atau menghubungkan file index dengan home dan 404 -->
            <?php
                $page = isset($_GET['page']) ? $_GET['page'] : 'home';
                if(file_exists($page .'.php')){
                    include $page .'.php';
                }else{
                    include '404.php';
                }
            ?>
            <footer class="footer mt-5 py-3">
                <div class="container">
                    <span class="text-muted d-block text-center">&copy; Tiketku 2025</span>
                </div>
            </footer>
        </main>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/umd/simple-datatables.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js"></script>
<script src="assets/demo/chart-area-demo.js"></script>
<script src="assets/demo/chart-bar-demo.js"></script>
<script src="js/scripts.js"></script>
<script src="js/datatables-simple-demo.js"></script>
</body>
</html>

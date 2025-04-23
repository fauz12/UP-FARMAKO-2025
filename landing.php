<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Tiket Kereta | Pesan Tiket Mudah</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;700&display=swap" rel="stylesheet">

    <!-- Custom Styles -->
    <style>
        body {
            font-family: 'Roboto', sans-serif;
            background-color: #f8f9fa;
        }
        .hero {
            background: linear-gradient(rgba(0,0,0,0.6), rgba(0,0,0,0.6)), url('kereta.jpg') center center/cover no-repeat;
            height: 100vh;
            color: white;
            display: flex;
            align-items: center;
            text-align: center;
        }
        .hero h1 {
            font-size: 3.5rem;
            font-weight: 700;
        }
        .hero p {
            font-size: 1.3rem;
        }
        .fitur-box {
            background-color: white;
            padding: 30px;
            border-radius: 15px;
            box-shadow: 0 5px 20px rgba(0,0,0,0.1);
            transition: transform 0.3s ease;
        }
        .fitur-box:hover {
            transform: translateY(-10px);
        }
        footer {
            background-color: #343a40;
            color: white;
        }
    </style>
</head>
<body>

<!-- Navbar -->
<nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top shadow">
    <div class="container">
        <a class="navbar-brand fw-bold" href="#">Tiket<span class="text-primary">Ku</span></a>
        <button class="navbar-toggler" data-bs-toggle="collapse" data-bs-target="#navbarNav">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse text-center" id="navbarNav">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item"><a class="nav-link active" href="landing.php">Beranda</a></li>
                <li class="nav-item"><a class="nav-link" href="#jadwal">Jadwal Kereta</a></li>
                <li class="nav-item"><a class="nav-link" href="#fitur">Fitur</a></li>
                <li class="nav-item"><a class="nav-link" href="login.php">Login</a></li>
            </ul>
        </div>
    </div>
</nav>

<!-- Hero -->
<section class="hero d-flex justify-content-center">
    <div class="container">
        <div class="hero-text">
            <h1 class="mb-3 animate__animated animate__fadeInDown">Pesan Tiket Kereta Lebih Mudah</h1>
            <p class="mb-4 animate__animated animate__fadeInUp">Cukup klik, pesan, dan siap berangkat!</p>
            <a href="login.php" class="btn btn-primary btn-lg px-4 py-2 animate__animated animate__zoomIn">Pesan Tiket Sekarang</a>
        </div>
    </div>
</section>

<!-- Fitur -->
<section class="py-5" id="jadwal">
    <div class="container">
    <h1 class="mt-4">Jadwal Kereta</h1>
    <div class="card">
    <div class="card-body">
    <div class="row">
    <div class="col-md-12">
    <form method="GET" class="mb-4">
      <div class="row g-2">
          <div class="col-md-4">
            <input type="text" name="asal" class="form-control" placeholder="Kota Asal" value="<?php echo isset($_GET['asal']) ? $_GET['asal'] : ''; ?>">
        </div>
        <div class="col-md-4">
            <input type="text" name="tujuan" class="form-control" placeholder="Kota Tujuan" value="<?php echo isset($_GET['tujuan']) ? $_GET['tujuan'] : ''; ?>">
        </div>
        <div class="col-md-3">
            <input type="date" name="tanggal" class="form-control" value="<?php echo isset($_GET['tanggal']) ? $_GET['tanggal'] : ''; ?>">
        </div>
        <div class="col-md-1 d-grid">
            <button type="submit" class="btn btn-primary">Cari</button>
        </div>
    </div>
</form>

        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
            <tr>
                <th>No</th>
                <th>Nama Kereta</th>
                <th>Kota Asal</th>
                <th>Kota Tujuan</th>
                <th>Tanggal Berangkat</th>
                <th>Waktu Berangkat</th>
                <th>Waktu Tiba</th>
                <th>Harga</th>
                
            </tr>
            <?php 
            include "koneksi.php";
            $i = 1;
            $where = [];
            if (!empty($_GET['asal'])) {
                $asal = mysqli_real_escape_string($koneksi, $_GET['asal']);
                $where[] = "jadwal.asal LIKE '%$asal%'";
            }
            if (!empty($_GET['tujuan'])) {
                $tujuan = mysqli_real_escape_string($koneksi, $_GET['tujuan']);
                $where[] = "jadwal.tujuan LIKE '%$tujuan%'";
            }
            if (!empty($_GET['tanggal'])) {
                $tanggal = mysqli_real_escape_string($koneksi, $_GET['tanggal']);
                $where[] = "jadwal.tgl_berangkat = '$tanggal'";
            }
            
            $whereSQL = !empty($where) ? 'WHERE ' . implode(' AND ', $where) : '';
            
            $query = mysqli_query($koneksi, "SELECT * FROM jadwal LEFT JOIN kereta ON jadwal.id_kereta = kereta.id_kereta $whereSQL");            
                while($data = mysqli_fetch_array($query)){
                    ?>
                    <tr>
                        <td><?php echo $i++; ?></td>
                        <td><?php echo $data['nama_kereta']; ?></td>
                        <td><?php echo $data['asal']; ?></td>
                        <td><?php echo $data['tujuan']; ?></td>
                        <td><?php echo $data['tgl_berangkat']; ?></td>
                        <td><?php echo $data['waktu_berangkat']; ?></td>
                        <td><?php echo $data['waktu_tiba']; ?></td>
                        <td><?php echo $data['harga']; ?></td>
                    </tr>
            <?php
                }
            ?>
        </table>
    </div>
     </div>
    </div>
    </div>
    </div>
</section>


<section class="py-5" id="fitur">
    <div class="container">
        <h2 class="text-center mb-5 fw-bold">Fitur Unggulan</h2>
        <div class="row g-4">
            <div class="col-md-4">
                <div class="fitur-box text-center">
                    <img src="https://cdn-icons-png.flaticon.com/512/847/847969.png" width="60" class="mb-3">
                    <h5>Pesan Tiket Online</h5>
                    <p>Reservasi tiket dengan mudah dan fleksibel melalui sistem kami.</p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="fitur-box text-center">
                    <img src="https://cdn-icons-png.flaticon.com/512/891/891419.png" width="60" class="mb-3" alt="Icon Dompet">
                    <h5>Pembayaran Digital</h5>
                    <p>Terintegrasi dengan metode pembayaran modern seperti e-wallet & transfer bank.</p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="fitur-box text-center">
                    <img src="https://cdn-icons-png.flaticon.com/512/3062/3062634.png" width="60" class="mb-3">
                    <h5>Lacak Riwayat</h5>
                    <p>Melihat histori pemesanan dan bukti pembayaran dengan cepat.</p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Footer -->
<footer class="text-center py-4">
    <div class="container">
        <p class="mb-0">© <?php echo date("Y"); ?> TiketKu 2025.</p>
    </div>
</footer>

<!-- JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>

</body>
</html>

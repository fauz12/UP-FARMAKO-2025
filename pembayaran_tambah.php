<h1 class="mt-4">Form Pembayaran</h1>
<div class="card">
    <div class="card-body">
        <form action="" method="post" enctype="multipart/form-data">
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

            <div class="mb-3">
                <label>Metode Pembayaran</label>
                <select name="metodebayar" class="form-control" required>
                    <option value="">-- Pilih Metode --</option>
                    <option value="Transfer Bank">Transfer Bank</option>
                    <option value="E-Wallet">E-Wallet</option>
                    <option value="Kartu Kredit">Kartu Kredit</option>
                    <option value="dana">Dana</option>
                </select>
            </div>

            <div class="mb-3">
                <label>Upload Bukti Bayar</label>
                <input type="file" name="bukti_bayar" class="form-control" accept="image/*" required>
            </div>
            <div class="mb-3">
                <label>Status Pembayaran</label>
                <select name="status" class="form-control" required>
                    <option name="proses">proses</option>
                    <!-- <option name="berhasil">Berhasil</option></option>
                    <option name="gagal">Gagal</option> -->
                </select>
            </div>
            <div class="mb-3">
                <button type="submit" name="submit" class="btn btn-success">Kirim Pembayaran</button>
                <a href="?page=pembayaran" class="btn btn-secondary">Kembali</a>
            </div>
        </form>
        <!-- ini kode untuk melakukan pembayaran -->
        <?php
         if(isset($_POST['submit'])){
            $id_pemesanan = $_POST['id_pemesanan'];
            $metodebayar = $_POST['metodebayar'];
            $status = "proses";
           
            // Upload file
            $nama_file = $_FILES['bukti_bayar']['name'];
            $tmp = $_FILES['bukti_bayar']['tmp_name'];
            $folder = "uploads/" . $nama_file;

            // Buat folder uploads jika belum ada
            if (!file_exists('uploads')) {
                mkdir('uploads', 0777, true);
            }

            if (move_uploaded_file($tmp, $folder)) {
                // Simpan ke database
                // Gantilah sesuai data pemesanan aktif
                $query = mysqli_query($koneksi, "INSERT INTO pembayaran 
                    (id_pemesanan, metodebayar, status, bukti_bayar) 
                    VALUES ('$id_pemesanan', '$metodebayar', '$status', '$nama_file')");

                if ($query) {
                    echo "<script>alert('Pembayaran berhasil dikirim');window.location='?page=pembayaran';</script>";
                } else {
                    echo "<div class='alert alert-danger'>Gagal menyimpan pembayaran.</div>";
                }
            } else {
                echo "<div class='alert alert-danger'>Upload bukti bayar gagal.</div>";
            }
        }
        ?>
    </div>
</div>

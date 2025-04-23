<h1 class="mt-4">Pesan Tiket</h1>
<div class="card">
    <div class="card-body">
    <div class="row">
    <div class="col-md-12">
       <form method="post">
            <!-- ini kode untuk menambahkan pesanan di user -->
        <?php
        
            if(isset($_POST['submit'])){
                $id_jadwal = $_POST['id_jadwal'];
                $id_user = $_SESSION['user']['id_user'];
                $jumlah_tiket = $_POST['jumlah_tiket'];
                $total_bayar = $_POST['total_bayar'];
                $status_bayar = $_POST['status_bayar'];
               
                $query = mysqli_query($koneksi, "INSERT INTO pemesanan(id_user,id_jadwal,jumlah_tiket,total_bayar,status_bayar) VALUES ('$id_user','$id_jadwal','$jumlah_tiket','$total_bayar','$status_bayar')");

                if($query) {
                    echo "<script>alert('Tambah Data Berhasil.')</script>";
                }else {
                    echo "<script>alert('Tambah Data Gagal.')</script>";
                }
            }
        ?>


            <div class="row mb-3">
                <div class="col-md-2">Jadwal</div>
                <div class="col-md-8">
                    <select name="id_jadwal" class="form-control">
                        <?php
                            $jad = mysqli_query($koneksi, "SELECT * FROM jadwal");
                            while($tgl_berangkat = mysqli_fetch_array($jad)){
                                ?>
                                <option value="<?php echo $tgl_berangkat['id_jadwal']; ?>"><?php echo $tgl_berangkat['tgl_berangkat']; ?></option>
                        <?php
                            }
                        ?>
                    </select>
            </div>
            </div>
            <div class="row mb-3">
                <div class="col-md-2">Jumlah Tiket</div>
                <div class="col-md-8">
                   <input type="number" class="form-control" name="jumlah_tiket">
                </div>
            </div>
            <div class="row mb-3">
                <div class="col-md-2">Total Bayar</div>
                <div class="col-md-8">
                   <input type="number" class="form-control" name="total_bayar">
                </div>
            </div>
            <div class="row mb-3">
                <div class="col-md-2">Status Bayar</div>
                <div class="col-md-8">
                    <select name="status_bayar" class="form-control">
                        <option name="diproses">Diproses</option>
                        <!-- <option name="dikembalikan">Dikembalikan</option> -->
                       
                    </select>
                </div>
            </div>
            
           <div class="row">
            <div class="col-md-2"></div>
            <div class="col-md-8">
                <button type="submit" class="btn btn-primary" name="submit" value="submit">Simpan</button>
                <button type="reset" class="btn btn-secondary">Reset</button>
                <a href="?page=jadwaluser" class="btn btn-danger">Kembali</a>
                </div>
           </div>
        </form>
        </div>
    </div>
    </div>
</div>
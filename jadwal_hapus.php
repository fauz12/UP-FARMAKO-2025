<!-- ini kode hapus untuk dijadwal -->
<?php
$id = $_GET['id'];
$query = mysqli_query($koneksi, "DELETE FROM jadwal where id_jadwal='$id'"); 
?>
<script>
    alert('Hapus Data Berhasil.');
    location.href = "index.php?page=jadwal";

</script>
<!-- ini kode hapus untuk menghapus data pembayaran user -->
<?php
$id = $_GET['id'];
$query = mysqli_query($koneksi, "DELETE FROM pembayaran where id_pembayaran='$id'"); 
?>
<script>
    alert('Hapus Data Berhasil.');
    location.href = "index.php?page=pembayaranadmin";

</script>
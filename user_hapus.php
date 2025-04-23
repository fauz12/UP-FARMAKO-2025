<!-- ini kode hapus untuk admin menghapus data user -->
<?php
$id = $_GET['id'];
$query = mysqli_query($koneksi, "DELETE FROM user where id_user='$id'"); 
?>
<script>
    alert('Hapus Data Berhasil.');
    location.href = "index.php?page=user";

</script>
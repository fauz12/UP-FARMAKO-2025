<!-- ini kode hapus untuk data kereta  -->
<?php
$id = $_GET['id'];
$query = mysqli_query($koneksi, "DELETE FROM kereta where id_kereta='$id'"); 
?>
<script>
    alert('Hapus Data Berhasil.');
    location.href = "index.php?page=kereta";

</script>
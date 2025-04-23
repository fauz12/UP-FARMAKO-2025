<!-- ini kode untuk menghapus data kursi yang ada diadmin -->
<?php
$id = $_GET['id'];
$query = mysqli_query($koneksi, "DELETE FROM penumpang where id_penumpang='$id'"); 
?>
<script>
    alert('Hapus Data Berhasil.');
    location.href = "index.php?page=kursiadmin";

</script>
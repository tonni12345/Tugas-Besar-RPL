<?php 
    $id = $_GET['id'];
    $query = mysqli_query($koneksi, "DELETE FROM  meja WHERE id_meja='$id'");
?>

<script>
    alert('Data Berhasil Dihapus');
    location.href = "index.php?page=meja";
</script>

<?php 
    $id = $_GET['id'];
    $query = mysqli_query($koneksi, "DELETE FROM  menu WHERE id_hidangan='$id'");
?>

<script>
    alert('Data Berhasil Dihapus');
    location.href = "index.php?page=menu";
</script>

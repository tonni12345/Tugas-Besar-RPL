<?php 
    $id = $_GET['id'];
    $query = mysqli_query($koneksi, "UPDATE pesanan set status='Selesai' WHERE id_pesanan='$id'");
?>

<script>
    location.href = "index.php?page=pesanan_perlu_antar";
</script>
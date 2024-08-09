<?php 

?>
<h1 class="mt-4">Ubah Menu</h1>
<div class="card">
    <div class="card-body">
    <div class="row">
    <div class="col-md-12">
        <form method="post" enctype="multipart/form-data">
            <?php 
            $id = $_GET['id'];
            if(isset($_POST['submit'])){
                    $nama_hidangan = $_POST['nama_hidangan'];
                    $deskripsi = $_POST['deskripsi'];
                    $harga = $_POST['harga'];
                    $stok = $_POST['stok'];

                    $gambar = $_FILES['gambar']['name'];

                    if($gambar != null){
                        $direktori = "assets/img/";
                        move_uploaded_file($_FILES['gambar']['tmp_name'], $direktori.$gambar);
                        $query = mysqli_query($koneksi, "UPDATE menu SET nama_hidangan='$nama_hidangan', deskripsi='$deskripsi', harga='$harga', gambar='$gambar', stok='$stok' WHERE id_hidangan='$id'");
                    } else {
                        $query = mysqli_query($koneksi, "UPDATE menu SET nama_hidangan='$nama_hidangan', harga='$harga', deskripsi='$deskripsi', stok='$stok' WHERE id_hidangan='$id'");
                    }


                    if ($query) {
                        echo '<script>alert("Tambah Data Berhasil");</script>';
                    } else {
                        echo '<script>alert("Tambah Data Gagal");</script>';
                    }
            }
            $query = mysqli_query($koneksi, "SELECT * FROM menu  WHERE id_hidangan=$id");
            $data = mysqli_fetch_array($query);
            ?>

            <div class="row mb-3">
                <div class="col-md-4">Nama Hidangan</div>
                <div class="col-md-8">
                    <input type="text" name="nama_hidangan" class="form-control" value="<?php echo $data['nama_hidangan']; ?>">
                </div>
            </div>
            <div class="row mb-3">
                <div class="col-md-4">Deskripsi</div>
                <div class="col-md-8">
                    <input type="text" name="deskripsi" class="form-control" value="<?php echo $data['deskripsi']; ?>">
                </div>
            </div>
            <div class="row mb-3">
                <div class="col-md-4">Harga</div>
                <div class="col-md-8">
                    <input type="text" name="harga" class="form-control" value="<?php echo $data['harga']; ?>">
                </div>
            </div>
            <div class="row mb-3">
                <div class="col-md-4">Gambar</div>
                <div class="col-md-8">
                    <input type="file" name="gambar" class="form-control" value="<?php echo $data['gambar']; ?>">
                </div>
            </div>
            <div class="row mb-3">
                <div class="col-md-4">Stok</div>
                <div class="col-md-8">
                    <select class="form-select" name="stok">
                        <option value="Tersedia" <?php if($data['stok'] == "Tersedia"){ echo "selected" ;}; ?> >Tersedia</option>
                        <option value="Kosong" <?php if($data['stok'] == "Kosong"){ echo "selected" ;};?>>Kosong</option>
                    </select>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4"></div>
                <div class="cold-md-8">
                    <button type="submit" class="btn btn-primary" name="submit" value="submit">Simpan</button>
                    <button type="reset" class="btn btn-secondary">Reset</button>
                    <a href="?page=menu" class="btn btn-danger">Kembali</a>
                </div>
            </div>

            

        </form>
    </div>
    </div>
</div>
</div>
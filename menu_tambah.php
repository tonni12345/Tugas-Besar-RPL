<h1 class="mt-4">Menu</h1>
<div class="card">
    <div class="card-body">
    <div class="row">
    <div class="col-md-12">
        <form method="post" enctype="multipart/form-data">
            <?php 
            if(isset($_POST['submit'])){
                    $nama_hidangan = $_POST['nama_hidangan'];
                    $deskripsi = $_POST['deskripsi'];
                    $harga = $_POST['harga'];
                    $stok = $_POST['stok'];
                    
                    $direktori = "assets/img/";
                    $gambar = $_FILES['gambar']['name'];
                    move_uploaded_file($_FILES['gambar']['tmp_name'], $direktori.$gambar);


                    
                    $query = mysqli_query($koneksi, "INSERT INTO menu (nama_hidangan, deskripsi, harga, gambar, stok) values ('$nama_hidangan','$deskripsi','$harga','$gambar', '$stok')");

                    if ($query) {
                        echo '<script>alert("Tambah Data Berhasil");</script>';
                    } else {
                        echo '<script>alert("Tambah Data Gagal");</script>';
                    }
            }
            ?>

            <div class="row mb-3">
                <div class="col-md-4">Nama Hidangan</div>
                <div class="col-md-8">
                    <input type="text" name="nama_hidangan" class="form-control">
                </div>
            </div>
            <div class="row mb-3">
                <div class="col-md-4">Deskripsi</div>
                <div class="col-md-8">
                    <input type="text" name="deskripsi" class="form-control">
                </div>
            </div>
            <div class="row mb-3">
                <div class="col-md-4">Harga</div>
                <div class="col-md-8">
                    <input type="text" name="harga" class="form-control" >
                </div>
            </div>
            <div class="row mb-3">
                <div class="col-md-4">Gambar</div>
                <div class="col-md-8">
                    <input type="file" name="gambar" class="form-control" accept="image/*">
                </div>
            </div>
            <div class="row mb-3">
                <div class="col-md-4">Stok</div>
                <div class="col-md-8">
                    <select class="form-select" name="stok">
                        <option value="Tersedia">Tersedia</option>
                        <option value="Kosong">Kosong</option>
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
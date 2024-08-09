<h1 class="mt-4">Edit Data Meja</h1>
<div class="card">
    <div class="card-body">
    <div class="row">
    <div class="col-md-12">
        <form method="post">
            <?php
            $id = $_GET['id'];
            if(isset($_POST['submit'])){
                    $status = $_POST['status'];
                    $jumlah_kursi = $_POST['jumlah_kursi'];
    
                    $query = mysqli_query($koneksi, "UPDATE meja set jumlah_kursi='$jumlah_kursi', status='$status' WHERE id_meja=$id");

                    if ($query) {
                        echo '<script>alert("Tambah Data Berhasil");</script>';
                    } else {
                        echo '<script>alert("Tambah Data Gagal");</script>';
                    }
            }
            $query = mysqli_query($koneksi, "SELECT * FROM meja WHERE id_meja=$id");
            $data = mysqli_fetch_array($query);
            ?>
            <div class="row mb-3">
                <div class="col-md-4">Status</div>
                <div class="col-md-8">
                    <select name="status" id="" class="form-select">
                        <option>Kosong</option>
                        <option>Isi</option>
                    </select>
                </div>
            </div>
            <div class="row mb-3">
                <div class="col-md-4">Jumlah Kursi</div>
                <div class="col-md-8">
                    <input type="text" class="form-control" name="jumlah_kursi" value="<?php echo $data['jumlah_kursi']; ?>">
                </div>
            </div>
            <div class="row">
                <div class="col-md-4"></div>
                <div class="cold-md-8">
                    <button type="submit" class="btn btn-primary" name="submit" value="submit">Simpan</button>
                    <button type="reset" class="btn btn-secondary">Reset</button>
                    <a href="?page=meja" class="btn btn-danger">Kembali</a>
                </div>
            </div>

            

        </form>
    </div>
    </div>
</div>
</div>
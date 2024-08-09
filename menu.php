<h1 class="mt-4">Menu</h1>
<div class="row">
    <div class="col-md-12">
        <a href="?page=menu_tambah" class="btn btn-primary mb-3">+ Tambah Menu</a>
        <div class="table-responsive">
            <table class="table table-striped table-bordered text-center" id="dataTable" width="100%" cellspacing="5">
                <thead class="table-dark">
                    <tr>
                        <th>No</th>
                        <th>Nama Hidangan</th>
                        <th>Deskripsi</th>
                        <th>Harga</th>
                        <th>Gambar</th>
                        <th>Stok</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                <?php
                function formatRupiah($angka){
                    return 'Rp ' . number_format($angka, 0, ',', '.');
                }

                $i = 1;
                $query = mysqli_query($koneksi, "SELECT * FROM menu");
                while($data = mysqli_fetch_array($query)){
                    ?>
                    <tr>
                        <td><?php echo $i++ ?></td>
                        <td><?php echo $data['nama_hidangan']; ?></td>
                        <td><?php echo $data['deskripsi']; ?></td>
                        <td><?php echo formatRupiah($data['harga']); ?></td>
                        <td><?php echo "<img src='assets/img/".$data['gambar']."' width='100' class='img-thumbnail'>"; ?></td>
                        <td><?php echo $data['stok']; ?></td>
                        <td>
                            <a href="?page=menu_ubah&&id=<?php echo $data['id_hidangan']; ?>" class="btn btn-info btn-sm">Ubah</a>
                            <a onclick="return confirm('Apakah Anda Akan menghapus data ini?')" href="?page=menu_hapus&&id=<?php echo $data['id_hidangan']; ?>" class="btn btn-danger btn-sm">Hapus</a>
                        </td>
                    </tr>
                    <?php
                }
                ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<!-- Custom CSS for additional styling -->
<style>
.table-responsive {
    margin-top: 20px;
}

.table th, .table td {
    vertical-align: middle; /* Aligns content vertically */
}

.img-thumbnail {
    border: 1px solid #ddd; /* Adds border to images */
}

.table-dark th {
    background-color: #343a40; /* Dark header background */
    color: white; /* White text color */
}

.table-striped tbody tr:nth-of-type(odd) {
    background-color: #f8f9fa; /* Light gray background for odd rows */
}

.table-striped tbody tr:hover {
    background-color: #e2e6ea; /* Hover effect for rows */
}
</style>

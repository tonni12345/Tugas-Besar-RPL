<h1 class="mt-4">Meja</h1>
<div class="row">
    <div class="col-md-12">
        <a href="?page=meja_tambah" class="btn btn-primary mb-3">+ Tambah Data Meja</a>
        <div class="table-responsive">
            <table class="table table-striped table-bordered text-center" id="dataTable" width="100%" cellspacing="5">
                <thead class="table-dark">
                    <tr>
                        <th>No_Meja</th>
                        <th>Jumlah Kursi</th>
                        <th>Status</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                <?php
                $i = 1;
                $query = mysqli_query($koneksi, "SELECT * FROM meja");
                while($data = mysqli_fetch_array($query)){
                    ?>
                    <tr>
                        <td><?php echo $data['id_meja']; ?></td>
                        <td><?php echo $data['jumlah_kursi']; ?></td>
                        <td><?php echo $data['status']; ?></td>
                        <td>
                            <a href="?page=meja_ubah&&id=<?php echo $data['id_meja']; ?>" class="btn btn-info btn-sm">Ubah</a>
                            <a onclick="return confirm('Apakah Anda Akan menghapus data ini?')" href="?page=meja_hapus&&id=<?php echo $data['id_meja']; ?>" class="btn btn-danger btn-sm">Hapus</a>
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

.btn-sm {
    font-size: 0.875rem; /* Smaller font size for buttons */
}
</style>

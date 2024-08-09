<head>
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
</head>
<h1 class="mt-4">Laporan Pesanan</h1>
<div class="row">
    <div class="col-md-12">
        <a href="cetak.php" target="_blank" class="btn btn-primary mb-3"><i class="fa fa-print"></i> Cetak Data</a>
        <div class="table-responsive">
            <table class="table table-striped table-bordered text-center" id="dataTable" width="100%" cellspacing="5">
                <thead class="table-dark">
                    <tr>
                        <th>No</th>
                        <th>Nama Pembeli</th>
                        <th>Nama Pelayan</th>
                        <th>No Meja</th>
                        <th>Tanggal Pembelian</th>
                        <th>Total Harga</th>
                        <th>Detail Pembelian</th>
                    </tr>
                </thead>
                <tbody>
                <?php
                function formatRupiah($angka){
                    return 'Rp ' . number_format($angka, 0, ',', '.');
                }

                $i = 1;
                $query = mysqli_query($koneksi, "SELECT * FROM pesanan 
                LEFT JOIN pegawai ON pegawai.id_pegawai = pesanan.id_pegawai 
                LEFT JOIN meja ON meja.id_meja = pesanan.id_meja 
                WHERE pesanan.status = 'Selesai' AND pesanan.status_pembayaran = 'lunas'");
                while($data = mysqli_fetch_array($query)){
                    ?>
                    <tr>
                        <td><?php echo $i++ ?></td>
                        <td><?php echo $data['nama_pembeli']; ?></td>
                        <td><?php echo $data['nama_pegawai']; ?></td>
                        <td><?php echo $data['id_meja']; ?></td>
                        <td><?php echo $data['tanggal']; ?></td>
                        <td><?php echo formatRupiah($data['total_harga']); ?></td>
                        <td>
                        <table style="text-align: left; border-spacing: 30px;" class="table">
                                <tr>
                                    <td>Nama Hidangan</td>
                                    <td>Jumlah</td>
                                    <td>Harga Satuan</td>
                                </tr>
                            <?php 
                                $id_pesanan = $data["id_pesanan"];
                                $query2 = mysqli_query($koneksi, "SELECT detail_pemesanan.jumlah_pesanan, menu.nama_hidangan, menu.harga FROM detail_pemesanan, menu WHERE detail_pemesanan.id_hidangan = menu.id_hidangan AND id_pesanan = '$id_pesanan'");
                                while($data2 = mysqli_fetch_array($query2)){
                            ?>
                                    <tr>
                                        <td>
                                            <?php 
                                                echo $data2["nama_hidangan"];
                                            ?>
                                        </td>
                                        <td>
                                            <?php 
                                                echo $data2["jumlah_pesanan"];
                                            ?>
                                        </td>
                                        <td>
                                            <?php 
                                                echo formatRupiah($data2["harga"]);
                                            ?>
                                        </td>
                                    </tr>
                            <?php } ?>
                            </table>
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

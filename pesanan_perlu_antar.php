<head>
    <meta http-equiv="refresh" content="10">
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
<h1 class="mt-4">Pesanan Perlu Diantar</h1>
<div class="row">
    <div class="col-md-12">
        <div class="table-responsive">
            <table class="table table-striped table-bordered text-center" id="dataTable" width="100%" cellspacing="5" id="data-container">
                <thead class="table-dark">
                    <tr>
                        <th>No</th>
                        <th>No Meja</th>
                        <th>Nama Hidangan</th>
                        <th>Jumlah</th>
                        <th>Status</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                <?php
                $i = 1;
                $query = mysqli_query($koneksi, "SELECT * FROM pesanan WHERE pesanan.status='Perlu diantar'");
                while($data = mysqli_fetch_array($query)){
                    $id_pesanan = $data["id_pesanan"];
                    ?>
                    <tr>
                        <td><?php echo $i++;?></td>
                        <td><?php echo $data["id_meja"]; ?></td>
                        <td>
                            <?php 
                                $query2 = mysqli_query($koneksi, "SELECT detail_pemesanan.jumlah_pesanan, menu.nama_hidangan FROM detail_pemesanan, menu WHERE detail_pemesanan.id_hidangan = menu.id_hidangan AND id_pesanan = '$id_pesanan'");
                                while($data2 = mysqli_fetch_array($query2)){
                                    echo "<p>", $data2["nama_hidangan"], "</p>"; 
                                }
                            ?>
                        </td>
                        <td>
                            <?php
                            $query3 = mysqli_query($koneksi, "SELECT detail_pemesanan.jumlah_pesanan FROM detail_pemesanan WHERE id_pesanan = '$id_pesanan'");
                            while($data3 = mysqli_fetch_array($query3)){
                                echo "<p>", $data3["jumlah_pesanan"], "</p>"; 
                            } 
                            ?>
                        </td>

                        <td><?php echo $data['status']; ?></td>
                        <td>
                            <a href="?page=pesanan_perlu_antar_ubah&&id=<?php echo $data['id_pesanan']; ?>" class="btn btn-info btn-sm">Selesai</a>
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

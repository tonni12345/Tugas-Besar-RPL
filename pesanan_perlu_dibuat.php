<head>
    <meta http-equiv="refresh" content="10">
    <style>
        .content {
            padding-bottom: 60px; /* Space for the footer */
        }

        .footer {
            background-color: #333;
            color: #fff;
            padding-top: 14px;
            padding-bottom: 5px;
            text-align: center;
            position: fixed;
            width: 100%;
            bottom: 0;
            left: 0;
            height: 60px; /* Height of footer */
        }

        .card {
            margin: 10px;
            width: 18rem;
            border: 1px solid #ddd; /* Optional: Adds a border around the card */
            border-radius: 0.25rem; /* Optional: Rounds the corners of the card */
            overflow: hidden; /* Ensures that content does not overflow the card */
        }

        .card-img-top {
            width: 100%; /* Full width of the card */
            height: 200px; /* Fixed height for consistency */
            object-fit: cover; /* Ensures the image covers the area without distortion */
        }

        .table-responsive {
            margin-top: 20px;
        }

        .table {
            width: 100%;
            border-collapse: collapse; /* Ensures borders do not double up */
        }

        .table th, .table td {
            padding: 8px; /* Padding inside table cells */
            text-align: center; /* Center-aligns text */
            vertical-align: middle; /* Aligns content vertically */
            border: 1px solid #ddd; /* Border for table cells */
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

        .btn-primary {
            background-color: #007bff;
            border-color: #007bff;
        }

        .btn-primary:hover {
            background-color: #0056b3;
            border-color: #004085;
        }

        .btn-info {
            background-color: #17a2b8;
            border-color: #17a2b8;
        }

        .btn-info:hover {
            background-color: #138496;
            border-color: #117a8b;
        }

        .btn-sm {
            font-size: 0.875rem; /* Smaller font size for buttons */
        }
    </style>
</head>

<h1 class="mt-4">Pesanan Perlu Dibuat</h1>
<div class="row">
    <div class="col-md-12">
        <div class="table-responsive">
            <table class="table table-striped table-bordered" id="dataTable">
                <thead class="table-dark">
                    <tr>
                        <th>No</th>
                        <th>Nama Hidangan</th>
                        <th>Jumlah</th>
                        <th>Status</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                <?php
                $i = 1;
                $query = mysqli_query($koneksi, "SELECT * FROM pesanan WHERE pesanan.status='Perlu dibuat'");
                while($data = mysqli_fetch_array($query)){
                    $id_pesanan = $data["id_pesanan"];
                    ?>
                    <tr>
                        <td><?php echo $i++ ?></td>
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
                            <a href="?page=pesanan_perlu_dibuat_ubah&&id=<?php echo $data['id_pesanan']; ?>" class="btn btn-info btn-sm">Selesai</a>
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

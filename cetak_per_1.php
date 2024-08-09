<?php 
    include "koneksi.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Struk Pemesanan Makanan</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f7f7f7;
        }
        .container {
            width: 80%;
            margin: 20px auto;
            padding: 20px;
            background-color: #fff;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        .header {
            text-align: center;
            margin-bottom: 20px;
        }
        .header h1 {
            margin: 0;
        }
        .info {
            margin-bottom: 20px;
        }
        .info p {
            margin: 5px 0;
        }
        .items {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }
        .items th, .items td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }
        .items th {
            background-color: #f2f2f2;
        }
        .total {
            text-align: right;
            margin-bottom: 20px;
        }
        .footer {
            text-align: center;
            margin-top: 20px;
        }
    </style>
</head>
<body>
<div class="container">
    <div class="header">
        <h1>Resto</h1>
        <p>Jln Dipatiukur</p>
        <p>Telepon: 123-456-7890</p>
    </div>

    <div class="info">
        <?php
            function formatRupiah($angka){
                return 'Rp ' . number_format($angka, 0, ',', '.');
            }
            $id = $_GET["id"];

            $query = mysqli_query($koneksi, "SELECT * FROM pesanan WHERE id_pesanan = '$id'");
            $data = mysqli_fetch_array($query);

            $no_meja = $data["id_meja"];

            $query2 = mysqli_query($koneksi, "UPDATE meja SET status='Kosong' WHERE id_meja='$no_meja'")
        ?>
        <p><strong>Nama Pelanggan:</strong><?php echo $data["nama_pembeli"] ?></p>
        <p><strong>Tanggal Pemesanan:</strong><?php echo $data["tanggal"] ?></p>
    </div>

    <table class="items">
        <thead>
            <tr>
                <th>Nama Item</th>
                <th>Kuantitas</th>
                <th>Harga Satuan</th>
                <th>Subtotal</th>
            </tr>
        </thead>
        <tbody>
        <?php
            $i = 1;
            $query2 = mysqli_query($koneksi, "SELECT * from detail_pemesanan INNER JOIN menu on detail_pemesanan.id_hidangan = menu.id_hidangan where id_pesanan = '$id'");
            while($data2 = mysqli_fetch_array($query2)){
        ?>
            <tr>
                <td><?php echo $data2["nama_hidangan"]; ?></td>
                <td><?php echo $data2["jumlah_pesanan"]; ?></td>
                <td><?php echo formatRupiah($data2["harga"]); ?></td>
                <td><?php echo formatRupiah($data2["total"]); ?></td>
            </tr>
        <?php } ?>
        </tbody>
    </table>

    <div class="total">
        <p><strong>Total:</strong><?php echo formatRupiah($data["total_harga"]); ?></p>
    </div>

    <div class="footer">
        <p>Terima kasih atas pesanan Anda!</p>
        <p>Harap simpan struk ini sebagai bukti pemesanan.</p>
    </div>
    <?php 
        $query3 = mysqli_query($koneksi, "UPDATE pesanan SET status_pembayaran = 'Lunas' where id_pesanan = '$id'"); 
    ?>
</div>

<script>
    window.print()
    setTimeout(function(){
        window.close()
        window.location = "index.php?page=daftar_pesanan"
    }, 100)
</script>
</body>
</html>



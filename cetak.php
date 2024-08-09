<h2 align="center">Laporan Pemesanan</h2>
<table border="1" cellspacing="0" cellpadding="5" width="100%">
    <tr>
        <th>No</th>
        <th>Nama Pembeli</th>
        <th>Nama Pelayan</th>
        <th>No Meja</th>
        <th>Tanggal Pembelian</th>
        <th>Total Harga</th>
        <th>Detail Pembelian</th>
    </tr>
    <?php
        include "koneksi.php"; 
        function formatRupiah($angka){
            return 'Rp ' . number_format($angka, 0, ',', '.');
        }

        $i = 1;
        $query = mysqli_query($koneksi, "SELECT * FROM pesanan LEFT JOIN pegawai on pegawai.id_pegawai = pesanan.id_pegawai LEFT JOIN meja on meja.id_meja = pesanan.id_meja WHERE pesanan.status_pembayaran = 'lunas'");
        while($data = mysqli_fetch_array($query)){
    ?>
    <tr>
        <td><?php echo $i++?></td>
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
    <tr>
    <?php
        }
    ?>
</table>
<script>
    window.print()
    setTimeout(function(){
        window.close()
    }, 100)
</script>
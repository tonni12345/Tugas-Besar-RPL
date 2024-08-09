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

    .card-body {
        padding: 1rem; /* Consistent padding inside the card */
    }

    .modal-header {
        background-color: #f1f1f1;
    }

    .modal-body {
        background-color: #fff;
    }

    .modal-footer {
        background-color: #f1f1f1;
    }

    .btn-primary {
        background-color: #007bff;
        border-color: #007bff;
    }

    .btn-primary:hover {
        background-color: #0056b3;
        border-color: #004085;
    }
</style>


<h1 class="mt-4">Pemesanan</h1>
<div class="col-md-4">
</div>
<div class="row content">    
    <?php
    function formatRupiah($angka){
        return 'Rp ' . number_format($angka, 0, ',', '.');
    } 
        $query = mysqli_query($koneksi, "SELECT * FROM menu");
        while($data = mysqli_fetch_array($query)){    
    ?>
    <div class="card" style="width: 18rem; margin:10px;">
        <img class="card-img-top" src="assets/img/<?php echo $data['gambar'];?>" alt="Card image cap" style="width: 250px; height: 200px;">
        <div class="card-body">
            <p class="id_hidangan" hidden><?php echo $data['id_hidangan'];?></p>
            <h5 class="card-title nama_hidangan"><?php echo $data['nama_hidangan']; ?></h5>
            <p class="card-text"><?php echo $data['deskripsi']; ?></p>
            <p class="card-text harga"><?php echo formatRupiah($data['harga']); ?></p>
            <p style="color: red;" <?php if($data['stok'] == "Tersedia"){ echo "hidden"; }?>>Stok Tidak Tersedia</p>
            <button type="button" class="btn btn-primary menu" id="makanan<?php echo $data['id_hidangan']; ?>" style="width:100%;" <?php if($data['stok'] == "Kosong"){echo "disabled";}?>>Tambah</button>
            <button type="button" class="kurang btn btn-primary" hidden>-</button>
            <b class="jumlah" name="jumlah" hidden>1</b>
            <button type="button" class="tambah btn btn-primary" hidden>+</button>
        </div>
    </div>

    <?php 
        }
    ?>
</div>
<div class="footer" hidden>
    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalCenter">
        <b class="jumlah_item">0</b> Item | 
        harga <b class="jumlah_harga">0</b>
    </button>        
</div>

<!-- Modal -->
<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Pesanan</h5>
                <button type="button" class="close btn btn-primary" data-dismiss="modal" aria-label="Close">
                    Tambah lagi
                </button>
            </div>
            <div class="modal-header">
                <form method="post">
                <table>
                    <tr>
                        <td>
                            <label for="nama" style="display: inline;">Nama Pembeli : </label>
                        </td>
                        <td>
                            <input type="text" name="nama" class="form-control" required>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label for="no_meja">No Meja :  </label>
                        </td> 
                        <td>
                            <select name="no_meja">
                                <?php 
                                    $query4 = mysqli_query($koneksi, "SELECT * FROM meja WHERE status='Kosong'");
                                    while($data_meja = mysqli_fetch_array($query4)){
                                ?>
                                <option value="<?php echo $data_meja["id_meja"]; ?>">
                                    <?php echo $data_meja["id_meja"]; ?>
                                </option>
                                <?php 
                                    }
                                ?>
                            </select>
                            <input type="text" class="id_hidangan_list" name="id_hidangan_list" hidden>
                            <input type="text" class="jumlah_item_list" name="jumlah_per_item" hidden>
                            <input type="text" class="jumlah_harga_list" name="jumlah_per_harga" hidden>
                        </td>
                    </tr>
                </table>
            </div>
            <div class="modal-body">
        
            </div>
            <div class="modal-footer #333">
                <div class="row">
                    <div class="col-sm">
                        Total Harga
                    </div>
                    <div class="col-sm total-harga">
                    </div>
                </div>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" name="submit" class="btn btn-primary pesan" value="submit">Pesan</button>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
        tambah = document.getElementsByClassName("menu");
        jumlah = document.getElementsByClassName("jumlah");
        
        tambah_jumlah = document.getElementsByClassName("tambah");
        kurang_jumlah = document.getElementsByClassName("kurang");

        id_hidangan = document.getElementsByClassName("id_hidangan");
        nama_hidangan = document.getElementsByClassName("nama_hidangan");
        footer = document.querySelector(".footer");

        jumlah_item = document.querySelector(".jumlah_item");
        
        harga = document.getElementsByClassName("harga")

        jumlah_harga = document.querySelector(".jumlah_harga")

        modal_body = document.querySelector(".modal-body")

        total_harga_modal = document.querySelector(".total-harga")

        list_pesanan = []

        list_harga = []
        list_jumlah = []
        list_id_hidangan = []

        jumlah_item_list = document.querySelector(".jumlah_item_list")
        jumlah_harga_list = document.querySelector(".jumlah_harga_list")
        id_hidangan_list = document.querySelector(".id_hidangan_list")

        for(let i = 0; i < tambah.length; i++){
            tambah[i].addEventListener("click", function(){
                tambah[i].setAttribute("hidden", "")
                jumlah[i].innerHTML = 1

                jumlah[i].removeAttribute("hidden")
                tambah_jumlah[i].removeAttribute("hidden")
                kurang_jumlah[i].removeAttribute("hidden")
                footer.removeAttribute("hidden")

                if(jumlah_item.innerHTML == 0){
                    jumlah_item.innerHTML = 1
                    jumlah_harga.innerHTML = harga[i].innerHTML.slice(3).replace(/[.]/g, '')
                } else{
                    jumlah_item.innerHTML = parseInt(jumlah_item.innerHTML) + 1
                    jumlah_harga.innerHTML = parseInt(jumlah_harga.innerHTML) + parseInt(harga[i].innerHTML.slice(3).replace(/[.]/g, ''))
                }

                list_pesanan.push("<div class='modal-header'><h5 class='modal-title nama_hidangan_modal' id='exampleModalLongTitle'>"+nama_hidangan[i].innerHTML+"</h5><div class='harga_modal'>"+harga[i].innerHTML+"</div><div><b class='jumlah-modal' name='jumlah'>1</b></div></div>")
                modal_body.innerHTML = list_pesanan.join("")

                total_harga_modal.innerHTML = jumlah_harga.innerHTML

                list_harga.push(harga[i].innerHTML.slice(3).replace(/[.]/g, ''))
                list_jumlah.push(jumlah[i].innerHTML)
                list_id_hidangan.push(id_hidangan[i].innerHTML)
                
                jumlah_item_list.value = list_jumlah
                jumlah_harga_list.value = list_harga
                id_hidangan_list.value = list_id_hidangan
            });

            kurang_jumlah[i].addEventListener("click", function(){
                jumlah[i].innerHTML = parseInt(jumlah[i].innerHTML) - 1
                if(jumlah[i].innerHTML == 0){
                    tambah[i].removeAttribute("hidden")
                    jumlah[i].setAttribute("hidden", "")
                    tambah_jumlah[i].setAttribute("hidden", "")
                    kurang_jumlah[i].setAttribute("hidden", "")

                    if(list_pesanan.length != 0){
                        for(let k = 0; k < list_pesanan.length; k++){
                            if(document.getElementsByClassName("nama_hidangan_modal")[k].innerHTML == nama_hidangan[i].innerHTML){
                                list_pesanan.splice(k,1)
                                modal_body.innerHTML = list_pesanan.join("")
                                list_jumlah.splice(k,1)
                                list_harga.splice(k,1)
                                list_id_hidangan.splice(k,1)


                                jumlah_item_list.value = list_jumlah
                                jumlah_harga_list.value = list_harga
                                id_hidangan_list.value = list_id_hidangan
                            }
                        }
                    }

                    if(jumlah_item.innerHTML == 1 ){
                        footer.setAttribute("hidden", "")
                    }
                }

                jumlah_item.innerHTML = parseInt(jumlah_item.innerHTML) - 1
                jumlah_harga.innerHTML = parseInt(jumlah_harga.innerHTML) - parseInt(harga[i].innerHTML.slice(3).replace(/[.]/g, ''))
                total_harga_modal.innerHTML = jumlah_harga.innerHTML
                
                if(list_pesanan.length != 0){
                    for(let k = 0; k < list_pesanan.length; k++){
                        if(document.getElementsByClassName("nama_hidangan_modal")[k].innerHTML == nama_hidangan[i].innerHTML){
                            list_pesanan[k] = ("<div class='modal-header'><h5 class='modal-title nama_hidangan_modal' id='exampleModalLongTitle'>"+nama_hidangan[i].innerHTML+"</h5><div>"+harga[i].innerHTML+"</div><div><b class='jumlah-modal' name='jumlah'>"+ jumlah[i].innerHTML +"</b></div></div>")
                            modal_body.innerHTML = list_pesanan.join("")
                            list_jumlah[k] = jumlah[i].innerHTML
                        }
                    }
                }

            });
            
            tambah_jumlah[i].addEventListener("click", function(){
                jumlah[i].innerHTML = parseInt(jumlah[i].innerHTML) + 1 

                jumlah_item.innerHTML = parseInt(jumlah_item.innerHTML) + 1
                jumlah_harga.innerHTML = parseInt(jumlah_harga.innerHTML) + parseInt(harga[i].innerHTML.slice(3).replace(/[.]/g, ''))


                if(list_pesanan.length != 0){
                    for(let k = 0; k < list_pesanan.length; k++){
                        if(document.getElementsByClassName("nama_hidangan_modal")[k].innerHTML == nama_hidangan[i].innerHTML){
                            list_pesanan[k] = ("<div class='modal-header'><h5 class='modal-title nama_hidangan_modal' id='exampleModalLongTitle'>"+nama_hidangan[i].innerHTML+"</h5><div>"+harga[i].innerHTML+"</div><div><b class='jumlah-modal' name='jumlah'>"+ jumlah[i].innerHTML +"</b></div></div>")
                            modal_body.innerHTML = list_pesanan.join("")
                            list_jumlah[k] = jumlah[i].innerHTML

                            jumlah_item_list.value = list_jumlah
                            
                        }
                    }
                }
                total_harga_modal.innerHTML = jumlah_harga.innerHTML
            });
        }
    </script>

<?php 
if(isset($_POST["submit"])){
    $nama_pembeli = $_POST["nama"];
    $no_meja = $_POST["no_meja"];
    $harga = explode(",", $_POST["jumlah_per_harga"]);
    $item = explode(",", $_POST["jumlah_per_item"]);
    $id_hidangan = explode(",", $_POST["id_hidangan_list"]);

    $id_pegawai = $_SESSION['user']["id_pegawai"];
    $tanggal = date('Y-m-d');

    $total_harga = 0;

    for($i = 0; $i < count($item); $i++){
        $total_harga = $total_harga + ($harga[$i] * $item[$i]);    
    }

    $query1 = mysqli_query($koneksi, "INSERT INTO pesanan values('', '$nama_pembeli', '$no_meja', '$id_pegawai', '$tanggal', '$total_harga', 'Perlu dibuat', 'belum bayar')");

    if($query1){
        $pesanan_id = mysqli_insert_id($koneksi);
            for($j = 0; $j < count($item); $j++){
                $kumulatif_harga = $harga[$j] * $item[$j];

                mysqli_query($koneksi, "INSERT INTO detail_pemesanan VALUES('', '$pesanan_id', '$id_hidangan[$j]', '$item[$j]', '$kumulatif_harga')");
            }  
    }

    $query5 = mysqli_query($koneksi, "UPDATE meja set status='Isi' WHERE id_meja='$no_meja'");
    echo "<script>window.location = 'index.php?page=pemesanan'</script>";
}
?>

<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js" integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ" crossorigin="anonymous"></script>



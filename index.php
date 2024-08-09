<?php
    include "koneksi.php";
    if(!isset($_SESSION['user'])){
        header('location:login.php');
    }
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Resto Unikom</title>
        <link href="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/style.min.css" rel="stylesheet" />
        <link href="css/styles.css" rel="stylesheet" />
        <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
        <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.5.0/font/bootstrap-icons.min.css" rel="stylesheet">
    </head>
    <body class="sb-nav-fixed">
        <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
            <!-- Navbar Brand-->
            <a class="navbar-brand ps-3" href="index.html">Resto</a>
            <!-- Sidebar Toggle-->
            <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle" href="#!"><i class="fas fa-bars"></i></button>
        </nav>
        <div id="layoutSidenav">
            <div id="layoutSidenav_nav">
                <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                    <div class="sb-sidenav-menu">
                        <div class="nav">
                            <div class="sb-sidenav-menu-heading">Navigasi</div>
                            <?php 
                                if($_SESSION["user"]["posisi"] == "koki" || $_SESSION["user"]["posisi"] == "admin"){
                            ?>
                            <a class="nav-link" href="?page=pesanan_perlu_dibuat">
                                <div class="sb-nav-link-icon"><i class="fas fa-book-open"></i></div>
                                Pesanan Perlu Dibuat
                            </a>
                            <a class="nav-link" href="?page=menu">
                                <div class="sb-nav-link-icon"><i class="fa-solid fa-bowl-food"></i></div>
                                Menu
                            </a>

                            <?php 
                                }
                                if ($_SESSION["user"]["posisi"] == "pelayan" || $_SESSION["user"]["posisi"] == "admin") {

                            ?>
                            <a class="nav-link" href="?page=pemesanan">
                                <div class="sb-nav-link-icon"><i class="bi bi-file-richtext-fill"></i></div>
                                Pemesanan
                            </a>
                            <a class="nav-link" href="?page=meja">
                                <div class="sb-nav-link-icon"><i class="bi bi-record-circle-fill"></i></div>
                                Meja
                            </a>
                            <a class="nav-link" href="?page=pesanan_perlu_antar">
                                <div class="sb-nav-link-icon"><i class="bi bi-shuffle"></i></div>
                                Pesanan Perlu Diantar
                            </a>
                            <?php 
                                }
                                if($_SESSION["user"]["posisi"] == "kasir" || $_SESSION["user"]["posisi"] == "admin"){
                            ?>
                            <a class="nav-link" href="?page=daftar_pesanan">
                                <div class="sb-nav-link-icon"><i class="bi bi-file-earmark-ruled-fill"></i></div>
                                Daftar Pesanan
                            </a>
                            <a class="nav-link" href="?page=laporan_pesanan">
                                <div class="sb-nav-link-icon"><i class="bi bi-journal-text"></i></div>
                                Laporan Pesanan
                            </a>
                            <?php
                                }
                            ?>
                            <a class="nav-link" href="logout.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-power-off"></i></div>
                                Logout
                            </a>
                        </div>
                    </div>
                    <div class="sb-sidenav-footer">
                        <div class="small">Logged in as:</div>
                        <?php 
                            echo $_SESSION['user']['nama_pegawai'];
                        ?>
                    </div>
                </nav>
            </div>
            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid px-4">
                    <?php 
                            $page = isset($_GET['page']) ? $_GET['page'] : 'home';
                            if(file_exists($page . ".php")){
                                include $page . ".php";
                            } else {
                                include "404.php";
                            }
                    ?>
                    </div>
                </main>
                
            </div>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="js/scripts.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
        <script src="assets/demo/chart-area-demo.js"></script>
        <script src="assets/demo/chart-bar-demo.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/umd/simple-datatables.min.js" crossorigin="anonymous"></script>
        <script src="js/datatables-simple-demo.js"></script>
    </body>
</html>

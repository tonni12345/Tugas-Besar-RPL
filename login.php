<?php 
    include "koneksi.php";
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
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" crossorigin="anonymous" />
        <link href="https://use.fontawesome.com/releases/v6.3.0/css/all.css" rel="stylesheet" crossorigin="anonymous" />
        <link href="css/styles.css" rel="stylesheet" />
        <style>
            body {
                background: linear-gradient(to right, #0072ff, #00c6ff);
                height: 100vh;
                display: flex;
                align-items: center;
                justify-content: center;
                font-family: 'Arial', sans-serif;
            }
            .card {
                border: none;
                border-radius: 15px;
                box-shadow: 0 10px 20px rgba(0, 0, 0, 0.1);
            }
            .card-header {
                background-color: #0072ff;
                border-bottom: none;
                color: white;
                border-top-left-radius: 15px;
                border-top-right-radius: 15px;
            }
            .btn-primary {
                background-color: #0072ff;
                border: none;
            }
            .btn-danger {
                background-color: #00c6ff;
                border: none;
            }
            .btn-primary:hover, .btn-danger:hover {
                opacity: 0.8;
            }
        </style>
    </head>
    <body>
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-4">
                    <div class="card shadow-lg border-0 rounded-lg mt-5">
                        <div class="card-header"><h3 class="text-center font-weight-light my-4">Login Resto Unikom</h3></div>
                        <div class="card-body">
                            <?php 
                                if(isset($_POST['login'])){
                                    $username = $_POST['username'];
                                    $password = md5($_POST['password']);

                                    $data = mysqli_query($koneksi, "SELECT * FROM pegawai where username='$username' and password='$password'");
                                    $cek = mysqli_num_rows($data);
                                    if ($cek > 0) {
                                        $_SESSION['user'] = mysqli_fetch_array($data);
                                        echo '<script> location.href="index.php"</script>';
                                    } else {
                                        echo '<script>alert("Maaf, username atau password salah")</script>';
                                    }
                                }
                            ?>
                            <form method="post">
                                <div class="form-floating mb-3">
                                    <input class="form-control" id="inputEmail" type="text" name="username" placeholder="Enter username" required/>
                                    <label for="inputEmail">Username</label>
                                </div>
                                <div class="form-floating mb-3">
                                    <input class="form-control" id="inputPassword" type="password" name="password" placeholder="Enter Password" required/>
                                    <label for="inputPassword">Password</label>
                                </div>
                                <div class="form-check mb-3">
                                    <input class="form-check-input" id="inputRememberPassword" type="checkbox" value="" />
                                    <label class="form-check-label" for="inputRememberPassword">Remember Password</label>
                                </div>
                                <div class="text-center mt-4 mb-0">
                                    <button class="btn btn-primary mx-auto" type="submit" name="login" value="login">Login</button>
                                    <a class="btn btn-primary mx-auto" href="register.php">Register</a>
                                </div>
                            </form>
                        </div>
                        <div class="card-footer text-center py-3">
                            <div class="small">
                                &copy; Resto Unikom 2024
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="js/scripts.js"></script>
    </body>
</html>

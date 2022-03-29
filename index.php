<?php

if (isset($_POST['daftar'])) {
    $nik = $_POST['nik'];
    $nama = $_POST['nama'];
    $ada = false;
    $text = $nik . "," . $nama . "\n";
    $fpo = file_get_contents('config.txt');
    $pecah = explode("\n", $fpo);
    foreach ($pecah as $values) {
        $data = explode(",", $values);
        if (array_key_exists(1, $data)) {
            if ($data[0] == $nik || $data[1] == $nama) {
                $ada = true;
                break;
            }
        }
    }

    if (!$ada) {
        $fp = fopen('config.txt', 'a+');
        fwrite($fp, $text);
        echo '<script>alert("Data Berhasil Di Tambahkan");</script>';
    } else {
        echo '<script>alert("NIK / Nama sudah terdaftar");</script>';
    }
} else if (isset($_POST['masuk'])) {
    error_reporting(0);
    $data = file_get_contents("config.txt");
    $content = explode("\n", $data);
    $false = false;

    foreach ($content as $values) {
        $login = explode(",", $values);
        $nik = $login[0];
        $nama = $login[1];
        if ($nik == $_POST['nik'] && $nama == $_POST['nama']) {
            $false = true;
            break;
        }
    }

    if ($false) {
        session_start();
        $_SESSION['username'] = $_POST['nama'];
        header('location: home.php');
    } else {
        echo '<script>alert("Data tidak ditemukan");</script>';
    }
}

?>

<!DOCTYPE html>
<html dir="ltr" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="keywords" content="wrappixel, admin dashboard, html css dashboard, web dashboard, bootstrap 5 admin, bootstrap 5, css3 dashboard, bootstrap 5 dashboard, materialpro admin bootstrap 5 dashboard, frontend, responsive bootstrap 5 admin template, materialpro admin lite design, materialpro admin lite dashboard bootstrap 5 dashboard template">
    <meta name="description" content="Material Pro Lite is powerful and clean admin dashboard template, inpired from Bootstrap Framework">
    <meta name="robots" content="noindex,nofollow">
    <title>Peduli Diri</title>
    <!-- Custom CSS -->
    <link href="assets/css/style.min.css" rel="stylesheet">
    <style>
        .container {
            margin-top: 170px;
        }

        img {
            width: 100%;
            transform: translateY(-55px);
        }
    </style>
</head>


<body>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-4">
                <h3 class="text-center mb-4 text-info">
                    Daftar / Login Terlebih Dahulu
                </h3>
                <form method="POST">
                    <div class="form-group">
                        <label for="nik">NIK</label>
                        <input type="text" class="form-control" name="nik" placeholder="NIK" required>
                    </div>
                    <div class="form-group mb-4">
                        <label for="nana">Nama Lengkap</label>
                        <input type="text" class="form-control" name="nama" placeholder="Nama Lengkap" required>
                    </div>
                    <button type="submit" class="btn btn-info text-white" name="daftar">Saya Pengguna Baru</button>
                    <button type="submit" class="btn btn-info text-white" name="masuk">Masuk</button>
                </form>
            </div>
            <div class="col-md-4">
                <img src="assets/img/permata.png" alt="">
            </div>
        </div>
    </div>
    <div>
        <footer class="footer">
            <center>
                © 2021 by Annaufal Arifa
            </center>
        </footer>



        <!-- ============================================================== -->
        <!-- All Jquery -->
        <!-- ============================================================== -->
        <script src="assets/plugins/jquery/dist/jquery.min.js"></script>
        <!-- Bootstrap tether Core JavaScript -->
        <script src="assets/plugins/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
        <script src="assets/js/app-style-switcher.js"></script>
        <!--Wave Effects -->
        <script src="assets/js/waves.js"></script>
        <!--Menu sidebar -->
        <script src="assets/js/sidebarmenu.js"></script>
        <!--Custom JavaScript -->
        <script src="assets/js/custom.js"></script>
</body>

</html>
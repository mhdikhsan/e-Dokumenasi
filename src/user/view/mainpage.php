<?php
session_start();
if (empty($_SESSION['nama_pengunjung'])) {
    header('location:../index.php');
} else {
    require_once "../koneksi/conn.php";
}

date_default_timezone_set('Asia/Jakarta');

function tgl_indo($tanggal) {
    $bulan = array(
        1 => 'Januari',
        'Februari',
        'Maret',
        'April',
        'Mei',
        'Juni',
        'Juli',
        'Agustus',
        'September',
        'Oktober',
        'November',
        'Desember'
    );
    $pecahkan = explode('-', $tanggal);

// variabel pecahkan 0 = tanggal
// variabel pecahkan 1 = bulan
// variabel pecahkan 2 = tahun

    return $pecahkan[2] . ' ' . $bulan[(int) $pecahkan[1]] . ' ' . $pecahkan[0];
}
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="Sistem informasi Dokumentasi (e-Dokumentasi)">
        <meta name="author" content="Muhammad Ikhsan">
        <meta name="keyword" content="Dokumentasi, Pustaka Wilayah Soeman HS">
        <link rel="shortcut icon" href="../img/logo-big.png">

        <title>e-Dokumentasi </title>

        <!--CSS-->
        <!-- Bootstrap CSS -->    
        <link href="../css/bootstrap.min.css" rel="stylesheet">
        <!-- bootstrap theme -->
        <link href="../css/bootstrap-theme.css" rel="stylesheet">
        <!-- font icon -->
        <link href="../css/font-awesome.min.css" rel="stylesheet" /> 
        <!-- google font -->
        <link href='../css/google-font.css' rel='stylesheet' type='text/css'>
        <!--CSSS custom -->
        <style>
            body{
                font-family	: Montserrat, sans-serif ;
            }

            h1{
                letter-spacing: 4px;
                font-family	: Montserrat, sans-serif ;
            }
            .jumbotron { 
                padding: 120px 25px ;
                color: white !important;
                background:  url('../img/jumbotron.jpg')  center fixed;
                background-size: cover;
            }  
            .input-src{
                padding-top: 30px; 
            }

            .input-lg{
                border-radius: 0;
            }
            .btn-lg{
                border-radius: 0;
            }
            .result{
                padding-top: 20px;
                font-family	: Montserrat, sans-serif;
            }

            hr{
                color : gray !important;
                border:  solid;
            }
            .navbar {
                margin-bottom: 0;
                background-color: transparent;
                z-index: 9999;
                border: 0;
                font-size: 12px !important;
                line-height: 1.42857143 !important;
                letter-spacing: 4px;
                border-radius: 0;
            }

            .navbar li a, .navbar .navbar-brand {
                color: white !important;

            }

            .navbar-nav li a:hover, .navbar-nav li.active a {
                color: #00ff80 !important;
                border: 1px solid;
                border-color: #00ff80;
            }

            .navbar-brand:hover{
                color:#00ff80 !important;
                border: 1px solid;
                border-color: #00ff80;
            }

            .navbar-default .navbar-toggle {
                border-color: transparent;
                color: #fff !important;
            }
            .input-lg{
                border-color: #00ff80 !important;
            }
            .input-lg:hover{
                border-color: #00ff80 !important;
                border : 5px solid;
            }
            .table{
                font-family	: Montserrat, sans-serif;
                background-color :#ddddbb;
                border-radius: 2;
                color : black;
            }



            h3{
                font-family	: Montserrat, sans-serif;
                line-height: 1.42857143 !important;
                letter-spacing: 4px;
            }

            .btn-src:hover{
                background-color: transparent;
                color: #00ff80 !important;
                border: 1px solid;
                border-color: #00ff80;
            }
            .btn-src{
                color: white !important;
                background-color : #999900;
            }
            .btn-detail{
                color: white;
                background-color: gray;
            }
            .btn-detail:hover{
                background-color: transparent;
                border-color: gray;
                color: gray;
                border-radius: 0;
                border: 1px solid;
            }
            thead{
                background-color: gray;
                color: white;
            }
            .input-lg::-webkit-input-placeholder {
                color: black;
            }
            .footer {
                position: fixed;
                left: 0;
                bottom: 0;
                width: 100%;
                background-color: gray;
                color: white;
                text-align: center;
            }
            li{
                font-size:14px;
            }
        </style>
    </head>
    <body class="bg-success">
        <nav class="navbar navbar-default navbar-fixed-top">
            <div class="container-fluid">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span> 
                    </button>
                    <a class="navbar-brand" href="akhiri_sesi.php">Buku Tamu</a>
                </div>
                <div class="collapse navbar-collapse" id="myNavbar">
                    <ul class="nav navbar-nav navbar-right">
                        <li><a href="lihat_dokumentasi.php">Lihat Semua File Dokumentasi</a></li>
                    </ul>
                </div>
            </div>
        </nav>
        <?php
        $timeout = 10; // Set timeout minutes
        $logout_redirect_url = "../index.php"; // Set logout URL

        $timeout = $timeout * 60; // Converts minutes to seconds
        if (isset($_SESSION['start_time'])) {
            $elapsed_time = time() - $_SESSION['start_time'];
            if ($elapsed_time >= $timeout) {
                session_destroy();
                echo "<script>alert('Silahkan Mengisi Buku Tamu Terlebih Dahulu!'); window.location = '$logout_redirect_url'</script>";
            }
        }
        $_SESSION['start_time'] = time();
        ?>
        <div class="jumbotron text-center">

            <h1 class="text-title">e-Dokumentasi</h1> 
            <p>Pusat Pencarian Dokumentasi Pustaka Soeman HS</p> 
            <form class="form-inline" action="mainpage.php" method="POST">
                <div class="input-group input-src">
                    <input class="form-control input-lg" name="qcari" type="text"  size="60" placeholder="Masukkan Judul Atau Kategori Dokumentasi " required>
                    <div class="input-group-btn">
                        <button type="submit" class="btn btn-src  btn-lg"><i class="fa fa-search"> Cari</i></button>
                    </div>
                </div>
            </form>
        </div>

        <div class="container">
            <h3 class="text-center">Hasil Pencarian</h3>
            <hr>
            <?php
            $query = " ";
            if (isset($_POST['qcari'])) {
                $qcari = $_POST['qcari'];
                $query = "SELECT M.* , A.nama_kategori FROM tb_dokumentasi AS M INNER"
                        . " JOIN tb_kategori_dokumentasi AS A ON M.id_kategori_dokumentasi = A.id_kategori where M.judul_dokumentasi like '%$qcari%' "
                        . " or A.nama_kategori like '%$qcari%' ";
            }
            $tampil = mysql_query($query) or die(mysql_error());
            ?>
        </div>
        <div class="container">
            <div class="row text-center result">
                <div class="col-lg-12">
                    <table class="table">
                        <thead>
                        <th><center>Judul</center></th>
                        <th><center>Tanggal</center></th>
                        <th><center>Kategori</center></th>
                        <th></th>
                        </thead>
                        <tbody>
                            <?php
                            while ($data = mysql_fetch_array($tampil)) {
                                $kategori = $data['nama_kategori'];
                                $tanggal = $data['tanggal_dokumentasi'];
                                ?>
                                <tr>
                                    <td><?php echo $data['judul_dokumentasi']; ?></td>
                                    <td><?php echo tgl_indo($tanggal) ?></td>
                                    <?php if ($kategori == "Gambar") { ?>
                                        <td><i class="fa fa-image fa-2x"></i></td>
                                    <?php } else if ($kategori == "Video") { ?>
                                        <td><i class="fa fa-video-camera fa-2x"></i></td>
                                    <?php } else if ($kategori == "Pdf") { ?>
                                        <td><i class="fa fa-file-pdf-o fa-2x"></i></td>
                                    <?php } else if ($kategori == "Rekaman Suara") { ?>
                                        <td><i class="fa fa-volume-up fa-2x"></i></td>
                                    <?php } else if ($kategori == "Buku") { ?>
                                        <td><i class="fa fa-book fa-2x"></i></td>
                                    <?php } else if ($kategori == "Film") { ?>
                                        <td><i class="fa fa-film fa-2x"></i></td>
                                    <?php } ?>
                                    <?php
                                    if ($data['id_kategori_dokumentasi'] == "2" || $data['id_kategori_dokumentasi'] == "6") {
                                        ?>    

                                        <td> <a href="hal_video.php?hal=edit&kd=<?php echo $data['id_dokumentasi']; ?>"><button class="btn btn-small btn-detail ">detail</button></a></td>
                                        <?php
                                    } else {
                                        ?>	
                                        <td> <a href="hal_dokumentasi.php?hal=edit&kd=<?php echo $data['id_dokumentasi']; ?>"><button class="btn btn-small btn-detail ">detail</button></a></td>
                                        <?php
                                    }
                                    ?>	
                                </tr>	
                                <?php
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>



        <!-- javascripts -->
        <script src="../js/jquery.js"></script>
        <script src="../js/jquery-ui-1.10.4.min.js"></script>
        <script src="../js/jquery-1.8.3.min.js"></script>
        <script type="text/javascript" src="../js/jquery-ui-1.9.2.custom.min.js"></script>
        <!-- bootstrap -->
        <script src="../js/bootstrap.min.js"></script>
    </body>

</html>	
<?php
include ("koneksi/conn.php");
date_default_timezone_set('Asia/Jakarta');

session_start();

if (isset($_POST['submit'])) {
    $nama = mysql_real_escape_string($_POST['nama_pengunjung']);
    $telepon = mysql_real_escape_string($_POST['telp_pengunjung']);
    $email = mysql_real_escape_string($_POST['email_pengunjung']);
    $instansi = mysql_real_escape_string($_POST['instansi_pengunjung']);
    $tgl = $_POST['tanggal_kunjungan'];




    $sql1 = "INSERT INTO tb_pengunjung VALUES('id_pengunjung','$nama','$telepon','$email','$instansi','$tgl')";
    $res1 = mysql_query($sql1) or die(mysql_error());


    if ($res1) {
        $_SESSION['nama_pengunjung'] = $nama;
        header('Location: view/mainpage.php');
    } else {
        echo "<script>alert('Proses Gagal !',window.location.href='index.php')</script>";
    }
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

        <link rel="shortcut icon" href="img/logo-big.png">

        <title>e-Dokumentasi | Pendaftaran Pengunjung</title>

        <!--CSS-->
        <!-- Bootstrap CSS -->    
        <link href="css/bootstrap.min.css" rel="stylesheet">
        <!-- bootstrap theme -->
        <link href="css/bootstrap-theme.css" rel="stylesheet">
        <!-- font icon -->
        <link href="css/font-awesome.min.css" rel="stylesheet" /> 
        <!-- google font -->
        <link href='css/google-font.css' rel='stylesheet' type='text/css'>
        <!--CSSS custom -->
        <style>
            body, html {
                height: 100%
            }

            .bgimg {
                background-image: url('img/background.jpg');
                min-height: 100%;
                background-size: cover;
                filter: grayscale(50%);
            }
            .register-panel {
                background-color : white;
                font-family	: Montserrat, sans-serif ;
                width: 90rem;
                position: fixed;
                top: 50%;
                margin-top: -18.375rem;
                left: 50%;
                margin-left: -50.5rem;
                opacity: 0;
                -webkit-transform: scale(.8);
                transform: scale(.8);
            }
            .panel-tamu{
                font-size : 24px;
                background-color : #66B032 !important;
                color	: #FFF !important;
            }
            .note{
                font-size : 10px;
            }
            .thumbnail {

                border: none;
                border-radius: 0;
            }
            .thumbnail img {
                padding-top : 100px;
                width: 50%;
                height: 50%;
            }
            .panel{
                border : none;

            }
        </style>
    </head>
    <body>
        <!-- Backgorund-->
        <div class="bgimg"></div>
        <!--Tampilan Buku Tamu -->
        <table class="table table-bordered register-panel">
            <tbody>
                <tr>
                    <td>
                        <div class="thumbnail">
                            <img src="img/gambar1.png" alt="New York">
                        </div>
                    </td>
                    <td width ="600px">

                        <div class="panel-heading panel-tamu">Buku Tamu</div>
                        <div class="panel-body">
                            <form class="form-horizontal" method = "post" action = "">
                                <div class="form-group">
                                    <label class="control-label col-sm-2" >Nama </label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" id="nama" placeholder="Masukkan Nama" name="nama_pengunjung" required>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-sm-2" >Telepon</label>
                                    <div class="col-sm-10">          
                                        <input type="text" class="form-control" id="telepon" placeholder="Masukkan No. Telepon" name="telp_pengunjung" required>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-sm-2" >Email</label>
                                    <div class="col-sm-10">          
                                        <input type="Email" class="form-control" id="email" placeholder="Masukkan Email" name="email_pengunjung" required>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-sm-2" >Instansi</label>
                                    <div class="col-sm-10">          
                                        <input type="text" class="form-control" id="instansi" placeholder="Masukkan Asal Instansi / Sekolah" name="instansi_pengunjung" required>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-sm-2" >Tanggal</label>
                                    <div class="col-sm-10">   
                                        <input type="date" class="form-control" id="tanggal"  name="tanggal_kunjungan" required> 
                                    </div>
                                </div>

                                <div class="col-sm-offset-2 col-sm-10">
                                    <p class="note"><b>Note : isi dengan tanda "-" jika tidak ada</b></p>
                                </div>

                                <div class="form-group">        
                                    <div class="col-sm-offset-2 col-sm-10">
                                        <input type="submit" name="submit" class="btn btn-default" value="submit"/>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </td>
                </tr>
            </tbody>
        </table>
        <!--End Code-->
        <!-- javascripts -->
        <script src="js/jquery.js"></script>
        <script src="js/jquery-ui-1.10.4.min.js"></script>
        <script src="js/jquery-1.8.3.min.js"></script>
        <script type="text/javascript" src="js/jquery-ui-1.9.2.custom.min.js"></script>
        <!-- bootstrap -->
        <script src="js/bootstrap.min.js"></script>
        <!-- Script memunculkan buku tamu -->
        <script>
            $(function () {
                var form = $(".register-panel");

                form.css({
                    opacity: 1,
                    "-webkit-transform": "scale(1)",
                    "transform": "scale(1)",
                    "-webkit-transition": ".5s",
                    "transition": ".5s"
                });
            });
        </script>
    </body>

</html>	

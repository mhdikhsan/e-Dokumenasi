<?php
require_once("../koneksi/conn.php");

if (isset($_POST['register'])) {


    $username = mysql_real_escape_string($_POST['username']);
    $password = mysql_real_escape_string($_POST['password']);
    $nip = mysql_real_escape_string($_POST['nip_pegawai']);
    $nama = mysql_real_escape_string($_POST['nama_pegawai']);
    $telp = mysql_real_escape_string($_POST['telp_pegawai']);
    $email = mysql_real_escape_string($_POST['email_pegawai']);


    $sql = "INSERT INTO tb_pegawai VALUES('$nip','$nama','$email','$telp','$username','$password')";
    $res = mysql_query($sql) or die(mysql_error());

    if ($res) {
        echo "<script>alert('Pengguna berhasil register !',document.location.href='../index.html')</script>";
    } else {
        echo "<script>alert('Pengguna gagal register !',document.location.href='register.php')</script>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
        <link rel="icon" href="../img/download.jpg">

        <title>e-Dokumentasi</title>

        <!-- Metro-UI core CSS -->
        <link href="../metro/css/metro.css" rel="stylesheet">
        <link href="../metro/css/metro-icons.css" rel="stylesheet">
        <link href="../metro/css/metro-responsive.css" rel="stylesheet">
        <link href="../metro/css/metro-schemes.css" rel="stylesheet">
        <link href="../metro/css/docs.css" rel="stylesheet">
        <link rel="shortcut icon" href="../img/logo-big.png">
        <!-- Custom styles for this template -->
        <link href='metro/css/google-font.css' rel='stylesheet' type='text/css'>

        <!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
        <!--[if lt IE 9]><script src="../../assets/js/ie8-responsive-file-warning.js"></script><![endif]-->
        <script src="../metro/js/jquery-2.1.3.min.js"></script>
        <script src="../metro/js/metro.js"></script>
        <script src="../metro/js/docs.js"></script>
        <script src="../metro/js/ga.js"></script>
        <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
        <!--[if lt IE 9]>
          <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
          <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->

        <!--Custom CSS-->
        <style>
            body, html {height: 100%}
            .bgimg {
                background-image: url('../img/background.jpg');
                min-height: 100%;
                background-size: cover;
                filter: grayscale(50%);
            }
            .register-panel {
                font-family	: Montserrat, sans-serif ;
                width: 50rem;
                height: 20rem;
                position: fixed;
                top: 40%;
                margin-top: -9.375rem;
                left: 40%;
                margin-left: -12.5rem;
                opacity: 0;
                -webkit-transform: scale(.8);
                transform: scale(.8);
            }

            .content{
                padding-left : 40px;
            }

        </style>
        <!--Custom JS-->
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
    </head>

    <body>
        <div class = "bgimg">
            <div class = "container">
                <br>
                <br>
                <div class="panel register-panel">
                    <div class="heading bg-gray ">
                        <span class="icon mif-list bg-dark"></span>
                        <span class="title">Register</span>
                    </div>
                    <div class="content bg-white">
                        <form action="" method="post">
                            <table class= "table">

                                <tr>
                                    <td class="text-light" width='150'>Nip </td>
                                    <td>
                                        <div class="input-control text full-size" data-role="input">
                                            <input type="text" name="nip_pegawai"  required>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="text-light">Nama </td>
                                    <td><div class="input-control text full-size" data-role="input" >
                                            <input type="text" name="nama_pegawai"   required>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="text-light">E-mail </td>
                                    <td><div class="input-control text full-size" data-role="input" >
                                            <input type="email" name="email_pegawai" required>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="text-light">Telepon </td>
                                    <td><div class="input-control text full-size" data-role="input" >
                                            <input type="text" name="telp_pegawai"  required>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="text-light">Username </td>
                                    <td><div class="input-control text full-size" data-role="input" >
                                            <input type="text" name="username"  required>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="text-light">Password </td>
                                    <td>
                                        <div class="input-control password full-size" data-role="input" >
                                            <input type="password" name="password"   required>
                                            <button class="button helper-button reveal"><span class="mif-eye"></span></button>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>&nbsp;</td>
                                    <td>
                                        <div class="form-actions" >
                                            <input type="submit" name ="register" value = "Daftar" class="button bg-gray fg-white rounded" >
                                            <a href = "../index.html"><button type="button" class="button image-button lighten  rounded"> <span class="icon mif-arrow-left"></span>Kembali</button></a>
                                        </div>
                                    </td>
                                </tr>
                            </table>
                        </form>
                        <!--end form-->
                    </div>
                </div>
            </div>
        </div>

        <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
        <script src="js/ie10-viewport-bug-workaround.js"></script>
    </body>
</html>

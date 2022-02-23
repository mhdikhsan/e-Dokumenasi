<?php
session_start();
if (empty($_SESSION['username'])) {
    header('location:../index.html');
} else {
    require_once "../koneksi/conn.php";
}
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="Sistem informasi Dokumentasii (e-Dokumentasii)">
        <meta name="author" content="Muhammad Ikhsan">
        <meta name="keyword" content="Dokumentasii, Pustaka Wilayah Soeman HS">
        <link rel="shortcut icon" href="../img/logo-big.png">

        <title>Profil | e-Dokumentasi</title>

        <!-- Bootstrap CSS -->    
        <link href="../css/bootstrap.min.css" rel="stylesheet">
        <!-- bootstrap theme -->
        <link href="../css/bootstrap-theme.css" rel="stylesheet">
        <!--external css-->
        <!-- font icon -->
        <link href="../css/elegant-icons-style.css" rel="stylesheet" />
        <link href="../css/font-awesome.min.css" rel="stylesheet" />    
        <!-- full calendar css-->
        <link href="../assets/fullcalendar/fullcalendar/bootstrap-fullcalendar.css" rel="stylesheet" />
        <link href="../assets/fullcalendar/fullcalendar/fullcalendar.css" rel="stylesheet" />
        <!-- easy pie chart-->
        <link href="../assets/jquery-easy-pie-chart/jquery.easy-pie-chart.css" rel="stylesheet" type="text/css" media="screen"/>
        <!-- owl carousel -->
        <link rel="stylesheet" href="../css/owl.carousel.css" type="text/css">
        <link href="../css/jquery-jvectormap-1.2.2.css" rel="stylesheet">
        <!-- Custom styles -->
        <link rel="stylesheet" href="../css/fullcalendar.css">
        <link href="../css/widgets.css" rel="stylesheet">
        <link href="../css/style.css" rel="stylesheet">
        <link href="../css/style-responsive.css" rel="stylesheet" />
        <link href="../css/xcharts.min.css" rel=" stylesheet">	
        <link href="../css/jquery-ui-1.10.4.min.css" rel="stylesheet">
        <link href="../css/dataTables.bootstrap.min.css" rel="stylesheet">
        <!-- =======================================================
            Theme Name: NiceAdmin
            Theme URL: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/
            Author: BootstrapMade
            Author URL: https://bootstrapmade.com
        ======================================================= -->

    </head>


    <body>
        <!-- container section start -->
        <section id="container" class="">
            <!--header start-->
            <header class="header dark-bg">
                <div class="toggle-nav">
                    <div class="icon-reorder tooltips" data-original-title="Toggle Navigation" data-placement="bottom"><i class="icon_menu"></i></div>
                </div>

                <!--logo start-->
                <a href="mainpage.php" class="logo">e- <span class="lite">Dokumentasi</span></a>
                <!--logo end-->

                <div class="top-nav notification-row">                
                    <!-- notificatoin dropdown start-->
                    <ul class="nav pull-right top-menu">
                        <!-- user login dropdown start-->
                        <li class="dropdown">
                            <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                                <span class="username"><?php echo $_SESSION['nama_pegawai']; ?></span>
                                <b class="caret"></b>
                            </a>
                            <ul class="dropdown-menu extended logout">
                                <div class="log-arrow-up"></div>
                                <li class="eborder-top">
                                    <a href="profile.php""><i class="icon_profile"></i> My Profile</a>
                                </li>
                                <li>
                                    <a href="../proses/logout.php"><i class="fa fa-sign-out"></i> Log Out</a>
                                </li>
                            </ul>
                        </li>
                        <!-- user login dropdown end -->
                    </ul>
                    <!-- notificatoin dropdown end-->
                </div>
            </header>      
            <!--header end-->

            <!--sidebar start-->
            <aside>
                <div id="sidebar"  class="nav-collapse ">
                    <!-- sidebar menu start-->
                    <?php include "menu.php"; ?>
                    <!-- sidebar menu end-->
                </div>
            </aside>
            <!--sidebar end-->

            <!--main content start-->
            <section id="main-content">
                <section class="wrapper">
                    <div class="row">
                        <div class="col-lg-12">
                            <h3 class="page-header"><i class="fa fa-user"></i> Profile</h3>
                            <ol class="breadcrumb">
                                <li><i class="fa fa-home"></i><a href="mainpage.php">Home</a></li>
                                <li><i class="icon_documents_alt"></i>Pages</li>
                                <li><i class="fa fa-user"></i>Profil</li>
                            </ol>
                        </div>
                    </div>
                    <!-- page start-->
                    <div class="row">
                        <div class="col-lg-12">
                            <section class="panel">
                                <header class="panel-heading tab-bg-info">
                                    <ul class="nav nav-tabs">
                                        <li>
                                            <a data-toggle="tab" href="#profile">
                                                <i class="fa fa-user"></i>
                                                Profil
                                            </a>
                                        </li>
                                        <li class="">
                                            <a data-toggle="tab" href="#edit-profile">
                                                <i class="fa fa-pencil"></i>
                                                Edit Profil
                                            </a>
                                        </li>
                                    </ul>
                                </header>
                                <div class="panel-body">
                                    <div class="tab-content">

                                        <!-- profile -->
                                        <div id="profile" class="tab-pane active">
                                            <section class="panel">
                                                <div class="bio-graph-heading">
                                                    Hello Saya <?php echo $_SESSION['nama_pegawai']; ?>, saya adalah admin dari sistem e-Dokumentasi ini.
                                                </div>
                                                <div class="panel-body bio-graph-info">
                                                    <h1>Bio Graph</h1>
                                                    <div class="row">
                                                        <div class="bio-row">
                                                            <p><span>Username </span>: <?php echo $_SESSION['username']; ?> </p>
                                                        </div>                                              
                                                        <div class="bio-row">
                                                            <p><span>Email</span>: <?php echo $_SESSION['email_pegawai']; ?></p>
                                                        </div>
                                                        <div class="bio-row">
                                                            <p><span>Nama </span>: <?php echo $_SESSION['nama_pegawai']; ?></p>
                                                        </div>
                                                        <div class="bio-row">
                                                            <p><span>No. Telepon </span>: <?php echo $_SESSION['telp_pegawai']; ?></p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </section>
                                            <section>
                                                <div class="row">                                              
                                                </div>
                                            </section>
                                        </div>
                                        <!-- edit-profile -->
                                        <div id="edit-profile" class="tab-pane">
                                            <section class="panel">                                          
                                                <div class="panel-body bio-graph-info">
                                                    <h1> Profile Info</h1>
                                                    <form class="form-horizontal" role="form" method="post" action="../proses/updateprofil.php">   
                                                        <div class="form-group">
                                                            <label class="col-lg-2 control-label">NIP </label>
                                                            <div class="col-lg-6">
                                                                <input type="text" class="form-control" id="f-id" name="nip_pegawai" placeholder=" " value="<?php echo $_SESSION['nip_pegawai']; ?>" readonly>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="col-lg-2 control-label">Nama </label>
                                                            <div class="col-lg-6">
                                                                <input type="text" class="form-control" id="f-name" name="nama_pegawai" placeholder=" " value="<?php echo $_SESSION['nama_pegawai']; ?>">
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="col-lg-2 control-label">Email </label>
                                                            <div class="col-lg-6">
                                                                <input type="email" class="form-control" name="email_pegawai" id="c-email" placeholder=" " value="<?php echo $_SESSION['email_pegawai']; ?>">
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="col-lg-2 control-label">Telepon </label>
                                                            <div class="col-lg-6">
                                                                <input type="text" class="form-control" id="telp" name="telp_pegawai" placeholder=" " value="<?php echo $_SESSION['telp_pegawai']; ?>">
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="col-lg-2 control-label">Username </label>
                                                            <div class="col-lg-6">
                                                                <input type="text" class="form-control" id="f-username" name="username" placeholder=" " value="<?php echo $_SESSION['username']; ?>">
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="col-lg-2 control-label">Password </label>
                                                            <div class="col-lg-6">
                                                                <input type="password" name="password" class="form-control" id="p-name" placeholder=" " value="<?php echo $_SESSION['password']; ?>">
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <div class="col-lg-offset-2 col-lg-10">
                                                                <button type="submit" class="btn btn-primary">Simpan</button>
                                                            </div>
                                                        </div>
                                                    </form>
                                                </div>
                                            </section>
                                        </div>
                                    </div>
                                </div>
                            </section>
                        </div>
                    </div>

                    <!-- page end-->
                </section>
            </section>
            <!--main content end-->
            <footer class="text-center">
                <p>Application Made By <a href="#" data-toggle="tooltip" title="Muhammad Ikhsan">Muhammad Ikhsan</a></p>
            </footer>
        </section>
        <!-- container section end -->
        <!-- javascripts -->
        <script src="../js/jquery.js"></script>
        <script src="../js/bootstrap.min.js"></script>
        <!-- nice scroll -->
        <script src="../js/jquery.scrollTo.min.js"></script>
        <script src="../js/jquery.nicescroll.js" type="text/javascript"></script>
        <!-- jquery knob -->
        <script src="../assets/jquery-knob/js/jquery.knob.js"></script>
        <!--custome script for all page-->
        <script src="../js/scripts.js"></script>

        <script>

            //knob
            $(".knob").knob();

        </script>


    </body>
</html>

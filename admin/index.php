<?php
session_start();
require "../config.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>SISTEM PAKAR TAKHRIJ HADIST</title>

    <link rel="stylesheet" href="../assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="../assets/css/datatables.min.css">
    <link rel="stylesheet" href="../assets/css/bootstrap-chosen.css">
    <link rel="stylesheet" href="../assets/css/dataTables.checkboxes.css">
    
    <style>
        .jumbotron {
            margin-bottom: 0px;
            position: relative;
            background: #000 url("../pic/back5.jpg");
            width: 100%;
            height: 100%;
            background-size: cover;
            overflow: hidden;
        }

      body{
            background: lightsteelblue;
        }
    </style>
    
</head>
<body>

<?php 
    if($_SESSION['status']!="succes"){
        header("Location:../admin/login.php");
    }

    if (isset($_SESSION["last_activity"]) && (time() - $_SESSION["last_activity"] > 360)) {
        session_destroy();
    }
    $_SESSION["last_activity"] = time();
?>

<div class="jumbotron">
  <div class="container">
    <h2 style="color: aliceblue;"><strong>SISTEM PAKAR TAKHRIJ HADIST</strong></h2>
    <h5 style="color: aliceblue;">
        <strong>
        "Belajarlah kamu semua, dan mengajarlah kamu semua, dan hormatilah guru-gurumu, 
        serta berlaku baiklah terhadap orang yang mengajarkanmu." (HR Tabrani)
        </strong>
    </h5>      
  </div>
</div>

<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
    </div>
    <ul class="nav navbar-nav">
        <li class="active"><a href="index.php">Home</a></li>
        <li><a href="?page=rawi&msg=">Rawi</a></li>
        <li><a href="?page=aturan">Basis Aturan</a></li>
        <li><a href="?page=konsultasi">Konsultasi</a></li>
        <li><a href="?page=report">Laporan Konsultasi</a></li>
        <?php
        if($_SESSION['level']=="Pimpinan"){
        ?>
            <li><a href="?page=users">Users</a></li>
        <?php
            } 
        ?>
        <li><a href="../admin/logout.php">Logout</a></li>
    </ul>
  </div>
</nav>

<div class="container">
    <?php
        $page = isset($_GET['page']) ? $_GET['page'] : "";
        $action = isset($_GET['action']) ? $_GET['action'] : "";

        if ($page==""){
            if ($action==""){
                include "welcome.php";
            }
        }elseif ($page=="rawi"){
            if ($action==""){
                include "page/rawi/tampil.php";
            }elseif ($action=="tambah"){
                include "page/rawi/tambah.php";
            }elseif ($action=="update"){
                include "page/rawi/update.php";
            }elseif ($action=="hapus"){
                include "page/rawi/hapus.php";
            }
        }elseif ($page=="users"){
            if ($action==""){
                include "page/users/tampil.php";
            }elseif ($action=="tambah"){
                include "page/users/tambah.php";
            }elseif ($action=="update"){
                include "page/users/update.php";
            }elseif ($action=="hapus"){
                include "page/users/hapus.php";
            }
        }elseif ($page=="aturan"){
            if ($action==""){
                include "page/aturan/tampil.php";
            }elseif ($action=="tambah"){
                include "page/aturan/tambah.php";
            }elseif ($action=="update"){
                include "page/aturan/update.php";
            }elseif ($action=="hapus"){
                include "page/aturan/hapus.php";
            }elseif ($action=="detail"){
                include "page/aturan/detail.php";
            }elseif ($action=="hapus_detail"){
                include "page/aturan/hapus_detail.php";
            }
        }elseif ($page=="pendaftaran"){
            if ($action==""){
                include "page/pendaftaran/tampil.php";
            }elseif ($action=="acc"){
                include "page/pendaftaran/acc.php";
            }
        }elseif ($page=="konsultasi"){
            if ($action==""){
                include "page/konsultasi/tampil.php";
            }elseif ($action=="detail"){
                include "page/konsultasi/detail.php";
            }
        }elseif ($page=="report"){
            if ($action==""){
                include "page/report/tgl_konsultasi.php";
            }
        }
    ?>

    <script src="../assets/js/jquery-3.3.1.min.js"></script>
    <script src="../assets/js/bootstrap.min.js"></script>
    <script src="../assets/js/datatables.min.js"></script>
    <script>
        $(document).ready(function () {
            $('#myTable').dataTable();
        });
    </script>

    <script src="../assets/js/chosen.jquery.min.js"></script>
    <script>
     $(function() {
       $('.chosen').chosen();
     });
    </script>

</div>
</body>
</html>
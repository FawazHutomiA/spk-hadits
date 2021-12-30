<?php
require "config.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>SISTEM PAKAR TAKHRIJ HADIST</title>

    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/datatables.min.css">
    <link rel="stylesheet" href="assets/css/bootstrap-chosen.css">
    <link rel="stylesheet" href="assets/css/dataTables.checkboxes.css">

    <style>
        .jumbotron {
            margin-bottom: 0px;
            position: relative;
            background: #000 url("pic/back5.jpg");
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
      <li><a href="admin/login.php">Admin</a></li>
      <li><a href="?page=rawi">Rawi</a></li>
      <li><a href="?page=takhrij&idkonsultasi=">Takhrij Hadist</a></li>
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
            }
        }else{
            if ($action==""){
                include "page/konsultasi/tampil.php";
            }elseif ($action=="hasil"){
                include "page/konsultasi/hasil.php";
            }
        }
    ?>

    <script src="assets/js/jquery-3.3.1.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <script src="assets/js/datatables.min.js"></script>
    <script>
        $(document).ready(function () {
            $('#myTable').dataTable();
        });
    </script>

    <script src="assets/js/chosen.jquery.min.js"></script>
    <script>
     $(function() {
       $('.chosen').chosen();
     });
    </script>
</div>
</body>
</html>
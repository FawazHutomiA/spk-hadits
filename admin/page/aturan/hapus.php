<?php
    $idaturan=$_GET['idaturan'];
    $sql = "DELETE FROM aturan WHERE idaturan='$idaturan'";
    mysqli_query($conn, $sql);
    $sql = "DELETE FROM detail_aturan WHERE idaturan='$idaturan'";
    mysqli_query($conn, $sql);
    mysqli_close($conn);
    header("location:index.php?page=aturan&msg=");
?>
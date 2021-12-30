<?php
    $idaturan=$_GET['idaturan'];
    $idrawi=$_GET['idrawi'];
    $sql = "DELETE FROM detail_aturan WHERE idaturan='$idaturan' AND idrawi='$idrawi'";
    mysqli_query($conn, $sql);
    mysqli_close($conn);
    header("location:index.php?page=aturan&msg=");
?>
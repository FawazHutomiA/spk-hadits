<?php
$username=$_GET['username'];

$sql = "DELETE FROM users WHERE username='$username'";

if (mysqli_query($conn, $sql)) {
    header("Location:?page=users");
}

mysqli_close($conn);
?>

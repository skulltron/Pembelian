<?php
include 'database/config.php';

$ID=$_GET['ID'];
$ID2=$_GET['ID2'];

mysqli_query($conn, "DELETE FROM tbpesan WHERE id_pesan='$ID'");
    
    header("location:index.php?m=home&ID=$ID2");
    
?>
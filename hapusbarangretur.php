<?php
include 'database/config.php';

$ID=$_GET['ID'];
$ID2=$_GET['ID2'];

mysqli_query($conn, "DELETE FROM tbreturdetail WHERE id_rdetail='$ID'");

	echo "Barang Dihapus <br/>";
    
    header("location:index.php?m=returdetail&ID=$ID2");
    
?>
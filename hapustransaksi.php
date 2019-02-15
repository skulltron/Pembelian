<?php
include 'database/config.php';

$ID=$_GET['ID'];

mysqli_query($conn, "DELETE FROM tbtransaksi WHERE id_transaksi='$ID'");

	echo "Transaksi Dihapus <br/>";
    echo "<a href='post.php'>See Data</a>";
    
    header("location:index.php?m=transaksi");
    
?>
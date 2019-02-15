<?php
include 'database/config.php';

$ID=$_GET['ID'];

$sql = "UPDATE tbtransaksi SET status_transaksi=('Rejected') WHERE id_transaksi='$ID';";

mysqli_query($conn, $sql);

echo "<script>alert('Pesanan DITOLAK'); location.href='index.php?m=home&ID=$ID';</script>";
?>
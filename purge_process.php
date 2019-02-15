<?php
include 'database/config.php';
$query1=mysqli_query($conn, "DELETE FROM tbbayar");
$query2=mysqli_query($conn, "DELETE FROM tbjurnal");
$query3=mysqli_query($conn, "DELETE FROM tbjurnalkeluar");
$query4=mysqli_query($conn, "DELETE FROM tbpesan");
$query5=mysqli_query($conn, "DELETE FROM tbretur");
$query6=mysqli_query($conn, "DELETE FROM tbreturdetail");
$query7=mysqli_query($conn, "DELETE FROM tbtransaksi");

echo "<script>alert('Data Sudah Terhapus !'); location.href='index.php?m=transaksi';</script>";

?>
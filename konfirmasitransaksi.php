<?php
include 'database/config.php';

$ID=$_GET['ID'];

$sql = "UPDATE tbtransaksi SET status_transaksi=('Di Supplier'), tgl_konf=NOW() WHERE id_transaksi='$ID';";

mysqli_query($conn, $sql);

echo "<script>alert('Pesanan Sudah terkirim ke Bagian Supplier untuk dilakukan proses pengiriman, Silahkan Tunggu sampai Nota diberikan oleh Pihak Supplier untuk Menyelesaikan Pesanan ini !'); location.href='index.php?m=conf&ID=$ID';</script>";
?>
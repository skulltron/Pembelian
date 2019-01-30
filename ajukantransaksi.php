<?php
include 'database/config.php';

$ID=$_GET['ID'];

$sql = "UPDATE tbtransaksi SET status_transaksi=('Di Pembelian') WHERE id_transaksi='$ID';";

mysqli_query($conn, $sql);

echo "<script>alert('Pesanan Terkirim ke Bagian Pembelian, Silahkan Cetak Surat Permintaan Pembelian dan berikan ke Bagian Pembelian'); location.href='index.php?m=home&ID=$ID';</script>";
?>
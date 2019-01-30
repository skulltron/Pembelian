<?php
include 'database/config.php';

$keterangan=$_POST['keterangan_retur'];

// echo $jml_retur;

$sql = "INSERT INTO tbretur (tgl_retur,status_retur,total_retur,keterangan_retur)
VALUES (NOW(),'pending',0,'$keterangan');";

mysqli_query($conn, $sql);

echo "<script>alert('Retur Terkirim, Kirim Surat jalan dan tunggu konfirmasi dari Supplier !'); location.href='index.php?m=retur';</script>";
	
?>
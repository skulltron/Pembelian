<?php
include 'database/config.php';

$tgl_transaksi = $_POST['tgl_transaksi'];
$id_supplier = $_POST['id_supplier'];
$no_transaksi = $_POST['no_transaksi'];
$jatuh_tempo = date('Y-m-d H:i:s');
$gudang_from = $_POST['gudang_from'];

$sql = "INSERT INTO tbtransaksi (tgl_transaksi,id_supplier,no_transaksi,sub_total,potongan,grand_total,status_transaksi,gudang_from)
VALUES (NOW(),'$id_supplier','$no_transaksi','0','0','0','pending','$gudang_from');";

mysqli_query($conn, $sql);

header("location:index.php?m=transaksi");
	
?>
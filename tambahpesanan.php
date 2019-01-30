<?php
include 'database/config.php';

$id_barang = $_POST['id_barang'];
$tod = $_POST['tgl_pesan'];
$jenis_pesan = $_POST['jenis_pesan'];
$jml_pesan = $_POST['jml_pesan'];
$ukuran = $_POST['ukuran'];
$penjelasan = $_POST['penjelasan'];
$id_transaksi = $_GET['ID'];

$sql = "SELECT * FROM tbbarang WHERE id_barang='$id_barang'";
$query = mysqli_query($conn, $sql);
$row = mysqli_fetch_array($query);
$harga_beli = $row ['harga_beli'];

echo $harga_beli;

$total_pesan = $jml_pesan * $harga_beli;

$tgl_pesan=date('Y-m-d');

if($jenis_pesan=="Biasa"){
	$tgl_batas_pesan=Date('y:m:d', strtotime("+8 days"));
}
elseif($jenis_pesan=="Segera"){
	$tgl_batas_pesan=Date('y:m:d', strtotime("+4 days"));
}
else{
	$tgl_batas_pesan=Date('y:m:d', strtotime("+2 days"));
}

$no_pesan = rand(111111, 999999);

// total masih statis

$sql = "INSERT INTO tbpesan (id_barang,no_pesan,tgl_pesan,jenis_pesan,jml_pesan,ukuran,penjelasan,tgl_batas_pesan,kondisi,status_pesanan,id_transaksi,total_pesan)
		VALUES ('$id_barang','$no_pesan','$tgl_pesan','$jenis_pesan','$jml_pesan','$ukuran','$penjelasan','$tgl_batas_pesan','Baik','pending','$id_transaksi','$total_pesan');";

mysqli_query($conn, $sql);

header("location:index.php?m=home&ID=$id_transaksi");
	
?>
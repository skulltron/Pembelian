<?php
include 'database/config.php';

$ID=$_GET['ID'];
$id_barang = $_POST['id_barang'];
$jml_barang = $_POST['jml_returbarang'];

$sql = "INSERT INTO tbreturdetail (id_retur,id_barang,jml_returbarang)
		VALUES ('$ID','$id_barang','$jml_barang');";

mysqli_query($conn, $sql);

header("location:index.php?m=returdetail&ID=$ID");
	
?>
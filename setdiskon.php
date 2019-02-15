<?php
include 'database/config.php';

$ID=$_GET['ID'];
$potongan=$_POST['potongan'];

$sql = "UPDATE tbtransaksi SET potongan=('$potongan') WHERE id_transaksi='$ID';";

mysqli_query($conn, $sql);

echo "<script>alert('Diskon Diset'); location.href='index.php?m=conf3&ID=$ID';</script>";
?>
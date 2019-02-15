<?php
include 'database/config.php';

$ID=$_GET['ID'];
$potongan=$_POST['potongan'];

$sql = "UPDATE tbretur SET potongan_retur=('$potongan') WHERE id_retur='$ID';";

mysqli_query($conn, $sql);

echo "<script>alert('Diskon Diset'); location.href='index.php?m=returdetailsupp&ID=$ID';</script>";
?>
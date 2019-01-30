<?php
include 'database/config.php';

$ID=$_GET['ID'];

function caritotal($ID, $conn){
    $sql = "SELECT * FROM tbreturdetail INNER JOIN tbbarang ON tbreturdetail.id_barang=tbbarang.id_barang INNER JOIN tbretur ON tbretur.id_retur=tbreturdetail.id_retur WHERE tbreturdetail.id_retur='$ID'";
    $query=mysqli_query($conn, $sql);
    while($row=mysqli_fetch_array($query)){
        $totalretur=$row['harga_beli']*$row['jml_returbarang'];
        $gtotalretur=0;
        $tgtotal+=$totalretur;
    }
    return $tgtotal;
}

$tgtotal=caritotal($ID,$conn);

$sql = "UPDATE tbretur SET status_retur=('Diterima'), total_retur=('$tgtotal') WHERE id_retur='$ID';";

$query = mysqli_query($conn, $sql);

echo "<script>alert('Retur Diterima, Silahkan Cetak Kwitansi dan berikan ke perusahaan terkait'); location.href='index.php?m=returdetailsupp&ID=$ID';</script>";

?>
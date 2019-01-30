<?php
include 'database/config.php';

$ID=$_GET['ID'];
$jml_bayar = $_POST['jml_bayar'];

$query = mysqli_query($conn, "SELECT * FROM tbtransaksi WHERE id_transaksi='$ID'"); 
$row = mysqli_fetch_array($query);

function carijumlahbarang($ID, $conn){
    $sql="SELECT * FROM tbpesan INNER JOIN tbtransaksi ON tbpesan.id_transaksi=tbtransaksi.id_transaksi INNER JOIN tbbarang ON tbpesan.id_barang=tbbarang.id_barang WHERE tbpesan.id_transaksi='$ID' ORDER BY id_pesan ASC;";
    $query = mysqli_query($conn, $sql);

    $row= mysqli_fetch_array($query);
    
    $jml_pesan=$row['jml_pesan'];
    return $jml_bayar;
}

function cariidbarang($ID, $conn){
    $sql="SELECT * FROM tbpesan INNER JOIN tbtransaksi ON tbpesan.id_transaksi=tbtransaksi.id_transaksi INNER JOIN tbbarang ON tbpesan.id_barang=tbbarang.id_barang WHERE tbpesan.id_transaksi='$ID' ORDER BY id_pesan ASC;";
    $query = mysqli_query($conn, $sql);

    $row= mysqli_fetch_array($query);
    
    $id_barang=$row['id_barang'];
    return $id_barang;
}

$jml_barang=carijumlahbarang($ID,$conn);
$id_barang=cariidbarang($ID, $conn);

$grandtotal = $row['grand_total'];
$jml_pesan = $stok+$jml_barang;

if ($jml_bayar<$grandtotal){
    echo "<script>alert('Jumlah yang dibayarkan tidak cukup, Masukkan jumlah yang benar !'); location.href='index.php?m=pelunasan&ID=$ID';</script>";
} elseif ($jml_bayar=$grandtotal){
    $sql = "INSERT INTO tbbayar (id_transaksi,tgl_pembayaran,jml_bayar,status_pembayaran) VALUES ('$ID',NOW(),'$jml_bayar','Lunas')";
    $sql2 = "UPDATE tbtransaksi SET status_transaksi=('Sukses') WHERE id_transaksi='$ID'";
    $sql3 = "UPDATE tbbarang SET stok=($jml_pesan) WHERE id_barang='$id_barang' AND id_transaksi='$ID'";
    mysqli_query($conn, $sql);
    mysqli_query($conn, $sql2);
    mysqli_query($conn, $sql3);
    echo "<script>alert('Pembayaran Sukses'); location.href='cetakcek.php?ID=$ID&jb=$jml_bayar';</script>";
}
?>
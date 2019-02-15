<?php
include 'database/config.php';

$ID=$_GET['ID'];
$jml_bayar = $_POST['jml_bayar'];

$query = mysqli_query($conn, "SELECT * FROM tbtransaksi WHERE id_transaksi='$ID'"); 
$row = mysqli_fetch_array($query);
$notrans=$row['no_transaksi'];
$diskon=$row['potongan'];
$subtotal=$row['sub_total'];
$idsupp=$row['id_supplier'];

function carijumlahbarang($ID, $conn){
    $sql="SELECT * FROM tbpesan INNER JOIN tbtransaksi ON tbpesan.id_transaksi=tbtransaksi.id_transaksi INNER JOIN tbbarang ON tbpesan.id_barang=tbbarang.id_barang WHERE tbpesan.id_transaksi='$ID' ORDER BY id_pesan ASC;";
    $query = mysqli_query($conn, $sql);

    $row= mysqli_fetch_array($query);
    
    $jml_pesan=$row['jml_pesan'];
    return $jml_pesan;
}

function caristok($ID, $conn){
    $sql="SELECT * FROM tbpesan INNER JOIN tbtransaksi ON tbpesan.id_transaksi=tbtransaksi.id_transaksi INNER JOIN tbbarang ON tbpesan.id_barang=tbbarang.id_barang WHERE tbpesan.id_transaksi='$ID' ORDER BY id_pesan ASC;";
    $query = mysqli_query($conn, $sql);

    $row= mysqli_fetch_array($query);
    
    $stok=$row['stok'];
    return $stok;
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
$stok=caristok($ID, $conn);

$grandtotal = $row['grand_total'];
$jml_pesan = $stok+$jml_barang;


if ($jml_bayar<$grandtotal){
    echo "<script>alert('Jumlah yang dibayarkan tidak cukup, Masukkan jumlah yang benar !'); location.href='index.php?m=pelunasan&ID=$ID';</script>";
} elseif ($jml_bayar=$grandtotal){
    $sql = "INSERT INTO tbbayar (id_transaksi2,tgl_pembayaran,jml_bayar,status_pembayaran) VALUES ('$ID',NOW(),'$jml_bayar','Lunas')";
    $sql2 = "UPDATE tbtransaksi SET status_transaksi=('Sukses') WHERE id_transaksi='$ID'";
    $sql3 = "UPDATE tbbarang SET stok=('$jml_pesan') WHERE id_barang='$id_barang' AND id_transaksi='$ID'";
    $sqlinsert="INSERT INTO tbjurnalkeluar (tgl_keluar,keterangan_keluar,no_bukti_keluar,kas_keluar,potongan_keluar,pembelian,hutang_dg,rek_keluar,jumlah_keluar,id_supplier)
    VALUES (NOW(),'Beli Barang Dari Supplier','$notrans','$subtotal','$diskon','$subtotal','0','0',$grandtotal,'$idsupp');";
    mysqli_query($conn, $sql);
    mysqli_query($conn, $sql2);
    mysqli_query($conn, $sql3);
    mysqli_query($conn, $sqlinsert);
    echo "<script>alert('Pembayaran Sukses'); location.href='cetakcek.php?ID=$ID&jb=$jml_bayar';</script>";
}
?>
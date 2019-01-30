<!-- pr buat kurang tambah stok -->
<?php
include 'database/config.php';

$ID=$_GET['ID'];
function caristokbarang($ID, $conn){
    $sql = "SELECT * FROM tbpesan INNER JOIN tbtransaksi ON tbpesan.id_transaksi=tbtransaksi.id_transaksi INNER JOIN tbbarang ON tbpesan.id_barang=tbbarang.id_barang WHERE tbpesan.id_transaksi='$ID' ORDER BY id_pesan ASC";
    $query= mysqli_query($conn, $sql);
    $data = mysqli_fetch_array($query);
    $stok = $data['stok'];
    return $stok;
}
function carijmlpesan($ID, $conn){
    $sql = "SELECT * FROM tbpesan INNER JOIN tbtransaksi ON tbpesan.id_transaksi=tbtransaksi.id_transaksi INNER JOIN tbbarang ON tbpesan.id_barang=tbbarang.id_barang WHERE tbpesan.id_transaksi='$ID' ORDER BY id_pesan ASC";
    $query= mysqli_query($conn, $sql);
    $data = mysqli_fetch_array($query);
    $jml = $data['jml_pesan'];
    return $jml;
}

function carisubtotal($ID, $conn){
$querysum = mysqli_query($conn, "SELECT SUM(total_pesan) AS total_pesan FROM tbpesan INNER JOIN tbtransaksi ON tbpesan.id_transaksi=tbtransaksi.id_transaksi WHERE tbtransaksi.id_transaksi='$ID';");
$rowsum = mysqli_fetch_array($querysum);
$subtotal = $rowsum['total_pesan'];
return $subtotal;
}

function caridiskon($ID, $conn){
    $sql = "SELECT * FROM tbtransaksi WHERE id_transaksi='$ID'";
    $query = mysqli_query($conn, $sql);
    $row = mysqli_fetch_array($query);
    $diskon= $row['potongan'];
    return $diskon;
    }

$diskon=caridiskon($ID,$conn);
$subtotal=carisubtotal($ID,$conn);
$stoknow=caristokbarang($ID, $conn);
$jmlpesan=carijmlpesan($ID, $conn);
$stokbaru = $stoknow + $jmlpesan;

$grandtotal=$subtotal-($subtotal*$diskon/100);

$sql = "UPDATE tbtransaksi SET status_transaksi=('Terkirim'), sub_total=('$subtotal'), grand_total=('$grandtotal'), tgl_kirim=(NOW()) WHERE id_transaksi='$ID';";
// $sql2 = "UPDATE tbbarang SET stok=('$stokbaru') WHERE id_transaksi='$ID';";
// echo $sql2;

mysqli_query($conn, $sql);

echo "<script>alert('Barang Terkirim, Silahkan Cetak Nota dan Kirim Ke Perusahaan Terkait'); location.href='index.php?m=conf3&ID=$ID';</script>";
?>
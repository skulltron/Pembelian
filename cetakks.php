<?php
include 'database/config.php';

$ID=$_GET['ID'];
$sql = "SELECT * FROM tbtransaksi WHERE id_transaksi='$ID'";

function caristokbarang($ID, $conn){
  $sql = "SELECT * FROM tbpesan INNER JOIN tbtransaksi ON tbpesan.id_transaksi=tbtransaksi.id_transaksi INNER JOIN tbbarang ON tbpesan.id_barang=tbbarang.id_barang WHERE tbpesan.id_transaksi='$ID' ORDER BY id_pesan ASC";
  $query= mysqli_query($conn, $sql);
  $data = mysqli_fetch_array($query);
  $stok = $data['stok'];
  return $stok;
}


$query = mysqli_query($conn, $sql);
$row1 = mysqli_fetch_array($query);
$diskon= $row1['potongan'];
$stoknow=caristokbarang($ID, $conn);

?>
<style type="text/css">
.tg  {border-collapse:collapse;border-spacing:0;}
.tg td{font-family:Arial, sans-serif;font-size:14px;padding:10px 5px;border-style:solid;border-width:1px;overflow:hidden;word-break:normal;border-color:black;}
.tg th{font-family:Arial, sans-serif;font-size:14px;font-weight:normal;padding:10px 5px;border-style:solid;border-width:1px;overflow:hidden;word-break:normal;border-color:black;}
.tg .tg-baqh{text-align:center;vertical-align:top}
.tg .tg-0lax{text-align:left;vertical-align:top}
@media print {
  #printPageButton {
    display: none;
  }
}
</style>
<?php 
    $no = 1;
    $sql = "SELECT * FROM tbpesan INNER JOIN tbtransaksi ON tbpesan.id_transaksi=tbtransaksi.id_transaksi INNER JOIN tbbarang ON tbpesan.id_barang=tbbarang.id_barang WHERE tbpesan.id_transaksi='$ID' ORDER BY id_pesan ASC";

    $sqlsum = "SELECT SUM(total_pesan) AS total_pesan FROM tbpesan INNER JOIN tbtransaksi ON tbpesan.id_transaksi=tbtransaksi.id_transaksi WHERE tbtransaksi.id_transaksi='$ID';";
    $querysum = mysqli_query($conn, $sqlsum);

    $rowsum= mysqli_fetch_array($querysum);

    $subtotal = $rowsum['total_pesan'];
    $grandtotal=$subtotal-($subtotal*$diskon/100);

    $query=mysqli_query($conn, $sql);
    while($row=mysqli_fetch_array($query)){
    ?>
<center><table width="65%" class="tg"></center>
  <tr>
    <th class="tg-0lax" colspan="5"><p style="text-align: center;">Kartu Persediaan Stok
      <br>Bulan : Desember 2016</p>
      <p><br>Nama Barang : <?php echo $row['nama_barang']?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Gudang : <?php echo $row1['gudang_from']?></p>
      <p><br>Kode Barang : <?php echo $row['kd_barang']?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Min : -</p>
    </th>
  </tr>
  <tr>
    <td class="tg-baqh" rowspan="2">Tanggal</td>
    <td class="tg-baqh" rowspan="2">Keterangan</td>
    <td class="tg-baqh">Masuk</td>
    <td class="tg-baqh">Keluar</td>
    <td class="tg-baqh">Sisa</td>
  </tr>
  <tr>
    <td class="tg-baqh">Q</td>
    <td class="tg-baqh">Q</td>
    <td class="tg-baqh">Q</td>
  </tr>
  <tr>
    <td class="tg-0lax"><?php echo $row['tgl_kirim']?></td>
    <td class="tg-0lax"><?php echo $row['penjelasan']?></td>
    <td class="tg-0lax"><?php echo $row['jml_pesan']?></td>
    <td class="tg-0lax"></td>
    <td class="tg-0lax"><?php echo $row['jml_pesan'] + $stoknow?></td>
  </tr>
  <tr>
    <td class="tg-0lax"></td>
    <td class="tg-0lax"></td>
    <td class="tg-0lax"></td>
    <td class="tg-0lax"></td>
    <td class="tg-0lax"></td>
  </tr>
</table><br>
    <?php } ?>
    
<button style="height: 40px; width: 70px" id="printPageButton" onClick="window.print()">Print</button>
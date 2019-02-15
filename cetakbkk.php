<?php
include 'database/config.php';

$ID=$_GET['ID'];
$sql = "SELECT * FROM tbtransaksi INNER JOIN tbsupplier ON tbtransaksi.id_supplier=tbsupplier.id_supplier WHERE id_transaksi='$ID'";


$query = mysqli_query($conn, $sql);
$row1 = mysqli_fetch_array($query);
$tgl=$row1['tgl_kirim'];
$diskon= $row1['potongan'];
$nobkk = rand(111111, 999999);
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
 <center><table width="85%" class="tg"></center>
  <tr>
    <th class="tg-baqh" colspan="5">Bukti Kas Keluar
      <p>No BKK : <?php echo $nobkk?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Tanggal : <?php echo date_format( new DateTime($row1['tgl_kirim']), 'd M Y')?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</p>
      <p>Dibayar Kepada : <?php echo $row1['nama_supplier']?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Lampiran : 2&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</p></th>
  </tr>
  <tr>
    <td class="tg-baqh">No. Perkiraan</td>
    <td class="tg-baqh" colspan="3">Uraian</td>
    <td class="tg-baqh">Jumlah</td>
  </tr>
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
  <tr>
    <td class="tg-0lax"><?php echo $no++?></td>
    <td class="tg-0lax" colspan="3">Membeli <?php echo $row['nama_barang']?> @ <?php echo $row['jml_pesan']?> Unit</td>
    <td class="tg-0lax">Rp. <?php echo number_format(($row['total_pesan']),0,'.','.')?></td>
  </tr>
    <?php } ?>
  <tr>
    <td class="tg-0lax"></td>
    <td class="tg-0lax" colspan="3">Ch. / B.G No : <?php echo $row1['no_transaksi']?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Jumlah : <?php echo mysqli_num_rows($query)?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
    <td class="tg-0lax">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Rp: <?php echo number_format(($row1['grand_total']),0,'.','.')?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
  </tr>
  <tr style="height: 75px">
    <td class="tg-0lax">Pembukuan :</td>
    <td class="tg-0lax">Mengetahui :</td>
    <td class="tg-0lax">Menyetujui :</td>
    <td class="tg-0lax">Kasir :</td>
    <td class="tg-0lax">Penyetor : </td>
  </tr>
</table>
<br>
<button style="height: 40px; width: 70px" id="printPageButton" onClick="window.print()">Print</button>
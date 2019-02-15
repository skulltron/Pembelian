<?php
include 'database/config.php';

$ID=$_GET['ID'];
$sql = "SELECT * FROM tbtransaksi WHERE id_transaksi='$ID'";


$query = mysqli_query($conn, $sql);
$row1 = mysqli_fetch_array($query);
$tgl=$row1['tgl_kirim'];
$diskon= $row1['potongan'];
?>

<style type="text/css">
.tg  {border-collapse:collapse;border-spacing:0;}
.tg td{font-family:Arial, sans-serif;font-size:14px;padding:10px 5px;border-style:solid;border-width:1px;overflow:hidden;word-break:normal;border-color:black;}
.tg th{font-family:Arial, sans-serif;font-size:14px;font-weight:normal;padding:10px 5px;border-style:solid;border-width:1px;overflow:hidden;word-break:normal;border-color:black;}
.tg .tg-baqh{text-align:center;vertical-align:top}
.tg .tg-lqy6{text-align:right;vertical-align:top}
.tg .tg-0lax{text-align:left;vertical-align:top}

@media print {
  #printPageButton {
    display: none;
  }
}
</style>
<center><table width="95%" class="tg"></center>
  <tr>
    <th class="tg-0lax" colspan="7">PT. SUZUKI PUTRA<br>Jl. Basuki Rahmad 01<br>SURABAYA
      <p style="text-align: center;"><h1 align="center">NOTA</h1></p>
      <b><p style="text-align: left; margin-left: 80%">Surabaya, <?php echo date_format( new DateTime($row1['tgl_kirim']), 'd M Y');?></p></b>
      <p style="text-align: left; margin-left: 80%">No : <?php echo $row1['no_transaksi'];?></p>
      <p style="text-align: left; margin-left: 80%">Jatuh Tempo : -</p>
  </tr>
  <tr>
    <td class="tg-baqh" rowspan="2" style="width: 2%">NO</td>
    <td class="tg-baqh" rowspan="2" style="width: 10%">KODE BARANG</td>
    <td class="tg-baqh" colspan="2">NAMA BARANG</td>
    <td class="tg-baqh" rowspan="2" style="width: 5%">SATUAN</td>
    <td class="tg-baqh" rowspan="2" style="width: 25%">HARGA SATUAN</td>
    <td class="tg-baqh" rowspan="2">TOTAL</td>
  </tr>
  <tr>
    <td class="tg-baqh" style="width: 10%">MEREK</td>
    <td class="tg-baqh" style="width: 20%">TIPE</td>
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
    <td class="tg-0lax"><?php echo $no++ ?></td>
    <td class="tg-0lax"><?php echo $row['kd_barang'] ?></td>
    <td class="tg-0lax"><?php echo $row['nama_tipe'] ?></td>
    <td class="tg-0lax"><?php echo $row['nama_barang'] ?></td>
    <td class="tg-0lax">Unit</td>
    <td class="tg-0lax">Rp. <?php echo number_format(($row['harga_beli']),0,'.','.') ?></td>
    <td class="tg-0lax">Rp. <?php echo number_format(($row['total_pesan']),0,'.','.') ?></td>
  </tr>
  <?php } ?>
  <tr>
    <td class="tg-lqy6" colspan="6">SUBTOTAL :</td>
    <td class="tg-0lax">Rp. <?php echo number_format(($subtotal),0,'.','.')?></td>
  </tr>
  <tr>
    <td class="tg-lqy6" colspan="6">POTONGAN :</td>
    <td class="tg-0lax"><?php echo $row1['potongan'] ?> %</td>
  </tr>
  <tr>
    <td class="tg-lqy6" colspan="6">GRAND TOTAL :</td>
    <td class="tg-0lax">Rp. <?php echo number_format(($grandtotal),0,'.','.') ?></td>
  </tr>
  <tr>
    <td class="tg-0lax"></td>
    <td class="tg-baqh">Dicatat Dalam Buku Pembantu</td>
    <td class="tg-baqh">Dicatat Dalam Jurnal</td>
    <td class="tg-baqh">Diserahkan</td>
    <td class="tg-baqh" colspan="2">Diterima Pelanggan</td>
    <td class="tg-baqh" rowspan="3">Hormat Kami,<br><br><br><br><br>Kabag,Penjualan</td>
  </tr>
  <tr>
    <td class="tg-baqh">Tanggal</td>
    <td class="tg-baqh"><?php echo date_format( new DateTime($row1['tgl_kirim']), 'd M Y');?></td>
    <td class="tg-baqh"><?php echo date_format( new DateTime($row1['tgl_kirim']), 'd M Y');?></td>
    <td class="tg-baqh"><?php echo date_format( new DateTime($row1['tgl_kirim']), 'd M Y');?></td>
    <td class="tg-baqh" colspan="2"><?php echo date_format( new DateTime($row1['tgl_kirim']), 'd M Y');?></td>
  </tr>
  <tr>
    <td class="tg-baqh">Tanda Tangan</td>
    <td class="tg-baqh"></td>
    <td class="tg-baqh"></td>
    <td class="tg-baqh"></td>
    <td class="tg-baqh" colspan="2"></td>
  </tr>
</table>
<br>
<button style="height: 40px; width: 70px" id="printPageButton" onClick="window.print()">Print</button>
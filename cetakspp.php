<?php
include 'database/config.php';

$ID=$_GET['ID'];
$sql = "SELECT * FROM tbtransaksi WHERE id_transaksi='$ID'";


$query = mysqli_query($conn, $sql);
$row1 = mysqli_fetch_array($query);
$diskon= $row1['potongan'];
?>
<style type="text/css">
.tg  {border-collapse:collapse;border-spacing:0;font-family: 'Times New Roman', Times, serif}
.tg td{font-family:Arial, sans-serif;font-size:14px;padding:10px 5px;border-style:solid;border-width:1px;overflow:hidden;word-break:normal;border-color:black;}
.tg th{font-family:Arial, sans-serif;font-size:14px;font-weight:normal;padding:10px 5px;border-style:solid;border-width:1px;overflow:hidden;word-break:normal;border-color:black;}
.tg .tg-c3ow{border-color:inherit;text-align:center;vertical-align:top}
.tg .tg-c3ow2{border-color:inherit;text-align:center;vertical-align:top}
.tg .tg-0pky{border-color:inherit;text-align:left;vertical-align:top}
.tg .tg-0lax{text-align:left;vertical-align:top}

@media print {
  #printPageButton {
    display: none;
  }
}
</style>
<center><table width="95%" class="tg" style="border-collapse: collapse;font-family: 'Times New Roman', Times, serif"></center>
  <tr>
    <th class="tg-c3ow" colspan="6"><h1>SURAT PERMINTAAN PEMBELIAN</h1><p align="left" style="margin-left: 80%">NO SPP: <?php echo $row1['no_transaksi'];?></p><p align="left" style="margin-left: 80%">Tanggal: <?php echo $row1['tgl_transaksi']?></p></th>
  </tr>
  <tr style="border-top: 0">
    <td class="tg-c3ow" colspan="6">
      <p align="left">Gunakan formulir yang berbeda untuk setiap barang yang saudara minta</p>
      <p align="left">Dari Bagian : Gudang &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Digunakan untuk : Produksi</p>
      <p align="left">Sifat Permintaan :&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Biasa⬜&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Segera⬜&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Mendesak⬜</p>
    </td>
  </tr>
  <tr>
    <td class="tg-c3ow" style="width: 10%">KUANTITAS</td>
    <td class="tg-c3ow" style="width: 8%">KODE</td>
    <td class="tg-c3ow">NAMA BARANG</td>
    <td class="tg-c3ow" style="width: 20%">UKURAN</td>
    <td class="tg-c3ow" colspan="2">PENJELASAN LENGKAP</td>
  </tr>
  <?php 
    $no = 1;
    $sql = "SELECT * FROM tbpesan INNER JOIN tbtransaksi ON tbpesan.id_transaksi=tbtransaksi.id_transaksi INNER JOIN tbbarang ON tbpesan.id_barang=tbbarang.id_barang WHERE tbpesan.id_transaksi='$ID' ORDER BY id_pesan ASC";
    $query=mysqli_query($conn, $sql);
    while($row=mysqli_fetch_array($query)){
    ?>
  <tr>
    <td class="tg-c3ow"><?php echo $row['jml_pesan'];?></td>
    <td class="tg-c3ow"><?php echo $row['kd_barang'];?></td>
    <td class="tg-c3ow"><?php echo $row['nama_barang'];?></td>
    <td class="tg-c3ow"><?php echo $row['ukuran'];?></td>
    <td class="tg-c3ow" colspan="2"><?php echo $row['penjelasan'];?></td>
  </tr>
    <?php } ?>
  <tr>
    <td class="tg-0pky" colspan="2" rowspan="5">Kirim ke : <u>Gudang</u><br><br>Bebankan ke dept : <u>Pembelian</u> No REK: <u>500</u><br><br>Tgl Diperlukan :<br><br>Diperlukan Oleh : Gudang <br><br>Disetujui Oleh : <u>Bag. Pembelian</u></td>
    <td class="tg-c3ow" colspan="4">Diisi Oleh Bagian Pembelian :</td>
  </tr>
  <tr>
    <td class="tg-c3ow">Pemasok</td>
    <td class="tg-c3ow">Harga@Unit</td>
    <td class="tg-c3ow">Total Harga</td>
    <td class="tg-c3ow">No.SOP</td>
  </tr>
  <tr>
    <td class="tg-c3ow"></td>
    <td class="tg-c3ow"></td>
    <td class="tg-c3ow"></td>
    <td class="tg-c3ow"></td>
  </tr>
  <tr>
    <td class="tg-0lax"></td>
    <td class="tg-0lax"></td>
    <td class="tg-0lax"></td>
    <td class="tg-0lax"></td>
  </tr>
  <tr>
    <td class="tg-0lax"></td>
    <td class="tg-0lax"></td>
    <td class="tg-0lax"></td>
    <td class="tg-0lax"></td>
  </tr>
</table>
<br>
<button style="height: 40px; width: 70px" id="printPageButton" onClick="window.print()">Print</button>
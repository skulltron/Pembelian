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
.tg .tg-0lax{text-align:left;vertical-align:top}
@media print {
  #printPageButton {
    display: none;
  }
}
</style>
<center><table width="65%" class="tg"></center>
  <tr>
    <th class="tg-0lax" colspan="5">PT. WEARNES<br>JL. JAKARTA 34<br>MALANG<br><br>
      <p style="text-align: center;">LAPORAN PENERIMAAN BARANG</p>                 &nbsp;&nbsp;<br><br>                         <br><br>BARANG DITERIMA MELALUI : TRUCK CONTAINER  NO : L 7809 EI                       TANGGAL : 20 DESEMBER 2016<br><br>NAMA PENGEMUDI : LATIF<br><br>NAMA PERUSAHAAN PENGIRIM : PT SUZUKI PUTRA 01 SURABAYA<br><br></th>
  </tr>
  <tr>
    <td class="tg-0lax" rowspan="2">KUANTITAS</td>
    <td class="tg-0lax" colspan="2">NAMA BARANG</td>
    <td class="tg-0lax" rowspan="2">PENJELASAN LENGKAP TENTANG  BARANG, MERK, MUTU, DLL</td>
    <td class="tg-0lax" rowspan="2">KONDISI PADA SAAT DITERIMA</td>
  </tr>
  <tr>
    <td class="tg-0lax">MERK</td>
    <td class="tg-0lax">TIPE</td>
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
    <td class="tg-0lax"><?php echo $row['jml_pesan']?></td>
    <td class="tg-0lax"><?php echo $row['nama_tipe']?></td>
    <td class="tg-0lax"><?php echo $row['nama_barang']?></td>
    <td class="tg-0lax">Bagus, Rapi, Bersih</td>
    <td class="tg-0lax">Baik</td>
  </tr>
    <?php } ?>
  <tr>
    <td class="tg-0lax" colspan="3">DIPERIKSA OLEH :</td>
    <td class="tg-0lax" colspan="2">DITERIMA OLEH :</td>
  </tr>
</table>
<br>
<button style="height: 40px; width: 70px" id="printPageButton" onClick="window.print()">Print</button>
<?php
include 'database/config.php';

$ID=$_GET['ID'];
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
    <th class="tg-baqh" colspan="5">Bukti Kas Masuk
      <p>No BKM : <?php echo $nobkm=rand (111111, 999999)?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Tanggal : <?php echo date_format( new DateTime($row1['tgl_retur']), 'd M Y')?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</p>
      <p>Diterima Dari : PT Suzuki Putra&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Lampiran : 1&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</p></th>
  </tr>
  <tr>
    <td class="tg-baqh">No. Perkiraan</td>
    <td class="tg-baqh" colspan="3">Uraian</td>
    <td class="tg-baqh">Jumlah</td>
  </tr>
  <?php
                $no = 1;
                $sql = "SELECT * FROM tbreturdetail INNER JOIN tbbarang ON tbreturdetail.id_barang=tbbarang.id_barang INNER JOIN tbretur ON tbretur.id_retur=tbreturdetail.id_retur WHERE tbreturdetail.id_retur='$ID'";
                $query=mysqli_query($conn, $sql);
                while($row=mysqli_fetch_array($query)){?>
  <tr>
    <td class="tg-0lax"><?php echo $no++ ?></td>
    <td class="tg-0lax" colspan="3"><?php echo $row['nama_barang']?></td>
    <td class="tg-0lax">Rp. 
    <?php
    $totalretur=$row['harga_beli']*$row['jml_returbarang'];
    $gtotalretur=0;
    $tgtotal+=$totalretur;

    $tglretur=$row['tgl_retur'];
    $ketretur=$row['keterangan_retur'];
    echo number_format(($totalretur),0,'.','.');

    $sqlinsert="INSERT INTO tbjurnal (tgl_terima,keterangan,no_bukti,kas,potongan,penjualan,piutang_dg,rek,jumlah)
    VALUES ('$tglretur','Retur barang ($ketretur)','$nobkm','$totalretur','0','$totalretur','0','0','0');";
    $queryinsert = mysqli_query($conn, $sqlinsert);
    ?>

    </td>
  </tr>
  <?php } ?>
  <tr>
    <td class="tg-0lax"></td>
    <td class="tg-0lax" colspan="3">Ch. / B.G No : - &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Jumlah : <?php echo mysqli_num_rows($query)?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
    <td class="tg-0lax">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Rp: <?php echo number_format(($tgtotal),0,'.','.')?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
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
<button style="height: 40px; width: 100px" id="printPageButton" onClick="window.location.href='index.php?m=jurnal'">Ke Jurnal Kas Masuk</button>
<?php
include 'database/config.php';

$ID=$_GET['ID'];
$queryupdate=mysqli_query($conn, "UPDATE tbretur SET status_retur=('Terkirim') WHERE id_retur='$ID'");

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
<center><table width="65%" class="tg"></center>
  <tr>
    <th class="tg-0lax" colspan="3">PT. WEARNES&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Surabaya, <?php echo date_format( new DateTime($row1['tgl_retur']), 'd M Y')?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<br>Jl. Jakarta No 34<br>SURABAYA<br><br><br><br>SURAT JALAN No :1120<br>Dengan Kendaraan Pick Up No : N 77943 AB, Kami akan kirim Barang-barang tersebut dibawah Ini:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</th>
  </tr>
  <tr>
    <td class="tg-baqh" style="width: 10%">Banyaknya</td>
    <td class="tg-baqh" colspan="2">Nama Barang</td>
  </tr>
  <?php
                $no = 1;
                $sql = "SELECT * FROM tbreturdetail INNER JOIN tbbarang ON tbreturdetail.id_barang=tbbarang.id_barang INNER JOIN tbretur ON tbretur.id_retur=tbreturdetail.id_retur WHERE tbreturdetail.id_retur='$ID'";
                $query=mysqli_query($conn, $sql);
                while($row=mysqli_fetch_array($query)){?>
  <tr>
    <td class="tg-baqh"><?php echo $row['jml_returbarang']?> Unit</td>
    <td class="tg-baqh" style="width: 20%"><?php echo $row['kd_barang']?></td>
    <td class="tg-baqh"><?php echo $row['nama_barang']?></td>
  </tr>
    <?php }?>
  <tr>
    <td class="tg-baqh">Tanda Terima</td>
    <td class="tg-baqh">Sopir<br><br><br><br></td>
    <td class="tg-baqh">Hormat Kami,<br><br><br><br><br></td>
  </tr>
</table>
<br>
<button style="height: 40px; width: 70px" id="printPageButton" onClick="window.print()">Print</button>
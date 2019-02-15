<?php
include 'database/config.php';

$ID=$_GET['ID'];
$jb=$_GET['jb'];
$sql = "SELECT * FROM tbtransaksi INNER JOIN tbsupplier ON tbtransaksi.id_supplier=tbsupplier.id_supplier WHERE id_transaksi='$ID'";


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
<center><table width="75%" class="tg"></center> 
  <tr>
    <th class="tg-0lax">E BANK EKSEKUTIF
    	<p style="text-align: right; margin-right: 50px">CEK No. CA 121202</p>
    	<p>Cabang Surabaya</p>
    	<br><br><u><p>Atas Penyerahan Cek ini Bayarlah Kepada</p></u><p style="margin-top: -10px; font-size: 10px">Pay Against this cheque to the order of</p>
    	<br><u><p>Uang Sejumlah Rp.</p></u><p style="margin-top: -10px; font-size: 10px">The sum of</p>
    	<br><p style="text-align: right;margin-right: 250px">Rp.</p>
    	<u><p style="text-align: right;margin-right: 60px">Tanda Tangan &amp; Cap Perusahaan</p></u><p style="margin-top: -10px; font-size: 10px;text-align: right;margin-right: 10%">Signature & stamp</p>&nbsp;&nbsp;&nbsp;&nbsp;<br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<br><br><u><p>Jangan Menulis Melewati Garis Ini</p></u><p style="margin-top: -10px; font-size: 10px">Do not write below this line</p>
    	<br><br><br><p style="text-align: right;">".091.605".558"";2000||0328.00</p></th>
  </tr>
</table>
<br>
<button style="height: 40px; width: 70px" id="printPageButton" onClick="window.print()">Print</button>
<button style="height: 40px; width: 70px" onclick="window.location.href='index.php?m=conf2&ID=<?php echo $ID?>'">Kembali</button>

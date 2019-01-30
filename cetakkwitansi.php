<?php
include 'database/config.php';

$ID=$_GET['ID'];
$sql = "SELECT * FROM tbretur WHERE id_retur='$ID';";
$query = mysqli_query($conn, $sql);
$row = mysqli_fetch_array($query);
?>
<style>
    .box {
        background-color: white;
        height: 20px;
        width: 150px;
        border: 1px solid black;
        padding: 10px;
        vertical-align: middle;
        display: inline-block;
     }
     .parallelogram {
        width: 150px;
        height: 20px;
        transform: skew(-50deg);
        background-color: white;
        border: 1px solid black;
        padding: 10px;
        vertical-align: middle;
        display: inline-block;
    }
    @media print {
        #printPageButton {
            display: none;
        }
        }
</style>
<table style="width: 80%;" border="1" align="center">
<tbody>
<tr style="height: 188.8px;">
<td style="height: 188.8px; width: 18.752%; padding: 10px">
<p>No. <?php echo rand(111111, 999999)?></p>
<p><b>Sudah terima dari :</b></p>
<p>&nbsp;</p>
<hr sty>
<p><b>Banyaknya uang :</b></p>
<span>Rp. </span><span><div class="box"></div></span>
<p><b>Untuk pembayaran :</b></p>
<p>&nbsp;</p>
<p>&nbsp;</p>
<hr>
<p>Malang, <?php echo date_format( new DateTime($row1['tgl_retur']), 'd M Y')?></p>
</td>
<td style="height: 188.8px; width: 80.248%; padding: 10px">
<div class="box">Kwitansi No.</div>
<p>Sudah terima dari :</p>
<span>Banyaknya Uang </span><span><div class="box" style="width: 85%"></div></span>
<p>Untuk Pembayaran :</p>
<p>&nbsp;</p>
<p>&nbsp;</p>
<p style="margin-left: 80%">Malang, <?php echo date_format( new DateTime($row1['tgl_retur']), 'd M Y')?></p>
<p>&nbsp;</p>
<span> Rp. : &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span><span><div class="parallelogram"></div></div></span><span style="margin-left: 60%">Bag.Keuangan</span>
</td>
</tr>
</tbody>
</table>
<p>&nbsp;</p>
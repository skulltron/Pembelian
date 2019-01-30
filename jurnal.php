<style type="text/css">
.tg  {border-collapse:collapse;border-spacing:0;}
.tg td{font-family:Arial, sans-serif;font-size:14px;padding:10px 5px;border-style:solid;border-width:1px;overflow:hidden;word-break:normal;border-color:black;}
.tg th{font-family:Arial, sans-serif;font-size:14px;font-weight:normal;padding:10px 5px;border-style:solid;border-width:1px;overflow:hidden;word-break:normal;border-color:black;}
.tg .tg-c3ow{border-color:inherit;text-align:center;vertical-align:top}
.tg .tg-uys7{border-color:inherit;text-align:center}
.tg .tg-0pky{border-color:inherit;text-align:left;vertical-align:top}
@media print {
  #printPageButton {
    display: none;
  }
}
</style>
<?php 
include 'database/config.php';
$q = $_GET['q'];
?>
<br><br><br>
<br>
<div class="panel panel-primary">
    <div class="panel-heading"><h3>Jurnal Penerimaan Kas</h3><h5>Berikut Adalah Daftar Kas Masuk Bulan Desember 2016</h5><h5>(Khusus Bagian Keuangan)</h5></div>
    <div class="panel-body">

        <div>
        <form class="form-inline">
                <input type="hidden" name="m" value="jurnal">
                <input class="form-control" style="color: black; width: 20%;" type="text" name="q" size="30" value="<?php echo $q?>" placeholder="Masukkan No. Transaksi"> <button class="btn btn-primary"><span class="glyphicon glyphicon-search"></span> Cari</button>
        </form>
        <br>

        <div class="panel-body">
        <table class="tg" style="undefined;table-layout: fixed; width: 953px" align="center">
<colgroup>
<col style="width: 30.2px">
<col style="width: 100.2px">
<col style="width: 141.2px">
<col style="width: 71.2px">
<col style="width: 121.2px">
<col style="width: 118.2px">
<col style="width: 116.2px">
<col style="width: 121.2px">
<col style="width: 116.2px">
<col style="width: 111px">
</colgroup>
  <tr>
    <th class="tg-c3ow" colspan="10"><h1>JURNAL PENERIMAAN KAS</h1><h3>Bulan : Desember 2016</h3></th>
  </tr>
  <tr>
    <th class="tg-c3ow" rowspan="3">No.</th>
    <th class="tg-c3ow" rowspan="3">Tgl</th>
    <th class="tg-c3ow" rowspan="3">Keterangan<br></th>
    <th class="tg-c3ow" rowspan="3">NO. Bukti</th>
    <th class="tg-uys7" colspan="2">DEBET</th>
    <th class="tg-uys7" colspan="4">KREDIT</th>
  </tr>
  <tr>
    <td class="tg-c3ow" rowspan="2">Kas</td>
    <td class="tg-c3ow" rowspan="2">Pot. Penj</td>
    <td class="tg-c3ow" rowspan="2">Penjualan</td>
    <td class="tg-c3ow" rowspan="2">Piutang Dg.</td>
    <td class="tg-c3ow" colspan="2">Lain- Lain</td>
  </tr>
  <tr>
    <td class="tg-uys7">Rek</td>
    <td class="tg-uys7">Jumlah</td>
  </tr>
  <?php
    $no=1;
    if($q==""){
        $sql="SELECT * FROM tbjurnal";
    }else{
        $sql="SELECT * FROM tbjurnal WHERE no_bukti LIKE '%q%'";
    }
    $query=mysqli_query($conn, $sql);
    while($row=mysqli_fetch_array($query)){
  ?>
  <tr>
    <td class="tg-0pky"><?php echo $no++?></td>
    <td class="tg-0pky"><?php echo $row['tgl_terima']?></td>
    <td class="tg-0pky"><?php echo $row['keterangan']?></td>
    <td class="tg-0pky"><?php echo $row['no_bukti']?></td>
    <td class="tg-0pky">Rp. <?php echo number_format(($row['kas']),0,'.','.')?></td>
    <td class="tg-0pky"><?php echo $row['potongan']?></td>
    <td class="tg-0pky">Rp. <?php echo number_format(($row['penjualan']),0,'.','.')?></td>
    <td class="tg-0pky"><?php echo $row['piutang_dg']?></td>
    <td class="tg-0pky"><?php echo $row['rek']?></td>
    <td class="tg-0pky"><?php echo $row['jumlah']?></td>
  </tr>
    <?php } ?>
</table>
        </div>
        <br>
<button style="height: 40px; width: 70px" id="printPageButton" onClick="window.print()">Print</button>
</div>
</div>

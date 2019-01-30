<?php 

$ID=$_GET['ID'];
$sql = "SELECT * FROM tbtransaksi WHERE id_transaksi='$ID'";


$query = mysqli_query($conn, $sql);
$row1 = mysqli_fetch_array($query);
$diskon= $row1['potongan'];
?>
<br><br><br>
<h1>Detail Pesanan</h1>
<h4>Anda di Pesanan No. : <?php echo $row1 ['no_transaksi']?></h4>
<br>
<div class="panel panel-default">
    <div class="panel-heading">
<h2>Barang dalam Pesanan ini :</h2>
</div>
<div class="panel-body">
<table class="table table-responsive" border="1">
    <tr>
        <th>Nomor</th>
        <th>Nama Barang</th>
        <th>Jumlah Pesan</th>
        <th>Tanggal Pesan</th>
        <th>Harga Per Unit</th>
        <th>Total</th>
        <th>Keterangan</th>
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
        <td>
            <?php echo $no++?>
        </td>
        <td>
            <?php echo $row ['nama_barang']?>
        </td>
        <td>
            <?php echo $row ['jml_pesan']?>
        </td>
        <td>
            <?php echo $row ['tgl_pesan']?>
        </td>
        <td>
            Rp. <?php echo number_format(($row ['harga_beli']),0,'.','.')?>
        </td>
        <td>
            Rp. <?php echo number_format(($row ['total_pesan']),0,'.','.')?>
        </td>
        <td>
            <?php echo $row ['penjelasan']?>
        </td>
    </tr>
    <?php } ?>
    <tr>
        <td colspan="5"><h5>Subtotal</h5></td>
        <td colspan="2">Rp. <?php echo number_format(($subtotal),0,'.','.')?></td>
    </tr>
    <tr>
        <td colspan="5"><h5>Potongan</h5></td>
        <td colspan="2"><?php echo $row1['potongan']?> %</td>
    </tr>
    <tr>
        <td colspan="5"><h3>Grand Total</h3></td>
        <td colspan="2">Rp. <?php echo number_format(($grandtotal),0,'.','.')?></td>
    </tr>
</table>
<h1>Status Transaksi Ini : <font color="yellow"><?php
    $sqlcheck="SELECT * FROM tbpesan INNER JOIN tbtransaksi ON tbpesan.id_transaksi=tbtransaksi.id_transaksi INNER JOIN tbbarang ON tbpesan.id_barang=tbbarang.id_barang INNER JOIN tbbayar ON tbbayar.id_transaksi=tbtransaksi.id_transaksi WHERE tbpesan.id_transaksi='$ID' ORDER BY id_pesan ASC";
    $querycheck=mysqli_query($conn, $sqlcheck);
    if (mysqli_num_rows($querycheck)>0){
        echo "<font color='green'>Lunas</font>";?>
        <a class="btn btn-default" href="cetakbkk.php?ID=<?php echo $ID?>">Cetak Bukti Kas Keluar Berdasarkan Transaksi Ini</a>
    <?php } else { echo "<font color='red'>Belum Lunas</font>";?> </font></h1>
<br /><p align="right">
<a class="btn btn-default disabled" href="">Cetak Bukti Kas Keluar</a><?php } ?>
<a class="btn btn-primary" href="index.php?m=pelunasan&ID=<?php echo $ID?>">Lunasi Pesanan</a></p>
</div>
</div>
<script>
let today = new Date().toISOString().substr(0, 10);
document.querySelector("#today").value = today;
</script>
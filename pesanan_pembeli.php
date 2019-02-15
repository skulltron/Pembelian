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
        <th>Keterangan</th>
    </tr>


    <?php 
    $no = 1;
    $subtotal=10000;
    $grandtotal=$subtotal-($subtotal*$diskon/100);
    $sql = "SELECT * FROM tbpesan INNER JOIN tbtransaksi ON tbpesan.id_transaksi=tbtransaksi.id_transaksi INNER JOIN tbbarang ON tbpesan.id_barang=tbbarang.id_barang WHERE tbpesan.id_transaksi='$ID' ORDER BY id_pesan ASC";
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
            <?php echo $row ['penjelasan']?>
        </td>
    </tr>
    <?php } ?>
</table>
<h1>Status Transaksi Ini : <?php
    if ($row1 ['status_transaksi']=="Di Supplier"){
        echo "Terkirim Ke Supplier";
    } elseif ($row1 ['status_transaksi']=="Di Pembelian"){
        echo "Siap Dikirim";
    } ?></font><?php
    if ($row1 ['tgl_konf']!=""){?>
        <h3>Pada Tanggal : <?php echo $row1 ['tgl_konf']?></h3>
    <?php } elseif ($row1 ['status_transaksi']=="Di Pembelian")?>

<br/><p align="right">
<?php if ($row1 ['status_transaksi']=="Di Pembelian"){ ?>
<a class="btn btn-default" onclick="return confirm('Pesanan ini akan dikirim ke Bagian Keuangan untuk dilakukan proses pembayaran, Anda yakin ingin mengkonfirmasi Pesanan Ini ?')" href="konfirmasitransaksi.php?ID=<?php echo $ID?>">Konfirmasi Pesanan</a>
<a class="btn btn-danger" onclick="return confirm('Anda yakin ingin menolak Pesanan Ini ?')" href="rejecttransaksi.php?ID=<?php echo $ID?>">Tolak Pesanan</a>
<?php } else { ?>
<a class="btn btn-default disabled" onclick="return confirm('Pesanan ini akan dikirim ke Bagian Keuangan untuk dilakukan proses pembayaran, Anda yakin ingin mengkonfirmasi Pesanan Ini ?')" href="konfirmasitransaksi.php?ID=<?php echo $ID?>">Konfirmasi Pesanan</a>
<a class="btn btn-danger disabled" onclick="return confirm('Anda yakin ingin menolak Pesanan Ini ?')" href="rejecttransaksi.php?ID=<?php echo $ID?>">Tolak Pesanan</a>
<?php } ?>
</div>
</div>
<script>
let today = new Date().toISOString().substr(0, 10);
document.querySelector("#today").value = today;
</script>
<?php
include 'database/config.php';
$ID=$_GET['ID'];

$sql = "SELECT * FROM tbtransaksi WHERE id_transaksi='$ID'";
$query1 = mysqli_query($conn, $sql);
$row1 = mysqli_fetch_array($query1);
$diskon= $row1['potongan'];
?>
<br><br><br>
<form method="POST" action="prosespelunasan.php?ID=<?php echo $ID?>">
    <div class="form-group">
        <label>No. Transaksi</label>
        <input class="form-control" type="text" name="no_transaksi" value="<?php echo $row1['no_transaksi'];?>" readonly></input>
    </div>
    <div class="form-group">
        <label>Detail Pesanan</label><br>
        <div class="container">
            <h5>Nama Barang :</h5>
            <ul>
            <?php 
                $sql = "SELECT * FROM tbpesan INNER JOIN tbtransaksi ON tbpesan.id_transaksi=tbtransaksi.id_transaksi INNER JOIN tbbarang ON tbpesan.id_barang=tbbarang.id_barang WHERE tbpesan.id_transaksi='$ID' ORDER BY id_pesan ASC";

                $sqlsum = "SELECT SUM(total_pesan) AS total_pesan FROM tbpesan INNER JOIN tbtransaksi ON tbpesan.id_transaksi=tbtransaksi.id_transaksi WHERE tbtransaksi.id_transaksi='$ID';";
                $querysum = mysqli_query($conn, $sqlsum);

                $rowsum= mysqli_fetch_array($querysum);

                $subtotal = $rowsum['total_pesan'];
                $grandtotal=$subtotal-($subtotal*$diskon/100);


                $query=mysqli_query($conn, $sql);
                while($row=mysqli_fetch_array($query)){
            ?>
            <li><?php echo $row['nama_barang']?> (<?php echo $row['jml_pesan'] ?> Unit @ Rp.<?php echo number_format(($row['harga_beli']),0,'.','.')?>)<p align="left">Total : Rp.<?php echo number_format(($row['total_pesan']),0,'.','.')?></p>  </li>
            <?php } ?></ul>
            <h5>Tanggal Barang Diterima</h5>
            <ul>
                <li><?php echo $row1['tgl_kirim'] ?></li>
            </ul>
            <h5>Subtotal</h5>
            Rp. <?php echo number_format(($subtotal),0,'.','.');?>
            <h5>Potongan</h5>
            <ul>
                <li><?php echo $diskon ?> %</li>
            </ul>
            <h3>Grand Total</h3>
            <h3>Rp.<?php echo number_format($grandtotal,0,'.','.')?></h3>
        </div>
    </div>
    <div class="form-group">
        <label>Jumlah Bayar</label><br>
        <input class="form-control" type="number" name="jml_bayar">
    </div>
    <div class="form-group">
        <button type="submit" class="btn btn-default">Submit</button>
    </div>
</form>
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

<!-- modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          <h4 class="modal-title" id="myModalLabel">Tambah Barang Baru</h4>
        </div>
        <div class="modal-body">
                <form method="POST" action="setdiskon.php?ID=<?php echo $ID?>">
                        <div class="form-group">
                            <label>Jumlah Diskon</label><br>
                            <input class="form-control" type="number" name="potongan">
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-default">Submit</button>
                        </div>
                    </form>
        </div>
        <div class="modal-footer">
          
          
        </div>
      </div>
    </div>
  </div>

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
        <td colspan="2"><?php echo $row1['potongan']?> % <button class="btn btn-primary" data-toggle="modal" data-target="#myModal">Set Diskon</button></td>
    </tr>
    <tr>
        <td colspan="5"><h3>Grand Total</h3></td>
        <td colspan="2">Rp. <?php echo number_format(($grandtotal),0,'.','.')?></td>
    </tr>
</table>
<h1>Status Transaksi Ini : <font color="yellow"><?php
    if ($row1 ['status_transaksi']=="Di Supplier"){
        echo "Belum Dikirim";
    }
    elseif ($row1 ['status_transaksi']=="Terkirim"){
        echo "<font color='green'>Barang Sudah DIkirim</font>";
    }
    elseif ($row1 ['status_transaksi']=="Sukses"){
        echo "<font color='lime'>Transaksi Sukses</font>";
    } ?></font></h1>
    <h3>Status Pembayaran Transaksi Ini : <font color="yellow"><?php
        $sqlcheck="SELECT * FROM tbpesan INNER JOIN tbtransaksi ON tbpesan.id_transaksi=tbtransaksi.id_transaksi INNER JOIN tbbarang ON tbpesan.id_barang=tbbarang.id_barang LEFT JOIN tbbayar ON tbbayar.id_transaksi2=tbtransaksi.id_transaksi WHERE tbpesan.id_transaksi='$ID' ORDER BY id_pesan ASC";
        $querycheck=mysqli_query($conn, $sqlcheck);
        $rowcheck=mysqli_fetch_array($querycheck);
        if ($rowcheck ['status_pembayaran']!=""){
            echo "<font color='green'>Lunas</font>";
        } else if ($rowcheck ['status_pembayaran']=="") { echo "<font color='red'>Belum Lunas</font>"; }?></font></h3>
<br /><p align="right">
<?php if ($row1 ['status_transaksi']=="Di Supplier"){ ?>
<a class="btn btn-default disabled" href="cetaksj.php?ID=<?php echo $ID?>">Cetak Surat Jalan</a>
<a class="btn btn-default disabled" href="cetaknota.php?ID=<?php echo $ID?>">Cetak Nota</a>
<a class="btn btn-primary" style="color:white; background-color:green;" onclick="return confirm('Pesanan ini akan dikirim ke PT Wearnes, Anda yakin ingin mengkonfirmasi Pesanan Ini ?')" href="kirimbarang.php?ID=<?php echo $ID?>">Kirim Barang</a>
<a class="btn btn-danger" onclick="return confirm('Anda yakin ingin menolak Pesanan Ini ?')" href="rejecttransaksi.php?ID=<?php echo $ID?>">Tolak Pesanan</a></p>
<?php } else { ?>
<a class="btn btn-default" href="cetaksj.php?ID=<?php echo $ID?>">Cetak Surat Jalan</a>
<a class="btn btn-default" href="cetaknota.php?ID=<?php echo $ID?>">Cetak Nota</a>
<a class="btn btn-primary disabled" style="color:white; background-color:green;" onclick="return confirm('Pesanan ini akan dikirim ke PT Wearnes, Anda yakin ingin mengkonfirmasi Pesanan Ini ?')" href="kirimbarang.php?ID=<?php echo $ID?>">Kirim Barang</a>
<a class="btn btn-danger disabled" onclick="return confirm('Anda yakin ingin menolak Pesanan Ini ?')" href="rejecttransaksi.php?ID=<?php echo $ID?>">Tolak Pesanan</a></p>
<?php } ?>
</div>
</div>
<script>
let today = new Date().toISOString().substr(0, 10);
document.querySelector("#today").value = today;
</script>
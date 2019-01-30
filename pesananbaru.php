<?php 

$ID=$_GET['ID'];
$sql = "SELECT * FROM tbtransaksi WHERE id_transaksi='$ID'";


$query = mysqli_query($conn, $sql);
$row1 = mysqli_fetch_array($query);
$diskon= $row1['potongan'];
?>
<br><br><br>
<h4>Anda di Pesanan No. <?php echo $row1 ['no_transaksi']?></h4>

<?php if ($row1['status_transaksi']=="Di Pembelian"){?>
    <button class="btn btn-primary disabled" data-toggle="modal" data-target="#myModal" disabled>Tambah Barang Baru</button>
<?php } else{?>
    <button class="btn btn-primary" data-toggle="modal" data-target="#myModal">Tambah Barang Baru</button>
<?php }?>

        <!-- modal -->
        <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                <div class="modal-dialog" role="document">
                  <div class="modal-content">
                    <div class="modal-header">
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                      <h4 class="modal-title" id="myModalLabel">Tambah Barang Baru</h4>
                    </div>
                    <div class="modal-body">
                            <form method="POST" action="tambahpesanan.php?ID=<?php echo $ID?>">
                                    <div class="form-group">
                                        <label>Pilih Barang</label><br>
                                        <select class="form-control" name="id_barang">
                                            <?php $query = mysqli_query($conn, "SELECT * FROM tbbarang");
                                            
                                            while($r=mysqli_fetch_array($query)){
                                            ?>
                                            <option value="<?php echo $r ['id_barang'] ?>">
                                                <?php echo $r ['nama_barang'] ?> (@ Rp. <?php echo number_format(($r ['harga_beli']),0,'.','.') ?>)
                                            </option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label>Tanggal Pesanan</label><br>
                                        <input class="form-control" type="date" name="tgl_pesan" id="today">
                                    </div>
                                    <div class="form-group">
                                        <label>Jenis Pemesanan</label><br>
                                        <label><input type="radio" name="jenis_pesan" value="Biasa" id="opt1" checked> Biasa</label>
                                        <label><input type="radio" name="jenis_pesan" value="Segera" id="opt1"> Segera</label>
                                        <label><input type="radio" name="jenis_pesan" value="Mendesak" id="opt1"> Mendesak</label>
                                    </div>
                                    <div class="form-group">
                                        <label>Jumlah Pemesanan</label><br>
                                        <input class="form-control" type="number" name="jml_pesan">
                                    </div>
                                    <div class="form-group">
                                        <label>Ukuran</label><br>
                                        <input class="form-control" type="text" class="form-control" id="exampleInputEmail1" name="ukuran">
                                    </div>
                                    <div class="form-group">
                                        <label>Keterangan</label><br>
                                        <textarea class="form-control" rows="6" cols="50" name="penjelasan"></textarea>
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

<br><br>
<div class="panel panel-default">
    <div class="panel-heading">
<h2>Barang dalam Pesanan ini :</h2>
</div>
<div class="panel-body">
<table class="table table-responsive table-striped table-hover" border="1">
    <tr>
        <th><p align="center">No</p></th>
        <th><p align="center">Nama Barang</p></th>
        <th><p align="center">Jumlah</p></th>
        <th><p align="center">Ukuran</p></th>
        <th><p align="center">Keterangan</p></th>
        <th><p align="center">Aksi</p></th>
    </tr>


    <?php 
    $no = 1;
    $sql = "SELECT * FROM tbpesan INNER JOIN tbtransaksi ON tbpesan.id_transaksi=tbtransaksi.id_transaksi INNER JOIN tbbarang ON tbpesan.id_barang=tbbarang.id_barang WHERE tbpesan.id_transaksi='$ID' ORDER BY id_pesan ASC";
    $query=mysqli_query($conn, $sql);
    if(mysqli_num_rows($query)>0){
    while($row=mysqli_fetch_array($query)){
            ?>

    <tr>
        <td align="center" width="5%">
            </p><?php echo $no++?>
        </td>
        <td width="30%">
            <?php echo $row ['nama_barang']?>
        </td>
        <td width="5%" align="center">
            <?php echo $row ['jml_pesan']?>
        </td>
        <td width="5%" align="center">
            <?php echo $row ['ukuran']?>
        </td>
        <td>
            <?php echo $row ['penjelasan']?>
        </td>
    <td align="right" width="15%"><?php if ($row1['status_transaksi']=="pending"){?><a class="btn btn-warning" href="">Edit</a> <a class="btn btn-danger" href="hapuspesanan.php?ID=<?php echo $row ['id_pesan']?>&ID2=<?php echo $row ['id_transaksi']?>">Hapus</a><?php } else {?><a class="btn btn-warning disabled" href="">Edit</a> <a class="btn btn-danger disabled" href="hapuspesanan.php?ID=<?php echo $row ['id_pesan']?>&ID2=<?php echo $row ['id_transaksi']?>">Hapus</a> <?php } ?></td>
    </tr>
    <?php } }else{?>
        <tr>
            <td colspan="6"><h3>Tidak Ada Barang Dalam Transaksi Ini</h3></td>
        </tr>
    <?php } ?>
</table>
<h1>Status Pesanan Ini : <font color="yellow"><?php echo $row1 ['status_transaksi'] ?></font></h1>
<br />
<p align="right">
<a class="btn btn-default" href="cetaklpb.php?ID=<?php echo $ID?>">Cetak Laporan Penerimaan Barang</a>
<a class="btn btn-default" href="cetakspp.php?ID=<?php echo $ID?>">Cetak Surat Permintaan Pemesanan</a>
<a class="btn btn-default" href="cetakks.php?ID=<?php echo $ID?>">Cetak Kartu Stok Berdasarkan transaksi ini</a>
<?php if ($row1['status_transaksi']=="Di Pembelian"||mysqli_num_rows($query)<1||$row1['status_transaksi']=="Di Keuangan"||$row1['status_transaksi']=="Terkirim"){?> <a class="btn btn-default disabled" href="ajukantransaksi.php?ID=<?php echo $ID?>">Ajukan Data Pemesanan</a> <?php } else {?>
    <a class="btn btn-default" href="ajukantransaksi.php?ID=<?php echo $ID?>">Ajukan Data Pemesanan</a>
<?php } ?></p>
</div>
</div>
<script>
let today = new Date().toISOString().substr(0, 10);
document.querySelector("#today").value = today;
</script>
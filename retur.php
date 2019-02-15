<?php
include 'database/config.php';

// id2=transaksi
// id=pesanan

$ID=$_GET['ID'];
$ID2=$_GET['ID2'];

$sql = "SELECT * FROM tbpesan INNER JOIN tbtransaksi ON tbpesan.id_transaksi=tbtransaksi.id_transaksi INNER JOIN tbbarang ON tbpesan.id_barang=tbbarang.id_barang WHERE tbpesan.id_transaksi='$ID2' AND tbpesan.id_pesan='$ID' ORDER BY id_pesan ASC";
$query=mysqli_query($conn, $sql);
$row = mysqli_fetch_array($query);

echo $row['nama_barang'];
?>

<!-- modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
              <h4 class="modal-title" id="myModalLabel">Retur Baru</h4>
            </div>
            <div class="modal-body">
                    <form method="POST" action="prosesretur.php">
                            <!-- <div class="form-group">
                                    <label>Pilih Barang</label><br>
                                    <select class="form-control" name="id_barang">
                                        <?php $query = mysqli_query($conn, "SELECT * FROM tbbarang WHERE stok>0");
                                        
                                        while($r=mysqli_fetch_array($query)){
                                        ?>
                                        <option value="<?php echo $r ['id_barang'] ?>">
                                            <?php echo $r ['nama_barang'] ?> ( Stok : <?php echo $r ['stok'] ?>)
                                        </option>
                                        <?php } ?>
                                    </select>
                            </div> -->
                            <div class="form-group">
                                    <label>Tgl Retur</label>
                                    <input class="form-control" type="date" name="tgl_retur" id="today" readonly>
                            </div>
                            <div class="form-group">
                                    <label>Keterangan</label>
                                    <textarea rows="6" cols="50" name="keterangan_retur" class="form-control"></textarea>
                            </div>
                            <input class="btn btn-primary" type="submit" value="Retur Barang">
                    </form>
            </div>
            <div class="modal-footer">
              
              
            </div>
          </div>
        </div>
      </div>

<br><br><br>

<div class="panel panel-default">
        <div class="panel-heading"><h1>Data Retur</h1></div>
        <div class="panel-body">
            <button class="btn btn-primary" data-toggle="modal" data-target="#myModal">Retur Baru</button>
            <br><br>
            <table class="table table-striped table-responsive">
                <tr>
                    <th>No.</th>
                    <th>Tgl Retur</th>
                    <th>Status</th>
                    <th width="50%">Keterangan</th>
                    <th width="20%">Aksi</th>
                </tr>
                <?php
                $no = 1;
                $sql = "SELECT * FROM tbretur";
                $query=mysqli_query($conn, $sql);
                while($row=mysqli_fetch_array($query)){?>
                <tr>
                        <td><?php echo $no++ ?></td>
                        <td><?php echo $row['tgl_retur'] ?></td>
                        <td><?php echo $row['status_retur'] ?></td>
                        <td><?php echo $row['keterangan_retur'] ?></td>
                        <td align="right"><a class="btn btn-primary" href="?m=returdetail&ID=<?php echo $row['id_retur']?>">Detail</a>&nbsp;&nbsp;<a class="btn btn-danger" href="hapustransaksi.php?ID=<?php echo $row['id_transaksi']?>" onclick="return confirm('Ingin Hapus Transaksi Ini ?')">Delete</a></td>
                </tr>
                <?php } ?>
            </table>
        </div>
    </div>

<script>
let today = new Date().toISOString().substr(0, 10);
document.querySelector("#today").value = today;
</script>
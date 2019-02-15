<?php
include 'database/config.php';

$ID=$_GET['ID'];
?>

<!-- modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
              <h4 class="modal-title" id="myModalLabel">Barang Baru</h4>
            </div>
            <div class="modal-body">
                    <form method="POST" action="prosestambahretur.php?ID=<?php echo $ID?>">
                            <div class="form-group">
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
                            </div>
                            <div class="form-group">
                                    <label>Jumlah</label>
                                    <input class="form-control" type="number" name="jml_returbarang">
                            </div>
                            <input class="btn btn-primary" type="submit" value="Tambah Barang">
                    </form>
            </div>
            <div class="modal-footer">
              
              
            </div>
          </div>
        </div>
      </div>

<br><br><br>

<div class="panel panel-default">
        <div class="panel-heading"><h1>Detail Retur</h1></div>
        <div class="panel-body">
            <button class="btn btn-primary" data-toggle="modal" data-target="#myModal">Tambah Barang</button>
            <br><br>
            <table class="table table-striped table-responsive">
                <tr>
                    <th>No.</th>
                    <th>Nama Barang</th>
                    <th>Jumlah</th>
                    <th width="50%">Aksi</th>
                </tr>
                <?php
                $no = 1;
                $sql = "SELECT * FROM tbreturdetail INNER JOIN tbbarang ON tbreturdetail.id_barang=tbbarang.id_barang INNER JOIN tbretur ON tbretur.id_retur=tbreturdetail.id_retur WHERE tbreturdetail.id_retur='$ID'";
                $query=mysqli_query($conn, $sql);
                while($row=mysqli_fetch_array($query)){?>
                <tr>
                        <td><?php echo $no++ ?></td>
                        <td><?php echo $row['nama_barang'] ?></td>
                        <td><?php echo $row['jml_returbarang'] ?></td>
                        <td align="right">&nbsp;&nbsp;<a class="btn btn-danger" href="hapusbarangretur.php?ID=<?php echo $row['id_rdetail']?>&ID2=<?php echo $row['id_retur']?>" onclick="return confirm('Ingin Hapus Barang Ini ?')">Delete</a></td>
                </tr>
                <?php } ?>
            </table><a class="btn btn-primary" href="cetaksjretur.php?ID=<?php echo $ID?>">Kirim Ke Supplier</a> <a class="btn btn-default" href="cetakbkm.php?ID=<?php echo $ID?>">Cetak Bukti Kas Masuk Berdasarkan Retur Ini</a>
        </div>
    </div>
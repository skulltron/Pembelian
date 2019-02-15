<?php
include 'database/config.php';

$ID=$_GET['ID'];
?>

<br><br><br>

<!-- modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          <h4 class="modal-title" id="myModalLabel">Set Diskon</h4>
        </div>
        <div class="modal-body">
                <form method="POST" action="setdiskon_retur.php?ID=<?php echo $ID?>">
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
        <div class="panel-heading"><h1>Detail Retur</h1></div>
        <div class="panel-body">
            <br><br>
            <table class="table table-striped table-responsive">
                <tr>
                    <th>No.</th>
                    <th>Nama Barang</th>
                    <th>Jumlah</th>
                    <th>Harga Per Unit</th>
                    <th>Total</th>
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
                        <td>Rp. <?php echo number_format(($row['harga_beli']),0,'.','.'); ?></td>
                        <td>Rp. <?php
                         $totalretur=$row['harga_beli']*$row['jml_returbarang'];
                         $gtotalretur=0;
                         $tgtotal+=$totalretur;
                         $pot=$row['potongan_retur'];
                         $toadally=$tgtotal-($tgtotal*$pot/100);
                         echo number_format(($totalretur),0,'.','.');
                         ?></td>
                </tr>
                <?php } ?>
                <tr>
                    <td colspan="4">Diskon</td>
                    <td colspan="2"><?php echo $pot?> % <button class="btn btn-primary" data-toggle="modal" data-target="#myModal">Set Diskon</button></td>
                </tr>
                <tr>
                    <td colspan="4">Total</td>
                    <td>Rp. <?php echo number_format(($toadally),0,'.','.')?></td>
                </tr>
            </table><a class="btn btn-primary" href="terimaretur.php?ID=<?php echo $ID?>">Terima Retur</a> <a class="btn btn-default" href="cetakkwitansi.php?ID=<?php echo $ID?>">Cetak Kwitansi</a>
        </div>
    </div>
<?php 

?>
<br><br><br>
<br>
<div class="panel panel-primary">
    <div class="panel-heading"><h3>Daftar Pesanan Masuk</h3><h5>Berikut Adalah Daftar Pesanan Permintaan Keuangan PT. WEARNES</h5></div>
    <div class="panel-body">

        <button class="btn btn-primary" data-toggle="modal" onclick="randomString(this)" data-target="#myModal">Transaksi Baru</button>

        <!-- modal -->
        <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                <div class="modal-dialog" role="document">
                  <div class="modal-content">
                    <div class="modal-header">
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                      <h4 class="modal-title" id="myModalLabel">Tambah Pesanan Baru</h4>
                    </div>
                    <div class="modal-body">
                      <form method="POST" action="tambahtransaksi.php">
                          <div class="form-group">
                              <label>No. Pesanan (Otomatis)</label>
                              <input class="form-control" id="randomfield" type="text" name="no_transaksi" readonly>
                          </div>
                          <div class="form-group">
                                <label>Tgl Permintaan Pesanan</label>
                                <input class="form-control" type="datetime" name="tgl_transaksi" value="<?php echo date('Y-m-d')?>" readonly>
                          </div>
                          <div class="form-group">
                                <label>Pilih Supplier</label>
                                <select class="form-control" name="id_supplier">
                                    <option value="">Pilih Supplier</option>
                                    <?php 
                                        $query=mysqli_query($conn, "SELECT * FROM tbsupplier");
                                        while($row=mysqli_fetch_array($query)){
                                    ?>
                                    <option value="<?php echo $row ['id_supplier']?>"><?php echo $row ['nama_supplier']?></option>
                                    <?php } ?>
                                </select>
                           </div>
                           <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
                           <button class="btn btn-primary">Tambah</button>
                      </form>
                    </div>
                    <div class="modal-footer">
                      
                      
                    </div>
                  </div>
                </div>
              </div>

        <div class="panel-body">
            <table class="table table-responsive" border="1" style="width: 100%">
                <tr>
                    <th>No.</th>
                    <th>Nomor Pesanan</th>
                    <th>Tanggal Pembuatan Permintaan Pesanan</th>
                    <th>Supplier</th>
                    <th>Aksi</th>
                </tr>
                <?php
                $no=1;

                $query=mysqli_query($conn, "SELECT * FROM tbtransaksi INNER JOIN tbsupplier ON tbtransaksi.id_supplier=tbsupplier.id_supplier;");
                while($row=mysqli_fetch_array($query)){
                ?>
                <tr>
                    <td><?php echo $no++?></td>
                    <td><?php echo $row ['no_transaksi']?></td>
                    <td><?php echo $row ['tgl_transaksi']?></td>
                    <td><?php echo $row ['nama_supplier']?></td>
                    <td align="right"><a class="btn btn-primary" href="?m=home&ID=<?php echo $row['id_transaksi']?>">Detail</a>&nbsp;&nbsp;<a class="btn btn-danger" href="hapustransaksi.php?ID=<?php echo $row['id_transaksi']?>" onclick="return confirm('Ingin Hapus Transaksi Ini ?')">Delete</a></td>
                </tr>
                <?php } ?>
            </table>
        </div>
</div>
</div>
<script>
function randomString() {
    var today = new Date();
    var dd = today.getDate();
    var mm = today.getMonth()+1; //January is 0!
    var yyyy = today.getFullYear();

    if(dd<10) {
        dd = '0'+dd
    } 

    if(mm<10) {
        mm = '0'+mm
    } 

    today = yyyy + '-' + mm;

    var chars = "0123456789ABCDEFGHIJKLMNOPQRSTUVWXTZ";
    var string_length = 4;
    var randomstring = '';
    for (var i=0; i<string_length; i++) {
        var rnum = Math.floor(Math.random() * chars.length);
        randomstring += chars.substring(rnum,rnum+1);
    }
    document.getElementById('randomfield').value = randomstring+today;
    //or even this as you are using JQuery
    //$('#randomfield').val(randomstring);
}
</script>
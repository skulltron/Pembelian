<?php 

?>
<br><br><br>
<br>
<div class="panel panel-primary">
    <div class="panel-heading"><h3>Daftar Permintaan Pesanan</h3><h5>Berikut Adalah Daftar Pesanan Yang Diminta Oleh Gudang</h5><h5>(Khusus Bagian Pembelian)</h5></h5></div>
    <div class="panel-body">
            <form class="form-inline">
                    <input type="hidden" name="m" value="transaksi">    
                    <input class="form-control" style="color: black; width: 20%;" type="text" name="q" size="30" value="<?php echo $q?>" placeholder="Masukkan No. Transaksi"> <button class="btn btn-primary"><span class="glyphicon glyphicon-search"></span> Cari</button>
            </form>
        <div class="panel-body">
            <table class="table table-responsive" border="1" style="width: 100%">
                <tr>
                    <th>No.</th>
                    <th>Nomor Pesanan</th>
                    <th>Tanggal Masuk</th>
                    <th>Supplier</th>
                    <th>Dari Gudang</th>
                    <th>Status Pesanan</th>
                    <th>Aksi</th>
                </tr>
                <?php
                $no=1;
                if ($q=='') {
                    $query=mysqli_query($conn, "SELECT * FROM tbtransaksi INNER JOIN tbsupplier ON tbtransaksi.id_supplier=tbsupplier.id_supplier WHERE status_transaksi!='pending' ORDER BY tgl_transaksi DESC, id_transaksi DESC;;");
                }else {
                    $query=mysqli_query($conn, "SELECT * FROM tbtransaksi INNER JOIN tbsupplier ON tbtransaksi.id_supplier=tbsupplier.id_supplier WHERE status_transaksi!='Di Pembelian' OR status_transaksi='Di Keuangan' AND no_transaksi LIKE '%$q%' ORDER BY tgl_transaksi DESC, id_transaksi DESC;;");
                }
                while($row=mysqli_fetch_array($query)){
                ?>
                <tr>
                    <td><?php echo $no++?></td>
                    <td><?php echo $row ['no_transaksi']?></td>
                    <td><?php echo $row ['tgl_transaksi']?></td>
                    <td><?php echo $row ['nama_supplier']?></td>
                    <td><?php echo $row ['gudang_from']?></td>
                    <td><?php echo $row ['status_transaksi']?></td>
                    <td align="right"><a class="btn btn-primary" href="?m=conf&ID=<?php echo $row['id_transaksi']?>">Detail</a>&nbsp;&nbsp;<a class="btn btn-danger" href="hapustransaksi.php?ID=<?php echo $row['id_transaksi']?>" onclick="return confirm('Ingin Hapus Transaksi Ini ?')">Delete</a></td>
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
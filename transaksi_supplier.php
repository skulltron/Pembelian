<?php 
$q = $_GET['q'];
?>
<br><br><br>
<br>
<div class="panel panel-primary">
    <div class="panel-heading"><h3>Daftar Transaksi</h3><h5>Berikut Adalah Daftar Pesanan Yang Telah Terkirim Dari Bagian Pembelian</h5></div>
    <div class="panel-body">

        <div class="panel-body">
            <table class="table table-responsive" border="1" style="width: 100%">
                <tr>
                    <th>No.</th>
                    <th>Nomor Pesanan</th>
                    <th>Tanggal Dikonfirmasi</th>
                    <th>Supplier</th>
                    <th>Status</th>
                    <th>Aksi</th>
                </tr>
                <?php
                $no=1;

                $query=mysqli_query($conn, "SELECT * FROM tbtransaksi INNER JOIN tbsupplier ON tbtransaksi.id_supplier=tbsupplier.id_supplier WHERE status_transaksi='Di Supplier' OR status_transaksi='Sukses' OR status_transaksi='Terkirim' ORDER BY tgl_transaksi DESC, id_transaksi DESC;;");
                while($row=mysqli_fetch_array($query)){
                ?>
                <tr>
                    <td><?php echo $no++?></td>
                    <td><?php echo $row ['no_transaksi']?></td>
                    <td><?php echo $row ['tgl_konf']?></td>
                    <td><?php echo $row ['nama_supplier']?></td>
                    <td><?php echo $row ['status_transaksi']?></td>
                    <td align="right"><a class="btn btn-primary" href="?m=conf3&ID=<?php echo $row['id_transaksi']?>">Detail</a>&nbsp;&nbsp;<a class="btn btn-danger" href="hapustransaksi.php?ID=<?php echo $row['id_transaksi']?>" onclick="return confirm('Ingin Hapus Transaksi Ini ?')">Delete</a></td>
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
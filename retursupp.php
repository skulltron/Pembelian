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
<br><br><br>

<div class="panel panel-default">
        <div class="panel-heading"><h1>Data Retur</h1></div>
        <div class="panel-body">
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
                $sql = "SELECT * FROM tbretur WHERE status_retur='Terkirim'||status_retur='Diterima'";
                $query=mysqli_query($conn, $sql);
                while($row=mysqli_fetch_array($query)){?>
                <tr>
                        <td><?php echo $no++ ?></td>
                        <td><?php echo $row['tgl_retur'] ?></td>
                        <td><?php echo $row['status_retur'] ?></td>
                        <td><?php echo $row['keterangan_retur'] ?></td>
                        <td align="right"><a class="btn btn-primary" href="?m=returdetailsupp&ID=<?php echo $row['id_retur']?>">Detail</a>&nbsp;&nbsp;<a class="btn btn-danger" href="hapustransaksi.php?ID=<?php echo $row['id_transaksi']?>" onclick="return confirm('Ingin Hapus Transaksi Ini ?')">Delete</a></td>
                </tr>
                <?php } ?>
            </table>
        </div>
    </div>

<script>
let today = new Date().toISOString().substr(0, 10);
document.querySelector("#today").value = today;
</script>
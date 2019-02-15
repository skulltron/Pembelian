<?php 
$q = $_GET['q'];
?>
<br><br><br>
<br>
<div class="panel panel-danger">
    <div class="panel-heading"><h3>Reset Aplikasi</h3><h5>Perhatian !, Jika anda menekan tombol "Reset" maka semua data transaksi dan retur akan dihapus</h5></div>
    <div class="panel-body">

        <div>
        <form class="form-inline" action="purge_process.php">
                <button class="btn btn-danger" style="height:50px; width:100px" onclick="return confirm('Data tidak bisa dikembalikan jika sudah dihapus, Lanjutken ?')"><span class="glyphicon glyphicon-retweet"></span> Reset</button>
        </form>
<?php 

include 'database/config.php';

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <script src="assets/js/jquery.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.3.1.js"></script>
    <title>Aplikasi Pembelian Tunai</title>
    <link href="assets/css/style.css" rel="stylesheet">
    <link href="assets/css/bootstrap.css" rel="stylesheet">
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
</head>

<body>
    <nav class="navbar navbar-inverse navbar-fixed-top">
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar"
                    aria-expanded="false" aria-controls="navbar">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="?m=transaksi">TRADING APP</a>
            </div>
            <div id="navbar" class="collapse navbar-collapse">
                <ul class="nav navbar-nav">
                    <li><a href="?m=transaksi">Gudang</a></li>
                    <li><a href="?m=pesanan">Pembelian</a></li>
                    <li><a href="?m=supplier">Supplier</a></li>
                    <li><a href="?m=keuangan">Keuangan</a></li>
                    <li><a href="?m=retur">Retur</a></li>
                    <li><a href="?m=retursupp">Retur Supplier</a></li>
                    <li><a href="?m=jurnal">Jurnal Kas Masuk</a></li>
                </ul>
            </div>

        </div>
    </nav>

    <div class="container">
        <?php 
      
      $m = $_GET['m'];
      if ($m=='home') {
        include 'pesananbaru.php';
      }elseif ($m=='supplier') {
        include 'transaksi_supplier.php';
      }elseif ($m=='keuangan') {
        include 'transaksi_keuangan.php';
      }elseif ($m=='pesanan') {
        include 'pesanan.php';
      }elseif ($m=='sop') {
        include 'sop.php';
      }elseif ($m=='transaksi') {
        include 'transaksi.php';
      }elseif ($m=='conf') {
        include 'pesanan_pembeli.php';
      }elseif ($m=='conf2') {
        include 'pesanan_keuangan.php';
      }elseif ($m=='conf3') {
        include 'pesanan_supplier.php';
      }elseif ($m=='pelunasan') {
        include 'pelunasan.php';
      }elseif ($m=='retur') {
        include 'retur.php';
      }elseif ($m=='retursupp') {
        include 'retursupp.php';
      }elseif ($m=='returdetailsupp') {
        include 'returdetailsupp.php';
      }elseif ($m=='returdetail') {
        include 'returdetail.php';
      }elseif ($m=='jurnal') {
        include 'jurnal.php';
      }
      ?>

    </div>



    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script>
        window.jQuery || document.write('<script src="../../assets/js/vendor/jquery.min.js"><\/script>')
    </script>
    <script src="../../dist/js/bootstrap.min.js"></script>

    <script src="../../assets/js/ie10-viewport-bug-workaround.js"></script>
</body>

</html>
<?php 

error_reporting(~E_NOTICE);
session_start();

$server   = "localhost";
$user     = "root";
$pass	  = "";
$database = "dbpembelian";

$conn = mysqli_connect($server,$user,$pass,$database);

?>
<?php
include 'konfig.php';

$idtransaksi = $_POST['no_transaksi'];
$tanggal = $_POST['tanggal'];
$total = $_POST['total'];

$query = "INSERT INTO head_transaksi VALUES ('$idtransaksi','$tanggal','$total')";
mysqli_query($koneksi, $query);

?>
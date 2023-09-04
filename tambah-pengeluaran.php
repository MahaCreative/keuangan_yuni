<?php
//include('dbconnected.php');
include('koneksi.php');

$tgl_pengeluaran = $_GET['tgl_pengeluaran'];
$jns_pengeluaran = $_GET['jns_pengeluaran'];
$jumlah = $_GET['jumlah'];
$hrg_satuan = $_GET['hrg_satuan'];
$ttl_pengeluaran = $_GET['ttl_pengeluaran'];

//query update
$query = mysqli_query($koneksi,"INSERT INTO `pengeluaran` (`tgl_pengeluaran`, `jns_pengeluaran`, `jumlah`, `hrg_satuan`, `ttl_pengeluaran`) VALUES ('$tgl_pengeluaran', '$jns_pengeluaran', '$jumlah', '$hrg_satuan', '$ttl_pengeluaran')");

if ($query) {
 # credirect ke page index
 header("location:pengeluaran.php"); 
}
else{
 echo "ERROR, data gagal diupdate". mysqli_error($koneksi);
}

//mysql_close($host);
?>
<?php
//include('dbconnected.php');
include('koneksi.php');

$id = $_GET['id_pengeluaran'];
$tgl = $_GET['tgl_pengeluaran'];
$jns = $_GET['jns_pengeluaran'];
$jumlah = $_GET['jumlah'];
$hrg = $_GET['hrg_satuan'];
$ttl = $_GET['ttl_pengeluaran'];

//query update
$query = mysqli_query($koneksi,"UPDATE pengeluaran SET tgl_pengeluaran='$tgl' , jns_pengeluaran='$jns', jumlah='$jumlah', hrg_satuan='$hrg', ttl_pengeluaran='$ttl' WHERE id_pengeluaran='$id' ");

if ($query) {
 # credirect ke page index
 header("location:pengeluaran.php"); 
}
else{
 echo "ERROR, data gagal diupdate". mysqli_error($koneksi);
}

//mysql_close($host);
?>
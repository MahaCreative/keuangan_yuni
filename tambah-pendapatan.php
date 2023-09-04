<?php
//include('dbconnected.php');
include('koneksi.php');

$tgl_pemasukan = $_GET['tgl_pemasukan'];
$jenis_barang = $_GET['jenis_barang'];
$ukuran = $_GET['ukuran'];
$jumlah = $_GET['jumlah'];
$hrg_satuan = $_GET['hrg_satuan'];
$jml_total = $_GET['jml_total'];
$ket = $_GET['ket'];

//query update
$query = mysqli_query($koneksi,"INSERT INTO `pemasukan` (`tgl_pemasukan`, `jenis_barang`, `ukuran`, `jumlah`, `hrg_satuan`, `jml_total`, `ket`) VALUES ('$tgl_pemasukan', '$jenis_barang', '$ukuran', '$jumlah', '$hrg_satuan', '$jml_total', '$ket')");

if ($query) {
 # credirect ke page index
 header("location:pendapatan.php"); 
}
else{
 echo "ERROR, data gagal diupdate". mysqli_error($koneksi);
}

//mysql_close($host);
?>
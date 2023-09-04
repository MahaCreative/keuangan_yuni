<?php

session_start();

include('koneksi.php');

 define('LOG','log.txt');
function write_log($log){  
 $time = @date('[Y-d-m:H:i:s]');
 $op=$time.' '.$log."\n".PHP_EOL;
 $fp = @fopen(LOG, 'a');
 $write = @fwrite($fp, $op);
 @fclose($fp);
}

$id = $_GET['id_pemasukan'];
$tgl = $_GET['tgl_pemasukan'];
$jenisbarang = $_GET['jenis_barang'];
$ukr = $_GET['ukuran'];
$jml = $_GET['jumlah'];
$hrg = $_GET['hrg_satuan'];
$jml_ttl = $_GET['jml_total'];
$keterangan = $_get['ket'];

//query update
$query = mysqli_query($koneksi,"UPDATE pemasukan SET tgl_pemasukan='$tgl' , jenis_barang='$jenisbarang', ukuran='$ukr', jumlah='$jml', hrg_satuan='$hrg', jml_total='$jml_ttl', ket='$keterangan' WHERE id_pemasukan='$id' ");

$namaadmin = $_SESSION['nama'];
if ($query) {
write_log("Nama Admin : ".$namaadmin." => Edit Pemasukan => ".$id." => Sukses Edit");
 # credirect ke page index
 header("location:pendapatan.php"); 
}
else{
write_log("Nama Admin : ".$namaadmin." => Edit Pemasukan => ".$id." => Gagal Edit");
 echo "ERROR, data gagal diupdate". mysqli_error($koneksi);
}

//mysql_close($host);
?>
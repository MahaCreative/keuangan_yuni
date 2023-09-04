    <?php
	 $tahun = $_POST["tahun"];
  $filename = "Data_Pemasukan_Tahun_" . $tahun . ".xls";

  header("Content-type: application/vnd-ms-excel");
  header("Content-Disposition: attachment; filename=" . $filename);
	?>
    <?php
		 $tahun = $_POST["tahun"]; 
    echo "<h3>Data Pemasukan Tahun ".$tahun. "</h3>"
    ?>
    <table border="1" cellpadding="5">
        <tr>
            <th>ID Pemasukan</th>
            <th>Tgl Pemasukan</th>
            <th>Jenis Barang</th>
            <th> Ukuran</th>
            <th> Jumlah</th>
            <th> Harga Satuan</th>
            <th> Jumlah Total</th>
            <th> Keterangan</th>
        </tr>
        <?php  
	// Load file koneksi.php  
	include "koneksi.php";    
	// Buat query untuk menampilkan semua data siswa 
$query = mysqli_query($koneksi, "SELECT * FROM pemasukan");
	// Untuk penomoran tabel, di awal set dengan 1 
	while($data = mysqli_fetch_array($query)){ 
	// Ambil semua data dari hasil eksekusi $sql 
	echo "<tr>";    
	echo "<td>".$data['id_pemasukan']."</td>";   
	echo "<td>".$data['tgl_pemasukan']."</td>";    
	echo "<td>".$data['jenis_barang']."</td>";    
	echo "<td>".$data['ukuran']."</td>";     
	echo "<td>".$data['jumlah']."</td>"; 
	echo "<td>".$data['hrg_satuan']."</td>";  
	echo "<td>".$data['jml_total']."</td>"; 
	echo "<td>".$data['ket']."</td>"; 
	echo "</tr>";        
	}  ?>
    </table>
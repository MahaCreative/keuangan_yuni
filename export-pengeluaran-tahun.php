    <?php
	 $tahun = $_POST["tahun"];
  $filename = "Data_Pengeluaran_Tahun_" . $tahun . ".xls";

  header("Content-type: application/vnd-ms-excel");
  header("Content-Disposition: attachment; filename=" . $filename);
	?>
    <?php
		 $tahun = $_POST["tahun"]; 
    echo "<h3>Data Pengeluaran Tahun ".$tahun. "</h3>"
    ?>
    <table border="1" cellpadding="5">
        <tr>
            <th>ID Pengeluaran</th>
            <th>Tgl Pengeluaran</th>
            <th>Jenis Pengeluaran</th>
            <th> Jumlah</th>
            <th> Harga Satuan</th>
            <th> Total Pengeluaran</th>
        </tr>
        <?php  
	// Load file koneksi.php  
	include "koneksi.php";   
	 $tahun = $_POST["tahun"]; 
	// Buat query untuk menampilkan semua data siswa 
$query = mysqli_query($koneksi, "SELECT * FROM pengeluaran WHERE YEAR(tgl_pengeluaran) = $tahun");
	// Untuk penomoran tabel, di awal set dengan 1 
	while($data = mysqli_fetch_array($query)){ 
	// Ambil semua data dari hasil eksekusi $sql 
	echo "<tr>";    
	echo "<td>".$data['id_pengeluaran']."</td>";   
	echo "<td>".$data['tgl_pengeluaran']."</td>";    
	echo "<td>".$data['jns_pengeluaran']."</td>";    
	echo "<td>".$data['jumlah']."</td>";      
	echo "<td>".$data['hrg_satuan']."</td>"; 
	echo "<td>".$data['ttl_pengeluaran']."</td>"; 
	echo "</tr>";        
	}  ?>
    </table>
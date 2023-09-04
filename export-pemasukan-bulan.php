    <?php
	$dariTanggal = empty($_POST["dari_tanggal"]) ? date("Y-m-01") : $_POST["dari_tanggal"];
	$sampaiTanggal = empty($_POST["sampai_tanggal"]) ? date("Y-m-31") : $_POST["sampai_tanggal"];
	$regexDari = str_replace("-", "", $dariTanggal);;
	$regexSampai = str_replace("-", "", $sampaiTanggal);;
	header("Content-type: application/vnd-ms-excel");
	header("Content-Disposition: attachment; filename=Data_Pemasukan_Tanggal_".$regexDari."_sampai_tanggal_".$regexSampai.".xls");
	?>



    <?php
	echo "<h3>Data Pemasukan Tanggal ".$dariTanggal." Sampai ".$sampaiTanggal."</h3>"
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
	$query = mysqli_query($koneksi, "SELECT * FROM pemasukan WHERE tgl_pemasukan BETWEEN '$dariTanggal' AND '$sampaiTanggal'");
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
<?php
require_once('tcpdf/tcpdf.php');

// Create a new PDF document
$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
$tahun = $_GET["tahun"];
// Set document information
$pdf->SetCreator('Your Name');
$pdf->SetAuthor('Your Name');
$pdf->SetTitle('Data Pemasukan Tahun ' . $tahun);
$pdf->SetSubject('Data Pemasukan PDF');
$pdf->SetKeywords('Data, Pemasukan, PDF');

// Add a page
$pdf->AddPage();

// Set font
$pdf->SetFont('helvetica', '', 12);

// Connect to the database (assuming you have a file named "koneksi.php" that handles the database connection)
include "koneksi.php";

// Fetch data from the "pemasukan" table filtered by year
$query = mysqli_query($koneksi, "SELECT * FROM pemasukan WHERE YEAR(tgl_pemasukan) = '$tahun'");

// Add table header
$html = '<h3>Data Pemasukan Tahun ' . $tahun . '</h3>
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
</tr>';

// Loop through the data and add table rows
while ($data = mysqli_fetch_array($query)) {
    $html .= '<tr>';
    $html .= '<td>' . $data['id_pemasukan'] . '</td>';
    $html .= '<td>' . $data['tgl_pemasukan'] . '</td>';
    $html .= '<td>' . $data['jenis_barang'] . '</td>';
    $html .= '<td>' . $data['ukuran'] . '</td>';
    $html .= '<td>' . $data['jumlah'] . '</td>';
    $html .= '<td>' . $data['hrg_satuan'] . '</td>';
    $html .= '<td>' . $data['jml_total'] . '</td>';
    $html .= '<td>' . $data['ket'] . '</td>';
    $html .= '</tr>';
}

// Close the table
$html .= '</table>';

// Output HTML as PDF content
$pdf->writeHTML($html, true, false, true, false, '');

// Close and output PDF
$pdf->Output('/home/u676389388/domains/pcippnu.com/keuangan_yuni/Data_Pemasukan_Tahun_' . $tahun . '.pdf', 'F');
header('Location: /keuangan_yuni/Data_Pemasukan_Tahun_' . $tahun . '.pdf');
exit();
?>
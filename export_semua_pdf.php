<?php
require_once('tcpdf/tcpdf.php');

// Create a new PDF document
$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

// Set document information
$pdf->SetCreator('Your Name');
$pdf->SetAuthor('Your Name');
$pdf->SetTitle('Data Pemasukan & Pengeluaran');
$pdf->SetSubject('Data Pemasukan & Pengeluaran PDF');
$pdf->SetKeywords('Data, Pemasukan, Pengeluaran, PDF');

// Add a page
$pdf->AddPage();

// Set font
$pdf->SetFont('helvetica', '', 12);

// Connect to the database (assuming you have a file named "koneksi.php" that handles the database connection)
include "koneksi.php";

// Fetch data from the "pemasukan" table
$queryPemasukan = mysqli_query($koneksi, "SELECT * FROM pemasukan");

// Add Data Pemasukan table
$htmlPemasukan = '<h3>Data Pemasukan</h3>
<table border="1" cellpadding="5">
<tr>
<th>ID Pemasukan</th>
<th>Tgl Pemasukan</th>
<th>Jenis Barang</th>
<th>Ukuran</th>
<th>Jumlah</th>
<th>Harga Satuan</th>
<th>Jumlah Total</th>
<th>Keterangan</th>
</tr>';

while ($dataPemasukan = mysqli_fetch_array($queryPemasukan)) {
    $htmlPemasukan .= '<tr>';
    $htmlPemasukan .= '<td>' . $dataPemasukan['id_pemasukan'] . '</td>';
    $htmlPemasukan .= '<td>' . $dataPemasukan['tgl_pemasukan'] . '</td>';
    $htmlPemasukan .= '<td>' . $dataPemasukan['jenis_barang'] . '</td>';
    $htmlPemasukan .= '<td>' . $dataPemasukan['ukuran'] . '</td>';
    $htmlPemasukan .= '<td>' . $dataPemasukan['jumlah'] . '</td>';
    $htmlPemasukan .= '<td>' . $dataPemasukan['hrg_satuan'] . '</td>';
    $htmlPemasukan .= '<td>' . $dataPemasukan['jml_total'] . '</td>';
    $htmlPemasukan .= '<td>' . $dataPemasukan['ket'] . '</td>';
    $htmlPemasukan .= '</tr>';
}

$htmlPemasukan .= '</table><br><br>';

// Fetch data from the "pengeluaran" table
$queryPengeluaran = mysqli_query($koneksi, "SELECT * FROM pengeluaran");

// Add Data Pengeluaran table
$htmlPengeluaran = '<h3>Data Pengeluaran</h3>
<table border="1" cellpadding="5">
<tr>
<th>ID Pengeluaran</th>
<th>Tgl Pengeluaran</th>
<th>Jenis Pengeluaran</th>
<th>Jumlah</th>
<th>Harga Satuan</th>
<th>Total Pengeluaran</th>
</tr>';

while ($dataPengeluaran = mysqli_fetch_array($queryPengeluaran)) {
    $htmlPengeluaran .= '<tr>';
    $htmlPengeluaran .= '<td>' . $dataPengeluaran['id_pengeluaran'] . '</td>';
    $htmlPengeluaran .= '<td>' . $dataPengeluaran['tgl_pengeluaran'] . '</td>';
    $htmlPengeluaran .= '<td>' . $dataPengeluaran['jns_pengeluaran'] . '</td>';
    $htmlPengeluaran .= '<td>' . $dataPengeluaran['jumlah'] . '</td>';
    $htmlPengeluaran .= '<td>' . $dataPengeluaran['hrg_satuan'] . '</td>';
    $htmlPengeluaran .= '<td>' . $dataPengeluaran['ttl_pengeluaran'] . '</td>';
    $htmlPengeluaran .= '</tr>';
}

$htmlPengeluaran .= '</table>';

// Output HTML as PDF content
$pdf->writeHTML($htmlPemasukan . $htmlPengeluaran, true, false, true, false, '');

// Close and output PDF
$pdf->Output('/home/u676389388/domains/pcippnu.com/yuni/Data_Pemasukan_Pengeluaran.pdf', 'FI');
?>
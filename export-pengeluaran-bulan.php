<?php
require_once('tcpdf/tcpdf.php');

// Create a new PDF document
$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
$dariTanggal = empty($_GET["dari_tanggal"]) ? date("Y-m-01") : $_GET["dari_tanggal"];
$sampaiTanggal = empty($_GET["sampai_tanggal"]) ? date("Y-m-31") : $_GET["sampai_tanggal"];
// Set document information
$pdf->SetCreator('Your Name');
$pdf->SetAuthor('Your Name');
$pdf->SetTitle('Data Pengeluaran Tanggal ' . $dariTanggal . ' Sampai ' . $sampaiTanggal);
$pdf->SetSubject('Data Pengeluaran PDF');
$pdf->SetKeywords('Data, Pengeluaran, PDF');

// Add a page
$pdf->AddPage();

// Set font
$pdf->SetFont('helvetica', '', 12);

// Connect to the database (assuming you have a file named "koneksi.php" that handles the database connection)
include "koneksi.php";

// Fetch data from the "pengeluaran" table within the specified date range
$query = mysqli_query($koneksi, "SELECT * FROM pengeluaran WHERE tgl_pengeluaran BETWEEN '$dariTanggal' AND '$sampaiTanggal'");

// Add table header
$html = '<h3>Data Pengeluaran Tanggal ' . $dariTanggal . ' Sampai ' . $sampaiTanggal . '</h3>
<table border="1" cellpadding="5">
<tr>
<th>ID Pengeluaran</th>
<th>Tgl Pengeluaran</th>
<th>Jenis Pengeluaran</th>
<th> Jumlah</th>
<th> Harga Satuan</th>
<th> Total Pengeluaran</th>
</tr>';

// Loop through the data and add table rows
while ($data = mysqli_fetch_array($query)) {
    $html .= '<tr>';
    $html .= '<td>' . $data['id_pengeluaran'] . '</td>';
    $html .= '<td>' . $data['tgl_pengeluaran'] . '</td>';
    $html .= '<td>' . $data['jns_pengeluaran'] . '</td>';
    $html .= '<td>' . $data['jumlah'] . '</td>';
    $html .= '<td>' . $data['hrg_satuan'] . '</td>';
    $html .= '<td>' . $data['ttl_pengeluaran'] . '</td>';
    $html .= '</tr>';
}

// Close the table
$html .= '</table>';

// Output HTML as PDF content
$pdf->writeHTML($html, true, false, true, false, '');
$filePath = '/home/u676389388/domains/pcippnu.com/keuangan_yuni/Data_Pengeluaran_Tanggal_' . $dariTanggal . '_sampai_tanggal_' . $sampaiTanggal . '.pdf';
// Close and output PDF
$pdf->Output($filePath, 'F');

header('Location: /Data_Pengeluaran_Tanggal_' . $dariTanggal . '_sampai_tanggal_' . $sampaiTanggal .'.pdf');
exit();
?>
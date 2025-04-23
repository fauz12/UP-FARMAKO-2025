<?php

require 'vendor/autoload.php';
 // sesuaikan path jika kamu pakai composer
use Dompdf\Dompdf;

include "koneksi.php";

$html = '
<h2 style="text-align:center;">Laporan Pemesanan Tiket Kereta</h2>
<table border="1" width="100%" cellspacing="0" cellpadding="5">
    <thead>
        <tr>
            <th>No</th>
            <th>Nama Penumpang</th>
            <th>Nama Kereta</th>
            <th>Asal</th>
            <th>Tujuan</th>
            <th>Jumlah Tiket</th>
            <th>Total Bayar</th>
            <th>Status</th>
            <th>Waktu</th>
        </tr>
    </thead>
    <tbody>';

$i = 1;
$query = mysqli_query($koneksi, "
    SELECT pemesanan.*, user.nama, kereta.nama_kereta, jadwal.asal, jadwal.tujuan
    FROM pemesanan 
    LEFT JOIN user ON pemesanan.id_user = user.id_user
    LEFT JOIN jadwal ON pemesanan.id_jadwal = jadwal.id_jadwal
    LEFT JOIN kereta ON jadwal.id_kereta = kereta.id_kereta
    ORDER BY pemesanan.waktu_pemesanan DESC
");

while ($data = mysqli_fetch_array($query)) {
    $html .= '<tr>
        <td>' . $i++ . '</td>
        <td>' . $data['nama'] . '</td>
        <td>' . $data['nama_kereta'] . '</td>
        <td>' . $data['asal'] . '</td>
        <td>' . $data['tujuan'] . '</td>
        <td>' . $data['jumlah_tiket'] . '</td>
        <td>Rp' . number_format($data['total_bayar'], 0, ',', '.') . '</td>
        <td>' . ucfirst($data['status_bayar']) . '</td>
        <td>' . $data['waktu_pemesanan'] . '</td>
    </tr>';
}

$html .= '</tbody></table>';

// Generate PDF
$dompdf = new Dompdf();
$dompdf->loadHtml($html);
$dompdf->setPaper('A4', 'potrait');
$dompdf->render();
$dompdf->stream("laporan_pemesanan_kereta.pdf", array("Attachment" => true)); // true = download
?>

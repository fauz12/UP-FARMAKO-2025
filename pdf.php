<!-- ini kode pdf agar pdf bisa didownload -->
<?php
require 'vendor/autoload.php'; // pastikan path ke autoload benar

use Dompdf\Dompdf;
use Dompdf\Options;

include "koneksi.php";

// HTML untuk ditampilkan sebagai PDF
ob_start();
?>

<h2 align="center">Laporan Pembayaran Tiket</h2>
<table border="1" width="100%" cellspacing="0" cellpadding="5">
    <thead>
        <tr>
            <th>No</th>
            <th>Total Bayar</th>
            <th>Metode Pembayaran</th>
            <th>Status Bayar</th>
            <th>Bukti Bayar</th>
            <th>Waktu Bayar</th>
        </tr>
    </thead>
    <tbody>
        <?php
        $i = 1;
        $query = mysqli_query($koneksi, "SELECT * FROM pembayaran LEFT JOIN pemesanan ON pembayaran.id_pemesanan = pemesanan.id_pemesanan");
        while($data = mysqli_fetch_array($query)){
            echo "<tr>";
            echo "<td>".$i++."</td>";
            echo "<td>Rp".number_format($data['total_bayar'], 0, ',', '.')."</td>";
            echo "<td>".$data['metodebayar']."</td>";
            echo "<td>".$data['status']."</td>";
            echo "<td>";
            if (!empty($data['bukti_bayar'])) {
                $imgPath = 'uploads/' . $data['bukti_bayar'];
                if (file_exists($imgPath)) {
                    $imageData = base64_encode(file_get_contents($imgPath));
                    $src = 'data:image/' . pathinfo($imgPath, PATHINFO_EXTENSION) . ';base64,' . $imageData;
                    echo '<img src="' . $src . '" width="100">';
                } else {
                    echo 'Tidak Ada';
                }
            } else {
                echo '-';
            }
            echo "</td>";
            
            echo "<td>".$data['waktu_bayar']."</td>";
            echo "</tr>";
        }
        ?>
    </tbody>
</table>

<?php
$html = ob_get_clean();

// Konfigurasi Dompdf
$options = new Options();
$options->set('isRemoteEnabled', true);
$dompdf = new Dompdf($options);

// Muat HTML ke dompdf
$dompdf->loadHtml($html);

// Set ukuran dan orientasi kertas
$dompdf->setPaper('A4', 'potrait');

// Render PDF
$dompdf->render();

// Unduh PDF
$dompdf->stream("laporan_pembayaran_" . date("Ymd") . ".pdf", array("Attachment" => true));
?>

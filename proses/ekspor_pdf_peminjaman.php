<?php
require("../vendor/autoload.php");
require("../koneksi.php");
use Dompdf\Dompdf;
$dompdf = new Dompdf();
$query = mysqli_query($db,"select * from tbpinjam");
$html = '<html><center><h3>Daftar Transaksi Peminjaman Perpusatakaan Umum</h3></center><hr/><br/>';
$html .= '<table border="1" width="100%">
 <tr>
 <th>ID Peminjaman</th>
 <th>ID Anggota</th>
 <th>ID Buku</th>
 <th>Tanggal Pinjam</th>
 </tr>';
while($row = mysqli_fetch_array($query))
{
 $html .= '<tr>
 <td>'.$row['idpeminjaman'].'</td>
 <td>'.$row['idanggota'].'</td>
 <td>'.$row['idbuku'].'</td>
 <td>'.$row['tglpinjam'].'</td>

 </tr>';
}
$html .= "</html>";
$dompdf->loadHtml($html);
// Setting ukuran dan orientasi kertas
$dompdf->setPaper('A4', 'potrait');
// Rendering dari HTML Ke PDF
$dompdf->render();
// Melakukan output file Pdf
$dompdf->stream('Daftar Transaksi Peminjaman Perpustakaan.pdf');
?>
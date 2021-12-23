<?php 
require("../vendor/autoload.php");
require("../koneksi.php");

use Dompdf\Dompdf;

// $menu = [
//     ['nama' => 'jeruk','jenis' => 'Buah', 'harga' => 14000],
//     ['nama' => 'pisang','jenis' => 'Buah', 'harga' => 12000],
//     ['nama' => 'Nasi Goreng','jenis' => 'Makanan', 'harga' => 12000],
//     ['nama' => 'Mie Goreng','jenis' => 'Makanan', 'harga' => 10000],
//     ['nama' => 'Jus Jambu','jenis' => 'Minuman', 'harga' => 6000],
//     ['nama' => 'Air Mineral','jenis' => 'Minuman', 'harga' => 3000],
//     ['nama' => 'Wortel','jenis' => 'sayur', 'harga' => 9000],
//     ['nama' => 'Tomat','jenis' => 'sayur', 'harga' => 5000],
// ];

$html = '<h1>Daftar Anggota Perpustakaan Umum</h1>';
$html .= '<table width="100%" border="1" cellspacing="0" cellpadding="2">
            <thead>
            <tr>
                <th>No</th>
                <th>ID Anggota</th>
                <th>Nama</th>
                <th>Foto</th>
                <th>Jenis Kelamin</th>
                <th>Alamat</th>
            </tr>
            </thead>';
// if(count($menu) > 0){
//     foreach ($menu as $idx => $val) {
//         $idx++;
//         $html .= '<tr>
//                     <td>'.$idx.'</td>
//                     <td>'.$val['nama'].'</td>
//                     <td>'.$val['jenis'].'</td>
//                     <td>'.$val['harga'].'</td>
//                 </tr>';
//     }
// }else{
//     $html ='<tr><td colspan="4" align="center"> Tidak ada data</td></tr>';
// }
$nomor=1;
$query="SELECT * FROM tbanggota ORDER BY idanggota DESC";
$q_tampil_anggota = mysqli_query($db, $query);

if(mysqli_num_rows($q_tampil_anggota)>0){
while($r_tampil_anggota=mysqli_fetch_array($q_tampil_anggota)){
    if(empty($r_tampil_anggota['foto'])or($r_tampil_anggota['foto']=='-')){
        $foto = "admin-no-photo.jpg";
 } else {
    $foto = $r_tampil_anggota['foto'];
 }
 $html .= '<tr>
                <td>'.$nomor.'</td>
                <td>'.$r_tampil_anggota['idanggota'].'</td>
                <td>'.$r_tampil_anggota['nama'].'</td>
                <td><img src="http://localhost/DTS/TugasPertemuan12dan13/images/'.$foto.'" width="70px" height="70px"></td>
                <td>'.$r_tampil_anggota['jeniskelamin'].'</td>
                <td>'.$r_tampil_anggota['alamat'].'</td>
        </tr>';  
$nomor++; 
} // end looping 
} else {
$html .= '<tr><td colspan="4" align="center">Tidak Ada Data</td></tr>';
}         

$html .= '</tbody></html>'; 
 //echo $html;

$dompdf = new Dompdf();                         // instansiasi class Dompdf
$dompdf->set_option('isRemoteEnabled', TRUE);
$dompdf->loadHtml($html);                       // isi konten (format HTML) untuk dokumen pdf
$dompdf->setPaper('a4','landscape');            // set ukuran dan orientasi dokumen pdf
$dompdf->render();                              // vender kode HTML menjadi pdf
$dompdf->stream();                              // stream pdf ke browser
?>
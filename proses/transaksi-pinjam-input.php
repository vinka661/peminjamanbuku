<?php 
// menyisipkan/memanggil file koneksi.php untuk koneksi data dengan basis data 


 
if(isset($_POST['simpan'])) { 
    include '../koneksi.php'; 

    $idpeminjaman = $_POST['idpeminjaman']; 
    $idanggota = $_POST['idanggota']; 
    $idbuku = $_POST['idbuku']; 
    $tglpinjam = $_POST['tglpinjam'];

    $sql = "INSERT INTO tbpinjam VALUES('$idpeminjaman','$idanggota','$idbuku','$tglpinjam')"; 
    $query = mysqli_query($db, $sql); 

    header("location:../index.php?p=transaksi-peminjaman");
}
?> 
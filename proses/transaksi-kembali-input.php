<?php 
// menyisipkan/memanggil file koneksi.php untuk koneksi data dengan basis data 


 
if(isset($_POST['simpan'])) { 
    include '../koneksi.php'; 

    $idpengembalian = $_POST['idpengembalian']; 
    $idanggota = $_POST['idanggota']; 
    $idbuku = $_POST['idbuku']; 
    $tglkembali = $_POST['tglkembali'];

    $sql = "INSERT INTO tbkembali VALUES('$idpengembalian','$idanggota','$idbuku','$tglkembali')"; 
    $query = mysqli_query($db, $sql); 

    header("location:../index.php?p=transaksi-pengembalian");
}
?> 
<?php 
// menyisipkan/memanggil file koneksi.php untuk koneksi data dengan basis data 


 
if(isset($_POST['simpan'])) { 
    include '../koneksi.php'; 

    $idpengembalian = $_POST['idpengembalian']; 
    $idanggota = $_POST['idanggota']; 
    $idbuku = $_POST['idbuku']; 
    $tglkembali = $_POST['tglkembali'];

    mysqli_query($db, "UPDATE tbkembali 
    SET idbuku='$idbuku', tglpinjam='$tglpinjam' 
    WHERE idpengembalian = '$idpengembalian'"); 

    header("location:../index.php?p=transaksi-pengembalian");
}
?> 
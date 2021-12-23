<?php 
    include '../koneksi.php'; // menyisipkan/memanggil file koneksi.php untuk koneksi data dengan basis data 
    
    $idpeminjaman = $_GET['id']; 
    
    mysqli_query($db,"DELETE FROM tbpinjam WHERE idpeminjaman = '$idpeminjaman'"); 
    
    header("location:../index.php?p=transaksi-peminjaman"); 
?> 
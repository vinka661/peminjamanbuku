<?php 
    include '../koneksi.php'; // menyisipkan/memanggil file koneksi.php untuk koneksi data dengan basis data 
    
    $idpengembalian = $_GET['id']; 
    
    mysqli_query($db,"DELETE FROM tbkembali WHERE idpengembalian = '$idpengembalian'"); 
    
   
    header("location:../index.php?p=transaksi-pengembalian");
?> 
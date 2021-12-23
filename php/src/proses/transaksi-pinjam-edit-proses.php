<?php 
// menyisipkan/memanggil file koneksi.php untuk koneksi data dengan basis data 


 
if(isset($_POST['simpan'])) { 
    include '../koneksi.php'; 

    $idpeminjaman = $_POST['idpeminjaman']; 
    $idanggota = $_POST['idanggota']; 
    $idbuku = $_POST['idbuku']; 
    $tglpinjam = $_POST['tglpinjam'];

    mysqli_query($db, "UPDATE tbpinjam 
                            SET idbuku='$idbuku', tglpinjam='$tglpinjam' 
                            WHERE idpeminjaman = '$idpeminjaman'"); 

    header("location:../index.php?p=transaksi-peminjaman");
}
?> 
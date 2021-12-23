<?php 
 session_start();// menjalankan sesion php 
 $_SESSION['sesi'] = NULL;

 include "koneksi.php";

 if (isset ($_POST['submit'])) {// cek apakah ada request POST yang masuk
     $user  = isset($_POST['user']) ? $_POST['user'] : "";
     $pass  = isset($_POST['pass']) ? $_POST['pass'] : "";
     $qry   = mysqli_query($db, "SELECT * FROM admin WHERE username = '$user' AND password = '$pass'");
     $sesi  = mysqli_num_rows($qry);

     if ($sesi == 1) { // jika hasil querry 1 baris data terdapat data yang di carai pada BD
         $data_admin = mysqli_fetch_array($qry);
         $_SESSION['idadmin'] = $data_admin['idadmin']; //set variabel global
         $_SESSION['sesi'] = $data_admin['nm_admin'];

         echo "<script>alert('Anda berhasil Log in');</script>";
         echo "<meta http-equiv='refresh' content='0; url=index.php?user=$sesi'>";

     }else{
        echo "<meta http-equiv='refresh' content='0; url=login.php'>";
        echo "<script>alert('Anda Gagal Log in');</script>";
     }

 } else{
     include "login.php"; //jika tidak ada request POST yang masuk maka mengalihkan ke form login
 }

?>
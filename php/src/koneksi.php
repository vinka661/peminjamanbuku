<?php 
    $server = "172.20.0.2";
    $user = "root";
    $password = "admin";
    $nama_database = "dbperpus";

    $db = mysqli_connect( $server, $user, $password, $nama_database);

    if (!$db) {
        die ("Gagal Terhubung dengan database: " . mysqli_connect_error());
    }
?>
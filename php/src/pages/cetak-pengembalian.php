<?php 
    include "../koneksi.php"; // menyisipkan/memanggil file koneksi.php untuk koneksi data dengan basis data 
?> 
<link rel="stylesheet" type="text/css" href="../style.css"> 
<h3>Data Transaksi Pengembalian</h3> 
<div id="content"> 
    <table border="1" id="tabel-tampil">
        <thead> 
            <tr> 
                <th id="label-tampil-no">No</td> 
                <th>ID Transaksi Pengembalian</th> 
                <th>ID Anggota</th>  
                <th>ID Buku</th>
                <th>Tanggal Pengembalian</th> 
            </tr> 
        </thead> 
        <?php
        $nomor = 1;
        $query = "SELECT * FROM tbkembali ORDER BY idpengembalian DESC";
        $q_tampil_kembali = mysqli_query($db, $query);
        if (mysqli_num_rows($q_tampil_kembali) > 0) {
            while ($r_tampil_kembali = mysqli_fetch_array($q_tampil_kembali)) {
        ?>
                <tr>
                <td><?php echo $nomor; ?></td>
                <td><?php echo $r_tampil_kembali['idpengembalian']; ?></td>
                <td><?php echo $r_tampil_kembali['idanggota']; ?></td>
                <td><?php echo $r_tampil_kembali['idbuku']; ?></td>
                <td><?php echo $r_tampil_kembali['tglkembali']; ?></td>
                </tr>
        <?php 
        $nomor++;
            }
        } ?>
    </table>
    <script>
        window.print();
    </script>
</div>
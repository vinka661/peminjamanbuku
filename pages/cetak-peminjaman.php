<?php 
    include "../koneksi.php"; // menyisipkan/memanggil file koneksi.php untuk koneksi data dengan basis data 
?> 
<link rel="stylesheet" type="text/css" href="../style.css"> 
<h3>Data Transaksi Peminjaman</h3> 
<div id="content"> 
    <table border="1" id="tabel-tampil">
        <thead> 
            <tr> 
                <th id="label-tampil-no">No</td> 
                <th>ID Transaksi</th> 
                <th>ID Anggota</th>  
                <th>ID Buku</th>
                <th>Tanggal Peminjaman</th> 
            </tr> 
        </thead> 
        <?php
        $nomor = 1;
        $query = "SELECT * FROM tbpinjam ORDER BY idpeminjaman DESC";
        $q_tampil_pinjam = mysqli_query($db, $query);
        if (mysqli_num_rows($q_tampil_pinjam) > 0) {
            while ($r_tampil_pinjam = mysqli_fetch_array($q_tampil_pinjam)) {
        ?>
                <tr>
                <td><?php echo $nomor; ?></td>
                <td><?php echo $r_tampil_pinjam['idpeminjaman']; ?></td>
                <td><?php echo $r_tampil_pinjam['idanggota']; ?></td>
                <td><?php echo $r_tampil_pinjam['idbuku']; ?></td>
                <td><?php echo $r_tampil_pinjam['tglpinjam']; ?></td>
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
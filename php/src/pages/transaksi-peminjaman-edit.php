<?php 
    $idpeminjaman = $_GET['id']; 
    $q_tampil_pinjam = mysqli_query($db,"SELECT * FROM tbpinjam WHERE idpeminjaman = '$idpeminjaman'"); 
    $r_tampil_pinjam = mysqli_fetch_array($q_tampil_pinjam); 

?> 
<div id="label-page"><h3>Edit Data Peminjaman</h3></div> 
<div id="content"> 
    <form action="proses/transaksi-pinjam-edit-proses.php" method="post" enctype="multipart/form-data"> 
        <table id="tabel-input">  
            <tr> 
                <td class="label-formulir">ID Peminjaman</td> 
                <td class="isian-formulir"><input type="text" name="idpeminjaman" value="<?php echo $r_tampil_pinjam['idpeminjaman']; ?>" readonly="readonly" 
                class="isian-formulir isian-formnlir-border warna-formulir-disabled"></td> 
            </tr>
            <tr> 
                <td class="label-formulir">ID Anggota</td> 
                <td class="isian-formulir"><input type="text" name="idanggota" value="<?php echo $r_tampil_pinjam['idanggota']; ?>" readonly="readonly" 
                class="isian-formulir isian-formnlir-border warna-formulir-disabled"> </td> 
            </tr>
            <tr> 
                <td class="label-formulir">ID Buku</td> 
                <td class="isian-formulir"><select class="form-control" required name="idbuku" id="idbuku">
				                    <option value="">Select Buku</option>
									<?php
                                    $sql = mysqli_query($db, "SELECT * FROM tbbuku");
                                    foreach ($sql as $value){
                                        ?>
                                        <option value="<?= $value['idbuku']; ?>"><?= $value['idbuku']; ?>;<?= $value['judul']; ?></option>
                                        <?php
                                    }
									?>
									</select>
                                    </td> 
            </tr>
            <tr> 
                <td class="label-formulir">Tanggal Peminjaman</td> 
                <td class="isian-formulir"><input type="date" name="tglpinjam" value="<?php echo $r_tampil_pinjam['tglpinjam']; ?>"  ></td> 
            </tr>
            <tr> 
                <td class="label-formulir"></td> 
                <td class="isian-formulir"><input type="submit" name="simpan" value="Simpan" id="tombol-simpan"></td> 
            </tr> 
        </table> 
    </form> 
</div> 
            
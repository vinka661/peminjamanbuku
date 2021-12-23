<?php 
    $idpengembalian = $_GET['id']; 
    $q_tampil_kembali = mysqli_query($db,"SELECT * FROM tbkembali WHERE idpengembalian = '$idpengembalian'"); 
    $r_tampil_kembali = mysqli_fetch_array($q_tampil_kembali); 

?> 
<div id="label-page"><h3>Edit Data Pengembalian</h3></div> 
<div id="content"> 
    <form action="proses/transaksi-kembali-edit-proses.php" method="post" enctype="multipart/form-data"> 
        <table id="tabel-input">  
            <tr> 
                <td class="label-formulir">ID Pengembalian</td> 
                <td class="isian-formulir"><input type="text" name="idpengembalian" value="<?php echo $r_tampil_kembali['idpengembalian']; ?>" readonly="readonly" 
                class="isian-formulir isian-formnlir-border warna-formulir-disabled"></td> 
            </tr>
            <tr> 
                <td class="label-formulir">ID Anggota</td> 
                <td class="isian-formulir"><input type="text" name="idanggota" value="<?php echo $r_tampil_kembali['idanggota']; ?>" readonly="readonly" 
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
                <td class="label-formulir">Tanggal Pengembalian</td> 
                <td class="isian-formulir"><input type="date" name="tglkembali" value="<?php echo $r_tampil_kembali['tglkembali']; ?>"  ></td> 
            </tr>
            <tr> 
                <td class="label-formulir"></td> 
                <td class="isian-formulir"><input type="submit" name="simpan" value="Simpan" id="tombol-simpan"></td> 
            </tr> 
        </table> 
    </form> 
</div> 
            
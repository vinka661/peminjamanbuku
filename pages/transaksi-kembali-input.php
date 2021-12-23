
<div id="label-page"><h3>Input Data Transaksi Pengembalian</h3></div>
<div id="content"> 
    <form action="proses/transaksi-kembali-input.php" method="post" enctype="multipart/form-data">
    
    <table id="tabel-input">
        <tr> 
            <td class="label-formulir">ID Transaksi Pengembalian</td> 
            <td class="isian-formulir"><input type="text" name="idpengembalian" class="isian-formulir isian-formulir-border"></td> 
        </tr>
        <tr> 
            <td class="label-formulir">ID Anggota</td> 
			<td class="isian-formulir"><select class="form-control" required name="idanggota" id="idanggota">
				                    <option value="">Select Anggota</option>
									<?php
                                    $sql = mysqli_query($db, "SELECT * FROM tbanggota");
                                    foreach ($sql as $value){
                                        ?>
                                        <option value="<?= $value['idanggota']; ?>"><?= $value['idanggota']; ?></option>
                                        <?php
                                    }
									?>
									</select>
                                    </td> 
			
        </tr> 
        <!-- <tr> 
            <td class="label-formulir">ID Buku</td> 
            <td class="isian-formulir"><input type="text" name="id_buku" class="isian-formulir isian-formulir-border"></td> 
        </tr> -->
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
            <td class="isian-formulir"><input type="date" name="tglkembali" value="tglkembali" placeholder="Tanggal Kembali"></td> 
        </tr> 
        <tr> 
            <td class="label-formulir"></td> 
            <td class="isian-formulir"><input type="submit" name="simpan" value="Simpan" class="tombol"></td> 
        </tr>
    </table> 
    </form> 
</div> 

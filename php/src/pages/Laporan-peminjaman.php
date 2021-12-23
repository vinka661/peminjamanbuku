<div id="label-page"><h3>Laporan Transaksi Peminjaman</h3></div> 
<div id="content">
    <p id="tombol-tambah-container">
        <!-- <a href="index.php?p=transaksi-pinjam-input" class="tombol">Tambah Transaksi</a>  -->
        <a target="_blank" href="pages/cetak-peminjaman.php"><img src="images/print.png" height="50px" height="50px"></a>&nbsp;
        <a target="_blank" href="proses/ekspor_pdf_peminjaman.php"><img src="images/pd.png" height="50px" height="50px"></a>&nbsp;&nbsp;
        <a target="_blank" href="proses/ekspor_excel_Peminjaman.php"><img src="images/ex.png" height="50px" height="50px"></a>&nbsp;&nbsp;
        <div class="form-inline"> 
            <div align="right"> 
                <!-- <form method=post> 
                    <input type="text" name="pencarian"> 
                    <input type="submit" name="search" value="search" class="tombol"> 
                </form>  -->
            </div> 
        </div>
    </p> 
    <table id="tabel-tampil"> 
        <thead> 
            <tr> 
                <th id="label-tampil-no">No</td> 
                <th>ID Transaksi</th> 
                <th>ID Anggota</th>  
                <th>ID Buku</th>
                <th>Tanggal Peminjaman</th> 
            </tr> 
        </thead> 
        <tbody> 
            <?php 
                $batas = 5;
                extract($_GET); 
                if(empty($hal)) { 
                    $posisi = 0; 
                    $hal = 1; 
                    $nomor = 1; 
                }else { 
                    $posisi = ($hal - 1) * $batas; 
                    $nomor = $posisi+1; 
                }

                if($_SERVER['REQUEST_METHOD'] == "POST") { 
                    $pencarian = trim(mysqli_real_escape_string($db, $_POST['pencarian'])); 
                    if($pencarian != "") { 
                        $sql = "SELECT * FROM tbpinjam WHERE judul LIKE '%$pencarian%' 
                                OR idbuku LIKE '%$pencarian%' 
                                OR idanggota LIKE '%$pencarian%' 
                                OR tglpinjam LIKE '%$pencarian%'"; 

                        $query = $sql; 
                        $queryJml = $sql; 

                    } else { 
                        $query = "SELECT * FROM tbpinjam LIMIT $posisi, $batas"; 
                        $queryJml = "SELECT * FROM tbpinjam"; 
                        $no = $posisi * 1; 
                    }
                }
                else { 
                    $query = "SELECT * FROM tbpinjam LIMIT $posisi, $batas"; 
                    $queryJml = "SELECT * FROM tbpinjam"; 
                    $no = $posisi * 1; 
                }

                		//$sql="SELECT * FROM tbbuku ORDER BY idanggota DESC";
		$q_tampil_pinjam = mysqli_query($db, $query);
		if(mysqli_num_rows($q_tampil_pinjam)>0)
		{
		while($r_tampil_pinjam=mysqli_fetch_array($q_tampil_pinjam)){
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
                    }   // selesai looping while 
                } 
                else { 
                    echo "<tr><td colspan=6>Data Tidak Ditemukan</td></tr>"; 
                }
            ?> 
        </tbody>
    </table>
    
    <?php 
    if(isset($_POST['pencarian'])) { 
        if($_POST['pencarian']!='') { 
            echo "<div style=\"float:left;\">"; 
            $jml = mysqli_num_rows(mysqli_query($db, $queryJml)); 
            echo "Data Hasil Pencarian: <b>$jml</b>"; 
            echo "</div>"; 
        }
    } else { 
    ?> 
        <div style="float: left;"> 
        <?php 
            $jml = mysqli_num_rows(mysqli_query($db, $queryJml)); 
            echo "Jumlah Data : <b>$jml</b>"; 
        ?> 
        </div>
        <div class="pagination" style="float: right;"> 
            <?php 
                $jml_hal = ceil($jml / $batas); 
                for($i = 1; $i <= $jml_hal; $i++) { 
                    if($i != $hal) { 
                        echo "<a href=\"?p=buku&hal=$i\">$i</a>"; 
                    } else { 
                        echo "<a class=\"active\">$i</a>"; 
                    } 
                }
            ?>
        </div> 
    <?php 
    } 
    ?> 
</div> 

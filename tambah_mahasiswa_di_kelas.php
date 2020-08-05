<div id="content-show">
    <div class="content-show-header">
        <p>Tambah Kelas</p>
    </div>
    <div class="content-show-data">
        <form method="POST" action="proses_tambah_kelas.php">
            <div class="info-header">
                <hr>
                <h3>Data Kelas</h3>
                <hr>
            </div>
            <input type="hidden" value="<?php echo $_GET['kode_mk'] ?>" name="kode_mk">
            <div class="group-info">
                <p>Mahasiswa</p>
                <select name="nrp">
                    <?php

                        $result = $conn->query("SELECT nrp, nama FROM mahasiswa
                                                EXCEPT
                                                SELECT nrp, nama FROM mahasiswa m INNER JOIN mata_kuliah_has_mahasiswa mm WHERE m.nrp=mm.mahasiswa_nrp AND mm.mata_kuliah_kode_mk='$_GET[kode_mk]'");
                        
                        while($row=$result->fetch_assoc()) {

                            echo "<option value='$row[nrp]'>$row[nrp] - $row[nama]</option>";
                            
                        }

                    ?>
                </select>
            </div>
            <div class="group-info">
                <p>NTS</p>
                <input type="text" name="nts">
            </div>
            <div class="group-info">
                <p>NAS</p>
                <input type="text" name="nas">
            </div>
            <button>Tambah</button>
        </form>
    </div>
</div>
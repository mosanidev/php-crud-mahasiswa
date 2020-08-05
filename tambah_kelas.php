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
            <input type="hidden" value="<?php echo $_GET['nrp'] ?>" name="nrp">
            <div class="group-info">
                <p>Mata Kuliah</p>
                <select id="select-mk" onchange="generateSKS()" name="mk">
                    <?php

                        $result = $conn->query("SELECT kode_mk, nama, sks FROM mata_kuliah
                                                EXCEPT
                                                SELECT kode_mk, nama, sks FROM mata_kuliah m INNER JOIN mata_kuliah_has_mahasiswa mm WHERE m.kode_mk=mm.mata_kuliah_kode_mk AND mm.mahasiswa_nrp='$_GET[nrp]'");
                        $arr_mk = [];
                        while($row=$result->fetch_assoc()) {

                            echo "<option value='$row[kode_mk]'>$row[kode_mk] - $row[nama]</option>";
                            array_push($arr_mk, "$row[kode_mk]-$row[sks]");

                        }
                        
                    ?>
                </select>
            </div>
            <div class="group-info">
                <p>SKS</p>
                <p id="p-sks">-</p>
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
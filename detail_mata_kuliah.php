<?php

    extract($_GET);

?>

<div id="content-show">
    <div class="content-show-header">
        <p>Detail Mata Kuliah</p>
    </div>
    <div class="content-show-data">
        <div class="info-header">
            <hr>
            <h3>Data Mata Kuliah</h3>
            <hr>
        </div>
        <div class="group-info">
            <p>Kode MK</p><p><?php echo $kode_mk; ?></p>
        </div>
        <div class="group-info">
            <p>Nama</p><p><?php echo $nama; ?></p>
        </div>
        <div class="group-info">
            <p>SKS</p><p><?php echo $sks; ?></p>
        </div>
        <div class="info-header">
            <hr>
            <h3>Daftar Mahasiswa di Kelas</h3>
            <hr>
        </div>
        <div class="info-table">

            <!-- <div class="tampil-jumlah-data">
                <p>Menampilkan 
                    <select name="jumlah_data">
                        <option value="10">10</option>
                        <option value="25">25</option>
                        <option value="50">50</option>
                        <option value="100">100</option>
                    </select>
                data</p>
            </div> -->

            <?php  
                if ($tipe == 'admin') {
                    echo "<a class='btn-add2' href='index.php?page=tambah_mahasiswa_di_kelas&kode_mk=$kode_mk'>Tambah Mahasiswa</a>"; 
                }
            ?>

            <table>
                <tr>
                    <th>No</th>
                    <th>NRP</th>
                    <th>Nama</th>
                    <th>NTS</th>
                    <th>NAS</th>
                    <th>Nisbi</th>
                    <th>Action</th>
                </tr>
                
                <?php
                    
                    $result = $conn->query("SELECT mata_kuliah_kode_mk, mahasiswa_nrp, nama, nts, nas, nisbi FROM mata_kuliah_has_mahasiswa mm INNER JOIN mahasiswa m ON mm.mahasiswa_nrp=m.nrp WHERE mm.mata_kuliah_kode_mk='$kode_mk'");

                    $i = 0;
                    while($row=$result->fetch_assoc()){
                        $i += 1;

                        echo "<tr>
                                <td>$i</td>
                                <td>$row[mahasiswa_nrp]</td>
                                <td>$row[nama]</td>
                                <td>$row[nts]</td>
                                <td>$row[nas]</td>
                                <td>$row[nisbi]</td>
                                <td class='last-cell'>
                                    <a href='index.php?page=ubah_nilai_kelas&kode_mk=$row[mata_kuliah_kode_mk]&nrp=$row[mahasiswa_nrp]&nts=$row[nts]&nas=$row[nas]&halaman=mata_kuliah'>ubah nilai</a>
                                    <a href='index.php?page=hapus_kelas&kode_mk=$row[mata_kuliah_kode_mk]&nrp=$row[mahasiswa_nrp]&halaman=mata_kuliah'>hapus</a>
                                </td>
                            </tr>
                            ";
                    }

                ?>
                    
            </table>
        </div>
    </div>
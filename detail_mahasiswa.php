<?php

    extract($_GET);
    include_once("function/hitung_ipk.php");
    include_once("function/hitung_nisbi.php");

    $sks = [];
    $nisbi = [];
    
    $result_ipk_sks = $conn->query("SELECT sks, nisbi FROM mata_kuliah m INNER JOIN mata_kuliah_has_mahasiswa mm ON m.kode_mk = mm.mata_kuliah_kode_mk WHERE mm.mahasiswa_nrp=$nrp");

    while($row=$result_ipk_sks->fetch_assoc()) {
        array_push($sks, $row["sks"]);
        array_push($nisbi, $row["nisbi"]);
    }

    $total_sks_updated = array_sum($sks);

    $ipk_updated = hitung_ipk($sks, $nisbi);

    $update_ipk_sks = $conn->query("UPDATE mahasiswa SET total_sks='$total_sks_updated', ipk='$ipk_updated' WHERE nrp='$nrp'");
    
?>

<div id="content-show">
    <div class="content-show-header">
        <p>Detail Mahasiswa</p>
    </div>
    <div class="content-show-data">
        <div class="info-header">
            <hr>
            <h3>Data Pribadi</h3>
            <hr>
        </div>
        <div class="group-info">
            <p>NRP</p><p><?php echo $nrp; ?></p>
        </div>
        <div class="group-info">
            <p>Nama</p><p><?php echo $nama; ?></p>
        </div>
        <div class="group-info">
            <p>Alamat</p><p><?php echo $alamat; ?></p>
        </div>
        <div class="group-info">
            <p>No. Handphone</p><p><?php echo $phone; ?></p>
        </div>
        <div class="group-info">
            <p>Email</p><p><?php echo $email; ?></p>
        </div>
        <div class="group-info">
            <p>Kota Tinggal</p><p><?php echo $kota_tinggal; ?></p>
        </div>
        <div class="group-info">
            <p>Kota Lahir</p><p><?php echo $kota_lahir; ?></p>
        </div>
        <div class="group-info">
            <p>Tanggal Lahir</p><p><?php echo $tanggal_lahir; ?></p>
        </div>
        <div class="info-header">
            <hr>
            <h3>Data Akademik</h3>
            <hr>
        </div>
        <div class="group-info">
            <p>Total SKS</p><p><?php echo $total_sks_updated; ?></p>
        </div>
        <div class="group-info">
            <p>IPK</p><p><?php echo $ipk_updated; ?></p>
        </div>
        <div class="group-info">
            <p>Status</p><p><?php echo $status; ?></p>
        </div>
        <div class="info-header">
            <hr>
            <h3>Data Mata Kuliah</h3>
            <hr>
        </div>
        <div class="info-table">

            <?php  
                if ($tipe == 'admin') {
                    echo "<a class='btn-add2' href='index.php?page=tambah_kelas&nrp=$nrp'>Tambah Kelas</a>"; 
                }
            ?>

            <table>
                <tr>
                    <th>No</th>
                    <th>Kode MK</th>
                    <th>Nama</th>
                    <th>SKS</th>
                    <th>NTS</th>
                    <th>NAS</th>
                    <th>Nisbi</th>
                    <?php if ($tipe == "admin") { echo "<th>Action</th>"; } ?>
                </tr>
                
                <?php
                    $halaman = 10;

                    $page = isset($_GET['halaman']) ? $_GET['halaman'] : 1;

                    $mulai = ($page>1) ? ($page * $halaman) - $halaman : 0;

                    if ($page == "all") {

                        $result = $conn->query("SELECT kode_mk, nama, sks, nts, nas, nisbi FROM mata_kuliah m INNER JOIN mata_kuliah_has_mahasiswa mm ON m.kode_mk = mm.mata_kuliah_kode_mk WHERE mm.mahasiswa_nrp=$nrp");

                    } else {

                        // sql output : return only 10 data start on record 11 
                        $result = $conn->query("SELECT kode_mk, nama, sks, nts, nas, nisbi FROM mata_kuliah m INNER JOIN mata_kuliah_has_mahasiswa mm ON m.kode_mk = mm.mata_kuliah_kode_mk WHERE mm.mahasiswa_nrp=$nrp LIMIT $mulai, $halaman");

                    }

                    $result_total_mk = $conn->query("SELECT * FROM mata_kuliah_has_mahasiswa WHERE mahasiswa_nrp=$nrp");

                    $total = $result_total_mk->num_rows;

                    $pages = ceil($total/$halaman);

                    $i = 0;
                    while($row=$result->fetch_assoc()){
                        $i += 1;
                        
                        if ($tipe == "admin") {

                            echo "<tr>
                                <td>$i</td>
                                <td>$row[kode_mk]</td>
                                <td>$row[nama]</td>
                                <td>$row[sks]</td>
                                <td>$row[nts]</td>
                                <td>$row[nas]</td>
                                <td>$row[nisbi]</td>
                                <td class='last-cell'>
                                    <a href='index.php?page=ubah_nilai_kelas&kode_mk=$row[kode_mk]&nrp=$nrp&nts=$row[nts]&nas=$row[nas]&halaman=mahasiswa'>ubah nilai</a>
                                    <a href='index.php?page=hapus_kelas&kode_mk=$row[kode_mk]&nrp=$nrp&halaman=mahasiswa'>hapus</a>
                                </td>
                            </tr>
                            ";


                        } else if ($tipe == "mahasiswa") {

                            echo "<tr>
                                    <td>$i</td>
                                    <td>$row[kode_mk]</td>
                                    <td>$row[nama]</td>
                                    <td>$row[sks]</td>
                                    <td>$row[nts]</td>
                                    <td>$row[nas]</td>
                                    <td class='last-cell2'>$row[nisbi]</td>
                                  </tr>
                                 ";

                        }
                        
                                  
                    }
                ?>
                    
            </table>
            <div class="pagination-bottom">
                <?php 
                    for ($i=1; $i<=$pages; $i++){ 
                        echo "<a href='index.php?page=detail_mahasiswa&nrp=$nrp&nama=$nama&alamat=$alamat&tanggal_lahir=$tanggal_lahir&kota_tinggal=$kota_tinggal&kota_lahir=$kota_lahir&phone=$phone&status=$status&total_sks=$total_sks&ipk=$ipk&email=$email&halaman=$i'>$i</a>";
                    }
                    echo "<a href='index.php?page=detail_mahasiswa&nrp=$nrp&nama=$nama&alamat=$alamat&tanggal_lahir=$tanggal_lahir&kota_tinggal=$kota_tinggal&kota_lahir=$kota_lahir&phone=$phone&status=$status&total_sks=$total_sks&ipk=$ipk&email=$email&halaman=all'>Tampilkan Semua</a>";
                 ?>
            </div>
        </div>
    </div>
</div>
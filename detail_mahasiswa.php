<?php

    extract($_GET);

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
            <p>Total SKS</p><p><?php echo $total_sks; ?></p>
        </div>
        <div class="group-info">
            <p>IPS Terakhir</p><p><?php echo $ips_terakhir; ?></p>
        </div>
        <div class="group-info">
            <p>IPK</p><p><?php echo $ipk; ?></p>
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

            <div class="tampil-jumlah-data">
                <p>Menampilkan 
                    <select name="jumlah_data">
                        <option value="10">10</option>
                        <option value="25">25</option>
                        <option value="50">50</option>
                        <option value="100">100</option>
                    </select>
                data</p>
            </div>

            <?php  
                if ($tipe == 'admin') {
                    echo "<a class='btn-add2' href='index.php?page=tambah_mata_kuliah'>Tambah Mata Kuliah</a>"; 
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
                    <th>Action</th>
                </tr>
                
                <?php
                    
                    $result = $conn->query("SELECT kode_mk, nama, sks, nts, nas, nisbi FROM mata_kuliah m INNER JOIN mata_kuliah_has_mahasiswa mm ON m.kode_mk = mm.mata_kuliah_kode_mk WHERE mm.mahasiswa_nrp=$nrp");

                    $i = 0;
                    while($row=$result->fetch_assoc()){
                        $i += 1;

                        echo "<tr>
                                <td>$i</td>
                                <td>$row[kode_mk]</td>
                                <td>$row[nama]</td>
                                <td>$row[sks]</td>
                                <td>$row[nts]</td>
                                <td>$row[nas]</td>
                                <td>$row[nisbi]</td>
                                <td class='last-cell'>
                                    <a href='detail_mata_kuliah.php'>detail</a>
                                </td>
                            </tr>
                            ";
                    }

                ?>
                    
            </table>
        </div>
    </div>
<div id="content-list">
    <div class="content-list-header">
        <p>List Mahasiswa</p>
    </div>
    <div class="content-list-table">

        <table>
            <tr>
                <th>No</th>
                <th>NRP</th>
                <th>Nama</th>
                <th>Action</th>
            </tr>
            
            <?php
                $halaman = 15;

                $page = isset($_GET["halaman"]) ? $_GET["halaman"] : 1;
                
                $mulai = ($page > 1) ? ($page * $halaman) - $halaman : 0;

                if ($page == "all") {

                    $result = $conn->query("SELECT nrp, nama, alamat, tanggal_lahir, kota_tinggal, kota_lahir, phone, status, total_sks, ipk, email FROM mahasiswa m INNER JOIN user u ON m.id_user=u.iduser");

                } else {

                    // sql output : return only 10 data start on record 11 
                    $result = $conn->query("SELECT nrp, nama, alamat, tanggal_lahir, kota_tinggal, kota_lahir, phone, status, total_sks, ipk, email FROM mahasiswa m INNER JOIN user u ON m.id_user=u.iduser LIMIT $mulai, $halaman");

                }

                $result_total_mk = $conn->query("SELECT * FROM mahasiswa");

                $total = $result_total_mk->num_rows;

                $pages = ceil($total/$halaman);

                $i = 0;
                while($row=$result->fetch_assoc()){
                    $i += 1;

                    if ($user_id) {

                        echo "<tr>
                                <td>$i</td>
                                <td>$row[nrp]</td>
                                <td>$row[nama]</td>
                                <td class='last-cell'>
                                    <a href='index.php?page=detail_mahasiswa&nrp=$row[nrp]&nama=$row[nama]&alamat=$row[alamat]&tanggal_lahir=$row[tanggal_lahir]&kota_tinggal=$row[kota_tinggal]&kota_lahir=$row[kota_lahir]&phone=$row[phone]&status=$row[status]&total_sks=$row[total_sks]&ipk=$row[ipk]&email=$row[email]'>detail</a>
                                    <a href='index.php?page=ubah_mahasiswa&nrp=$row[nrp]&nama=$row[nama]&alamat=$row[alamat]&tanggal_lahir=$row[tanggal_lahir]&kota_tinggal=$row[kota_tinggal]&kota_lahir=$row[kota_lahir]&phone=$row[phone]&status=$row[status]&total_sks=$row[total_sks]&ipk=$row[ipk]'>ubah</a>
                                </td>
                              </tr>
                             ";

                    } else {

                        echo "<tr>
                                <td>$i</td>
                                <td>$row[nrp]</td>
                                <td>$row[nama]</td>
                                <td class='last-cell'>
                                    <a href='index.php?page=detail_mahasiswa&nrp=$row[nrp]&nama=$row[nama]&alamat=$row[alamat]&tanggal_lahir=$row[tanggal_lahir]&kota_tinggal=$row[kota_tinggal]&kota_lahir=$row[kota_lahir]&phone=$row[phone]&status=$row[status]&total_sks=$row[total_sks]&ips_terakhir=$row[ips_terakhir]&ipk=$row[ipk]&email=$row[email]'>detail</a>
                                </td>
                              </tr>
                             ";

                    }
                    
                }

            ?>
                
        </table>
        <div class="pagination-bottom-list">
            <?php 
                for ($i=1; $i<=$pages; $i++){ 
                    echo "<a href='index.php?page=list_mahasiswa&halaman=$i'>$i</a>";
                }
                echo "<a href='index.php?page=list_mahasiswa&halaman=all'>Tampilkan Semua</a>";
            ?>
        </div>
    </div>
</div>
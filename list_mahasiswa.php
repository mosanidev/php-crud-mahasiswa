<div id="content-list">
    <div class="content-list-header">
        <p>List Mahasiswa</p>
    </div>
    <div class="content-list-table">
        <p>Menampilkan 
            <select name="jumlah_data">
                <option value="10">10</option>
                <option value="25">25</option>
                <option value="50">50</option>
                <option value="100">100</option>
            </select>
        data</p>

        <table>
            <tr>
                <th>No</th>
                <th>NRP</th>
                <th>Nama</th>
                <th>Action</th>
            </tr>
            
            <?php
                
                $result = $conn->query("SELECT nrp, nama, alamat, tanggal_lahir, kota_tinggal, kota_lahir, phone, status, total_sks, ips_terakhir, ipk, email FROM mahasiswa m INNER JOIN user u ON m.id_user=u.iduser");

                $i = 0;
                while($row=$result->fetch_assoc()){
                    $i += 1;

                    if ($user_id) {

                        echo "<tr>
                                <td>$i</td>
                                <td>$row[nrp]</td>
                                <td>$row[nama]</td>
                                <td class='last-cell'>
                                    <a href='index.php?page=detail_mahasiswa&nrp=$row[nrp]&nama=$row[nama]&alamat=$row[alamat]&tanggal_lahir=$row[tanggal_lahir]&kota_tinggal=$row[kota_tinggal]&kota_lahir=$row[kota_lahir]&phone=$row[phone]&status=$row[status]&total_sks=$row[total_sks]&ips_terakhir=$row[ips_terakhir]&ipk=$row[ipk]&email=$row[email]'>detail</a>
                                    <a href='index.php?page=ubah_mahasiswa&nrp=$row[nrp]&nama=$row[nama]&alamat=$row[alamat]&tanggal_lahir=$row[tanggal_lahir]&kota_tinggal=$row[kota_tinggal]&kota_lahir=$row[kota_lahir]&phone=$row[phone]&status=$row[status]&total_sks=$row[total_sks]&ips_terakhir=$row[ips_terakhir]&ipk=$row[ipk]'>ubah</a>
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
    </div>
</div>
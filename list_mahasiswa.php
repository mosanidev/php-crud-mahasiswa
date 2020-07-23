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

        <?php 
            if ($user_id) {
                echo "<a class='btn-add' href='index.php?page=tambah_mahasiswa'>Tambah</a>";
            }
        ?>

        <table>
            <tr>
                <th>No</th>
                <th>NRP</th>
                <th>Nama</th>
                <th>Action</th>
            </tr>
            
            <?php
                
                $result = $conn->query("SELECT * FROM mahasiswa");

                $i = 0;
                while($row=$result->fetch_assoc()){
                    $i += 1;

                    $data = array($row['nrp'], $row['nama'], $row['alamat'], $row['tanggal_lahir'], $row['kota_tinggal'], $row['kota_lahir'], $row['phone'], $row['status'], $row['total_sks'], $row['ips_terakhir'], $row['ipk']);

                    if ($user_id) {

                        echo "<tr>
                                <td>$i</td>
                                <td>$row[nrp]</td>
                                <td>$row[nama]</td>
                                <td class='last-cell'>
                                    <a href='index.php?page=detail_mahasiswa&nrp=$row[nrp]&nama=$row[nama]&alamat=$row[alamat]&tanggal_lahir=$row[tanggal_lahir]&kota_tinggal=$row[kota_tinggal]&kota_lahir=$row[kota_lahir]&phone=$row[phone]&status=$row[status]&total_sks=$row[total_sks]&ips_terakhir=$row[ips_terakhir]&ipk=$row[ipk]'>detail</a>
                                    <a href='index.php?page=ubah_mahasiswa&nrp=$row[nrp]&nama=$row[nama]&alamat=$row[alamat]&tanggal_lahir=$row[tanggal_lahir]&kota_tinggal=$row[kota_tinggal]&kota_lahir=$row[kota_lahir]&phone=$row[phone]&status=$row[status]&total_sks=$row[total_sks]&ips_terakhir=$row[ips_terakhir]&ipk=$row[ipk]'>ubah</a>
                                    <a href='index.php?page=hapus_mahasiswa&nrp=$row[nrp]'>hapus</a>
                                </td>
                              </tr>
                             ";

                    } else {

                        echo "<tr>
                                <td>$i</td>
                                <td>$row[nrp]</td>
                                <td>$row[nama]</td>
                                <td class='last-cell'>
                                    <a href='index.php?page=detail_mahasiswa&id=$row[nrp]'>detail</a>
                                </td>
                              </tr>
                             ";

                    }
                    
                }

            ?>
                
        </table>
    </div>
</div>
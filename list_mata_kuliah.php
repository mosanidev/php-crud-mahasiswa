<div id="content-list">
    <div class="content-list-header">
        <p>List Mata Kuliah</p>
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
                echo "<a class='btn-add' href='index.php?page=tambah_mata_kuliah'>Tambah</a>";
            }
        ?>

        <table>
            <tr>
                <th>No</th>
                <th>Kode MK</th>
                <th>Nama</th>
                <th>SKS</th>
                <th>Action</th>
            </tr>
            
            <?php
                
                $result = $conn->query("SELECT * FROM mata_kuliah");

                $i = 0;
                while($row=$result->fetch_assoc()){
                    $i += 1;

                    echo "<tr>
                            <td>$i</td>
                            <td>$row[kode_mk]</td>
                            <td>$row[nama]</td>
                            <td>$row[sks]</td>
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
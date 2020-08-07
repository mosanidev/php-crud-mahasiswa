<div id="content-list">
    <div class="content-list-header">
        <p>List Mata Kuliah</p>
    </div>
    <div class="content-list-table">

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
                $halaman = 15;

                $page = isset($_GET["halaman"]) ? $_GET["halaman"] : 1;
                
                $mulai = ($page > 1) ? ($page * $halaman) - $halaman : 0;

                if ($page == "all") {

                    $result = $conn->query("SELECT * FROM mata_kuliah");

                } else {

                    $result = $conn->query("SELECT * FROM mata_kuliah LIMIT $mulai, $halaman");

                }

                $result_total_mk = $conn->query("SELECT * FROM mata_kuliah");

                $total = $result_total_mk->num_rows;

                $pages = ceil($total/$halaman);

                $i = 0;
                while($row=$result->fetch_assoc()){
                    $i += 1;

                    echo "<tr>
                            <td>$i</td>
                            <td>$row[kode_mk]</td>
                            <td>$row[nama]</td>
                            <td>$row[sks]</td>
                            <td class='last-cell'>
                                <a href='index.php?page=detail_mata_kuliah&kode_mk=$row[kode_mk]&nama=$row[nama]&sks=$row[sks]'>detail</a>
                                <a href='index.php?page=ubah_mata_kuliah&kode_mk=$row[kode_mk]&nama=$row[nama]&sks=$row[sks]'>ubah</a>
                            </td>
                          </tr>
                        ";
                }

            ?>
                
        </table>
        <div class="pagination-bottom-list">
            <?php 
                for ($i=1; $i<=$pages; $i++){ 
                    echo "<a href='index.php?page=list_mata_kuliah&halaman=$i'>$i</a>";
                }
                echo "<a href='index.php?page=list_mata_kuliah&halaman=all'>Tampilkan Semua</a>";
            ?>
        </div>
    </div>
</div>
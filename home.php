<div id="content">
    <div class="content-header">
        <p>Data Mahasiswa</p>
    </div>
    <div class="content-button">

        <?php 

            if ($tipe == "mahasiswa") {

                echo "<a href='index.php?page=transkip_nilai'>Lihat Transkip Nilai</a>";
   
            } else {

                echo "<a href='index.php?page=list_mahasiswa'>List Mahasiswa</a> 
                      <a href='index.php?page=list_mata_kuliah'>List Mata Kuliah</a>";

            }

        ?>
    </div>
</div>
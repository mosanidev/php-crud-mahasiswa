<div id="content">
    <div class="content-header">
        <p>Portal Mahasiswa</p>
    </div>
    <div class="content-button">

        <?php 

            if ($tipe == "mahasiswa") {

                echo "<a href='index.php?page=detail_mahasiswa'>Lihat Profil Saya</a>";
   
            } else if ($tipe == "admin") {

                echo "<a href='index.php?page=list_mahasiswa'>List Mahasiswa</a> 
                      <a href='index.php?page=list_mata_kuliah'>List Mata Kuliah</a>";

            }

        ?>
    </div>
</div>
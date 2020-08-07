<?php

    extract($_GET);

?>

<div id="content-show">
    <div class="content-show-header">
        <p>Ubah Data Mata Kuliah</p>
    </div>
    <div class="content-show-data">
        <form method="POST" action="proses_ubah_data_mata_kuliah.php">
            <div class="info-header">
                <hr>
                <h3>Data Mata Kuliah</h3>
                <hr>
            </div>
            <div class="group-info">
                <p>Kode MK</p><p><?php echo $kode_mk; ?></p>
                <input type="hidden" value="<?php echo $kode_mk; ?>" name="kode_mk">
            </div>
            <div class="group-info">
                <p>Nama</p><p>
                <input type="text" value="<?php echo $nama; ?>" name="nama">
            </div>
            <div class="group-info">
                <p>SKS</p>
                <input type="text" value="<?php echo $sks; ?>" name="sks">
            </div>
            <button>Simpan</button>
        </form>
    </div>
</div>
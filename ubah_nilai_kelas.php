<?php

    extract($_GET);

?>
<div id="content-show">
    <div class="content-show-header">
        <p>Ubah Nilai Kelas</p>
    </div>
    <div class="content-show-data">
        <form method="POST" action="proses_ubah_nilai_kelas.php">
            <div class="info-header">
                <hr>
                <h3>Data Nilai</h3>
                <hr>
            </div>
            <input type="hidden" value="<?php echo $_GET['nrp'] ?>" name="nrp">
            <input type="hidden" value="<?php echo $_GET['kode_mk'] ?>" name="kode_mk">
            <input type="hidden" value="<?php echo $_GET['halaman'] ?>" name="halaman">
            <div class="group-info">
                <p>NTS</p>
                <input type="text" value="<?php echo $nts; ?>" name="nts">
            </div>
            <div class="group-info">
                <p>NAS</p>
                <input type="text" value="<?php echo $nas; ?>" name="nas">
            </div>
            <button>Simpan</button>
        </form>
    </div>
</div>
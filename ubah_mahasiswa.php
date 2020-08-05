<?php

    extract($_GET);

?>

<div id="content-show">
    <div class="content-show-header">
        <p>Ubah Data Mahasiswa</p>
    </div>
    <div class="content-show-data">
        <form method="POST" action="proses_ubah_data_mahasiswa.php">
            <div class="info-header">
                <hr>
                <h3>Data Pribadi</h3>
                <hr>
            </div>
            <div class="group-info">
                <p>NRP</p><p><?php echo $nrp; ?></p>
                <input type="hidden" value="<?php echo $nrp; ?>" name="nrp">
            </div>
            <div class="group-info">
                <p>Nama</p><p><?php echo $nama; ?></p>
            </div>
            <div class="group-info">
                <p class="label-alamat">Alamat</p>
                <textarea rows="3" name="alamat"><?php echo $alamat; ?></textarea>
            </div>
            <div class="group-info">
                <p>No. Handphone</p>
                <input type="text" value="<?php echo $phone; ?>" name="phone">
            </div>
            <div class="group-info">
                <p>Kota Tinggal</p><p>
                <input type="text" value="<?php echo $kota_tinggal; ?>" name="kota_tinggal">
            </div>
            <div class="group-info">
                <p>Kota Lahir</p><p><?php echo $kota_lahir; ?></p>
            </div>
            <div class="group-info">
                <p>Tanggal Lahir</p><p><?php echo $tanggal_lahir; ?></p>
            </div>
            <button>Simpan</button>
        </form>
    </div>
</div>
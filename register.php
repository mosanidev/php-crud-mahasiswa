<?php 

    if ($notif == "re_password") {
        echo "<p class='notif'>Mohon ketikkan ulang password dengan benar</p>";
    }

?>

<div id="content-form">
    <div class="content-form-header">
        <p>Register</p>
    </div>
    <div class="content-button">
        <form method="POST" action="proses_register.php">
            <div class="form-input">
                <label for="nrp">NRP</label>
                <input type="text" placeholder="Masukkan NRP anda" name="nrp">
            </div>
            <div class="form-input">
                <label for="nama">Nama</label>
                <input type="text" placeholder="Masukkan nama anda" name="nama">
            </div>
            <div class="form-input">
                <label for="alamat">Alamat</label>
                <textarea placeholder="Masukkan alamat anda" name="alamat"></textarea>
            </div>
            <div class="form-input">
                <label for="alamat">No. Handphone</label>
                <input type="text" placeholder="Masukkan nomor handphone anda" name="phone">
            </div>
            <div class="form-input">
                <label for="kota_tinggal">Kota Tinggal</label>
                <input type="text" placeholder="Masukkan kota tempat anda tinggal" name="kota_tinggal">
            </div>
            <div class="form-input">
                <label for="kota_lahir">Kota Lahir</label>
                <input type="text" placeholder="Masukkan kota tempat anda lahir" name="kota_lahir">
            </div>
            <div class="form-input">
                <label for="tanggal_lahir">Tanggal Lahir</label>
                <input type="text" placeholder="Masukkan tanggal lahir anda dengan format tahun-bulan-tanggal, contoh : 2002-07-01" name="tanggal_lahir">
            </div>
            <div class="form-input">
                <label for="email">Email</label>
                <input type="email" placeholder="Masukkan email anda" name="email">
            </div>
            <div class="form-input">
                <label for="password">Password</label>
                <input type="password" placeholder="Masukkan password" name="password">
            </div> 
            <div class="form-input">
                <label for="re_password">Ulangi Password</label>
                <input type="password" placeholder="Ketikkan ulang password anda" name="re_password">
            </div>
            <button>Register</button>
        </form>
    </div>
</div>

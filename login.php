<div id="content-form">
    <div class="content-form-header">
        <p>Login</p>
    </div>
    <?php
        
        if ($notif == "login_gagal") {
            echo "<p class='notif'>Email atau password salah</p>";
        }

    ?>
    <div class="content-button">
        <form method="POST" action="proses_login.php">
            <div class="form-input">
                <label for="email">Email</label>
                <input type="email" placeholder="Masukkan email" name="email">
            </div>
            <div class="form-input">
                <label for="password">Password</label>
                <input type="password" placeholder="Masukkan password" name="password">
            </div> 
            <button>Login</button>
        </form>
    </div>
</div>
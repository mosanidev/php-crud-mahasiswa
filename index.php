<?php

    include_once("function/koneksi.php");

    session_start();

    $page = isset($_GET['page']) ? $_GET['page'] : false;
    $notif = isset($_GET['notif']) ? $_GET['notif'] : false;
    $tipe = isset($_SESSION['tipe']) ? $_SESSION['tipe'] : false;
    $user_id = isset($_SESSION['iduser']) ? $_SESSION['iduser'] : false;
    
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Portal Mahasiswa</title>
    <link rel="stylesheet" type="text/css" href="style/style.css">
</head>
<body>
    <header>
        <div id="keterangan">
            <a href="index.php">Portal Mahasiswa</a>
        </div>
        <nav>
            <?php
                if ($user_id) {
                    
                    echo "<a href='logout.php'>Logout</a>";

                } else  {

                    echo "<a href='index.php?page=login'>Login</a> |
                          <a href='index.php?page=register'>Register</a>";

                }
                
            ?>
        </nav>
    </header>
    <main>
        
        <?php  

            $file = $page.".php";
            
            if (file_exists($file)) {

                if ($page == "login") {
                    include_once("login.php");
                } 
                else if ($page == "register") {
                    include_once("register.php");
                } 
                else if ($page == "list_mahasiswa") {
                    include_once("list_mahasiswa.php");
                }
                else if ($page == "list_mata_kuliah") {
                    include_once("list_mata_kuliah.php");
                }
                else if ($page == "tambah_mahasiswa") {
                    echo "tambah_mahasiswa";
                }
                else if ($page == "ubah_mahasiswa") {
                    echo "ubah_mahasiswa";
                }
                else if ($page == "hapus_mahasiswa") {
                    echo "hapus_mahasiswa";
                }
                else if ($page == "detail_mahasiswa") {
                    include_once("detail_mahasiswa.php");
                }
                else  {
                    echo "Maaf tidak ada file tersebut di server";
                }
                
            } else {

                // default home page 
                include_once("home.php");
            }
            

        ?>
    </main>
    <footer>
        <hr>
        <p>&copy; 2020 Website Mahasiswa</p> 
    </footer>
</body>
</html>
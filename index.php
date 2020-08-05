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
                else if ($page == "tambah_mata_kuliah") {
                    include_once("tambah_mata_kuliah.php");
                }
                else if ($page == "tambah_mahasiswa") {
                    echo "tambah_mahasiswa";
                }
                else if ($page == "ubah_mahasiswa") {
                    include_once("ubah_mahasiswa.php");
                }
                else if ($page == "ubah_mata_kuliah") {
                    include_once("ubah_mata_kuliah.php");
                }
                else if ($page == "hapus_mahasiswa") {
                    echo "hapus_mahasiswa";
                }
                else if ($page == "detail_mahasiswa") {
                    include_once("detail_mahasiswa.php");
                }
                else if ($page == "detail_mata_kuliah") {
                    include_once("detail_mata_kuliah.php");
                }
                else if ($page == "tambah_kelas") {
                    include_once("tambah_kelas.php");
                }
                else if ($page == "ubah_nilai_kelas") {
                    include_once("ubah_nilai_kelas.php");
                }
                else if ($page == "hapus_kelas") {
                    include_once("hapus_kelas.php");
                }
                else if ($page == "tambah_mahasiswa_di_kelas") {
                    include_once("tambah_mahasiswa_di_kelas.php");
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
        <p>&copy; 2020 Portal Mahasiswa</p> 
    </footer>
    <script>
        function generateSKS() {
            var sks = document.getElementById('p-sks');

            var mk = document.getElementById('select-mk');

            var js_array =<?php echo json_encode($arr_mk);?>;

            var kode_mk_select = mk.value.split(" - ")[0];

            for (var i=0; i < js_array.length; i++) {
                
                var kode_mk_arr = js_array[i].split("-")[0];

                if (kode_mk_select == kode_mk_arr) {

                    sks.innerText = js_array[i].split("-")[1];

                }
            }
        }

        generateSKS();
        
    </script>

</body>
</html>
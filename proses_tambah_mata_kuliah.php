<?php 

    include_once("function/koneksi.php");

    extract($_POST);

    $result = $conn->query("INSERT INTO mata_kuliah VALUES ('$kode_mk', '$nama_mk', '$sks')");

    if ($result == 1) {
    
        header("location: "."/mahasiswa/index.php?page=list_mata_kuliah");

    } else {
        echo "Perubahan gagal terjadi karena ".$conn->error;
    }

?>
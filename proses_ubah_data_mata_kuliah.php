<?php 

    include_once("function/koneksi.php");

    extract($_POST);

    $result1 = $conn->query("UPDATE mata_kuliah SET kode_mk='$kode_mk_baru', nama='$nama', sks='$sks' WHERE kode_mk='$kode_mk'");

    $result2 = $conn->query("SELECT kode_mk, nama, sks FROM mata_kuliah where kode_mk='$kode_mk_baru'");

    $row = $result2->fetch_assoc();

    if ($result1 == 1) {
    
        header("location: "."/mahasiswa/index.php?page=detail_mata_kuliah&kode_mk=$row[kode_mk]&nama=$row[nama]&sks=$row[sks]");

    } else {
        echo "Perubahan gagal terjadi karena ".$conn->error;
    }


?>
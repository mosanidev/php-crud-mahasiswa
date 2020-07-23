<?php
    include_once('function/koneksi.php');

    $nrp = $_POST["nrp"];
    $nama = $_POST["nama"];
    $alamat = $_POST["alamat"];
    $phone = $_POST["phone"];
    $kota_tinggal = $_POST["kota_tinggal"];
    $kota_lahir = $_POST["kota_lahir"];
    $tanggal_lahir = $_POST["tanggal_lahir"];
    $email = $_POST["email"];
    $password = $_POST["password"];
    $re_password = $_POST["re_password"];
    $salt = "NnxjnsaLJDKnjn";

    $salted_password = md5($password.$salt);

    $insert_user = $conn->query("INSERT INTO user (email, password, tipe) VALUES ('$email', '$salted_password', 'mahasiswa') ");

    $insert_mahasiswa = $conn->query("INSERT INTO mahasiswa (nrp, nama, alamat, tanggal_lahir, kota_tinggal, kota_lahir, phone, status, id_user) VALUES ('$nrp', '$nama', '$alamat', '$tanggal_lahir', '$kota_tinggal', '$kota_lahir', '$phone', 'on', '$conn->insert_id')");

    if ($password == $re_password) {

        if ($insert_user == 1 && $insert_mahasiswa == 1) {
            header("location: "."/mahasiswa/index.php?page=login");
        }

    } else {

        header("location: "."/mahasiswa/index.php?page=register&notif=re_password");

    }
    


?>
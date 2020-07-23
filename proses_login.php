<?php

    include_once("function/koneksi.php");

    $email = $_POST["email"];
    $password = $_POST["password"];
    $salt = "NnxjnsaLJDKnjn";

    $salted_password = md5($password.$salt);

    $result = $conn->query("SELECT * FROM user WHERE email='$email' AND password='$salted_password'");

    if ($result->num_rows == 1) {
        
        $row = $result->fetch_assoc();

        session_start();

        if ($row['tipe'] == 'admin') {

            $_SESSION["iduser"] = $row["iduser"];
            $_SESSION["tipe"] = $row["tipe"];

            header("location: "."/mahasiswa/index.php?notif=admin");

        } else if ($row['tipe'] == 'mahasiswa') {

            $_SESSION["iduser"] = $row["iduser"];
            $_SESSION["tipe"] = $row["tipe"];

            header("location: "."/mahasiswa/index.php?notif=mahasiswa");

        }

    } else {
        header("location: "."/mahasiswa/index.php?page=login&notif=login_gagal");
    }


?>
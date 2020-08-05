<?php

    include_once("function/koneksi.php");

    include_once("function/hitung_nisbi.php");

    extract($_POST);

    $result2 = "";
    $status = "";

    if (isset($kode_mk) == true) {

        $status = "matkul";
        $result2 = $conn->query("SELECT kode_mk, nama, sks FROM mata_kuliah_has_mahasiswa mm INNER JOIN mata_kuliah m WHERE mm.mata_kuliah_kode_mk = m.kode_mk AND kode_mk='$kode_mk'");

    } else if (isset($kode_mk) == false) {

        $status = "mahasiswa";
        $result2 = $conn->query("SELECT nrp, nama, alamat, tanggal_lahir, kota_tinggal, kota_lahir, phone, status, total_sks, ipk, email FROM mahasiswa m INNER JOIN user u ON m.id_user=u.iduser WHERE nrp='$nrp'");
        $kode_mk = explode( " - ", $mk )[0];
    }

    $nisbi = hitung_nisbi($nts, $nas);

    $result = $conn->query("INSERT INTO mata_kuliah_has_mahasiswa VALUES ('$kode_mk', '$nrp', '$nts', '$nas', '$nisbi')");

    $row = $result2->fetch_assoc();
    
    if ($result == 1) {
    
        if ($status == "mahasiswa") {

            header("location: "."/mahasiswa/index.php?page=detail_mahasiswa&nrp=$row[nrp]&nama=$row[nama]&alamat=$row[alamat]&tanggal_lahir=$row[tanggal_lahir]&kota_tinggal=$row[kota_tinggal]&kota_lahir=$row[kota_lahir]&phone=$row[phone]&status=$row[status]&total_sks=$row[total_sks]&ips_terakhir=$row[ips_terakhir]&ipk=$row[ipk]&email=$row[email]&halaman=1");

        } else if ($status == "matkul") {

            header("location: "."/mahasiswa/index.php?page=detail_mata_kuliah&kode_mk=$row[kode_mk]&nama=$row[nama]&sks=$row[sks]&halaman=1");

        }

    } else {
        echo "Perubahan gagal terjadi karena ".$conn->error;
    }


?>
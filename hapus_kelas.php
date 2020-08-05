<?php 

    extract($_GET);

    include_once("function/koneksi.php");

    $result = $conn->query("DELETE FROM mata_kuliah_has_mahasiswa WHERE mata_kuliah_kode_mk='$kode_mk' AND mahasiswa_nrp='$nrp'");

    if ($halaman == "mahasiswa") {

        $result2 = $conn->query("SELECT nrp, nama, alamat, tanggal_lahir, kota_tinggal, kota_lahir, phone, status, total_sks, ipk, email FROM mahasiswa m INNER JOIN user u ON m.id_user=u.iduser WHERE nrp='$nrp'");

    } else if ($halaman == "mata_kuliah") {

        $result2 = $conn->query("SELECT kode_mk, nama, sks FROM mata_kuliah_has_mahasiswa mm INNER JOIN mata_kuliah m WHERE mm.mata_kuliah_kode_mk = m.kode_mk AND kode_mk='$kode_mk'");

    }
    $row = $result2->fetch_assoc();

    if ($result == 1) {

        if ($halaman == 'mahasiswa') {

            header("location: "."/mahasiswa/index.php?page=detail_mahasiswa&nrp=$row[nrp]&nama=$row[nama]&alamat=$row[alamat]&tanggal_lahir=$row[tanggal_lahir]&kota_tinggal=$row[kota_tinggal]&kota_lahir=$row[kota_lahir]&phone=$row[phone]&status=$row[status]&total_sks=$row[total_sks]&ips_terakhir=$row[ips_terakhir]&ipk=$row[ipk]&email=$row[email]&halaman=1");

        } else if ($halaman == 'mata_kuliah') {

            header("location: "."/mahasiswa/index.php?page=detail_mata_kuliah&kode_mk=$row[kode_mk]&nama=$row[nama]&sks=$row[sks]&halaman=1");

        }

    } else {

        echo "Perubahan gagal terjadi karena ".$conn->error;

    }

?>
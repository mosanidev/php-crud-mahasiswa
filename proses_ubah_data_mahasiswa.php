<?php 

    include_once("function/koneksi.php");

    extract($_POST);

    $result1 = $conn->query("UPDATE mahasiswa SET alamat='$alamat', phone='$phone', kota_tinggal='$kota_tinggal' WHERE nrp='$nrp'");

    $result2 = $conn->query("SELECT nrp, nama, alamat, tanggal_lahir, kota_tinggal, kota_lahir, phone, status, total_sks, ipk, email FROM mahasiswa m INNER JOIN user u ON m.id_user=u.iduser WHERE nrp='$nrp'");

    $row = $result2->fetch_assoc();

    if ($result1 == 1) {
    
        header("location: "."/mahasiswa/index.php?page=detail_mahasiswa&nrp=$row[nrp]&nama=$row[nama]&alamat=$row[alamat]&tanggal_lahir=$row[tanggal_lahir]&kota_tinggal=$row[kota_tinggal]&kota_lahir=$row[kota_lahir]&phone=$row[phone]&status=$row[status]&total_sks=$row[total_sks]&ipk=$row[ipk]&email=$row[email]'");

    } else {
        echo "Perubahan gagal terjadi karena ".$conn->error;
    }


?>
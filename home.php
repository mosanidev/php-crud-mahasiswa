<div id="content">
    <div class="content-header">
        <p>Portal Mahasiswa</p>
    </div>
    <div class="content-button">

        <?php 

            if ($tipe == "mahasiswa") {

                $result = $conn->query("SELECT nrp, nama, alamat, tanggal_lahir, kota_tinggal, kota_lahir, phone, status, total_sks, ipk, email FROM mahasiswa m INNER JOIN user u ON m.id_user=u.iduser WHERE id_user=$user_id");
           
                $row = $result->fetch_assoc();
                
                echo "<a href='index.php?page=detail_mahasiswa&nrp=$row[nrp]&nama=$row[nama]&alamat=$row[alamat]&tanggal_lahir=$row[tanggal_lahir]&kota_tinggal=$row[kota_tinggal]&kota_lahir=$row[kota_lahir]&phone=$row[phone]&status=$row[status]&total_sks=$row[total_sks]&ipk=$row[ipk]&email=$row[email]'>Lihat Profil Saya</a>";
   
            } else if ($tipe == "admin") {

                echo "<a href='index.php?page=list_mahasiswa'>List Mahasiswa</a> 
                      <a href='index.php?page=list_mata_kuliah'>List Mata Kuliah</a>";

            }

        ?>
    </div>
</div>
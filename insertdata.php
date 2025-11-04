<?php

require_once 'koneksi.php'; 


if ($_SERVER["REQUEST_METHOD"] == "POST") {


    $npm = $_POST['npm'];
    $nama = $_POST['nama'];
    $tanggal_lahir = $_POST['tanggal_lahir'];
    $tempat_tinggal = $_POST['tempat_tinggal'];

  
    $sql = "INSERT INTO mahasiswa (npm, nama, tanggal_lahir, tempat_tinggal) 
            VALUES (?, ?, ?, ?)";
    
    $stmt = $conn->prepare($sql);

    $stmt->bind_param("ssss", $npm, $nama, $tanggal_lahir, $tempat_tinggal);

    if ($stmt->execute()) {
        echo "Data mahasiswa baru berhasil ditambahkan!";
        echo "<br><a href='form_tambah.php'>Tambah Data Lagi</a>";
        echo "<br><a href='index.php'>Lihat Semua Data</a>";
    } else {
        echo "Error: Gagal menambahkan data. " . $stmt->error;
    }

    $stmt->close();
    $conn->close();

} else {
    header("Location: form_tambah.php");
    exit();
}
?>

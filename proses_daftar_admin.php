<?php
    $nama_petugas= $_POST["nama_petugas"];
    $username = $_POST['username'];
    $password = $_POST['password'];
    $telp = $_POST['telp'];
    
    include "../config/koneksi.php";
    $input = mysqli_query($conn, "INSERT INTO petugas
    (nama_petugas, username, password, telp) VALUES 
    ('".$nama_petugas."','".$username."','".md5($password)."','".$telp."')");

    if ($input) {
        echo "<script>alert('Berhasil');location.href='data_masyarakat.php';</script>";
    }
    else {
        echo "<script>alert('Gagal');location.href='daftar_admin.php';</script>";
    }
?>
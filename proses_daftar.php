<?php
    $nama_lengkap = $_POST["nama_lengkap"];
    $alamat = $_POST['alamat'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    $telp = $_POST['telp'];
    
    include "../config/koneksi.php";
    $input = mysqli_query($conn, "INSERT INTO masyarakat 
    (nama_lengkap, alamat,username, password, telp) VALUES 
    ('".$nama_lengkap."','".$alamat."','".$username."','".md5($password)."','".$telp."')");

    if ($input) {
        include "proses_login.php";
        echo "<script>alert('Berhasil');location.href='home.php';</script>";
    }
    else {
        echo "<script>alert('Gagal');location.href='daftar.php';</script>";
    }
?>
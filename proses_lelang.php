<?php
session_start();
if($_POST){
    $id_barang = $_POST["id_barang"];
    $nama_barang = $_POST["nama_barang"];
    $tgl_lelang = $_POST["tgl_lelang"];
    $harga_akhir = $_POST["harga_akhir"];
    // $harga_awal = $_POST["harga_awal"];
    // $id_admin = $_SESSION["id_admin"];
    $status='proses';
    $id_masyarakat = $_SESSION["id_masyarakat"];

    // echo $harga_awal;
    // if($harga_akhir <= $harga_awal){
    //     echo "<script>alert('tidak dapat menawar lebih rendah');location.href='home.php';</script>";
     
        include "../config/koneksi.php";
        $insert=mysqli_query($conn,"INSERT INTO lelang (id_barang, nama_barang, tgl_lelang, harga_akhir, id_masyarakat) VALUE ('".$id_barang."','".$nama_barang."','".$tgl_lelang."','".$harga_akhir."','".$id_masyarakat."')") or die(mysqli_error($conn));
        
        if($insert){
            echo "<script>alert('Sukses ');location.href='data_lelang.php';</script>";
        } else {
            echo "<script>alert('Gagal ');location.href='home.php';</script>";
        }
}
?>
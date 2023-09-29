<?php
session_start();
        $id_lelang=$_POST['id_lelang'];
        $id_barang=$_POST['id_barang'];
        $id_masyarakat= $_POST['id_masyarakat'];
        $penawaran_harga=$_POST['harga_akhir'];
        if(empty($id_lelang)){
            echo "<script>alert('id lelang kosong')</script>";
            echo "<script>location.href='data_lelang.php'</script>";
        }
        else {
            include "../config/koneksi.php";
            $insert=mysqli_query($conn,"insert into history_lelang (id_lelang, id_barang, id_masyarakat, harga, tgl_lelang)
            value ('".$id_lelang."','".$id_barang."','".($id_masyarakat)."','".$penawaran_harga."', '".date('Y-m-d')."')") or 
            die(mysqli_error($conn));
            if($insert){
                echo "<script>alert('Sukses')</script>";
                echo "<script>location.href='histori.php';</script>";
            }
            else {
                echo "<script>alert('Gagal');location.href='histori.php';</script>";
            }
        }
    
?>
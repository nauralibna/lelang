<?php

$id_masyarakat=$_POST['id_masyarakat'];
$id_status=$_POST['id_status'];
        include "../config/koneksi.php";
        // print_r($_POST);
        $update=mysqli_query($conn,"UPDATE masyarakat SET id_status='".$id_status."'where id_masyarakat = '".$id_masyarakat."'") or die(mysqli_error($conn));
        if($update){
            echo "<script>alert('Sukses pilih pemenang');</script>";
            echo "<script>location.href='data_penawar.php';</script>";
        } else {
            echo "<script>alert('Gagal pilih pemenang');location.href='data_penawar.php';</script>";
        }
    

?>
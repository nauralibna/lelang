<?php
    if($_GET['id_masyarakat']){
        include "../config/koneksi.php";
        $qry_hapus=mysqli_query($conn,"DELETE from masyarakat where id_masyarakat='".$_GET['id_masyarakat']."'");
            if($qry_hapus){
                echo "<script>alert('Sukses hapus masyarakat');location.href='data_masyarakat.php';</script>";
            } else {
                echo "<script>alert('Gagal hapus masyarakat');location.href='data_masyarakat.php';</script>";
            }
    }
?>
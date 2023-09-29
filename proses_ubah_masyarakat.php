<?php
    if($_POST){
        $nama_lengkap= $_POST["nama_lengkap"];
        $alamat= $_POST["alamat"];
        $username = $_POST['username'];
        $password = $_POST['password'];
        $telp = $_POST['telp'];

        if(empty($nama_lengkap)){
            echo "<script>alert('nama masyarakat tidak boleh kosong');location.href='ubah_masyarakat.php';</script>";
        } elseif(empty($username)){
            echo "<script>alert('username tidak boleh kosong');location.href='ubah_masyarakat.php';</script>";
        } else {
        include "../config/koneksi.php";
            if(empty($password)){
                $update=mysqli_query($conn,"update masyarakat set nama_lengkap='".$nama_lengkap."', alamat='".$alamat."', username='".$username."', password='".md5($password)."', telp='".$telp."' 
                where id_masyarakat = '".$id_masyarakat."' ") or 
                die(mysqli_error($conn));

                if($update){
                    echo "<script>alert('Sukses update masyarakat');location.href='data_masyarakat.php';</script>";
                } else {
                    echo "<script>alert('Gagal update masyarakat');location.href='ubah_masyarakat.php?id_masyarakat=".$id_masyarakat."';</script>";
                }
            } else {
                $update=mysqli_query($conn,"update masyarakat set
                nama_lengkap='".$nama_lengkap."', alamat='".$alamat."', username='".$username."', password='".md5($password)."', telp='".$telp."' 
                where id_masyarakat = '".$id_masyarakat."' ") or 
                die(mysqli_error($conn));

                if($update){
                    echo "<script>alert('Sukses update masyarakat');location.href='data_masyarakat.php';</script>";
                } else {
                    echo "<script>alert('Gagal update masyarakat');location.href='ubah_masyarakat.php?id_masyarakat=".$id_masyarakat."';</script>";
                }
            }
        }
    }
?>
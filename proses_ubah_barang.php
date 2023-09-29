<?php
    $id_barang = $_POST["id_barang"];
    $nama_barang= $_POST["nama_barang"];
    $deskripsi_barang= $_POST["deskripsi_barang"];
    $harga_awal = $_POST['harga_awal'];
    $foto = $_FILES['foto_lelang'];

    include "../config/koneksi.php";
    if ($_FILES['foto_lelang']['tmp_name']) {
        $temp = $_FILES['foto_lelang']['tmp_name'];
        $type = $_FILES['foto_lelang']['type'];
        $size = $_FILES['foto_lelang']['size'];
        $name = $_FILES['foto_lelang']['name'];
        $folder = "../masyarakat/foto_lelang/";

        if ($size < 2048000 and ($type =='image/jpeg' or $type == 'image/png' or $type == 'image/jfif' ))
        {
            $query_foto = mysqli_query($conn, "SELECT * FROM barang where id_barang = '".$_POST['id_barang']."'");
            $data_foto = mysqli_fetch_array($query_foto);
            unlink('../masyarakat/foto_lelang/'.$data_foto['foto']);
            
            move_uploaded_file($temp, $folder . $name);
            $input = mysqli_query($conn, "UPDATE barang SET nama_barang='".$nama_barang."', deskripsi_barang='".$deskripsi_barang."',
            harga_awal='".$harga_awal."', foto='".$name."' where id_barang='".$id_barang."'");
            
            if ($input) {
                echo "<script>alert('Berhasil');</script>";
                echo "<script>location.href='data_barang.php';</script>";
            }
            else {
                echo "<script>alert('Gagal');location.href='tambah_barang.php';</script>";
            }
        }
    }
    else{
        $input = mysqli_query($conn, "UPDATE barang SET nama_barang='".$nama_barang."', deskripsi_barang='".$deskripsi_barang."',
        harga_awal='".$harga_awal."', foto='".$name."' where id_barang='".$id_barang."'");

        if ($input) {
            echo "<script>alert('Berhasil');</script>";
            echo "<script>location.href='data_barang.php';</script>";
        }
        else {
            echo "<script>alert('Gagal');location.href='tambah_barang.php';</script>";
        }
    }
    
?>
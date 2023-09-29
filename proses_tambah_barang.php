<?php
if($_POST){
    $nama_barang= $_POST["nama_barang"];
    $deskripsi_barang= $_POST["deskripsi_barang"];
    $harga_awal = $_POST['harga_awal'];
    $file_name=$_FILES['foto']['name'];
    $file_tmp=$_FILES['foto']['tmp_name'];
    $upload=move_uploaded_file($file_tmp, '../masyarakat/foto_lelang/'.$file_name);

    if($upload){
        include "../config/koneksi.php";
        $simpan = mysqli_query($conn, "INSERT INTO barang (nama_barang,deskripsi_barang,foto,harga_awal ) value ( '".$nama_barang."', '".$deskripsi_barang."', '".$file_name."', '".$harga_awal."' )");
        // mysqli_query_error($conn);
        if($simpan){
            echo "<script>alert('sukses');location.href='data_barang.php';</script>";}
        else{
            echo "<script>alert('Gagal');location.href='tambah_barang.php';</script>";}
    }else{
        echo "<script>alert('Gagal upload');location.href='tambah_barang.php';</script>";
    }
}
?>
<?php
    include "../config/koneksi.php";
    $id_barang= $_GET['id_barang'];
    $status = 'tutup';

    $update = mysqli_query($conn,"UPDATE barang SET status = '".$status."' WHERE id_barang = '".$id_barang."'");
    if ($update) {
        echo "<script>alert('Anda Berhasil menutup lelang');location.href='data_barang.php'</script>";
    }
    else{
        echo "<script>alert('Gagal menutup lelang');location.href='data_barang.php'</script>";
        // echo mysqli_error($koneksi);
    }
?>
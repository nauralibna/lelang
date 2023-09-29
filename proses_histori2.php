<?php
    if ($_GET['id_lelang']) {
        include "../config/koneksi.php";
        $id_lelang="id_lelang";
        $id_barang="id_barang";
        $id_masyarakat="id_masyrakat";
        $penawaran_harga="harga_akhir";
        $qry_bayar=mysqli_query($conn, "insert into history_lelang id_lelang = '".$id_lelang."', id_barang = '".$id_barang."', id_masyarakat = '".$id_masyarakat."', penawaran_harga = '".$penawaran_harga."' ");
        if ($qry_bayar) {
            echo "<script>alert ('Sukses'); location.href='histori.php';</script>";
        }else {
            echo "<script>alert ('Gagal'); location.href='data_lelang.php';</script>";
        }
    }
?>
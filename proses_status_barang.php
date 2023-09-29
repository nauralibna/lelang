<?php
include "../config/koneksi.php";
$ubah_status_barang=mysqli_query($conn, "update barang set status='".$_POST['ubah_status_barang']."' where id_barang=".$_POST['id_barang']);
header("location:data_barang.php");
?>
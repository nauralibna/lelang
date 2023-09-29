<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Barang</title>
</head>
<body style="background-color:powderblue;">
<?php
include "header_admin.php";
?>
<div class="container">
        <!-- <div class="card rounded bg-secondary">
            <div class="card-header bg-info"> -->
                <h1><center>DAFTAR BARANG LELANG</center></h1></div>
                <br>
                <table class="table table-bordered border-primary ">
                    <thead class="table-primary">
            <tr>
            <th>NO</th>
            <th>BARANG</th>
            <th>DESKRIPSI</th>
            <th>FOTO</th>
            <th>HARGA AWAL</th>
            <th>STATUS</th>
            <th>AKSI</th>
            </tr>
        </thead>
        <tbody>
            <?php
                include "../config/koneksi.php";
                $qry_barang=mysqli_query($conn,"select * from barang");
                $no=0;
                while($data_barang=mysqli_fetch_array($qry_barang)){
                $no++;?>
                <tr>
                <td><?=$no?></td>
                <td><?=$data_barang['nama_barang']?></td>
                <td><?=$data_barang['deskripsi_barang']?></td>
                <td><img src="../masyarakat/foto_lelang/<?=$data_barang['foto']?>" width='100' alt='<?=$data_barang['foto']?>'></td>
                <td><?=$data_barang['harga_awal']?></td>
                <td> <form action="proses_status_barang.php" method="post">
                    <input type="hidden" name="id_barang" value="<?=$data_barang['id_barang']?>">
                    <select name="ubah_status_barang">
                        <option value="buka">buka</option>
                        <option value="tutup">tutup</option>
                        <option value="belum buka">belum buka</option>
                    </select>
                    <button type="submit" class="btn btn-primary" >ubah status</button>
                </form></td>
                <td><a href="ubah_barang.php?id_barang=<?=$data_barang['id_barang']?>"class="btn btn-success">Ubah</a> | <a
                href="hapus_barang.php?id_barang=<?=$data_barang['id_barang']?>" onclick="return confirm('Apakah anda yakin menghapus data ini?')" class="btn btn-danger">Hapus</a></td>
                </tr>
                <?php
                }
            ?>
        </tbody>
    </table>
    <a href="tambah_barang.php" class="btn btn-primary" >Tambah</a>
    <br><br>
</body>
</html>
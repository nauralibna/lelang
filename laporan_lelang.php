<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laporan Lelang</title>
</head>
<body style="background-color:powderblue;">
<?php 
        include "header_admin.php ";
    ?>
<div class="container">
<!-- <div class="card rounded bg-secondary">
<div class="card-header bg-info"> -->
<h1><center>HISTORY LELANG</center></h1>
</div>
<!-- <form method="POST" action="tampil_masyarakat.php" class="d-flex center">
  <input class="form-control me-2" type="search" name="cari" placeholder="Search" aria-label="Search">
  <button class="btn btn-outline-success" type="submit">Search</button>
</form> -->
<br>
<div class="container"> 
<table class="table table-bordered border-primary ">
                    <thead class="table-primary">
                        <tr>
                        <th scope="col">ID HISTORY LELANG</th>
                        <th scope="col">NAMA BARANG</th>
                        <th scope="col">HARGA AKHIR</th>
                        <th scope="col">TANGGAL LELANG</th>
                        <th scope="col">PEMENANG LELANG</th>
                        <th scope="col">STATUS</th>
                        <th scope="col">AKSI</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php
                        include "../config/koneksi.php";
                        $query_barang = mysqli_query($conn, "select * from barang where status = 'tutup'");
                
                        while($data_barang = mysqli_fetch_array($query_barang)){
                            $query_pemenang = mysqli_query($conn, "SELECT * FROM barang b
                            JOIN masyarakat m ON m.id_masyarakat = b.id_pemenang WHERE
                            id_barang = '".$data_barang['id_barang']."'");
                            $data_pemenang = mysqli_fetch_array($query_pemenang);

                            $query_lelang = mysqli_query($conn, "SELECT * FROM history_lelang where id_barang=".$data_barang['id_barang']);
                            $data_lelang = mysqli_fetch_array($query_lelang);
                            if(@$data_lelang['id_history_lelang'] != null){
                    ?>
                        <tr>
                            <!-- <td><?=$data_barang["id_barang"]?></td> -->
                            <td><?=$data_lelang['id_history_lelang']?></td>
                            <td><?=$data_barang['nama_barang']?></td>
                            <td><?=$data_barang['harga_awal']?></td>
                            <td><?=$data_lelang['tgl_lelang']?></td>
                            <td><?=$data_pemenang['nama_lengkap']?></td>
                            <td><?=$data_barang['status']?></td>
                            <td>
                                <a href="hapus_masyarakat.php?id_masyarakat=<?=$data_masyarakat['id_masyarakat']?>" class="btn btn-danger"onclick="return confirm('Apakah anda yakin menghapus data ini?')">Hapus</a>
                            </td>
                            
                        </tr>
                    <?php
                        }}
                    ?>
                    </tbody>
                </table>
                <br>
</body>
</html>
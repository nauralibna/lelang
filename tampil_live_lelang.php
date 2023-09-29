<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Live barang</title>
    <!-- CSS only -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
<!-- JavaScript Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</head>
<body>
  <!-- import navbar -->
  <?php 
        include "header.php ";
    ?>
<div class="container"> 
<h1><center>Live Lelang</center></h1>
<br>
<div class="container"> 
    <form action= "proses_penawar.php" method="post" enctype="multipart/form-data" >
        <table class="table table-bordered border-primary" >
            <thead class="table-primary">
                <tr>
                <th scope="col">Nama Masyarakat </th>
                <th scope="col">Harga</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    include "../config/koneksi.php";
                    $query_barang = mysqli_query($conn, "SELECT * from lelang join masyarakat
                    where lelang.id_barang = '".$_GET['id_barang']."' and masyarakat.id_masyarakat = lelang.id_masyarakat order by harga_akhir DESC");
                        
                    while($data_barang = mysqli_fetch_array($query_barang)){
                ?>
                <tr>
                <input type="hidden" name="id_barang" value= "<?=$data_barang ['id_barang']; ?>" class="form-control">
                <td><?=$data_barang['nama_lengkap']?></td>
                <td><?=$data_barang['harga_akhir']?></td>
                                <!-- <td>
                                <a href="hapus_barang.php?id_barang=<?=$data_barang['id_barang']?>" class="btn btn-danger"
                                onclick="return confirm('Apakah anda yakin menghapus data ini?')">Hapus</a>
                            </td> -->   
                </tr>
                <?php
                    }
                ?>
            </tbody>
        </table>
</body>
</html>
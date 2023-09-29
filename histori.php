<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Lelang/Histori lelang</title>
</head>
<body style="background-color:powderblue;">
    <?php 
        include "header.php ";
    ?>
    <div class="container"> 
        <h1><center>DATA LELANG</center></h1>
            <form method="POST" action="tampil_lelang.php" class="d-flex center">
            <!-- <input class="form-control me-2" type="search" name="cari" placeholder="Search" aria-label="Search">
            <button class="btn btn-success" type="submit">Search</button> -->
            </form>
    </div>
    <br>
    <div class="container"> 
        <form action= "proses_histori.php" method="post" enctype="multipart/form-data" >
        <table class="table table-bordered border-primary">
            <thead class="table-primary">
                <tr>
                <th scope="col">No</th>
                <th scope="col">Tanggal Lelang</th>
                <th scope="col">Nama Barang </th>
                <th scope="col">Nama Masyarakat </th>
                <th scope="col">Harga Akhir</th>
                <th scope="col">Status</th>
                <th scope="col">Pengumuman</th>
                <!-- <th scope="col">Aksi</th> -->
                </tr>
            </thead>
            
            <tbody>
                <?php
                    session_start();
                    include "../config/koneksi.php";
                    $no=0;
                // $query_lelang = mysqli_query($conn, "select * from lelang where id_masyarakat = '".$_SESSION['id_masyarakat']."' order by id_lelang DESC ");
                    $query_lelang=mysqli_query($conn,"select * from lelang JOIN masyarakat ON masyarakat.id_masyarakat=lelang.id_masyarakat JOIN barang ON barang.id_barang=lelang.id_barang where masyarakat.id_masyarakat = ".$_SESSION['id_masyarakat']." order by id_lelang desc");
                    while($data_lelang=mysqli_fetch_array($query_lelang)){
                    $no++;
                ?>
            <form action= "proses_histori.php" method="post">
                <tr>
                <td><?=$no?></td>
                <td><?=$data_lelang['tgl_lelang']?></td>
                <td><?=$data_lelang['nama_barang']?></td>
                <!-- <?php
                        $query_barang = mysqli_query($conn, "SELECT * FROM barang");
                        while($data_barang = mysqli_fetch_array($query_barang)){
                        echo "<td>".$data_barang['nama_barang']."</td>";
                        }
                    ?> -->
                <input type="hidden" name="id_lelang" value= "<?=$data_lelang ['id_lelang'] ?>" class="form-control">
                <input type="hidden" name="id_barang" value= "<?=$data_lelang ['id_barang'] ?>" class="form-control">
                <input type="hidden" name="id_masyarakat" value= "<?=$_SESSION['id_masyarakat']?>" class="form-control">
                <td><?=$data_lelang['nama_lengkap']?></td>
                <td><?=$data_lelang['harga_akhir']?></td>
                <input type="hidden" name="harga_akhir" value= "<?=$data_lelang ['harga_akhir'] ?>" class="form-control">
                <td><?=$data_lelang['status']?></td>
                                    
                    <?php
                        $query_status = mysqli_query($conn, "select* from masyarakat join status on status.id_status=masyarakat.id_status");
                        $data_status = mysqli_fetch_array($query_status);
                            if ($data_lelang['id_pemenang'] == $_SESSION['id_masyarakat'] ) {            
                                echo "<td><label class='alert alert-primary'>Pemenang<br></label></td>";?>
                                            <!-- <td><button type="submit" onclick="return confirm('Selesaikan?');" class="btn btn-warning">Selesai</button></td> -->
                                            
                                            <?php
                            } else {
                                    echo "<td><label class='alert alert-danger'>Menunggu admin<br></label></td>";
                            }
                                        
                    ?>
                                    <!-- <td>
                                        <a href="hapus_lelang.php?id_lelang=<?=$data_lelang['id_lelang']?>" class="btn btn-danger"
                                        onclick="return confirm('Apakah anda yakin menghapus data ini?')">Hapus</a>
                                    </td> -->
                                    
                </tr>
            </form>
                <?php
                     }
                ?>
            </tbody>
        </table>
        <br>
</body>
</html>
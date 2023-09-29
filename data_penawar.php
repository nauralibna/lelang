<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Penawar</title>
</head>
<body style="background-color:powderblue;">
    <?php 
        include "header_admin.php ";
    ?>
<div class="container"> 
<!-- <div class="card rounded bg-secondary">
    <div class="card-header bg-info"> -->
    <h1><center>DATA PENAWAR</center></h1>
    <form method="POST" action="tampil_lelang.php" class="d-flex center">
        <!-- <input class="form-control me-2" type="search" name="cari" placeholder="Search" aria-label="Search">
        <button class="btn btn-success" type="submit">Search</button> -->
    </form>
</div>
    <br>
    <div class="container"> 
                
    <table class="table table-bordered border-primary ">
        <thead class="table-primary">
            <tr>
            <th scope="col">ID LELANG</th>
            <th scope="col">NAMA BARANG</th>
            <th scope="col">NAMA MASYARAKAT</th>
            <th scope="col">TANGGAL LELANG</th>
            <th scope="col">HARGA AKHIR</th>
            <th scope="col">STATUS</th>
            <th scope="col">PEMILIHAN</th>
            </tr>
        </thead>
        <tbody>
            <?php
                include "../config/koneksi.php";
                if (isset($_POST['cari'])) {
                    $cari = $_POST['cari'];
                    $query_lelang = mysqli_query($conn, "select * from lelang JOIN masyarakat ON masyarakat.id_masyarakat=lelang.id_masyarakat order by id_lelang desc");
                }else{
                    $query_lelang = mysqli_query($conn, "select * from lelang JOIN masyarakat ON masyarakat.id_masyarakat=lelang.id_masyarakat JOIN barang ON barang.id_barang=lelang.id_barang order by id_lelang desc");
                }
                while($data_lelang = mysqli_fetch_array($query_lelang)){
            ?>
            <tr>
            <form action= "proses_penawar.php" method="post" enctype="multipart/form-data" >
                <input type="hidden" name="id_masyarakat" value= "<?=$data_lelang ['id_masyarakat']; ?>" class="form-control">
                <td><?=$data_lelang['id_lelang']?></td>
                <td><?=$data_lelang['nama_barang']?></td>
                                <!-- <?php
                                $query_barang = mysqli_query($conn, "SELECT * FROM barang");
                                while($data_barang = mysqli_fetch_array($query_barang)){
                                    echo "<td>".$data_barang['nama_barang']."</td>";
                                }
                                ?> -->
                <td><?=$data_lelang['nama_lengkap']?></td>
                <td><?=$data_lelang['tgl_lelang']?></td>
                <td><?=$data_lelang['harga_akhir']?></td>
                <td><select name="id_status" class="form-control">
                    <option value=2>Diproses</option>
                    <option value=3>Pemenang</option>
                    <option value=1>Gagal Lelang</option>
                    </select></td>
                <td><input type="submit" name="simpan" value= "Update Status" class="btn btn-primary"></td>
                                    <!-- <?php
                                    $query_status = mysqli_query($conn, "select * from masyarakat where id_masyarakat=".$data_lelang['id_masyarakat']);
                                    $data_status = mysqli_fetch_array($query_status);
                                    if ($data_status['id_status'] == 3) {
                                        echo "<td><label class='alert alert-primart'>Pemenang<br></label></td>";
                                    } elseif ($data_status['id_status'] == 1) {
                                        echo "<td><label class='alert alert-danger'><br>belum beruntung</label></td>";
                                    } else {
                                        echo "<td><label class='alert alert-warning'><br>diproses admin</label></td>";
                                    } 
                                ?> -->
            </form>
                            <!-- <td>
                                <a href="hapus_lelang.php?id_lelang=<?=$data_lelang['id_lelang']?>" class="btn btn-danger"
                                onclick="return confirm('Apakah anda yakin menghapus data ini?')">Hapus</a>
                            </td> -->
            </tr>
                    <?php
                        }
                    ?>
        </tbody>
    </table>
    <br>
</body>
</html>
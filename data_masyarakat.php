<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Masyarakat</title>
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">

</head>
<body style="background-color:powderblue;">
    <?php
        include "header_admin.php";
    ?>
    <div class="container ">
    <!-- <div class="card rounded bg-secondary">
            <div class="card-header bg-info"> -->
                <h1><center>DATA MASYARAKAT</center></h1>
                <br>
                <form method="POST" action="data_masyarakat.php" class="d-flex">
                    <input class="form-control me-2" type="search" name="cari" placeholder="Search" aria-label="Search">
                    <button class="btn btn-success" type="submit">Search</button>
                </form>
            </div>
            <br>
            <table class="table table-bordered border-primary" >
                <thead class="table-primary">
                    <tr>
                    <th scope="col">ID MASYARAKAT</th>
                    <th scope="col">NAMA MASYARAKAT</th>
                    <th scope="col">ALAMAT</th>
                    <th scope="col">USERNAME</th>
                    <th scope="col">TELEPON</th>
                    <th scope="col" colspan="1">AKSI</th>
                    <th></th>
                    </tr>
                </thead>
                <tbody>
                <?php
                    include "../config/koneksi.php";
                    if (isset($_POST['cari'])) {
                        $cari = $_POST['cari'];
                        $query_masyarakat = mysqli_query($conn, "select * from masyarakat where id_masyarakat = '$cari' or nama_lengkap like '%$cari%' or alamat like '%$cari%' or username like '%$cari%'");
                    }
                    else{
                        $query_masyarakat = mysqli_query($conn, "select * from masyarakat");
                    }
                    while($data_masyarakat = mysqli_fetch_array($query_masyarakat)){
                ?>
                    <tr>
                        <td><?=$data_masyarakat['id_masyarakat']?></td>
                        <td><?=$data_masyarakat['nama_lengkap']?></td>
                        <td><?=$data_masyarakat['alamat']?></td>
                        <td><?=$data_masyarakat['username']?></td>
                        <td><?=$data_masyarakat['telp']?></td>
                        <td><a href="ubah_masyarakat.php?id_masyarakat=<?=$data_masyarakat['id_masyarakat']?>" class="btn btn-success">Edit</a></td>
                        <td><a href="hapus_masyarakat.php?id_masyarakat=<?=$data_masyarakat['id_masyarakat']?>" class="btn btn-danger"
                            onclick="return confirm('Apakah anda yakin menghapus data ini?')">Hapus</a>
                        </td>
                    </tr>
                <?php
                    }
                ?>
                </tbody>
            </table>
            <br>
            <!-- <a href="tambah_user.php" type="button" class="btn btn" style="background-color: #FF8787;">Tambah</a> -->
            </div>
        </div>
    </div>
    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous"></script>


</body>
</html>
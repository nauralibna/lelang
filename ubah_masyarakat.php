<!DOCTYPE html>
<html>
<head>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" 
    rel="stylesheet" 
    integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x"
    crossorigin="anonymous">
<title>Ubah Masyarakat</title>
</head>

<body>
<?php
    include "../config/koneksi.php";
    $qry_get_masyarakat=mysqli_query($conn,"select * from masyarakat where id_masyarakat = '".$_GET['id_masyarakat']."'");
    $dt_masyarakat=mysqli_fetch_array($qry_get_masyarakat);
?>
<br></br>
    <div class="container ">
        <div class="card">
            <h1 class="card-header bg-info">Ubah Masyarakat</h1>
            <div class="card-body" style="background-color:powderblue";>
                <form action="proses_ubah_masyarakat.php" method="post">
                    <input type="hidden" name="id_masyarakat" value="<?=$dt_masyarakat['id_masyarakat']?>">
                       <b> Nama Masyarakat : </b>
                    <input type="text" name="nama_lengkap" value="<?=$dt_masyarakat['nama_lengkap']?>" class="form-control">
                        <b>Alamat :</b>
                    <textarea name="alamat" class="form-control" rows="4"><?=$dt_masyarakat['alamat']?></textarea>
                        <b>Telepon :</b>
                    <textarea name="telp" class="form-control" rows="4"><?=$dt_masyarakat['telp']?></textarea>
                        <b>Username :</b>
                    <input type="text" name="username"value="<?=$dt_masyarakat['username']?>" class="form-control">
                        <b>Password :</b>
                    <input type="password" name="password" value=""class="form-control"><br>
                    <input type="submit" name="simpan" value="Ubah masyarakat"class="btn btn-info"><br>
                </form>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" 
    integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4"
    crossorigin="anonymous"></script>

</body>
</html>
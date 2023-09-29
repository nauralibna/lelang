<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ubah Barang</title>
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">
</head>
<body>
    <?php
        include "header_admin.php";
        include "../config/koneksi.php";
        $query_barang = mysqli_query($conn, "select * from barang where id_barang='".$_GET['id_barang']."'");
        $data_barang = mysqli_fetch_array($query_barang);
    ?>
    <br></br>
    <div class="container ">
        <div class="card ">
            <h1 class="card-header bg-info" >Ubah barang</h1>
            <div class="card-body" style="background-color:powderblue";>
                <form method="POST" action="proses_ubah_barang.php" enctype="multipart/form-data">
                    <input type="hidden" name="id_barang" value="<?=$data_barang['id_barang']?>">
                    <div class="mb-3">
                        <label for="nama_barang" class="form-label"><b>Barang</b></label>
                        <input type="text" class="form-control" name="nama_barang" value="<?=$data_barang['nama_barang']?>" placeholder="Masukkan Nama Barang " required>
                    </div>
                    <div class="mb-3">
                        <label for="deskripsi_barang" class="form-label"><b>Deskripsi</b></label>
                        <input type="text" class="form-control" name="deskripsi_barang" value="<?=$data_barang['deskripsi_barang']?>" placeholder="Masukkan Deskripsi " required>
                    </div>
                    <div class="mb-3">
                        <label for="harga_awal" class="form-label"><b>Harga Awal</b></label>
                        <textarea class="form-control" name="harga_awal" row="3" placeholder="Masukkan Harga" required><?=$data_barang['harga_awal']?></textarea>
                    </div>
                    <div class="mb-3">
                        <label for="foto" class="form-label"><b>Foto</b></label>
                        <!-- <img src="foto/<?=$data_tas['foto']?>" width="100"/> -->
                        <img src= "/lelang_ukl/masyarakat/foto_lelang/lelang_logo.png" width="30" height="30" class="d-inline-block align-top" alt=""><br>
                        <input type="file" class="form-control" name="foto_lelang" value="<?=$data_barang['foto']?>">
                    </div>
                    <button type="submit" class="btn btn-info">Submit</button>
                </form>
            </div>
        </div>
    </div>

    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-U1DAWAznBHeqEIlVSCgzq+c9gqGAJn5c/t99JyeKa9xxaYpSvHU5awsuZVVFIhvj" crossorigin="anonymous"></script>
</body>
</html>
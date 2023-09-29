<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lelang</title>
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" 
    rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" 
    crossorigin="anonymous">
</head>
<body style="background-color:powderblue;">
    <?php
    session_start();
        include "header.php";
        include "../config/koneksi.php";
        $query_detail_barang = mysqli_query($conn, "SELECT * FROM barang where id_barang = '".$_GET['id_barang']."'");
        $data_barang = mysqli_fetch_array($query_detail_barang);
        $query_pemenang = mysqli_query($conn, "SELECT * FROM barang join lelang on lelang.id_barang=barang.id_barang join masyarakat on masyarakat.id_masyarakat=barang.id_pemenang where barang.id_barang = '".$_GET['id_barang']."'");
        $data_pemenang = mysqli_fetch_array($query_pemenang);
    ?>
    <main class="container">
    <section class="py-5 text-center container">
        <div class="col-lg-6 col-md-8 mx-auto">
            <h1 class="fw-light">Detail barang</h1>
        </div>
    </section>

    <div class="card mb-3" style="max-width: 100%;">
        <div class="row g-0">
            <div class="col-md-4">
            <img src="../masyarakat/foto_lelang/<?=$data_barang['foto']?>" class="img-fluid rounded-start" alt="...">
            </div>
            <div class="col-md-8">
            <div class="card-body">
            <form action="proses_tawar.php" method="POST" enctype="multipart/form-data">
            <input type="hidden" name="id_masyarakat" value="<?=$_SESSION['id_masyarakat']?>">
                <input type="hidden" name="id_barang" value="<?=$_GET['id_barang']?>">
                <input type="hidden" name="harga_awal" value="<?=$data_barang['harga_awal']?>">
                <table class="table table-hover table-striped">
                    <thead>
                        <tr>
                            <td>Name barang</td>
                            <td><?=$data_barang['nama_barang']?></td>
                            <td><input type="hidden" name="nama_barang" value="<?=$data_barang['nama_barang']?>" class="form-control"/></td>
                        </tr>
                        <tr>
                            <td>harga Tertinggi</td>
                            <td>Rp. <?=($data_barang['harga_awal'])?></td>
                        </tr>
                        <tr>
                                <td><?php if(isset($data_pemenang['nama_lengkap'])) echo 'Penawar Tertinggi'?></td>
                                <td><?php if(isset($data_pemenang['nama_lengkap'])) echo $data_pemenang['nama_lengkap']?></td>
                        </tr>
                        <!-- <tr>
                            <td>Nama Masyarakat</td>
                            <td><select name="id_masyarakat" class="form-control">
                                <?php 
                                
                                    include "../config/koneksi.php";
                                        $qry_masyarakat=mysqli_query($conn,"select * from masyarakat");
                                            while($data_masyarakat=mysqli_fetch_array($qry_masyarakat)){
                                            echo '<option value="'.$data_masyarakat['id_masyarakat'].'">'.$data_masyarakat['nama_lengkap'].'</option>';    
                                    }
                                    ?>
                                </select>
                            </td>
                        </tr> -->
                        <?php if($data_barang['status'] == 'buka') :?>
                        <tr>
                            <td>Status</td>
                            <td><?=$data_barang['status']?></td>
                        </tr>
                        <tr>
                            <!-- <?php print_r($_SESSION); ?> -->
                            <td>Tanggal Lelang</td>
                            <td ><input type="date" name="tgl_lelang" required class="form-control"/></td>
                        </tr>
                        <tr>
                            <td>Harga Tawaran</td>
                            <td ><input type="text" name="harga_tawar" required class="form-control" /></td>
                        </tr>
                        <tr>
                            <td colspan="2"><input type="submit" class="btn btn-dark" value="Proses Lelang"></td>
                        </tr>
                        <!-- <tr>
                            <td>
                            <a href="tampil_live_lelang.php?id_barang=<?=$data_barang['id_barang']?>" class="btn btn-primary"> Live Review</a>
                            </td>
                        </tr> -->
                        <?php else : ?>
                        <tr>
                            <td>Status</td>
                            <td><?=$data_barang['status']?></td>
                        </tr>
                        <?php endif; ?>
                        <!-- <tr>
                            <td>Status</td>
                            <td >
                            <select name="status" class="form-control">
                                <option>Status</option>
                                <option value="proses">Diproses</option>
                                <option value="selesai">Telah Selesai</option>
                            </select>
                            </td>
                        </tr> -->
                    </thead>
                </table>
            </form>
            </div>
            </div>
        </div>
    </div>

    </main>
    
</body>
</html>
<body style="background-color:powderblue;">
    <?php
    include "header.php";
    ?>
<div class="card-header  bg-light" >
    <h2 ><center>LIST BARANG</center></h2>
    <div class="row">
        <?php
            include "../config/koneksi.php";
            $qry_barang= mysqli_query($conn,"select * from barang");
            while($dt_barang=mysqli_fetch_array($qry_barang)){
        ?>
            <div class="col-md-3" >
                <div class="card" >
                    <img src="foto_lelang/<?=$dt_barang['foto']?>"class="card-img-top">
                    <div class="card-body" style="background-color:powderblue;">
                        <h5 class="card-title"><center><?=$dt_barang['nama_barang']?></center></h5>
                        <p class="card-text"><center><?=substr($dt_barang['deskripsi_barang'],0,50)?></center></p>
                        <p class="card-text"><center><?=substr($dt_barang['harga_awal'],0,20)?></center></p>
                        <center><a href="lelang.php?id_barang=<?=$dt_barang['id_barang']?>" class="btn btn-primary">BID</a></center>
                    </div>
            </div>
    </div>
        <?php
            }
        ?>
</div>
</body>
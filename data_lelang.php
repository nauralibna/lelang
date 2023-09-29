<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Riwayat</title>
    <!-- CSS only -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" 
      rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" 
      crossorigin="anonymous">
<!-- JavaScript Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" 
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" 
        crossorigin="anonymous"></script>

</head>
<body style="background-color:powderblue;">
  <!-- import navbar -->
    <?php 
        include "header.php ";
    ?>
<div id='printMe'>
<div class="container"> 
<h1><center>Riwayat Lelang Kamu</center></h1>
<!-- <form method="POST" action="tampil_lelang.php" class="d-flex center">
  <input class="form-control me-2" type="search" name="cari" placeholder="Search" aria-label="Search">
  <button class="btn btn-outline-success" type="submit">Search</button>
</form> -->
<br> 
<form action= "proses_histori.php" method="post" enctype="multipart/form-data" >
    <table class="table table-bordered border-primary" >
        <thead class="table-primary">
            <tr>
            <th scope="col">No</th>
            <th scope="col">Nama Barang</th>
            <th scope="col">Tanggal Lelang </th>
            <th scope="col">Status</th>
            </tr>
        </thead>
        <tbody>
        <?php 
                        
            session_start();
            include "../config/koneksi.php";
            $query_lelang = mysqli_query($conn, "SELECT *
            FROM barang INNER JOIN history_lelang ON barang.id_barang = history_lelang.id_barang
            where history_lelang.id_masyarakat = '".$_SESSION['id_masyarakat']."' and status = 'tutup' ");

            $query_barang = mysqli_query($conn, "SELECT * FROM barang where status = 'tutup'");
            $data_barang = mysqli_fetch_array($query_barang);
            $no=0;
            while($data_lelang=mysqli_fetch_array($query_lelang)){
            $no++;
        ?>
<form action= "proses_histori.php" method="POST">
            <tr>
            <td><?=$no?></td>
            <td><?=$data_lelang['nama_barang']?></td>
            <td><?=$data_lelang['tgl_lelang']?></td>
                            
            <?php
            include "../config/koneksi.php";
            if($data_lelang['status']=='tutup'){
                if ($data_lelang['id_pemenang'] == $_SESSION['id_masyarakat'] ){
                     echo "<td><label class='alert alert-success'>MENANG<br></label></td>";
               }else{
                     echo "<td><label class='alert alert-danger'> LOOSE <br></label></td>";
               }
            }else{
                echo "<td>Lelang Sedang Berjalan</td>";
            }    
            ?>
                            
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
                
</div>
</div>
    <script>
		function printDiv(divContainer){
			var printContents = document.getElementById(divContainer).innerHTML;
			var originalContents = document.body.innerHTML;

			document.body.innerHTML = printContents;

			window.print();

			document.body.innerHTML = originalContents;

		}
	</script> 

<button class='btn btn-primary' onclick="printDiv('printMe')">Print Page</button>
</body>
</html>
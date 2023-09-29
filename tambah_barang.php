<?php 
    include "header_admin.php";
?>
<br></br>
    <div class="container ">
    <div class="card" style="background-color:powderblue";>
        <h1 class="card-header bg-info">Tambah Barang</h1>
             <div class="card-body">
                <form method="POST" action="proses_tambah_barang.php" enctype="multipart/form-data" >
                    <div class="mb-3">
                        <label for="nama_barang" class="form-label"><b>Nama Barang</b></label>
                        <input type="text" class="form-control" name="nama_barang"
                        placeholder="Masukkan nama barang" required>
                    </div>

                    <div class="mb-3">
                        <label for="deskripsi_barang" class="form-label"><b>Deskripsi</b></label>
                        <input type="text" class="form-control" name="deskripsi_barang"
                        placeholder="Masukkan Deskripsi" required>
                    </div>

                    <div class="mb-3">
                        <label for="harga_awal" class="form-label"><b>Harga Awal</b></label>
                        <textarea class="form-control" name="harga_awal" row="3"
                        placeholder="Masukkan Harga Awal" required></textarea>
                    </div>

                    <div class="mb-3">
                        <label for="foto" class="form-label"><b>Foto</b></label>
                        <input type="file" class="form-control" name="foto" >
                    </div>

                <input type="submit" name="simpan" value="SIMPAN" class="btn btn-info">
                </form>
            </div>
        </div>
    </div>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar</title>
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">
</head>
<body>
    <?php
        include "hal_utama_admin.php";
    ?>
    <br></br>
    <div class="container">
    <div class="card ">
        <h1 class="card-header rounded bg-info" >Daftar Admin Lelang.id</h1>
             <div class="card-body rounded bg-secondary">
                <form method="POST" action="proses_daftar_admin.php">
                    <div class="mb-3">
                        <label for="nama_petugas" class="form-label"><b class="text-info">NAMA LENGKAP</b></label>
                        <input type="text" class="form-control" name="nama_petugas" placeholder="Masukkan Nama" required>
                    </div>
                    <div class="mb-3">
                        <label for="username" class="form-label"><b class="text-info">USERNAME</b></label>
                        <input type="text" class="form-control" name="username" placeholder="Masukkan Username" required>
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label"><b class="text-info">PASSWORD</b></label>
                        <input type="password" class="form-control" name="password" placeholder="Masukkan Password" required>
                    </div>
                    <div class="mb-3">
                        <label for="telp" class="form-label"><b class="text-info">TELEPON</b></label>
                        <textarea class="form-control" name="telp" row="3" placeholder="Masukkan Nomor Telepon" required></textarea>
                    </div>
                    <button type="submit" class="btn btn-info" >DAFTAR</button>
                </form>
            </div>
        </div>
    </div>

    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-U1DAWAznBHeqEIlVSCgzq+c9gqGAJn5c/t99JyeKa9xxaYpSvHU5awsuZVVFIhvj" crossorigin="anonymous"></script>
</body>
</html>
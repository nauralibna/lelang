<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Masuk</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" 
    rel="stylesheet" integrity="sha384+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x"
    crossorigin="anonymous">
</head>
<body>

<?php
include "hal_utama_admin.php";
?>

<div class="container " style="margin-top:100px;">
        <div class="card ">
        <h1 class="card-header rounded bg-info" >Login Lelang.id</h1>
             <div class="card-body rounded bg-secondary">
            <form action="proses_login_admin.php" method="post">
            <b class="text-info" >USERNAME</b>
            <input type="text" name="username" value="" class="form-control" placeholder="Masukkan Username">
            <br><b class="text-info">PASSWORD</b>
            <input type="password" name="password" class="form-control" placeholder="Masukkan Password"><br>
            <input type="submit" name="login" class="btn btn-info"
            value="LOGIN">
            </form>
            </div>
        <div class="col-md"></div>
        </div>
</div>
</div>


    <script
        src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" 
        integrity="sha384gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4"
        crossorigin="anonymous">
    </script>
</body>
</html>
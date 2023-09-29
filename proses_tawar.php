<?php
    session_start();
    include "../config/koneksi.php";
    $id_barang = $_POST['id_barang'];
    // echo $id_barang;
    // print_r($_POST);
    $harga_tawar = $_POST['harga_tawar'] ;
    $harga = $_POST['harga_awal'];
    $tgl_lelang = $_POST['tgl_lelang'];
    $id_masyarakat = $_POST['id_masyarakat'];

        if ($harga_tawar <= $harga) {
            echo "<script>alert('Tawaran anda dibawah harga lelang');location.href='lelang.php?id_barang=$id_barang'</script>";
        }else {
            $qry = mysqli_query($conn,"select * from history_lelang where id_barang = '".$id_barang."' ");
            if(mysqli_num_rows($qry) > 0){
                $ubah_history = mysqli_query($conn,"UPDATE history_lelang SET harga = '".$harga_tawar."' WHERE id_barang = '".$id_barang."'");
                
                // echo $ubah_history;
                $query_lelang = mysqli_query($conn, "INSERT INTO lelang (id_barang, tgl_lelang, harga_akhir, id_masyarakat)
                VALUES ('".$id_barang."', '".$tgl_lelang."', '".$harga_tawar."', '".$_SESSION['id_masyarakat']."' )");
                mysqli_query($conn,"UPDATE barang SET harga_awal = '".$harga_tawar."', id_pemenang = '".$_SESSION['id_masyarakat']."' WHERE id_barang = '".$id_barang."'");
                
                if ($query_lelang) {
                    echo "<script>alert('Anda Berhasil Menawar');location.href='histori.php?id_barang=$id_barang'</script>";
                }
                else{
                    echo "<script>alert('Gagal Menawar');location.href='lelang.php?id_barang=$id_barang'</script>";
                    // echo mysqli_error($conn);
                }
            }
            else {                             
                print_r($_POST);
                $query_lelang = mysqli_query($conn, "INSERT INTO lelang (id_barang, tgl_lelang, harga_akhir, id_masyarakat)
                VALUES ('".$id_barang."', '".$tgl_lelang."', '".$harga_tawar."', '".$_SESSION['id_masyarakat']."' )");
                $id_lelang = mysqli_insert_id($query_lelang);

                $query_history_lelang = mysqli_query($conn, "INSERT INTO history_lelang (id_lelang, id_barang, id_masyarakat, harga, tgl_lelang)
                VALUES ('".$id_lelang."', '".$id_barang."', '".$_SESSION['id_masyarakat']."', '".$harga_tawar."', '".$tgl_lelang."' )");

                $id_lelang=mysqli_insert_id($conn);
                $status=mysqli_query($conn,"INSERT INTO status(status,id_lelang) VALUE ('".$status."','".$id_lelang."')");
                mysqli_query($conn,"UPDATE barang SET harga_awal = '".$harga_tawar."', id_pemenang = '".$_SESSION['id_masyarakat']."' WHERE id_barang = '".$id_barang."'");
                // mysqli_error($conn);
        
                if ($query_lelang && $query_history_lelang) {
                    echo "<script>alert('Anda Berhasil Menawar');location.href='lelang.php?id_barang=$id_barang'</script>";
                }
                else{
                    echo "<script>alert('Gagal Menawar');location.href='lelang.php?id_barang=$id_barang'</script>";
                    // echo mysqli_error($conn);
                }

            }    
        }
?>
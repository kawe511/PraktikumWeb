<?php
session_start();
if($_SESSION['role_user']==""){
    header("location:index.php?pesan=belum_login");
}
require_once "config.php";

$name = $jml = $harga = "";
$name_err = $jml_err = $harga_err = "";

if($_SERVER["REQUEST_METHOD"] == "POST"){
    $input_name = trim($_POST["name"]);
    if(empty($input_name)){
        $name_err = "Masukkan nama produk";
    } else{
        $name = $input_name;
    }

    $input_jml = trim($_POST["jml"]);
    if(empty($input_jml)){
        $jml_err = "Masukkan jumlah produk.";
    } else{
        $jml = $input_jml;
    }

    $input_harga = trim($_POST["harga"]);
    if(empty($input_harga)){
        $harga_err = "Masukkan harga";
    } elseif(!ctype_digit($input_harga)){
        $harga_err = "Masukkan harga yang valid.";
    } else{
        $harga = $input_harga;
    }

    if(empty($name_err) && empty($jml_err) && empty($harga_err)){
        $sql = "INSERT INTO produk (nama_produk, stok_produk, harga_produk) VALUES ('$name', '$jml', '$harga')";
        mysqli_query($link,$sql);
        if($_SESSION['role_user']=="admin"){
            header("location: halaman_admin.php");
        }
        else header("location: halaman_pegawai.php");
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Tambah Data</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <style type="text/css">
    </style>
</head>
<body style="background-image:url(img/landing.jpg); background-size:cover">
    <div class="container">
        <div class="rounded-lg" style="position: absolute; left: 25%; right: 25%; top: 15%; bottom: 25%; color: white; text-align: center; background-color:slategray; opacity: 85%;">
            <br><h2>Tambah Data</h2>
            <p>Silakan isi form di bawah ini kemudian submit untuk menambahkan data produk ke dalam database.</p>
            <form method="post">
                <div class="form-group">
                    <label>Nama</label>
                    <input style="text-align: center;" type="text" name="name" class="form-control" placeholder="Masukkan Nama Produk">
                </div>
                <div class="form-group">
                    <label>Jumlah Stok</label>
                    <input style="text-align: center;" type="number" name="jml" class="form-control" placeholder="Masukkan Jumlah Produk">
                </div>
                <div class="form-group">
                    <label>Harga</label>
                    <input type="number" style="text-align: center;" name="harga" class="form-control" placeholder="Masukkan Harga Produk">
                </div>
                <input type="submit" class="btn btn-primary" value="Submit">
                <?php if($_SESSION['role_user']=="admin"){
                    echo "<a href='halaman_admin.php' type='button' class='btn btn-outline-dark'>Cancel</a>";}
                    else echo "<a href='halaman_pegawai.php' type='button' class='btn btn-outline-dark'>Cancel</a>";
                ?>
            </form>
        </div>
    </div>
</body>
</html>
<?php 
// koneksi database
include 'config.php';
session_start();
if($_SERVER['REQUEST_METHOD'] == "POST"){
    // menangkap data yang di kirim dari form
    $id = $_POST['id'];
    $nama = $_POST['name'];
    $jml = $_POST['jml'];
    $harga = $_POST['harga'];
    
    // update data ke database
    mysqli_query($link,"update produk set nama_produk='$nama', stok_produk='$jml', harga_produk='$harga' where id_produk='$id'");
    
    if($_SESSION['role_user']=="admin"){
        header("location: halaman_admin.php");
    }
    else header("location: halaman_pegawai.php");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Data</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
</head>
<body style="background-image:url(img/landing.jpg); background-size:cover">
    <div class="container">
        <div class="rounded-lg" style="position: absolute; left: 25%; right: 25%; top: 15%; bottom: 25%; color: white; text-align: center; background-color:slategray; opacity: 85%;">
            <h2>EDIT DATA</h2>
            <?php
            if($_SESSION['role_user']==""){
                header("location:index.php?pesan=belum_login");
            }
            $id = $_GET['id'];
            $data = mysqli_query($link,"SELECT * FROM produk WHERE id_produk='$id'");
            while($d = mysqli_fetch_array($data)){
                ?>
                <form method="post">
                <div class="form-group">
                        <label>Nama</label>
                        <input type="hidden" name="id" value="<?php echo $d['id_produk']; ?>">
                        <input style="text-align: center;" type="text" name="name" class="form-control" value="<?php echo $d['nama_produk']; ?>">
                    </div>
                    <div class="form-group">
                        <label>Jumlah Stok</label>
                        <input style="text-align: center;" type="number" name="jml" class="form-control" value="<?php echo $d['stok_produk']; ?>">
                    </div>
                    <div class="form-group">
                        <label>Harga</label>
                        <input type="number" style="text-align: center;" name="harga" class="form-control" value="<?php echo $d['harga_produk']; ?>">
                    </div>
                    <input type="submit" class="btn btn-primary" value="Submit">
                    <?php if($_SESSION['role_user']=="admin"){
                        echo "<a href='halaman_admin.php' type='button' class='btn btn-outline-dark'>Cancel</a>";}
                        else echo "<a href='halaman_pegawai.php' type='button' class='btn btn-outline-dark'>Cancel</a>";
                    ?>
                </form>
                <?php
            }
            ?>
        </div>
    </div>
</body>
</html>
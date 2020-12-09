<?php
    session_start();
    if($_SESSION['role_user']==""){
        header("location:index.php?pesan=belum_login");
    }
    if(isset($_POST["id"]) && !empty($_POST["id"])){
        if($_SERVER['REQUEST_METHOD'] == "POST"){
            $idx = trim($_GET['id']);
            require_once "config.php";
            mysqli_query($link,"DELETE FROM produk WHERE id_produk = '$idx'");
            header("location: halaman_admin.php");
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Hapus Data</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
</head>
<body style="background-image:url(img/landing.jpg); background-size:cover">
    <div class="container">
        <div class="rounded-lg" style="position: absolute; left: 25%; right: 25%; top: 15%; bottom: 25%; color: white; text-align: center; background-color:slategray; opacity: 85%;">
            <br><br><h1>Delete Data</h1>
            <form method="post">
                <input type="hidden" name="id" value="<?php echo trim($_GET["id"]); ?>"/>
                <p>Apakah anda yakin ingin menghapus data ini?</p
                <?php
                $id = trim($_GET['id']);
               	require_once "config.php";
                $sql = "SELECT * FROM produk WHERE id_produk=$id";
                if($result = mysqli_query($link, $sql)){
                    if(mysqli_num_rows($result) > 0){
                        echo "<br><table align='center' class='table table-bordered table-striped' style='color: white; width: 95%;'>";
                            echo "<thead>";
                                echo "<tr>";
                                    echo "<th>ID</th>";
                                    echo "<th>Nama Produk</th>";
									echo "<th>Stok Produk</th>";
									echo "<th>Harga Produk</th>";
                                echo "</tr>";
                            echo "</thead>";
                            echo "<tbody>";
                            while($row = mysqli_fetch_array($result)){
                                echo "<tr>";
                                    echo "<td>" . $row['id_produk'] . "</td>";
                                    echo "<td>" . $row['nama_produk'] . "</td>";
                                    echo "<td>" . $row['stok_produk'] . " pcs</td>";
                                    echo "<td>Rp" . $row['harga_produk'] . "</td>";
                                echo "</tr>";
                            }
                            echo "</tbody>";
                            echo "</table>";
                        }
                    }
                ?>
                <input type="submit" value="Yes" class="btn btn-danger">
                <a href="halaman_admin.php" class="btn btn-default">No</a>
            </form>
        </div>
    </div>
</body>
</html>
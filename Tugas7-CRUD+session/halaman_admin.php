<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <title>Admin</title>
</head>
<body style="background-image:url(img/landing.jpg); background-size:cover">
	<?php 
		session_start();
		// cek apakah yang mengakses halaman ini sudah login
		if($_SESSION['role_user']==""){
			header("location:index.php?pesan=belum_login");
		}
	?>
    <div class="container">
        <div class="rounded-lg" style="position: auto; left: 25%; right: 25%; color: white; text-align: center; background-color:slategray; opacity: 85%;">
			<br><h1>Halaman Admin</h1>
			<p>Halo <b><?php echo $_SESSION['nama_user']; ?></b> Anda telah login sebagai <b><?php echo $_SESSION['role_user']; ?></b>.</p>
			<div class="page-header clearfix">
                <h2 class="pull-left">Informasi Produk</h2>
                <a href="create.php" class="btn btn-success pull-right">Tambah Baru</a>
                <a href="halaman_admin.php" class="btn btn-primary pull-right">Refresh</a>
            </div>
            <?php
               	require_once "config.php";
                $sql = "SELECT * FROM produk";
                if($result = mysqli_query($link, $sql)){
                    if(mysqli_num_rows($result) > 0){
                        echo "<br><table align='center' class='table table-bordered table-striped' style='color: white; width: 95%;'>";
                            echo "<thead>";
                                echo "<tr>";
                                    echo "<th>ID</th>";
                                    echo "<th>Nama Produk</th>";
									echo "<th>Stok Produk</th>";
									echo "<th>Harga Produk</th>";
									echo "<th>Operasi</th>";
                                echo "</tr>";
                            echo "</thead>";
                            echo "<tbody>";
                            while($row = mysqli_fetch_array($result)){
                                echo "<tr>";
                                    echo "<td>" . $row['id_produk'] . "</td>";
                                    echo "<td>" . $row['nama_produk'] . "</td>";
                                    echo "<td>" . $row['stok_produk'] . " pcs</td>";
                                    echo "<td>Rp" . $row['harga_produk'] . "</td>";
                                    echo "<td>";
										echo "<a type='button' href='update.php?id=". $row['id_produk'] ."' title='Edit' data-toggle='tooltip' class='btn btn-dark btn-sm'>Edit</a><span> | </span>";
                                	    echo "<a type='button' href='delete.php?id=". $row['id_produk'] ."' title='Hapus' data-toggle='tooltip' class='btn btn-dark btn-sm'>Hapus</a>";
                                    echo "</td>";
                                echo "</tr>";
                            }
                            echo "</tbody>";
                        echo "</table>";
                        mysqli_free_result($result);
                    } else{
                        echo "<p class='lead'><em>Tidak ada data.</em></p>";
                    }
                } else{
                }
                mysqli_close($link);
        	?>
			<center><a type="button" class="btn btn-danger" href="logout.php">LOGOUT</a><br/><br/></center>
		</div>
	</div>
</body>
</html>
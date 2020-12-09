<?php include 'config.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel ="stylesheet" href="css/bootstrap.min.css">
    <title>Login</title>
</head>
<body style="background-image:url(img/bg.jpg); background-size:cover">
    <div class="container">
        <div class="col-md-6 rounded-lg" style="position: absolute; left: 25%; right: 25%; top: 10%; bottom: 40%; text-align: center; background-color:slategray; opacity: 90%;">
            <br><h2 style="color: white;">Login</h2><br>
            <form method="POST" action="cek_login.php">
                <div class="form-group">
                    <label for="nama" style="color: white;">Username</label>
                    <input type="text" class="form-control" style="text-align: center;" name="nama" placeholder="Masukkan username" width="50%">
                </div>
                <div class="form-group">
                    <label for="pw" style="color: white;">Password</label>
                    <input type="password" class="form-control" style="text-align: center;" name="pw" placeholder="Masukkan password" width="50%">
                </div>
                <button type="submit" class="btn btn-primary">Login</button>
                <?php if(isset($_GET['pesan'])){
		            if($_GET['pesan'] == "gagal"){
                        echo "<div class='alert'>Username dan Password tidak sesuai !</div>";
                    }else if($_GET['pesan'] == "belum_login"){
                        echo "<div class='alert'>Anda harus login terlebih dahulu !</div>";
                    }
                } ?>
            </form>
        </div>
     </div>
</body>
</html>
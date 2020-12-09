<?php 
// mengaktifkan session php
session_start();
 
// menghubungkan dengan koneksi
include 'config.php';
 
// menangkap data yang dikirim dari form
$username = $_POST['nama'];
$password = $_POST['pw'];
 
// menyeleksi data admin dengan username dan password yang sesuai
$login = mysqli_query($link,"select * from users where nama_user='$username' and password_user='$password'");
 
// menghitung jumlah data yang ditemukan
$cek = mysqli_num_rows($login);
 
if($cek > 0){
	
	$data = mysqli_fetch_assoc($login);
 
	// cek jika user login sebagai admin
	if($data['role_user']=="admin"){
 
		// buat session login dan username
		$_SESSION['nama_user'] = $username;
		$_SESSION['role_user'] = "admin";
		// alihkan ke halaman dashboard admin
		header("location:halaman_admin.php");
 
	// cek jika user login sebagai pegawai
	}else if($data['role_user']=="pegawai"){
		// buat session login dan username
		$_SESSION['nama_user'] = $username;
		$_SESSION['role_user'] = "pegawai";
		// alihkan ke halaman dashboard pegawai
		header("location:halaman_pegawai.php");
 
	}else{
		// alihkan ke halaman login kembali
		header("location:index.php?pesan=gagal");
	}	
}else{
	header("location:index.php?pesan=gagal");
}
?>
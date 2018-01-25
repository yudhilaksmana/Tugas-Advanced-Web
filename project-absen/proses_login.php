<?php

	session_start();

	include("koneksi.php");

	$kode = $_POST['kode'];
	$password = $_POST['pswd'];

	$query = "SELECT * FROM karyawan WHERE kode='$kode' AND password='$password'";
	$hasil = mysqli_query($db, $query);

	if(mysqli_num_rows($hasil) == 0){
		header("Location: login.php");
	}
	else{
		$row = mysqli_fetch_assoc($hasil);
		$_SESSION['kode'] = $kode;
		$_SESSION['level'] = $row['user_level'];

		if($_SESSION['level'] == "admin") {
			header("Location: absen.php");
		}
		else{
			header("Location: absen_view.php");
		}
	}
?>
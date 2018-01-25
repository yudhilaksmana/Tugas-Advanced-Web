<?php
	include("koneksi.php");

	$nama_kry = mysqli_real_escape_string($db, $_POST['nama']);
	$kode = mysqli_real_escape_string($db, $_POST['kode']);
	$password = mysqli_real_escape_string($db, $_POST['pswd']);

	$query = "INSERT INTO karyawan(nama_kry,kode,password,id_div) VALUES ('$nama_kry','$kode','$password','".$_POST['divisi']."')";	
	mysqli_query($db, $query);

	header('Location:karyawan.php');
?>
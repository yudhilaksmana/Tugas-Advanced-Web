<?php
	include("koneksi.php");

	$id = $_POST['id'];
	$nama_kry = mysqli_real_escape_string($db, $_POST['nama']);
	$kode = mysqli_real_escape_string($db, $_POST['kode']);
	$password = mysqli_real_escape_string($db, $_POST['pswd']);

	$query = "UPDATE karyawan SET nama_kry='$nama_kry',kode='$kode',password='$password',id_div='".$_POST['divisi']."' WHERE id_kry=$id";	
	mysqli_query($db, $query);

	header('Location:karyawan.php');
?>
<?php
	include("koneksi.php");

	$nama_div = mysqli_real_escape_string($db, $_POST['nama']);

	$query = "INSERT INTO divisi(nama_div) VALUES ('$nama_div')";
	mysqli_query($db, $query);

	header('Location:divisi.php');
?>
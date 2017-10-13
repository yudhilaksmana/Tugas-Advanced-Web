<?php
	include("koneksi.php");

	$ket = mysqli_real_escape_string($db, $_POST['ket']);

	$query = "INSERT INTO kategori(keterangan) VALUES ('$ket')";
	mysqli_query($db, $query);

	header('Location:kategori.php');
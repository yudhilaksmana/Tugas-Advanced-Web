<?php
	include("koneksi.php");

	$id = $_GET['id'];

	$query = "DELETE FROM absen WHERE id_absen=$id";
	mysqli_query($db, $query);

	header('Location: absen.php')
?>
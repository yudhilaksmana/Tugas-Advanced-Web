<?php
	include("koneksi.php");

	$id = $_GET['id'];

	$query = "DELETE FROM kontak WHERE id_kontak=$id";
	mysqli_query($db, $query);

	header('Location: index.php')
?>
<?php
	include("koneksi.php");

	$id = $_GET['id'];

	$query = "DELETE FROM divisi WHERE id_div=$id";
	mysqli_query($db, $query);

	header('Location: divisi.php')
?>
<?php
	include("koneksi.php");

	$id = $_GET['id'];

	$query = "DELETE FROM kategori WHERE id_kategori=$id";
	mysqli_query($db, $query);

	header('Location: kategori.php')
?>
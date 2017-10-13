<?php
	include("koneksi.php");

	$id = $_POST['id'];
	$ket = mysqli_real_escape_string($db, $_POST['ket']);

	$query = "UPDATE kategori SET keterangan='$ket' WHERE id_kategori=$id";
	mysqli_query($db, $query);

	header('Location: kategori.php')
?>
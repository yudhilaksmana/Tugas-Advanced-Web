<?php
	include("koneksi.php");

	$id = $_POST['id'];
	$nama_div = mysqli_real_escape_string($db, $_POST['nama']);

	$query = "UPDATE divisi SET nama_div='$nama_div' WHERE id_div=$id";
	mysqli_query($db, $query);

	header('Location: divisi.php')
?>
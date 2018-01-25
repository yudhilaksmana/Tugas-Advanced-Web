<?php
	include("koneksi.php");

	$id = $_GET['id'];

	$query = "DELETE FROM karyawan WHERE id_kry=$id";
	mysqli_query($db, $query);

	header('Location: karyawan.php')
?>
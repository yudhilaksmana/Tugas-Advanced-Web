<?php
	include("koneksi.php");

	$kode = mysqli_real_escape_string($db, $_POST['kode']);
	$jam_msk = mysqli_real_escape_string($db, $_POST['jam_msk']);
	$jam_plg = mysqli_real_escape_string($db, $_POST['jam_plg']);
	$tgl = mysqli_real_escape_string($db, $_POST['tgl']);

	$query = "INSERT INTO absen(kode,jam_masuk,jam_pulang,tanggal) VALUES ('$kode','$jam_msk','$jam_plg','$tgl')";
	mysqli_query($db, $query);

	header('Location:absen.php');
?>
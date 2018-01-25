<?php
	include("koneksi.php");

	$id = $_POST['id'];
	$kode = mysqli_real_escape_string($db, $_POST['kode']);
	$jam_msk = mysqli_real_escape_string($db, $_POST['jam_msk']);
	$jam_plg = mysqli_real_escape_string($db, $_POST['jam_plg']);
	$tgl = mysqli_real_escape_string($db, $_POST['tgl']);

	$query = "UPDATE absen SET kode='$kode', jam_masuk='$jam_msk', jam_pulang='jam_plg', tanggal='$tgl' WHERE id_absen=$id";
	mysqli_query($db, $query);

	header('Location: divisi.php')
?>
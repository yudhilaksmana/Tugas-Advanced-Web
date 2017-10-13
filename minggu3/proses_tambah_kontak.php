<?php
	include("koneksi.php");

	$nama = mysqli_real_escape_string($db, $_POST['nama']);
	$phone = mysqli_real_escape_string($db, $_POST['phone']);
	$email = mysqli_real_escape_string($db, $_POST['email']);

	$query = "INSERT INTO kontak(nama,hp,email,id_kategori) VALUES ('$nama','$phone','$email','".$_POST['kategori']."')";
	mysqli_query($db, $query);

	header('Location:index.php');
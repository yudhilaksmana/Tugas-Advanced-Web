<?php
	include("koneksi.php");

	date_default_timezone_set('Asia/Jakarta');
	$tgl = date('Y-m-d');
	$jam = date('h:i:s');
	$kode = mysqli_real_escape_string($db, $_POST['kode']);
	$ket = "";

	$query = "SELECT * FROM absen";
	$hasil = mysqli_query($db,$query);

	while($row=mysqli_fetch_assoc($hasil)) {
		if($tgl==$row['tanggal'] && $kode==$row['kode']) {
			$ket = "pulang";
			$id_plg = $row['id_absen'];
		} else {
			$ket = "masuk";
		}
	}

	if($ket=="pulang"){
		$query2 = "UPDATE absen SET jam_pulang='$jam' WHERE id_absen=$id_plg";
		mysqli_query($db, $query2);
		header('Location:index.php');
	}
	elseif($ket=="masuk"){
		$query2 = "INSERT INTO absen(jam_masuk, tanggal, kode) VALUES ('$jam','$tgl','$kode')";
		mysqli_query($db, $query2);
		header('Location:index.php');
	}
	else{
		echo "Terjadi Kesalahan";
	}

	
?>
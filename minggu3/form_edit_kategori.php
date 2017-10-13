<?php // filename: form_edit_kategori.php
	include("koneksi.php");

	$id = $_GET['id'];

	$query = "SELECT * FROM kategori WHERE id_kategori=$id";
	$hasil = mysqli_query($db,$query);

	if(!$hasil) {
		echo ("Error :".mysqli_error($db));
	}

	$row = mysqli_fetch_assoc($hasil);
?>

<!DOCTYPE html>
<html>
<head>
	<title>Phone Book</title>
</head>
<body>
<h1>Phone Book</h1>
<div id="menu">
	<ul>
		<li><a href="index.php">Kontak</a></li>
		<li><a href="kategori.php">Kategori</a></li>
	</ul>
</div>
<div id="konten">
	<h2>Edit Kategori</h2>
	<form action="proses_edit_kategori.php" method="post">
		Keterangan:
		<input type="text" name="ket" value="<?php echo $row['keterangan'];?>" />
		<input type="hidden" name="id" value="<?php echo $row['id_kategori']; ?>" />
		<br />
		<input type="submit" value="Simpan" />
	</form>
</div>
</body>
</html>
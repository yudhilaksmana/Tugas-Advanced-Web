<?php // filename: form_edit_kontak.php
	include("koneksi.php");

	$id = $_GET['id'];

	$query = "SELECT * FROM kontak WHERE id_kontak=$id";
	$hasil = mysqli_query($db,$query);

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
	<h2>Edit Kontak</h2>
	<form action="proses_edit_kontak.php" method="post">
		Nama:
		<input type="text" name="nama" value="<?php echo $row['nama'];?>"/>
		<br />
		Phone:
		<input type="text" name="phone" value="<?php echo $row['hp'];?>"/>
		<br />
		Email:
		<input type="text" name="email" value="<?php echo $row['email'];?>"/>
		<br />
		<input type="hidden" name="id" value="<?php echo $row['id_kontak']; ?>" />
		Kategori:
		<?php
			$sql = "SELECT * FROM kategori";
			$result = mysqli_query($db, $sql);

			echo "<select name='kategori'>";
			while ($row = mysqli_fetch_array($result)) {
			    echo "<option value='" . $row['id_kategori'] ."'>" . $row['keterangan'] ."</option>";
			}
			echo "</select>";
		?>
		<br />
		<input type="submit" value="Simpan" />
	</form>
</div>
</body>
</html>
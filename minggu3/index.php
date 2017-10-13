<?php // filename: index.php
	include("koneksi.php");
	
	if(isset($_POST['filter']))
	{
		$kat = mysqli_real_escape_string($db, $_POST['kategori']);
		$query = "SELECT * FROM Kontak INNER JOIN kategori ON kontak.id_kategori = kategori.id_kategori WHERE id_kategori = $kat";
	}
	elseif (isset($_POST['cari']))
	{
		$cari = mysqli_real_escape_string($db, $_POST['search_text']);
		$query =  "SELECT * FROM kontak INNER JOIN kategori ON kontak.id_kategori = kategori.id_kategori WHERE nama like '%{$cari}%'";
	}
	else
	{
		$query = "SELECT * FROM Kontak INNER JOIN kategori ON kontak.id_kategori = kategori.id_kategori";
	}
	
	$hasil = mysqli_query($db, $query);
	if(!$hasil) {
		echo "Error : ".mysqli_error($db);
	}
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
<div id="filter">
	<b>Filter berdasarkan kategori: </b>
	<form action="" method="post">
		<select name='kategori'>
		<?php
			$q2 = "SELECT * FROM kategori";
			$h2 = mysqli_query($db, $q2);
			while($row = mysqli_fetch_assoc($h2)){
   		?>
		<option value="<?php echo $row[id_kategori]; ?>"><?php echo $row['keterangan']; ?></option>
		<?php 
			}
		?>
		</select>
		<input type="submit" name="filter" value="Filter" />
		<input type="button" name="clear" onclick="window.location.href=window.location.href" value="Clear" />
	</form>
</div>
<div id="search">
	<b>Search: </b>
	<form action="" method="post">
		<input type="text" name="search_text" />
		<input type="submit" name="cari" value="Cari" />
		<input type="button" name="clear" onclick="window.location.href=window.location.href" value="Clear" />
	</form>
</div>
<div id="konten">
	<h2>Kontak</h2>
	<a href="form_tambah_kontak.php">Tambah Kontak</a>
	<table border="1">
		<thead>
			<tr>
				<th>No.</th>
				<th>Nama</th>
				<th>Hp.</th>
				<th>Email</th>
				<th>Kategori</th>
				<th>Action</th>
			</tr>
		</thead>
		<tbody>
			<?php
				$i = 0;

				while($row=mysqli_fetch_assoc($hasil))
				{
					$i++;
			?>
			<tr>
				<td><?php echo $i; ?></td>
				<td><?php echo $row['nama']; ?></td>
				<td><?php echo $row['hp']; ?></td>
				<td><?php echo $row['email']; ?></td>
				<td><?php echo $row['keterangan']; ?></td>
				<td>
					<a href="form_edit_kontak.php?id=<?php echo $row['id_kontak']; ?>">Edit</a> | 
					<a href="delete_kontak.php?id=<?php echo $row['id_kontak']; ?>">Delete</a>
				</td>
			</tr>
			<?php
				}
			?>
		</tbody>
	</table>
</div>
</body>
</html>
<?php
	if(isset($_POST['submit']))
	{
		$username = $_POST['username'];
		$password = $_POST['password'];

		$koneksi = mysqli_connect("localhost","root","","belajar_loginapp");

		if($koneksi)
		{
			echo "We're Connected";
		}
		else
		{
			echo "Connection Failed";
		}

		$query = "INSERT INTO users (username, password) VALUES ('$username','$password')";
		$result = mysqli_query($koneksi,$query);

		if(!$result)
		{
			die('Query Failed'.mysqli_error($koneksi));
		}
	}
?>

<!DOCTYPE html>
<html>
	<head>
		<title>Login</title>
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css" integrity="sha384-/Y6pD6FV/Vv2HJnA6t+vslU6fwYXjCFtcEpHbNJ0lyAFsXTsjBbfaDjzALeQsN6M" crossorigin="anonymous">
	</head>
	<body>
		<div class="container">
			<div class="col-md-6">
				<form action="login_create.php" method="post">
					<div class="form-group">
						<label for="username">Username</label>
						<input type="text" name="username" class="form-control">
					</div>
					<div class="form-group">
						<label for="password">Password</label>
						<input type="password" name="password" class="form-control">
					</div>
					<input type="submit" name="submit" value="Submit" class="btn btn-primary" />
				</form>
			</div>
		</div>
	</body>
</html>
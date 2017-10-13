<?php
	$db = mysqli_connect("localhost","root","","db_phonebook");

	if(mysqli_connect_errno())
	{
		die(mysqli_connect_error());
	}
?>
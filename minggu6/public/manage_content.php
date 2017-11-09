<?php
	// 1. Create a database connection
	$dbhost = "localhost";
	$dbuser = "root";
	$dbpass = "";
	$dbname = "db_minggu6";
	$connection = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);
	
	// Test ir connection succeeded
	if(mysqli_connect_errno()) {
		die("Database connection failed : " .
			mysqli_connect_error() .
			" (" . mysqli_connect_errno() . ")");
	}
?>
<?php require_once("../includes/db_connection.php"); ?>
<?php require_once("../includes/functions.php"); ?>
<?php include("../includes/layouts/header.php"); ?>

<div id="main">
	<div id="navigation">
		<ul class="subjects">
		<?php
			$query = "SELECT * ";
			$query .= "FROM subjects ";
			$query .= "WHERE visible = 1 ";
			$query .= "ORDER BY position ASC";
			$subject_set = mysqli_query($connection, $query);
			confirm_query($subject_set);
		?>
		<?php
		while($subject = mysqli_fetch_assoc($subject_set)) {
		?>
			<li>
				<?php echo $subject["menu_name"]; ?>
				<?php
					$query = "SELECT * ";
					$query .= "FROM pages ";
					$query .= "WHERE visible = 1 ";
					$query .= "AND {subject["id"]} ";
					$query .= "ORDER BY position ASC";
					$page_set = mysqli_query($connection, $query);
					confirm_query($page_set);
				?>
				<ul class="pages">
					<?php
						while($page = mysqli_fetch_assoc($page_set)) {
					?>
						<li><?php echo $page["menu_name"];?></li>
					<?php
						}
					?>
					<?php mysqli_free_result($page_set);?>
				</ul>
			</li>
			<?php
		}
		?>
		<?php mysqli_free_result($subject_set);?>
		</ul>
	</div>
	<div id="page">
		<h2>Manage Content</h2>
	</div>
</div>
<?php include("../includes/layouts/footer.php"); ?>
<?php
	// 5. Close database connection
	mysqli_close($connection);
?>
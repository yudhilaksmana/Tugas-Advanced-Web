<?php
    include("koneksi.php");

    $id = $_GET['id'];

    $query = "SELECT * FROM divisi WHERE id_div=$id";
    $hasil = mysqli_query($db,$query);

    if(!$hasil) {
        echo ("Error :".mysqli_error($db));
    }

    $row = mysqli_fetch_assoc($hasil);
?>

<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Absensi Karyawan</title>

    <!-- Bootstrap core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    
    <!-- Custom styles for this template -->
    <link href="css/simple-sidebar.css" rel="stylesheet">
    <link href="css/custom.css" rel="stylesheet">
</head>
<body>
    <div id="wrapper">
        <!-- Include Sidebar -->
        <?php include('sidebar.php'); ?>

        <!-- Include Navbar -->
        <?php include('navbar.php'); ?>

        <!-- Page Content -->
        <div id="page-content-wrapper">
            <div class="container-fluid">
                <h1>Divisi</h1>
                <hr><br>
                <form action="proses_edit_divisi.php" method="post">
                    <h5>Nama Divisi:</h5>
                    <input name="nama" type="text" class="form-control" value="<?php echo $row['nama_div'];?>">
                    <input name="id" type="hidden" class="form-control" value="<?php echo $row['id_div'];?>">
                    <br>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
        <!-- /#page-content-wrapper -->
    </div>
    <!-- /#wrapper -->

    <!-- Bootstrap core JavaScript -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Menu Toggle Script -->
    <script>
    $("#menu-toggle").click(function(e) {
        e.preventDefault();
        $("#wrapper").toggleClass("toggled");
    });
    </script>
</body>
</html>

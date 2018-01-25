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
                <h1>Tambah Absen</h1>
                <hr><br>
                <form action="proses_tambah_absen.php" method="post">
                    <div class="form-group">
                        <label for="nama">Kode Karyawan</label>
                        <input type="text" name="kode" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="nama">Jam Masuk</label>
                        <input type="text" name="jam_msk" class="form-control" placeholder="e.g. 08:10:42">
                    </div>
                    <div class="form-group">
                        <label for="nama">Jam Pulang</label>
                        <input type="text" name="jam_plg" class="form-control" placeholder="e.g. 16:10:42">
                    </div>
                    <div class="form-group">
                        <label for="nama">Tanggal</label>
                        <input type="text" name="tgl" class="form-control" placeholder="e.g. 2017-10-02">
                    </div>
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

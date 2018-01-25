<?php // filename: index.php
    include("koneksi.php");
    $query = "SELECT * FROM divisi";
    $hasil = mysqli_query($db, $query);
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
                <a href="form_tambah_divisi.php" class="btn btn-primary">Tambah Divisi</a>
                <br><br>   
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Nama Divisi</th>
                            <th scope="col">Action</th>
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
                            <th scope="row"><?php echo $i; ?></th>
                            <td><?php echo $row['nama_div']; ?></td>
                            <td>
                                <a href="form_edit_divisi.php?id=<?php echo $row['id_div']; ?>" class="btn btn-warning btn-sm">Edit</a>
                                <a href="proses_delete_divisi.php?id=<?php echo $row['id_div']; ?>" class="btn btn-danger btn-sm">Delete</a>
                            </td>
                        </tr>
                        <?php
                            }
                        ?>
                    </tbody>
                </table>
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
</html

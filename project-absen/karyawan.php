<?php // filename: index.php
    include("koneksi.php");
    $query = "SELECT karyawan.id_kry, karyawan.nama_kry, karyawan.kode, karyawan.password, karyawan.user_level, divisi.nama_div FROM karyawan INNER JOIN divisi ON karyawan.id_div=divisi.id_div";
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
                <h1>Karyawan</h1>
                <hr><br>
                <a href="form_tambah_karyawan.php" class="btn btn-primary">Tambah Karyawan</a>
                <br><br>   
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Nama Karyawan</th>
                            <th scope="col">Kode</th>
                            <th scope="col">Password</th>
                            <th scope="col">User Level</th>
                            <th scope="col">Divisi</th>
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
                            <td><?php echo $row['nama_kry']; ?></td>
                            <td><?php echo $row['kode']; ?></td>
                            <td><?php echo $row['password']; ?></td>
                            <td><?php echo $row['user_level']; ?></td>
                            <td><?php echo $row['nama_div']; ?></td>
                            <td>
                                <a href="form_edit_karyawan.php?id=<?php echo $row['id_kry']; ?>" class="btn btn-warning btn-sm">Edit</a>
                                <a href="proses_delete_karyawan.php?id=<?php echo $row['id_kry']; ?>" class="btn btn-danger btn-sm">Delete</a>
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
</html>


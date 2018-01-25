<?php
    include("koneksi.php");

    $id = $_GET['id'];

    $query = "SELECT * FROM karyawan WHERE id_kry=$id";
    $hasil = mysqli_query($db,$query);

    if(!$hasil) {
        echo ("Error :".mysqli_error($db));
    }

    $row = mysqli_fetch_assoc($hasil);
    $selected = $row['id_div']
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
                <h1>Tambah Karyawan</h1>
                <hr><br>
                <form action="proses_edit_karyawan.php" method="post">
                    <div class="form-group">
                        <label for="nama">Nama Karyawan</label>
                        <input type="text" name="nama" class="form-control" value="<?php echo $row['nama_kry'];?>">
                    </div>
                    <div class="form-group">
                        <label for="nama">Kode</label>
                        <input type="text" name="kode" class="form-control" value="<?php echo $row['kode'];?>">
                    </div>
                    <div class="form-group">
                        <label for="nama">Password</label>
                        <input type="text" name="pswd" class="form-control" value="<?php echo $row['password'];?>">
                    </div>
                    <div class="form-group">
                        <label for="nama">Divisi</label>
                        <?php

                            $sql = "SELECT * FROM divisi";
                            $result = mysqli_query($db, $sql);

                            echo "<select name='divisi' class='form-control'>";
                            while ($row2 = mysqli_fetch_array($result)) {
                                echo "<option value='".$row2['id_div']."'";

                                if($row2['id_div']==$selected) { echo "selected='selected'"; } 
                                
                                echo ">".$row2['nama_div']."</option>";
                            }
                            echo "</select>";
                        ?>
                    </div>
                    <input name="id" type="hidden" class="form-control" value="<?php echo $row['id_kry'];?>">
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

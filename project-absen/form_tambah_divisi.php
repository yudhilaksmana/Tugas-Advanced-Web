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
                <h1>Tambah Divisi</h1>
                <hr><br>
                <form action="proses_tambah_divisi.php" method="post" onsubmit="return validasi_input(this)">
                    <div class="form-group">
                        <label for="nama">Nama Divisi</label>
                        <input type="text" name="nama" class="form-control">
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


<script type="text/javascript">

function validasi_input(form){
                  if (form.nama.value == ""){
                  alert("Divisi masih kosong!");
                  form.nama.focus();
                  return (false);
          }
          return (true);

      }
  </script>
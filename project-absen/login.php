<?php
    include("koneksi.php");
    session_start();

    if(isset($_SESSION['kode']) && $_SESSION['level'] == "admin"){
        header("Location:absen.php");
    }
    else if(isset($_SESSION['kode']) && $_SESSION['level'] == "user"){
        header("Location:absen_view.php");
    }
?>


<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Login</title>

    <!-- Bootstrap core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    
    <!-- Custom styles for this template -->
    <link href="css/simple-sidebar.css" rel="stylesheet">
    <link href="css/custom.css" rel="stylesheet">
</head>
<body>
  
        <!-- Include Navbar -->
        <?php include('navbar_login.php'); ?>

        <!-- Page Content -->
        <div id="page-content-wrapper">
            <div class="container-fluid">
                <h1>Login</h1>
                <hr><br>
                <form action="proses_login.php" method="post" onsubmit="return validasi_input(this)">
                    <div class="form-group">
                        <label for="nama">Kode Karyawan</label>
                        <input type="text" name="kode" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="nama">Password</label>
                        <input type="text" name="pswd" class="form-control">
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
                  if (form.kode.value == ""){
                  alert("Kode masih kosong!");
                  form.kode.focus();
                  return (false);
          }
           
       if(form.pswd.value == ""){
                alert("Password masih kosong!");
                form.pswd.focus();
                return (false);
     }
            return(true);
}

</script>
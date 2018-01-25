<?php // filename: index.php

    session_start();

    if(!isset($_SESSION['kode']) || $_SESSION['level'] != "admin"){
        header("Location:login.php");
    }

    $kode = $_SESSION['kode'];

    include("koneksi.php");
    $query = "SELECT absen.id_absen, karyawan.nama_kry, absen.kode, absen.jam_masuk, absen.jam_pulang, absen.tanggal FROM absen INNER JOIN karyawan ON absen.kode=karyawan.kode";
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
    
    <link rel="stylesheet" href="lib/css/default.css" />
    <!-- Custom styles for this template -->
    <link href="css/simple-sidebar.css" rel="stylesheet">
    <link href="css/custom.css" rel="stylesheet">
     <link rel="stylesheet" href="http://code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
    <link rel="css/stylesheet" href="css/default.css" />
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
                <h1>Absensi</h1>
                <hr><br>
            <table>
                <div class="col-md-3">  
                    <form action="filter.php" method="POST" />
                    <tr><th><input type="text" name="from_date" id="from_date" class="form-control" placeholder="From Date" /></div></th>

                <div class="col-md-3">  
                    <th><th><th><th><input type="text" name="to_date" id="to_date" class="form-control" placeholder="To Date" /></div></th></th></th></th>

                <div class="col-md-5">  
                    <th><th><th><th><input type="submit" name="filter" id="filter" value="Filter" class="btn btn-info" />  
                </div></th></th></th></th></tr>

                <div style="clear:both"></div>                 
                <br />  
            </table>
                </br></br><a href="form_tambah_absen.php" class="btn btn-primary" onSubmit="return validasi()">Tambah Absensi</a>
                <br><br>   
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Nama Karyawan</th>
                            <th scope="col">Kode</th>
                            <th scope="col">Jam Masuk</th>
                            <th scope="col">Jam Pulang</th>
                            <th scope="col">Tanggal</th>
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
                            <td><?php echo $row['jam_masuk']; ?></td>
                            <td><?php echo $row['jam_pulang']; ?></td>
                            <td><?php echo $row['tanggal']; ?></td>
                            <td>
                                <a href="form_edit_absen.php?id=<?php echo $row['id_absen']; ?>" class="btn btn-warning btn-sm">Edit</a>
                                <a href="proses_delete_absen.php?id=<?php echo $row['id_absen']; ?>" class="btn btn-danger btn-sm">Delete</a>
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
    <script src="vendor/bootstrap/js/jquery.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>  
    <script src="http://code.jquery.com/ui/1.10.3/jquery-ui.js"></script>  
    <link rel="stylesheet" href="http://code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
    <!-- Menu Toggle Script -->
    <script>
    $("#menu-toggle").click(function(e) {
        e.preventDefault();
        $("#wrapper").toggleClass("toggled");
    });


    </script>
</body>
</html>

<script src="lib/jquery.min.js"></script>
<script src="lib/zebra_datepicker.js"></script>
<link rel="stylesheet" href="lib/css/default.css" />
       
<script>
    $(document).ready(function(){
        $('#from_date').Zebra_DatePicker({
        dateFormat: 'yy-mm-dd'
        });
    });
     $(document).ready(function(){
        $('#to_date').Zebra_DatePicker({
            dateFormat: 'yy-mm-dd'
        });
    });

  $(function(){  
                $("#from_date").Zebra_DatePicker();  
                $("#to_date").Zebra_DatePicker();  
           });  

    $('#filter').click(function(){  
                var from_date = $('#from_date').val();  
                var to_date = $('#to_date').val();  
                if(from_date != '' && to_date != '')  
                {  
                     $.ajax({  
                          url:"filter.php",  
                          method:"POST",  
                          data:{from_date:from_date, to_date:to_date},  
                          success:function(data)  
                          {  
                               $('#order_table').html(data);  
                          }  
                     });  
                }  
                else  
                {  
                     alert("Please Select Date");  
                }  
           });  


</script>



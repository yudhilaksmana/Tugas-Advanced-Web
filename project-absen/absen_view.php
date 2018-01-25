<?php // filename: index.php

    session_start();
    if(!isset($_SESSION['kode']) || $_SESSION['level'] != "user"){
        header("Location:login.php");
    }

    $kode = $_SESSION['kode'];

    include("koneksi.php");
    $query = "SELECT absen.id_absen, karyawan.nama_kry, absen.kode, absen.jam_masuk, absen.jam_pulang, absen.tanggal FROM absen INNER JOIN karyawan ON absen.kode=karyawan.kode  WHERE absen.kode ='$kode'";
    $hasil = mysqli_query($db, $query);

    if (!$hasil) {
        echo 'MySQL Error: ' . mysqli_error($db);
        echo $query;
        exit;
    }
?>

<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Absensi Saya</title>

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
        <!-- Include Navbar -->
        <?php include('navbar_karyawan.php'); ?>

        <!-- Page Content -->
        <div id="page-content-wrapper">
            <div class="container-fluid">
                <h1>Data Absensi</h1>
                <hr><br>
                 <br /><br />  
                           
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Nama Karyawan</th>
                            <th scope="col">Kode</th>
                            <th scope="col">Jam Masuk</th>
                            <th scope="col">Jam Pulang</th>
                            <th scope="col">Tanggal</th>
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



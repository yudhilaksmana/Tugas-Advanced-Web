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
                <h1>Filter Absensi</h1>
                <hr><br>
                 <br /><br />  
                 
        <a href="absen.php" class="btn btn-primary">Kembali</a><br><br>   
                
<?php  
 //filter.php  
 if(isset($_POST["from_date"], $_POST["to_date"]))  
 {  
      $db = mysqli_connect("localhost", "root", "", "db_wawo");  
      $output = '';  
      $query = "  
         SELECT * FROM absen
           WHERE tanggal BETWEEN '".$_POST["from_date"]."' AND '".$_POST["to_date"]."'  
      ";    
      $result = mysqli_query($db, $query);  
      $output .= '  
           <table class="table table-striped">
                  
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Jam Masuk</th>
                            <th scope="col">Jam Pulang</th>
                            <th scope="col">Tanggal</th>
                        </tr>
      ';  
      if(mysqli_num_rows($result) > 0)  
      {  
           while($row = mysqli_fetch_array($result))  
           {  
                $output .= '  
                     <tr>  
                          <td>'. $row["id_absen"] .'</td>
                          <td>'. $row["jam_masuk"] .'</td>  
                          <td>'. $row["jam_pulang"] .'</td>  
                          <td>'. $row["tanggal"] .'</td>   
                     </tr>  
                ';  
           }  
      }  
      else  
      {  
           $output .= '  
                <tr>  
                     <td colspan="5">No Order Found</td>  
                </tr>  
           ';  
      }  
      $output .= '</table>';  
      echo $output;  
 }  
 ?>
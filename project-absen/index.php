<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Absensi Karyawan</title>

    <!-- Bootstrap core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.css" rel="stylesheet">
    
    <!-- Custom styles for this template -->
    <link href="css/simple-sidebar.css" rel="stylesheet">
    <link href="css/custom.css" rel="stylesheet">

    <script type="text/javascript">
        window.onload = function() { jam(); }

        function jam() {
            var e = document.getElementById('jam'),
            d = new Date(), h, mt, s, y, m, w;
            h = d.getHours();
            mt = set(d.getMinutes());
            s = set(d.getSeconds());
            y = d.getFullYear();
            m = d.getMonth() + 1;
            w = d.getDate();

            e.innerHTML = w +'-'+ m +'-'+ y +'&nbsp('+ h +':'+ mt +':'+ s +')';

            setTimeout('jam()', 1000);
        }

        function set(e) {
            e = e < 10 ? '0'+ e : e;
            return e;
        }


    </script>

</head>
<body>
    <div id="wrapper">
        <!-- Include Navbar -->
        <?php include('navbar-public.php'); ?>

        <!-- Page Content -->
        <div id="page-content-wrapper">
            <div class="container-fluid">
                <center><h1 class="display-3">Aplikasi Absensi Karyawan</h1></center>
                <hr><br><br><br>
                <center>
                    <h1 class="display-3" id="jam"></h1>
                </center>
                <br><br>
                <form action="proses_tambah_absen.php" id=myform  method="post">
                    <div class="form-group">
                        <input type="text" name="kode" class="form-control" placeholder="Kode Karyawan">
                    </div>
                    <center><button type="submit" class="btn btn-primary btn-lg">Absen</button></center>
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
function validasi()
    {
    
        var kode=document.forms["myform"]["kode"].value;
        
//        membuat variabel numbers bernilai angka 0 s/d 9
        var numbers=/^[0-9]+$/;
        
//        validasi nip tidak boleh kosong (required)
        if (kode==null || kode=="")
          {
          alert("kode tidak boleh kosong !");
          return false;
          };
          
//        validasi nip harus berupa angka
//        dengan membandingkan dengan variabel number yang dibuat pada baris 21
        if (!kode.match(numbers))
          {
          alert("kode harus angka !");
          return false;
          };
          
//        validasi nip harus 18 digit pakai length javascript
        if (nip.length!=10)
          {
          alert("Kode harus 10 digit");
          return false;
          };
          
//         jika ada validasi untuk inputan lain letakkan disini
//        ...
     }
</script>
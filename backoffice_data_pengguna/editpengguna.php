<!DOCTYPE html>
<html lang="en">
<head>
<?php
require_once "../database/config.php";
Include '../list_head_link.php';
$halaman = 'datapengguna';
?>

</head>
<!--
`body` tag options:

  Apply one or more of the following classes to to the body tag
  to get the desired effect

  * sidebar-collapse
  * sidebar-mini
-->
<body class="hold-transition sidebar-mini">
<div class="wrapper">
  <!-- Navbar -->
  <?php
Include '../navigasi_atas.php';
?>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <?php
Include '../sidebar.php';
?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-12">
            <h1 class="m-0">Data Petugas</h1>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-lg-6">
          
         <?php
          if(isset($_POST['edit']))
          {
            $nip  = trim(mysqli_real_escape_string($con, $_POST['nip2']));
            $nama = trim(mysqli_real_escape_string($con, $_POST['nama']));
            $user = trim(mysqli_real_escape_string($con, $_POST['user']));

            $cekdata = mysqli_query($con,"SELECT * FROM tbl_pengguna WHERE username = '$user'") or die(mysqli_error($con));
            if (mysqli_num_rows($cekdata)> 0 )
            {
                ?>
                <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
                  <script>
                      swal("Error", "Username yang diedit sudah ada di dalam database", "error");
  
                      setTimeout(function(){
                      window.location.href = "../backoffice_data_pengguna";
  
                      }, 1000);
                  </script>
                  <?php
            }
            else
            {

            mysqli_query($con,"UPDATE tbl_pengguna SET nama_pengguna='$nama', username='$user' WHERE NIP='$nip'") or die(mysqli_error($con));

                ?>
                <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
                  <script>
                      swal("Sukses", "Data Telah di Edit", "success");
  
                      setTimeout(function(){
                      window.location.href = "../backoffice_data_pengguna";
  
                      }, 1000);
                  </script>
                  <?php
            }
          }
         ?>

          </div>          
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
    </div>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->

  <!-- Main Footer -->
  <?php
  Include '../footer.php';
  ?>
</div>
<!-- ./wrapper -->

<!-- REQUIRED SCRIPTS -->

<script src="../assets_adminlte/plugins/jquery/jquery.min.js"></script>
<script src="../assets_adminlte/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="../assets_adminlte/dist/js/adminlte.js"></script>
<script src="../assets_adminlte/plugins/chart.js/Chart.min.js"></script>
<script src="../assets_adminlte/dist/js/pages/dashboard3.js"></script>
</body>
</html>

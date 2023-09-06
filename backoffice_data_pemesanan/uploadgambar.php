<!DOCTYPE html>
<html lang="en">
<head>
<?php
require_once "../database/config.php";
Include '../list_head_link.php';
$halaman = 'datapemesanan';
session_start();
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
            <h1 class="m-0">Gambar Bukti Bayar</h1>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
      <div class="container-fluid">

      <?php

if(isset($_POST['bayar']))
{
    $notiket     = trim(mysqli_real_escape_string($con, $_POST['notiket']));
    $file = $_FILES['filebukti']['name'];
    $ekstensi = explode(".", $file);
    $file_name = "bukti".round(microtime(true)).".".end($ekstensi);
    $sumber = $_FILES['filebukti']['tmp_name'];
    $target_dir = "../backoffice_data_pemesanan/bayar/";
    $target_path = "bayar/".$file_name;
    $target_file = $target_dir.$file_name;
    $upload = move_uploaded_file($sumber, $target_file);

    mysqli_query($con,"UPDATE tbl_pemesanan SET bukti_bayar='$target_path' WHERE no_tiket='$notiket'") or die(mysqli_error($con));

    ?>
                 <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
                  <script>
                      swal("Sukses", "Bukti telah diupload", "success");
  
                      setTimeout(function(){
                      window.location.href = "../backoffice_data_pemesanan";
  
                      }, 1000);
                  </script>
    <?php

}
      ?>

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
<!-- ./wrapper -->

<!-- REQUIRED SCRIPTS -->

<!-- jQuery -->
<script src="../assets_adminlte/plugins/jquery/jquery.min.js"></script>
<script src="../assets_adminlte/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="../assets_adminlte/dist/js/adminlte.js"></script>
<script src="../assets_adminlte/plugins/chart.js/Chart.min.js"></script>
<script src="../assets_adminlte/dist/js/pages/dashboard3.js"></script>
</body>
</html>

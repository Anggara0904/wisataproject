<!DOCTYPE html>
<html lang="en">
<head>
<?php
Include '../list_head_link.php';
$halaman = 'ganti_pass';
require_once "../database/config.php";
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
            <h1 class="m-0">Ganti Password</h1>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-lg-4">
          
          <?php
          if(isset($_POST['updatepw']))
          {
            $nhp      = $_SESSION['user'];
            $pwbaru = sha1(trim(mysqli_real_escape_string($con, $_POST['passbaru'])));
            $pwbaru2 = trim(mysqli_real_escape_string($con, $_POST['passbaru']));

            $cekkarakter = strlen($pwbaru2);

            if ($cekkarakter >= 15)
            {
            ?>
            </br>
            <?php

              mysqli_query($con,"UPDATE tbl_pengguna SET kata_sandi= '$pwbaru' WHERE nomer_hp='$nhp'") or die(mysqli_error($con));
              
              ?>

                <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
                <script>
                    swal("Sukses", "Password telah di update", "success");

                    setTimeout(function(){
                    window.location.href = "../auth/logout.php";

                    }, 1000);
                </script>
            <?php
            }
            else
            {
              ?>
              <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
                <script>
                    swal("error", "Password minimal 15 karakter", "error");

                    setTimeout(function(){
                    window.location.href = "../ganti_pass";

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

<!-- jQuery -->
<script src="../assets_adminlte/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap -->
<script src="../assets_adminlte/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE -->
<script src="../assets_adminlte/dist/js/adminlte.js"></script>

<!-- OPTIONAL SCRIPTS -->
<script src="../assets_adminlte/plugins/chart.js/Chart.min.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="../assets_adminlte/dist/js/pages/dashboard3.js"></script>
</body>
</html>

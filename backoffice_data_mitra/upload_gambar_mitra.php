<!DOCTYPE html>
<html lang="en">
<head>

<?php
require_once "../database/config.php";
Include '../list_head_link.php';
$halaman = 'backoffice_data_mitra';
// session_start();
?>

</head>

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
            <div class="content-header">
                <div class="container-fluid">
                        <div class="row mb-2">
                            <div class="col-sm-6">
                            <h1 class="m-0">Gambar Mitra</h1>
                            </div>
                        </div>

                        <div class="content">
                            <?php
                                if(isset($_POST['oke']))
                                {
                                    $no_hp = trim(mysqli_real_escape_string($con, $_POST['hpne']));
                                    $file     = $_FILES['kucing']['name'];
                                    $ekstensi = explode(".",$file);
                                    $file_name = "mitra".round(microtime(true)).".".end($ekstensi);
                                    $sumber = $_FILES['kucing']['tmp_name'];
                                    $target_dir = "../backoffice_data_mitra/foto_mitra/";
                                    $target_path = "foto_mitra/".$file_name;
                                    $target_file = $target_dir.$file_name;
                                    $upload  = move_uploaded_file($sumber,$target_file);

                                    mysqli_query($con, "UPDATE tbl_mitra SET foto ='$target_path' WHERE no_hp ='$no_hp'")
                                    or die(mysqli_error($con)); 

                                    ?>
                                    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
                                    <script> 
                                    swal("Sukses", "Gambar Mitra Telah Diganti", "success");
                      
                                    setTimeout(function() {
                                    window.location.href = "../backoffice_data_mitra";
                      
                                    }, 2500);
                                    </script>
                      
                                          <?php
                                }

                            ?>
                        </div> 
                </div>
            </div>
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

<!-- jQuery -->
<script src="../assets_adminlte/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap -->
<script src="../assets_adminlte/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE -->
<script src="../assets_adminlte/dist/js/adminlte.js"></script>

<!-- OPTIONAL SCRIPTS -->
<script src="../assets_adminlte/plugins/chart.js/Chart.min.js"></script>
<script src="../assets_adminlte/dist/js/pages/dashboard3.js"></script>


</body>
</html>
?>
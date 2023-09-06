<!DOCTYPE html>
<html lang="en">
<head>
<?php
require_once "../database/config.php";
$halaman = 'petugasdatapemesanan';
Include '../petugas_list_head_link.php';
?>

</head>

<body class="hold-transition sidebar-mini">
<div class="wrapper">
  <!-- Navbar -->
  <?php
Include '../petugas_navigasi_atas.php';
?>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <?php
Include '../petugas_sidebar.php';
?>  <!-- Content Wrapper. Contains page content -->
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
          <div class="col-lg-12">
          <?php
                require_once "../database/config.php";
                $notiket =trim(mysqli_real_escape_string($con, $_POST['no_tiket']));

                $sql_cek_pemesanan = mysqli_query($con,"SELECT * FROM tbl_pemesanan") or die(mysqli_error($con));
                $cekdata = mysqli_num_rows($sql_cek_pemesanan);
                if ($cekdata == 1)
                {
                    ?>
                <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
                <script>
                    swal("Gagal", "Data tidak bisa di hapus", "error");

                    setTimeout(function(){
                    window.location.href = "../petugas_data_pemesanan";

                    }, 1500);
                </script>
                    <?php
                }
                else
                {
                    mysqli_query($con,"DELETE FROM tbl_pemesanan WHERE no_tiket= '$notiket'") or die(mysqli_error($con));
                    ?>
                    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
                    <script>
                    swal("Success", "Data berhasil di hapus", "success");

                    setTimeout(function(){
                    window.location.href = "../petugas_data_pemesanan";

                    }, 1500);
            </script>
            <?php
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
<!-- Bootstrap 4 -->
<script src="../assets_adminlte/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- DataTables  & Plugins -->
<script src="../assets_adminlte/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="../assets_adminlte/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="../assets_adminlte/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="../assets_adminlte/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<script src="../assets_adminlte/plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
<script src="../assets_adminlte/plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
<script src="../assets_adminlte/plugins/jszip/jszip.min.js"></script>
<script src="../assets_adminlte/plugins/pdfmake/pdfmake.min.js"></script>
<script src="../assets_adminlte/plugins/pdfmake/vfs_fonts.js"></script>
<script src="../assets_adminlte/plugins/datatables-buttons/js/buttons.html5.min.js"></script>
<script src="../assets_adminlte/plugins/datatables-buttons/js/buttons.print.min.js"></script>
<script src="../assets_adminlte/plugins/datatables-buttons/js/buttons.colVis.min.js"></script>
<!-- AdminLTE App -->
<script src="../assets_adminlte/dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<!--<script src="../assets_adminlte/dist/js/demo.js"></script>-->
<!-- Page specific script -->
<script>
  $(function () {
    $("#example1").DataTable({
      "responsive": true, "lengthChange": false, "autoWidth": false,
      "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": true,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": true,
    });
  });
</script>
</body>
</html>

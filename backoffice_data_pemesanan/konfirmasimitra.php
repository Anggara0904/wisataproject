<!DOCTYPE html>
<html lang="en">
<head>
<?php
require_once "../database/config.php";
Include '../list_head_link.php';
$halaman = 'datapemesanan';
// session_start();
if(!!isset($_POST['nip']))
{
  echo "<script>window.location='../auth';</script>";
}
else
{
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
            <h1 class="m-0">Data Pemesanan</h1>
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
            $notiket = $_GET['no_tiket'];
            $nama_mitra = $_GET['mitra'];
            $petugas = $_GET['nama_petugas'];
            $no_petugas = $_SESSION['user'];
           


           $panggil_namamitra = mysqli_query($con," SELECT nama_mitra FROM tbl_mitra WHERE no_hp='$nama_mitra'") or die(mysqli_error($con));
           $aray = mysqli_fetch_assoc($panggil_namamitra);
           $nama = $aray['nama_mitra'];

              mysqli_query($con,"UPDATE tbl_pemesanan SET nama_mitra='$nama', nama_petugas='$petugas' , stts='Y', no_hp_petugas='$no_petugas' WHERE no_tiket='$notiket'") or die(mysqli_error($con));

             ?>
                          <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
                           <script>
                               swal("Sukses", "Tiket Telah dikonfirmasi", "success");
           
                               setTimeout(function(){
                               window.location.href = "../backoffice_data_pemesanan";
           
                               }, 1000);
                           </script>
           
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
<!-- Bootstrap 4 -->
<script src="../assets_adminlte/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- SweetAlert2 -->
<script src="../assets_adminlte/plugins/sweetalert2/sweetalert2.min.js"></script>
<!-- Toastr -->
<script src="../assets_adminlte/plugins/toastr/toastr.min.js"></script>
<!-- AdminLTE App -->
<script src="../assets_adminlte/dist/js/adminlte.min.js"></script>

</body>
</html>
<?php 
}
?>
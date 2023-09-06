<!DOCTYPE html>
<html lang="en">
<head>
<?php
Include '../petugas_list_head_link.php';
$halaman = 'petugasdatapemesanan';
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
  Include '../petugas_navigasi_atas.php';
  ?>
    <!-- /.navbar -->

    <!-- Main Sidebar Container -->
    <?php
  Include '../petugas_sidebar.php';
  ?>
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <div class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-12">
              <h1 class="m-0">Data Pemesanan Tiket / Tambah Data Pemesanan Tiket</h1>
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
            if(isset($_POST['simpan']))
            {
              $jumlahanak     = trim(mysqli_real_escape_string($con, $_POST['jumlahank']));
              $jumlahdewasa     = trim(mysqli_real_escape_string($con, $_POST['jumlahdewasa']));
              $tanggaldatang     = trim(mysqli_real_escape_string($con, $_POST['tgldatang']));
              $tanggaltransaksi     = trim(mysqli_real_escape_string($con, $_POST['tgltransaksi']));
              $hp = trim(mysqli_real_escape_string($con, $_POST['no_hp']));
              $petugas = trim(mysqli_real_escape_string($con, $_POST['nama_petugas']));
              $hppetugas = trim(mysqli_real_escape_string($con, $_POST['no_hp_petugas']));
              $status = 'N';
              $bukti = 'belum ada';

              $querycek =  mysqli_query($con,"SELECT * FROM tbl_pemesanan WHERE tgl_datang ='$tanggaldatang'") or die(mysqli_error($con));
              $jumlahtikettgldtg = mysqli_num_rows($querycek);

              if ($jumlahtikettgldtg =='0')
              {
                $jumlahtiket = "1";
              }
              else
              {
                $jumlahtiket = $jumlahtikettgldtg+1;
              }

              $no_tiket = $tanggaldatang."-".$jumlahtiket;

              $queryambilanak =  mysqli_query($con,"SELECT * FROM tbl_harga_tiket WHERE id ='2'") or die(mysqli_error($con));
              $queryambildewasa =  mysqli_query($con,"SELECT * FROM tbl_harga_tiket WHERE id ='1'") or die(mysqli_error($con));

              $dataanak = mysqli_fetch_array($queryambilanak);
              $datadewasa = mysqli_fetch_array($queryambildewasa);

              $hargaweekdayanak = $dataanak['harga_weekday'];
              $hargaweekendanak = $dataanak['harga_weekend'];
              $hargaweekdaydewasa = $datadewasa['harga_weekday'];
              $hargaweekenddewasa = $datadewasa['harga_weekend'];

              $haridatang = date('l', strtotime($tanggaldatang));

              if ($haridatang=="Saturday" || $haridatang=="Sabtu" || $haridatang=="Sunday" || $haridatang=="Minggu")
              {
                $hargatiketanak = $hargaweekendanak;
                $hargatiketdewasa = $hargaweekenddewasa;
              }
              else
              {
                $hargatiketanak = $hargaweekdayanak;
                $hargatiketdewasa = $hargaweekdaydewasa;
              }

              $subhargatiketanak = $jumlahanak*$hargatiketanak;
              $subhargatiketdewasa = $jumlahdewasa*$hargatiketdewasa;

              $totalharga = $subhargatiketanak+$subhargatiketdewasa;
            
                  mysqli_query($con,"INSERT INTO tbl_pemesanan (no_tiket, jumlah_anak, jumlah_dewasa, tgl_datang, tgl_transaksi, sub_harga_anak, sub_harga_dewasa, total_harga, stts, bukti_bayar, no_hp, nama_petugas, no_hp_petugas) VALUES ('$no_tiket', '$jumlahanak','$jumlahdewasa','$tanggaldatang','$tanggaltransaksi','$subhargatiketanak', '$subhargatiketdewasa', '$totalharga', '$status', '$bukti', '$hp', '$petugas', '$hppetugas')") or die(mysqli_error($con));
                  ?>
                  <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
                    <script>
                        swal("Sukses", "Data telah ditambahkan", "success");
    
                        setTimeout(function(){
                        window.location.href = "../petugas_data_pemesanan";
    
                        }, 2000);
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
<!-- AdminLTE for demo purposes -->
<!--<script src="../../dist/js/demo.js"></script> -->
</body>
</html>

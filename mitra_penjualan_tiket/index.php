<!DOCTYPE html>
<html lang="en">
<head>
<?php
require_once '../database/config.php';
Include '../mitra_list_head_link.php';
$halaman = 'mitra_penjualan';
error_reporting(0);
session_start();
$peran="mitra";
if($_SESSION['peran']!=$peran)
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
Include '../mitra_navigasi_atas.php';
?>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <?php
Include '../mitra_sidebar.php';
?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-12">
            <h1 class="m-0">Penjualan Tiket</h1>
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
          

          <div class="card">
              <div class="card-header"style="background-color:#005caf;">
                <h3 class="card-title"><font color="#ffffff"><i class="nav-icon fas fa-users"></i> Data Pemesanan</font></h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                
                <table id="example2" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th style="width:5%">No</th>
                    <th>Kode Tiket</th>
                    <th>Anak</th>
                    <th>Dewasa</th>
                    <th>Tgl Kunjungan</th>
                    <th>Total</th>
                    <th>Bukti Bayar</th>
                    <th><center>No Hp </center></th>
                    <th style="width:10%"><center>Tiket</center></th>
                  </tr>
                  </thead>
                  <tbody>
                    <?php
                    $no=1;
                     $sql_panggilpemesanan = mysqli_query($con, " SELECT * FROM tbl_pemesanan WHERE stts='Y'") or die(mysqli_error($con));
                     if(mysqli_num_rows($sql_panggilpemesanan) > 0 )
                     {
                       while ($data = mysqli_fetch_array($sql_panggilpemesanan))
                       {
                       ?>
                        <tr>
                        <td>
                            <?=$no++;?>
                       </td>
                        <td>
                            <?=$data['no_tiket'];?>
                        </td>
                        <td>
                            <?=$data['jumlah_anak'];?> (org)
                        </td>
                        <td>
                            <?=$data['jumlah_dewasa'];?> (org)
                        </td>
                        <td>
                          <?php
                          $tgl    = $data['tgl_datang'];
                          $kalender = date('d F Y', strtotime($tgl)); 
                          ?>
                            <?=$kalender;?>

                        </td>
                        <td>
                        Rp. <?= number_format($data['total_harga'],0,",",".");?>,-
                        </td>
                        <td>
                        <?php
                        $bukti=$data['bukti_bayar'];
                        if($bukti=="belum ada")
                        {
                          ?>
                          <center>
                          <button type="button" class="btn btn-xs bg-gradient-danger"> Belum dibayar</button>
                          </center>
                          <?php

                        }
                        else
                        {
                          ?>
                          <center>
                          <a class="btn btn-xs btn-primary" href="<?=$data['bukti_bayar'];?>" target="_blank" role="button"><i class="nav-icon fas fa-eye"></i></a>
                          <a class="btn btn-xs btn-success" href="download.php?lokasifile=<?=$data['bukti_bayar'];?>" target="_blank" role="button"><i class="nav-icon fas fa-download"></i> Download</a>
                          </center>
                          <?php
                        }
                        ?>
                        </td>
                        <td>
                        <a class="btn btn-xs btn-success" href="https://api.whatsapp.com/send?phone=<?=$data['no_hp'];?>&text=Halo Pelanggan!! Berikut adalah nomor tiketnya <?=$data['no_tiket'];?> Berikut kami lampirkan file tiketnya." target="_blank" role="button"> <img src="../auth/img/waicon.png" width="17px" height="17px"></a>
                        </td>
                        <td>
                          <center>
                          <a class="btn btn-xs btn-info" href="../tiket/tiket.php?nomortiket=<?=$data['no_tiket']?>" target="_blank" role="button"><i class="nav-icon fas fa-download"></i> Tiket</a>
                        </center>
                       
                      </td>
                    </tr>
                    <?php
                     }
                    }
                    else
                    {
                      echo "<tr><td colspan=\"7\" align=\"center\"><h6>Data Tidak Ditemukan</h6></td></tr>";
                    }
                    ?>
                  </tbody>
                  
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>          
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
  </div>
  <!-- /.content-wrapper -->
  </div>


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


<div class="modal fade" id="modal-edit">
        <div class="modal-dialog modal-md">
          <div class="modal-content">
            <div class="modal-header" style="background-color:#005caf;">
              <h5 class="modal-title"><font color="#ffffff"> Edit Herga Tiket </font></h5>
            </div>
          <div class="modal-body">
           <form role="form" class="form-layout" action="edithargatiket.php" method="post">
            <div class="form-group">
              <label for="exampleInputEmail1">Keterangan</label>
              <input type="text" class="form-control" name="keterangan2" id="keterangan2" disabled>
              <input type="text" class="form-control" name="id" id="id" hidden>
              <input type="text" class="form-control" name="keterangan" id="keterangan" hidden>
            </div>
            <div class="form-group">
              <label for="exampleInputEmail1">Harga Weekdays</label>
              <input type="number" class="form-control" name="hargaweekday" id="hargaweekday" required>
            </div>
            <div class="form-group">
              <label for="exampleInputEmail1">Harga Weekend</label>
              <input type="number" class="form-control" name="hargaweekend" id="hargaweekend" required>
            </div>

              <div class="modal-footer justify-content-between" style="background-color:#005caf;">
              <button type="button" class="btn btn-default btn-md" data-dismiss="modal"> <i class="nav-icon fas fa-times"></i> Batalkan </button>
              <button type="submit" name="edit" class="btn btn-info btn-md"><font color="#005caf"> <i class="nav-icon fas fa-edit"></i> Edit Data </font></button>
              </form>
              </div>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->    
      </div>

<script type="text/javascript">
  $('#modal-edit').on('show.bs.modal', function(e) {

    //get data-id attribute of the clicked element
    var keterangan        =$(e.relatedTarget).data('keterangan');
    var hargaweekday           =$(e.relatedTarget).data('weekday');
    var hargaweekend           =$(e.relatedTarget).data('weekend');
    var id           =$(e.relatedTarget).data('id');
    $(e.currentTarget).find('input[name="keterangan"]').val(keterangan);
    $(e.currentTarget).find('input[name="hargaweekday"]').val(hargaweekday);
    $(e.currentTarget).find('input[name="hargaweekend"]').val(hargaweekend);
    $(e.currentTarget).find('input[name="id"]').val(id);
    $(e.currentTarget).find('input[name="keterangan2"]').val(keterangan);
  });
</script>
</body>
</html>
<?php
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
<?php
require_once '../database/config.php';
Include '../list_head_link.php';
$halaman = 'setingharga';
error_reporting(0);
session_start();
$peran="Admin";
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
            <h1 class="m-0">Harga Tiket</h1>
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
          <div class="card">
              <div class="card-header"style="background-color:#005caf;">
                <h3 class="card-title"><font color="#ffffff"><i class="nav-icon fas fa-users"></i> Harga Tiket</font></h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example2" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th style="width:5%">No</th>
                    <th>Keterangan</th>
                    <th>Harga Weekdays</th>
                    <th>Harga Weekend</th>
                    <th>Komisi</th>
                    <th style="width:5%"><center>Action</center></th>
                  </tr>
                  </thead>
                  <tbody>
                    <?php
                    $no=1;
                     $sql_panggilhargatiket = mysqli_query($con, " SELECT * FROM tbl_harga_tiket") or die(mysqli_error($con));
                     if(mysqli_num_rows($sql_panggilhargatiket) > 0 )
                     {
                       while ($data = mysqli_fetch_array($sql_panggilhargatiket))
                       {
                       ?>
                        <tr>
                        <td>
                            <?=$no++;?>
                       </td>
                        <td>
                            <?=$data['keterangan'];?>
                        </td>
                        <td>
                        Rp. <?= number_format($data['harga_weekday'],0,",",".");?>,-
                        </td>
                        <td>
                        Rp. <?= number_format($data['harga_weekend'],0,",",".");?>,-
                        </td>
                        <td>
                        <?= number_format($data['komisi'],0,",",".");?>%
                        </td>
                        <td>
                          <center>
                        <button type="button" class="btn btn-xs bg-gradient-info" data-toggle="modal" data-target="#modal-edit" data-id="<?=$data['id'];?>" data-keterangan="<?=$data['keterangan'];?>" data-weekday="<?=$data['harga_weekday'];?>" data-weekend="<?=$data['harga_weekend'];?>"> <i class="nav-icon fas fa-edit"></i>Edit</button>
                        </center>
                       
                      </td>
                    </tr>
                    <?php
                     }
                    }
                    else
                    {
                      echo "<tr><td colspan=\"4\" align=\"center\"><h6>Data Tidak Ditemukan</h6></td></tr>";
                    }
                    ?>
                  </tbody>
                  
                </table>
              </div>
              <!-- /.card-body -->
            </div>
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
<!-- AdminLTE for demo purposes -->
<!-- <script src="assets_adminlte/dist/js/demo.js"></script> -->
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="../assets_adminlte/dist/js/pages/dashboard3.js"></script>

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
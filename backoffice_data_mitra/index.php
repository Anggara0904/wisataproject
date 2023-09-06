<!DOCTYPE html>
<html lang="en">
<head>
<?php
require_once "../database/config.php";
Include '../list_head_link.php';
$halaman = 'datamitra';
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
            <h1 class="m-0">Data Mitra</h1>
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
                <h3 class="card-title"><font color="#ffffff"><i class="nav-icon fas fa-handshake"></i> Data Mitra</font></h3>
              </div>

              <div class="content">
                <div class="container-fluid">
	                <?php
	                $querygambar = mysqli_query($con, "SELECT * FROM tbl_mitra WHERE  no_hp= 'id'") or die(mysqli_error($con));

	                $data = mysqli_fetch_assoc($querygambar);
	                ?>
                </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <button type="button" class="btn btn-md bg-gradient-default" style="background-color:#005caf;" data-toggle="modal" data-target='#modal-tambah'> <font color="#ffffff"> <i class="nav-icon fas fa-plus"></i>Tambah Data Mitra</font></button>

                <table id="example2" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th style="width:5%"><center>No</center></th>
                    <th style="width:10%"><center>No HP</center></th>
                    <th style="width:10%"><center>No HP Lain</center></th>
                    <th style="width:15%"><center>Nama Mitra</center></th>
                    <th style="width:15%"><center>Foto Mitra</center></th>
                    <th style="width:30%"><center>Alamat Mitra</center></th>
                  </tr>
                  </thead>
                  <tbody>

                    <?php
                    $no=1;
                     $sql_pengguna = mysqli_query($con, " SELECT * FROM tbl_mitra") or die(mysqli_error($con));
                     if(mysqli_num_rows($sql_pengguna) > 0 )
                     {
                       while ($data = mysqli_fetch_array($sql_pengguna))
                       {
                       ?>
                        <tr>
                        <td>
                        <?=$no++;?>
                        </td>
                        <td>
                        <?=$data['no_hp'];?>
                        </td>
                        <td>
                        <?=$data['no_hp2'];?>
                        </td>
                        <td>
                        <?=$data['nama_mitra'];?>
                        </td>
                        <td>
                        <center>
                          <?php
                          if ($data['foto']=="")
                          {
                            ?>
                         <img src="foto_mitra/urunganafoto.png" widht="80px" height="80px"></img>
                         <?php
                          }
                          else
                          {
                          ?>
                         <img src="<?=$data['foto'];?>" widht="80px" height="80px"></img>
                         <?php
                          }
                          ?>
                       </br>
                       <button type="button" class="btn btn-xs btn-primary" data-toggle="modal" data-target="#modal-gantifoto" data-hp=<?=$data['no_hp']?>><i class="nav-icon fas fa-upload"></i> Upload</button>
                          </center>      
                        </td>
                        <td>
                        <?=$data['alamat'];?>
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
            <!-- /.card -->
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
<!-- AdminLTE for demo purposes -->
<!--<script src="../../dist/js/demo.js"></script> -->

<div class="modal fade" id="modal-tambah">
        <div class="modal-dialog modal-md">
          <div class="modal-content">
            <div class="modal-header" style="background-color:#005caf;">
              <h5 class="modal-title"><font color="#ffffff"> Tambah Data Mitra </font></h5>
            </div>
          <div class="modal-body">
           <form role="form" class="form-layout" action="tambah_mitra.php" method="post">
            <div class="form-group">
              <label for="exampleInputEmail1">Nomer Hp</label>
              <input type="number" class="form-control" name="no_hp" placeholder="+62" autofocus required>
            </div>
            <div class="form-group">
              <label for="exampleInputEmail1">Nomer Hp Lain</label>
              <input type="number" class="form-control" name="no_hp2" placeholder="+62" autofocus required>
            </div>
            <div class="form-group">
              <label for="exampleInputEmail1">Nama Mitra</label>
              <input type="text" class="form-control" name="nama_mitra" placeholder="Nama Mitra" required>
            </div>
            <div class="form-group">
              <label for="exampleInputEmail1">Alamat Mitra</label>
              <input type="text" class="form-control" name="alamat" placeholder="Alamat Mitra" required>
            </div>
            
              <div class="modal-footer justify-content-between" style="background-color:#005caf;">
              <button type="button" class="btn btn-default btn-md" data-dismiss="modal"> <i class="nav-icon fas fa-times"></i> Batalkan </button>
              <button type="submit" name="tambah" class="btn btn-default btn-md" style="background-color:#ffffff;"><font color="#005caf"> <i class="nav-icon fas fa-plus"></i> Tambah Data </font></button>
              </form>
              </div>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->    
      </div>
</div>

<div class="modal fade" id="modal-gantifoto">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header" style="background-color:#0041c2;">
                <h5 class="modal-title"><font color="#ffffff"> Ganti Gambar Mitra</font></h5>
            </div>
            
            <div class="modal-body">
            <form role="form" class="form-layout" action="upload_gambar_mitra.php" method="post" enctype="multipart/form-data">
                <div class="form-group"> 
                    <label for="exampleInputEmail1"> Ambil File Gambar</label>
                    <input type="file" name="kucing" id="kucing" />
                    <input type="text" name="hpne" id="hpne" hidden/>
                </div> 
            </div>
            <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-default btn-md" data-dismiss="modal">
                <i class="nav-icon fas fa-times"></i> Batalkan</button>
              <button type="submit" name="oke" class="btn btn-warning btn-md">
                <i class="nav-icon fas fa-upload"></i> Ganti</button>
              </form>
            </div>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>
      <!-- /.modal -->
      </div>

</div>

<script type="text/javascript">
  $('#modal-default').on('show.bs.modal', function(e) {

    //get data-id attribute of the clicked element
    var nohp           =$(e.relatedTarget).data('nohp');
    $(e.currentTarget).find('input[name="nomerhp"]').val(nohp);
  });
</script>

<script type="text/javascript">
  $('#modal-gantifoto').on('show.bs.modal', function(e) {

    //get data-id attribute of the clicked element
    var nohp           =$(e.relatedTarget).data('hp');
    $(e.currentTarget).find('input[name="hpne"]').val(nohp);
  });
</script>

</script>
</body>
</html>
<?php 
}
?>
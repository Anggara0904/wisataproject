<!DOCTYPE html>
<html lang="en">
<head>
<?php
require_once "../database/config.php";
Include '../list_head_link.php';
$halaman = 'datapengguna';
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
          

          <div class="card">
              <div class="card-header"style="background-color:#005caf;">
                <h3 class="card-title"><font color="#ffffff"><i class="nav-icon fas fa-users"></i> Data Petugas</font></h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <button type="button" class="btn btn-md bg-gradient-default" style="background-color:#005caf;" data-toggle="modal" data-target='#modal-tambah'> <font color="#ffffff"> <i class="nav-icon fas fa-plus"></i>Tambah Data</font></button>

                <table id="example2" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th style="width:5%">No</th>
                    <th style="width:10%">Nomer HP</th>
                    <th style="width:25%">Nama Petugas</th>
                    <th style="width:25%">Peran</th>
                    <th style="width:20%"><center>Action</center></th>
                  </tr>
                  </thead>
                  <tbody>
                    <?php
                    $no=1;
                     $sql_pengguna = mysqli_query($con, " SELECT * FROM tbl_pengguna") or die(mysqli_error($con));
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
                            <?=$data['nomer_hp'];?>
                        </td>

                        <td>
                        <?=$data['nama_pengguna'];?>
                        </td>
                        <td>
                        <?=$data['peran'];?>
                        </td>
                        <td>
                          <center>
                        <button type="button" class="btn btn-xs bg-gradient-warning" data-toggle="modal" data-target="#modal-reset" data-nohp="<?=$data['nomer_hp'];?>"> <i class="nav-icon fas fa-sync"></i>Reset Password</button>
                        <button type="button" class="btn btn-xs bg-gradient-info" data-toggle="modal" data-target="#modal-edit" data-nohp="<?=$data['nomer_hp'];?>" data-nama="<?=$data['nama_pengguna'];?>" data-peran="<?=$data['peran'];?>"> <i class="nav-icon fas fa-edit"></i>Edit</button>
                        <button type="button" class="btn btn-xs bg-gradient-danger" data-toggle="modal" data-target="#modal-default" data-nohp="<?=$data['nomer_hp'];?>"> <i class="nav-icon fas fa-trash"></i>Hapus</button>
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
      <div class="modal fade" id="modal-default">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-body">
              <form role="form" class="form-layout" action="hapuspengguna.php" method="post">
              <div class="alert alert-warning alert-dismissible">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true"></button>
                  <h5><i class="icon fas fa-exclamation-triangle"></i> Perhatian!</h5>
                  Anda Yakin Akan Menghapus Data?
                </div>
              <input type="text" name="nomerhp" id="nomerhp" hidden>
            </div>
            <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-default btn-md" data-dismiss="modal"> <i class="nav-icon fas fa-times"></i> Batalkan </button>
              <button type="submit" class="btn btn-danger btn-md"> <i class="nav-icon fas fa-trash"></i> Ya, Hapus Data </button>
              </form>
            </div>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>


      <div class="modal fade" id="modal-tambah">
        <div class="modal-dialog modal-md">
          <div class="modal-content">
            <div class="modal-header" style="background-color:#005caf;">
              <h5 class="modal-title"><font color="#ffffff"> Tambah Data Petugas </font></h5>
            </div>
          <div class="modal-body">
           <form role="form" class="form-layout" action="aksitambah.php" method="post">
            <div class="form-group">
              <label for="exampleInputEmail1">Nomer Hp</label>
              <input type="number" class="form-control" name="nomerhp" placeholder="Nomer Hp" autofocus required>
            </div>
            <div class="form-group">
              <label for="exampleInputEmail1">Nama Petugas</label>
              <input type="text" class="form-control" name="nama" placeholder="Nama Petugas" required>
            </div>
            <div class="form-group">
              <label for="exampleInputEmail1">Peran</label>
              <select class="custom-select rounded-0" id="exampleSelectRounded0" name="peran" >
              <option>Admin</option>
              <option>petugas</option>
              </select>
            </div>
            <div class="form-group">
              <label for="exampleInputEmail1">Password</label>
              <input type="password" class="form-control" name="pass" placeholder="Password Akun" required>
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

      <div class="modal fade" id="modal-reset">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-body">
              <form role="form" class="form-layout" action="resetpassword.php" method="post">
              <div class="alert alert-warning alert-dismissible">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true"></button>
                  <h5><i class="icon fas fa-exclamation-triangle"></i> Perhatian!</h5>
                  Anda Yakin Akan Mereset Password Pengguna?
                  <br>Password akan diriset menjadi :<b> pass+[nomer hp]</b>
              </div>
              <input type="text" name="nhp" id="nhp" hidden>
            </div>
            <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-default btn-md" data-dismiss="modal"> <i class="nav-icon fas fa-times"></i> Batalkan </button>
              <button type="submit" class="btn btn-warning btn-md" name="reset"> <i class="nav-icon fas fa-sync"></i> Ya, Reset Password </button>
              </form>
            </div>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>


      <div class="modal fade" id="modal-edit">
        <div class="modal-dialog modal-md">
          <div class="modal-content">
            <div class="modal-header" style="background-color:#005caf;">
              <h5 class="modal-title"><font color="#ffffff"> Edit Data Petugas </font></h5>
            </div>
          <div class="modal-body">
           <form role="form" class="form-layout" action="editpengguna.php" method="post">
            <div class="form-group">
              <label for="exampleInputEmail1">NIP</label>
              <input type="text" class="form-control" name="nip" placeholder="NIP" disabled>
              <input type="text" class="form-control" name="nip2" placeholder="NIP" hidden>
            </div>
            <div class="form-group">
              <label for="exampleInputEmail1">Nama User</label>
              <input type="text" class="form-control" name="nama" placeholder="Nama Petugas" required autofocus>
            </div>
            <div class="form-group">
              <label for="exampleInputEmail1">Username</label>
              <input type="text" class="form-control" name="user" placeholder="Username yang diinginkan" required>
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
</div>

<script type="text/javascript">
  $('#modal-default').on('show.bs.modal', function(e) {

    //get data-id attribute of the clicked element
    var nohp           =$(e.relatedTarget).data('nohp');
    $(e.currentTarget).find('input[name="nomerhp"]').val(nohp);
  });
</script>

<script type="text/javascript">
  $('#modal-reset').on('show.bs.modal', function(e) {

    //get data-id attribute of the clicked element
    var nhp           =$(e.relatedTarget).data('nohp');
    $(e.currentTarget).find('input[name="nhp"]').val(nhp);
  });
</script>

<script type="text/javascript">
  $('#modal-edit').on('show.bs.modal', function(e) {

    //get data-id attribute of the clicked element
    var nip           =$(e.relatedTarget).data('nip');
    var nama           =$(e.relatedTarget).data('nama');
    var user           =$(e.relatedTarget).data('username');
    $(e.currentTarget).find('input[name="nip"]').val(nip);
    $(e.currentTarget).find('input[name="nama"]').val(nama);
    $(e.currentTarget).find('input[name="user"]').val(user);    
    $(e.currentTarget).find('input[name="nip2"]').val(nip);
  });
</script>
</body>
</html>
<?php 
}
?>
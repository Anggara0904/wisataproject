<!DOCTYPE html>
<html lang="en">
<head>
<?php
require_once "../database/config.php";
Include '../mitra_list_head_link.php';
$halaman = 'mitra_datapemesanan';
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
          

          <div class="card">
              <div class="card-header"style="background-color:#005caf;">
                <h3 class="card-title"><font color="#ffffff"><i class="nav-icon fas fa-users"></i> Data Pemesanan</font></h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <button type="button" class="btn btn-md bg-gradient-default" style="background-color:#005caf;" data-toggle="modal" data-target='#modal-tambah'> <font color="#ffffff"> <i class="nav-icon fas fa-plus"></i>Tambah Pemesanan</font></button>

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
                    <th>Status</th>
                    <th>No Hp</th>
                    <th>keterangan</th>
                    <th><center>Upload</center></th>
                  </tr>
                  </thead>
                  <tbody>
                    <?php
                    $no=1;
                     $sql_panggilpemesanan = mysqli_query($con, " SELECT * FROM tbl_pemesanan WHERE peran='mitra' AND stts='N'") or die(mysqli_error($con));
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
                          $tgl_tran    = $data['tgl_transaksi'];
                          $kal = date('d F Y', strtotime($tgl_tran)); 
                          ?>
                            <?=$kal;?>
                        </td>
                        <td>

                        <?php
                        $bukti=$data['bukti_bayar'];
                        $stts=$data['stts'];
                        if($bukti=="belum dibayar" && $stts=='N' )
                        {
                          ?>
                          <center>
                          <button type="button" class="btn btn-xs bg-gradient-danger"> Belum dibayar</button>
                          </center>
                          <?php

                        }
                        elseif($bukti!="belum dibayar" && $stts=='N' )
                        {
                          ?>
                          <a class="btn btn-xs btn-primary" href="../bayar/<?=$data['bukti_bayar'];?>" target="_blank" role="button"><i class="nav-icon fas fa-eye"></i></a>
                          <button type="button" class="btn btn-xs bg-gradient-warning"> Menunggu Konfirmasi</button>
                          <?php
                        }
                        else
                        {
                          ?>
                          <center>
                          <a class="btn btn-xs btn-primary" href="../backoffice_penjualan_tiket/<?=$data['bukti_bayar'];?>" target="_blank" role="button"><i class="nav-icon fas fa-eye"></i></a>
                           <button type="button" class="btn btn-xs bg-gradient-success" href="<?=$data['bukti_bayar'];?>"> Sudah di bayar</button>
                        </center>
                        <?php 
                        }
                        ?>
                        </td>

                        <td>
                          <?php
                          $hpmitra = $data['no_hp'];
                          $querycekhpmitra = mysqli_query($con, " SELECT * FROM tbl_mitra WHERE no_hp='$hpmitra'") or die(mysqli_error($con));
                          if (mysqli_num_rows($querycekhpmitra)>0)
                          {
                            ?>
                             <button type="button" class="btn btn-xs bg-gradient-success">  <img src="../backoffice_data_mitra/foto_mitra/check.png" width="17px" height="17px"> +<?=$data['no_hp'];?></button>
                         
                            <?php

                          }
                          else
                          {
                          ?>
                            <button type="button" class="btn btn-xs bg-gradient-success">  <img src="../backoffice_data_mitra/foto_mitra/check.png" width="17px" height="17px"> +<?=$data['no_hp'];?></button>
                          <?php
                          }
                          ?>
                            
                        </td>
                        
                        <td>
                        <?php
                        $belum = $data['stts'];
                        if ($belum=='N')
                        {
                          ?>
                          <center>
                          <button type="button" class="btn btn-xs bg-gradient-danger"> Belum di Verifikasi</button>
                          </center>
                          <?php

                        }
                        else
                        {
                          ?>
                           <center>
                           <button type="button" class="btn btn-xs bg-gradient-success" href="<?=$data['stts'];?>"> Sudah di Verifikasi</button>
                        </center>
                          <?php
                        }
                        ?>
                       
                      </td>

                      <td>
                          <center>    
                          <button type="button" class="btn btn-sm bg-gradient-primary" data-toggle="modal" data-target="#modal-upload" data-tiket="<?=$data['no_tiket'];?>"> <i class="nav-icon fas fa-file"></i></button>
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
              <form role="form" class="form-layout" action="hapuspelanggan.php" method="post">
              <div class="alert alert-warning alert-dismissible">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true"></button>
                  <h5><i class="icon fas fa-exclamation-triangle"></i> Perhatian!</h5>
                  Anda Yakin Akan Menghapus Data?
                </div>
              <input type="text" name="idpemesanan" id="idpemesanan" required>
            </div>
            <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-default btn-md" data-dismiss="modal"> <i class="nav-icon fas fa-times"></i> Batalkan </button>
              <button type="submit" name="default" class="btn btn-danger btn-md"> <i class="nav-icon fas fa-trash"></i> Ya, Hapus Data </button>
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
              <h5 class="modal-title"><font color="#ffffff"> Tambah Data pemesanan </font></h5>
            </div>
          <div class="modal-body">
           <form role="form" class="form-layout" action="aksitambahpemesanan.php" method="post">
           <div class="form-group">
              <label for="exampleInputEmail1">Jumlah Anak</label>
              <input type="number" class="form-control" name="jumlahank" placeholder="Jumlah" required>
            </div>
            <div class="form-group">
              <label for="exampleInputEmail1">Jumlah Dewasa</label>
              <input type="number" class="form-control" name="jumlahdewasa" placeholder="Jumlah" required>
            </div>
            <div class="form-group">
              <label for="exampleInputEmail1">Tanggal Datang</label>
              <input type="date" class="form-control" name="tgldatang" placeholder="Tanggal Datang" autofocus required>
            </div>
            <div class="form-group">
              <label for="exampleInputEmail1">Nomer Hp</label>
              <input type="number" class="form-control" name="no_hp" placeholder="+62" required>
            </div>
            <div class="form-group">
                    <label for="exampleInputPassword1">Nama Mitra</label>
                    <input type="text" class="form-control" id="nama_mitra" name="nama_mitra" value="<?=$_SESSION['nama'];?>" disabled >
                  </div>
              <div class="modal-footer justify-content-between" style="background-color:#005caf;">
              <button type="button" class="btn btn-default btn-md" data-dismiss="modal"><font color="#005caf"> <i class="nav-icon fas fa-times"></i> Batalkan </font></button>
              <button type="submit" name="simpan" class="btn btn-default btn-md" style="background-color:#ffffff;"><font color="#005caf"> <i class="nav-icon fas fa-plus"></i> Tambah Data </font></button>
              </form>
              </div>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->    
      </div>
</div>



      <div class="modal fade" id="modal-edit">
        <div class="modal-dialog modal-md">
          <div class="modal-content">
            <div class="modal-header" style="background-color:#005caf;">
              <h5 class="modal-title"><font color="#ffffff"> Edit Data pelanggan </font></h5>
            </div>
          <div class="modal-body">
           <form role="form" class="form-layout" action="editpelanggan.php" method="post">
            <div class="form-group">
              <label for="exampleInputEmail1">Kode pemesanan</label>
              <input type="text" class="form-control" name="kodepemesanan" required autofocus>
            </div>
            <div class="form-group">
              <label for="exampleInputEmail1">Tipe pemesanan</label>
              <input type="text" class="form-control" name="tipepemesanan" required>
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

<div class="modal fade" id="modal-upload">
        <div class="modal-dialog">
          <div class="modal-content">
          <div class="modal-header" style="background-color:#005caf;">
              <h5 class="modal-title"><font color="#ffffff"> Upload Bukti Bayar </font></h5>
            </div>
            <div class="modal-body">
              <form role="form" class="form-layout" action="uploadgambar.php" method="post" enctype="multipart/form-data">

              <div class="form-group">
              <label for="exampleInputEmail1">Ambil Bukti Bayar</label>
              <input type="file" class="form-control" name="filebukti" placeholder="Nama Pengguna" required autofocus>
              <input type="text" class="form-control" name="notiket" placeholder="Kode Tiket" hidden>
            </div>

            <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-default btn-md" data-dismiss="modal"> <i class="nav-icon fas fa-times"></i> Batalkan </button>
              <button type="submit" class="btn btn-warning btn-md" name="bayar"> <i class="nav-icon fas fa-upload"></i> Upload Bukti Bayar</button>
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
    var id           =$(e.relatedTarget).data('id');
    $(e.currentTarget).find('input[name="idkamar"]').val(id);
  });
</script>

<script type="text/javascript">
  $('#modal-upload').on('show.bs.modal', function(e) {

    //get data-id attribute of the clicked element
    var notiket           =$(e.relatedTarget).data('tiket');
    $(e.currentTarget).find('input[name="notiket"]').val(notiket);
  });
</script>

<!-- <script type="text/javascript">
  $('#modal-reset').on('show.bs.modal', function(e) {

    //get data-id attribute of the clicked element
    var nip           =$(e.relatedTarget).data('nip');
    $(e.currentTarget).find('input[name="nip_pelanggan"]').val(nip);
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
</script> -->
</body>
</html>
<?php 
}
?>
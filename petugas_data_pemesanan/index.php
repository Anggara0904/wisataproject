<!DOCTYPE html>
<html lang="en">
<head>
<?php
require_once "../database/config.php";
Include '../petugas_list_head_link.php';
$halaman = 'petugasdatapemesanan';
error_reporting(0);
session_start();
$peran="petugas";
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
            <h1 class="m-0"> Petugas Data Pemesanan</h1>
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
                    <th>Tgl Transaksi</th>
                    <th>Bukti Bayar</th>
                    <th>No Hp</th>
                    <th>Nama Petugas</th>
                    <th>No Hp Petugas</th>
                    <th style="width:10%"><center>Action</center></th>
                  </tr>
                  </thead>
                  <tbody>
                    <?php
                    $no=1;
                     $sql_panggilpemesanan = mysqli_query($con, " SELECT * FROM tbl_pemesanan WHERE stts='N'") or die(mysqli_error($con));
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
                          <a class="btn btn-xs btn-primary" href="../petugas_data_penjualan/<?=$data['bukti_bayar'];?>" target="_blank" role="button"><i class="nav-icon fas fa-eye"></i></a>
                          <a class="btn btn-xs btn-success" href="download.php?lokasifile=../petugas_data_penjualan/<?=$data['bukti_bayar'];?>" target="_blank" role="button"><i class="nav-icon fas fa-download"></i> Download</a>
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
                             <button type="button" class="btn btn-xs bg-gradient-success">  <img src="../backoffice_data_mitra/foto_mitra/check.png" width="17px" height="17px"> <?=$data['no_hp'];?></button>
                         
                            <?php
                          }
                          else
                          {
                            ?>
                            <?=$data['no_hp'];?>
                            <?php
                          }
                          ?>    
                        </td>

                        <td>
                            <?=$data['nama_petugas'];?>
                        </td>

                        <td>
                            <?=$data['no_hp_petugas'];?>
                        </td>
                        
                        <td>
                          <center>
                          <?php
                             $hp = $data['no_hp_petugas'];
                             $querycekhpmitra = mysqli_query($con, " SELECT * FROM tbl_mitra WHERE no_hp='$hp'") or die(mysqli_error($con));
                             if (mysqli_num_rows($querycekhpmitra)>0)
                             {
                               ?>
                                   <a class="btn btn-xs btn-success" href="konfirmasi.php?nama_petugas=<?=$_SESSION['nama'];?>&hp=<?=$data['no_hp_petugas'];?>&no_tiket=<?=$data['no_tiket'];?>" role="button"><i class="nav-icon fas fa-check"></i></a>
                            
                               <?php
   
                             }
                             else
                             {
                               ?>
                                     <a class="btn btn-xs btn-success" href="konfirmasinon.php?nama_petugas=<?=$_SESSION['nama'];?>&no_tiket=<?=$data['no_tiket'];?>" target="_blank" role="button"><i class="nav-icon fas fa-check"></i></a>
                            
                               <?php
                             }
                             ?> 
                          <button type="button" class="btn btn-xs bg-gradient-primary" data-toggle="modal" data-target="#modal-upload" data-tiket="<?=$data['no_tiket'];?>"> <i class="nav-icon fas fa-file"></i></button>
                          <button type="button" class="btn btn-xs bg-gradient-danger" data-toggle="modal" data-target="#modal-default" data-tiket="<?=$data['no_tiket'];?>"> <i class="nav-icon fas fa-trash"></i></button>
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
              <form role="form" class="form-layout" action="hapus_pesanan.php" method="post">
              <div class="alert alert-warning alert-dismissible">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true"></button>
                  <h5><i class="icon fas fa-exclamation-triangle"></i> Perhatian!</h5>
                  Anda Yakin Akan Menghapus Data?
                </div>
              <input type="text" name="no_tiket" id="notiket" hidden>
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
           <form role="form" class="form-layout" action="petugas_pemesanan_tiket.php" method="post">
            <div class="form-group">
              <label for="exampleInputEmail1">jumlah Anak</label>
              <select class="custom-select rounded-0" id="exampleSelectRounded0" name="jumlahank" >
              <option>1</option>
              <option>2</option>
              <option>3</option>
              <option>4</option>
              <option>5</option>
              <option>6</option>
              <option>7</option>
              <option>8</option>
              <option>9</option>
              <option>10</option>
              </select>
            </div>
            <div class="form-group">
              <label for="exampleInputEmail1">jumlah Dewasa</label>
              <select class="custom-select rounded-0" id="exampleSelectRounded0" name="jumlahdewasa" >
              <option>1</option>
              <option>2</option>
              <option>3</option>
              <option>4</option>
              <option>5</option>
              <option>6</option>
              <option>7</option>
              <option>8</option>
              <option>9</option>
              <option>10</option>
              </select>
            </div>
            <div class="form-group">
              <label for="exampleInputEmail1">Tanggal Datang</label>
              <input type="date" class="form-control" name="tgldatang" placeholder="Tanggal Datang" autofocus required>
            </div>
            <div class="form-group">
              <label for="exampleInputEmail1">Tanggal Transaksi</label>
              <input type="date" class="form-control" name="tgltransaksi" placeholder="Tanggal Transaksi" autofocus required>
            </div>
            <div class="form-group">
              <label for="exampleInputEmail1">No HP</label>
              <input type="text" class="form-control" name="no_hp" placeholder="No HP Pengunjung" autofocus required>
            </div>
            <div class="form-group">
              <label for="exampleInputEmail1">Nama Petugas</label>
              <input type="text" class="form-control" name="nama_petugas" placeholder="Nama Petugas" autofocus required>
            </div>
            <div class="form-group">
              <label for="exampleInputEmail1">No HP Petugas</label>
              <input type="text" class="form-control" name="no_hp_petugas" placeholder="No HP Petugas" autofocus required>
            </div>
            <div>
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
  </div>
</div>

<div class="modal fade" id="modal-upload">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header" style="background-color:#005caf;">
              <h5 class="modal-title"><font color="#ffffff"> Upload Bukti Bayar </font></h5>
            </div>
            <div class="modal-body">
              <form role="form" class="form-layout" action="upload_bukti.php" method="post" enctype="multipart/form-data">

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
    var no_tiket           =$(e.relatedTarget).data('tiket');
    $(e.currentTarget).find('input[name="no_tiket"]').val(no_tiket);
  });
</script>

<script type="text/javascript">
  $('#modal-upload').on('show.bs.modal', function(e) {

    //get data-id attribute of the clicked element
    var notiket           =$(e.relatedTarget).data('tiket');
    $(e.currentTarget).find('input[name="notiket"]').val(notiket);
  });
</script>

</body>
</html>
<?php 
}
?>
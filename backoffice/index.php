<!DOCTYPE html>
<html lang="en">
<head>
<?php
Include '../list_head_link.php';
$halaman = 'backoffice';
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
        <div class="row mb-1">
          <div class="col-sm-12">
            <!-- <h1 class="m-0">Dasbor</h1> -->
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
      <div class="container-fluid">
        <div class="row" id="5kamar">
          
          <div class="col-lg-4" id="km1-5kamar">
            <div class="small-box bg-secondary">
              <a href="../backoffice_data_pengguna"></a>
              <div class="inner">
                  <h4>Selamat Datang  <?=$_SESSION['nama'];?></h4>

                  <p>Semoga harimu menyenangkan</p>
                  <?php 
                  $tanggalsekarang = date('d F Y')
                  ?>
                  <h5><?=$tanggalsekarang;?></h5>
                  </div>
            </div>
          </div>  

          <div class="col-lg-2" id="km2-5kamar">
            <div class="small-box bg-info">
              <a href="../backoffice_data_pengguna"></a>
                <div class="inner">
                  <?php
                  require_once '../database/config.php';

                  $sql_jmlpengguna = mysqli_query($con, " SELECT * FROM tbl_pengguna") or die (mysqli_error($con));
                  $jmlpengguna = mysqli_num_rows($sql_jmlpengguna);
                  ?>
                  <h3><?=$jmlpengguna;?></h3>

                  <p>Jumlah Data Pengguna</p>
                </div>
                <div class="icon">
                  <i class="fas fa-users"></i>
                </div>
              <a href="../backoffice_data_pengguna" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>  

          <div class="col-lg-2" id="km3-5kamar">
            <div class="small-box bg-danger">
              <a href="../backoffice_data_pemesanan"></a>
                <div class="inner">
                  <?php
                  require_once '../database/config.php';

                  $sql_tiket = mysqli_query($con, " SELECT * FROM tbl_pemesanan") or die (mysqli_error($con));
                  $jmltiket = mysqli_num_rows($sql_tiket);
                  ?>
                  <h3><?=$jmltiket;?></h3>

                  <p>Data Pemesanan Tiket</p>
                </div>
                <div class="icon">
                  <i class="fas fa-print"></i>
                </div>
              <a href="../backoffice_data_pemesanan" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>  

          <div class="col-lg-2" id="km4-5kamar">
            <div class="small-box bg-success">
              <a href="..backoffice_setingharga_tiket"></a>
                <div class="inner">
                  <?php
                   require_once '../database/config.php';
                   $sql_harga = mysqli_query($con, " SELECT * FROM tbl_harga_tiket") or die (mysqli_error($con));
                   $jmlharga = mysqli_num_rows($sql_harga);
                   ?>
                   <h3><?=$jmlharga;?></h3>

                   <p>Harga Tiket</p>
                </div>
                <div class="icon">
                   <i class="fas fa-dollar-sign"></i>
                </div>
              <a href="../backoffice_setingharga_tiket.php" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>  

          <div class="col-lg-2" id="km5-5kamar">
            <div class="small-box bg-warning">
              <a href="../backoffice_seting_komisimitra"></a>
                <div class="inner">
                  <?php
                  require_once '../database/config.php';

                  $sql_tiket = mysqli_query($con, " SELECT * FROM tbl_komisimitra") or die (mysqli_error($con));
                  $jmltiket = mysqli_num_rows($sql_tiket);
                  ?>
                  <h3><?=$jmltiket;?></h3>

                  <p>Komisi Mitra</p>
                </div>
                <div class="icon">
                  <i class="fas fa-hand-holding-usd"></i>
                </div>
              <a href="../backoffice_seting_komisimitra" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row-4">
          <div class="col-lg-4">

            <div class="col-4 col-lg-6">
              <div class="small-box bg-primary">
                <a href="..backoffice_setingharga_tiket"></a>
                  <div class="inner">
                    <?php
                     require_once '../database/config.php';
                     $sql_harga = mysqli_query($con, " SELECT * FROM tbl_harga_tiket") or die (mysqli_error($con));
                     $jmlharga = mysqli_num_rows($sql_harga);
                     ?>
                     <h3><?=$jmlharga;?></h3>

                     <p>Pendapatan Hari ini</p>
                  </div>
                <div class="icon">
                   <i class="fas fa-calendar-alt"></i>
                </div>
              </div>
            </div>
            <div class="col-lg-6">
              <div class="small-box bg-primary">
              <a href="../backoffice_seting_komisimitra"></a>
                <div class="inner">
                  <?php
                  require_once '../database/config.php';

                  $sql_tiket = mysqli_query($con, " SELECT * FROM tbl_komisimitra") or die (mysqli_error($con));
                  $jmltiket = mysqli_num_rows($sql_tiket);
                  ?>
                  <h3><?=$jmltiket;?></h3>

                  <p>Pendapatan Kemarin</p>
                </div>
                <div class="icon">
                  <i class="fas fa-calendar-alt"></i>
                </div>
              </div>
            </div>
            <div class="col-lg-12">
              <div class="small-box bg-primary">
                <a href="..backoffice_setingharga_tiket"></a>
                <div class="inner">
                  <?php
                  require_once '../database/config.php';
                  $sql_harga = mysqli_query($con, " SELECT * FROM tbl_harga_tiket") or die (mysqli_error($con));
                  $jmlharga = mysqli_num_rows($sql_harga);
                  ?>
                  <h3><?=$jmlharga;?></h3>

                  <p>Pendapatan Bulan Ini</p>
                </div>
                  <div class="icon">
                    <i class="fas fa-calendar-alt"></i>
                  </div>
                </div>
              </div>
            </div> 
         </div>
          <div class="content-header">
            <div class="container-fluid">
              <div class="row-1">
                <div class="col-lg-8">

                  <div class="col-lg-12" >
                    <div class="card card-info">
                      <div class="card-header">
                        <h3 class="card-title">Pendapatan Perbulan dalam 1 Tahun terakhir</h3>
                      </div>
                      <div class="card-body">
                        <div class="chart">
                          <div id="lineChart" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></div>
                          </div>
                        </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>          
      </div><!-- /.container-fluid -->
    </div>
  </div>
    <!-- /.content-header -->
    <!-- /.content -->
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
</body>
</html>
<?php
}
?>
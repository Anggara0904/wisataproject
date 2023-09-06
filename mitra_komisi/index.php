<!DOCTYPE html>
<html lang="en">
<head>
<?php
require_once "../database/config.php";
Include '../mitra_list_head_link.php';
$halaman = 'mitra_komisi';
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
            <h1 class="m-0">Data Komisi</h1>
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
                <h3 class="card-title"><font color="#ffffff"><i class="nav-icon fas fa-users"></i> Data Komisi / Bulan</font></h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">


              <?php
              $tahunsekarang = date('Y');
              $nama_mitra = $_SESSION['nama'];
             
              ?>
              <h4> Data Komisi Per Bulan mirtra : <?=$_SESSION['nama'];?> Tahun <?=$tahunsekarang;?></h4>
                <table id="example2" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th style="width:5%">No</th>
                    <th>Bulan</th>
                    <th>Pengunjung</th>
                    <th>Total Harga</th>
                    <th>Komisi</th>
                    <th>Penghasilan</th>
                    <th>Status</th>
                    <th style="width:10%"><center>Action</center></th>
                  </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td>
                      1
                      </td>
                      <td>
                        Januari
                      </td>
                      <td>
                      <?php 
                        $total_pengunjung_januari = mysqli_query($con, "SELECT SUM(total_pengunjung) AS semua_pengunjung_januari FROM tbl_pemesanan WHERE stts='Y' AND bulan='Januari' AND tahun='$tahunsekarang' AND nama_mitra='$nama_mitra' ") or die (mysqli_error($con));
                        $datapengunjung_januari = mysqli_fetch_assoc($total_pengunjung_januari);
                        $pengunjung_januari = $datapengunjung_januari['semua_pengunjung_januari'];
                        if($pengunjung_januari=="")
                        {
                          $pengunjung_januari = "0";
                          
                        }
                        else
                        {
                          $pengunjung_januari = $datapengunjung_januari['semua_pengunjung_januari'];
                        }        
                      ?>
                      <?=$pengunjung_januari;?>
                          
                        </td>
                        <td>
                        <?php
                        $total_harga_januari = mysqli_query($con, "SELECT SUM(total_harga) AS semua_harga_januari FROM tbl_pemesanan WHERE stts='Y' AND bulan='Januari' AND tahun='$tahunsekarang' AND nama_mitra='$nama_mitra' ") or die (mysqli_error($con));
                        $dataharga_januari = mysqli_fetch_assoc($total_harga_januari);
                        $harga_januari = $dataharga_januari['semua_harga_januari'];
                        if($harga_januari=="")
                        {
                          $totalharga_januari= "0";
                          
                        }
                        else
                        {
                          $totalharga_januari = $harga_januari;
                        }        
                      ?>
                           Rp <?= number_format($totalharga_januari,0,",",".");?>

                          
                        </td>
                        <td>
                        <?php 
                        if ($pengunjung_januari <200)
                        {
                          $komisismitra_januari = '0';

                        }
                        if ($pengunjung_januari >=200 && $pengungjung_januari <=399)
                        {
                          $panggilkomisi_januari = mysqli_query($con,"SELECT komisi FROM tbl_komisimitra WHERE jumlah=200") or die (mysqli_error($con));
                          $datakomisi_januari = mysqli_fetch_assoc($panggilkomisi_januari);
                          $komisismitra_januari = $datakomisi_januari['komisi'];
                          
                        }
                        if ($pengunjung_januari >=400 && $pengungjung_januari <=599)
                        {
                          
                          $panggilkomisi_januari = mysqli_query($con,"SELECT komisi FROM tbl_komisimitra WHERE jumlah=400") or die (mysqli_error($con));
                          $datakomisi_januari = mysqli_fetch_assoc($panggilkomisi_januari);
                          $komisismitra_januari = $datakomisi_januari['komisi'];
                        }
                        if ($pengunjung_januari >=600)
                        {
                          
                          $panggilkomisi_januari = mysqli_query($con,"SELECT komisi FROM tbl_komisimitra WHERE jumlah=600") or die (mysqli_error($con));
                          $datakomisi_januari = mysqli_fetch_assoc($panggilkomisi_januari);
                          $komisismitra_januari = $datakomisi_januari['komisi'];
                        }
                       
                        ?>
                        <?=$komisismitra_januari;?> %
                        </td>
                        <td>
                          <?php 
                          $penghasilan_januari = ($komisismitra_januari/ 100)* $totalharga_januari;
                          ?>
                        Rp<?= number_format($penghasilan_januari ,0,",",".");?> 
                        </td>
                        <td>
                          <?php 
                        $panggilstts_komisi_januari = mysqli_query($con, "SELECT stts_komisi FROM  tbl_pemesanan WHERE stts='Y' AND bulan='Januari' AND tahun='$tahunsekarang' AND nama_mitra='$nama_mitra'") or die (mysqli_error($con));
                        $datastts_komisi_januari = mysqli_fetch_assoc($panggilstts_komisi_januari);

                        if($datastts_komisi_januari['stts_komisi']==0)
                        {
                          ?>
                          <center>
                          <button type="button" class="btn btn-xs bg-gradient-danger"> Belum di Cairkan</button>
                          </center>
                          <?php
                        }
                        else
                        {
                          ?>
                          <center>
                          <button type="button" class="btn btn-xs bg-gradient-success"> Sudah di Cairkan</button>
                          </center>
                          <?php
                        }
                        ?>
                        </td>
                        <td>
                        <center>
                        <?php
                              if($datastts_komisi_januari['stts_komisi']==0)
                              {
                                ?>
                                <center>
                                <a class="btn btn-xs btn-primary" href="pencairan.php?bulan=Januari&tahun=<?=$tahunsekarang;?>&mitra=<?=$nama_mitra;?>"><i class="nav-icon fas fa-hand-holding-usd"></i>Cairkan</a>
                                </center>
                                <?php
                              }
                              else
                              {
                                ?>
                                <center>
                                <button type="button" class="btn btn-xs bg-gradient-success" disabled> Sudah di Cairkan</button>
                                </center>
                                <?php
                              } 
                             ?>
                       </center>
                        </td>
                    </tr>
                    <tr>
                    <td>
                      2
                      </td>
                      <td>
                        Februari
                        </td>
                        <td>
                          <?php
                        $total_pengunjung_februari = mysqli_query($con, "SELECT SUM(total_pengunjung) AS semua_pengunjung_februari FROM tbl_pemesanan WHERE stts='Y' AND bulan='Februari' AND tahun='$tahunsekarang' AND nama_mitra='$nama_mitra' ") or die (mysqli_error($con));
                        $datapengunjung_februari = mysqli_fetch_assoc($total_pengunjung_februari);
                        $pengunjung_februari = $datapengunjung_februari['semua_pengunjung_februari'];
                        if($pengunjung_februari=="")
                        {
                          $pengunjung_februari = "0";
                          
                        }
                        else
                        {
                          $pengunjung_februari = $datapengunjung_februari['semua_pengunjung_februari'];
                        }        
                      ?>
                           <?=$pengunjung_februari;?>
                        </td>
                        <td>
                        <?php
                        $total_harga_februari = mysqli_query($con, "SELECT SUM(total_harga) AS semua_harga_februari FROM tbl_pemesanan WHERE stts='Y' AND bulan='Februari' AND tahun='$tahunsekarang' AND nama_mitra='$nama_mitra' ") or die (mysqli_error($con));
                        $dataharga_februari = mysqli_fetch_assoc($total_harga_februari);
                        $harga_februari = $dataharga_februari['semua_harga_februari'];
                        if($harga_februari=="")
                        {
                          $totalharga_februari= "0";
                          
                        }
                        else
                        {
                          $totalharga_februari = $harga_februari;
                        }        
                      ?>
                           Rp <?= number_format($totalharga_februari,0,",",".");?>

                          
                        </td>
                        <td>
                        <?php 
                        if ($pengunjung_februari <200)
                        {
                          $komisismitra_februari = '0';

                        }
                        if ($pengunjung_februari >=200 && $pengungjung_februari <=399)
                        {
                          $panggilkomisi_februari = mysqli_query($con,"SELECT komisi FROM tbl_komisimitra WHERE jumlah=200") or die (mysqli_error($con));
                          $datakomisi_februari = mysqli_fetch_assoc($panggilkomisi_februari);
                          $komisismitra_februari = $datakomisi_februari['komisi'];
                          
                        }
                        if ($pengunjung_februari >=400 && $pengungjung_februari <=599)
                        {
                          
                          $panggilkomisi_februari = mysqli_query($con,"SELECT komisi FROM tbl_komisimitra WHERE jumlah=400") or die (mysqli_error($con));
                          $datakomisi_februari = mysqli_fetch_assoc($panggilkomisi_februari);
                          $komisismitra_februari = $datakomisi_februari['komisi'];
                        }
                        if ($pengunjung_februari >=600)
                        {
                          
                          $panggilkomisi_februari = mysqli_query($con,"SELECT komisi FROM tbl_komisimitra WHERE jumlah=600") or die (mysqli_error($con));
                          $datakomisi_februari = mysqli_fetch_assoc($panggilkomisi_februari);
                          $komisismitra_februari = $datakomisi_februari['komisi'];
                        }
                       
                        ?>
                        <?=$komisismitra_februari;?> %
                        </td>
                        <td>
                          <?php 
                          $penghasilan_februari = ($komisismitra_februari/ 100)* $totalharga_februari;
                          ?>
                        Rp<?= number_format($penghasilan_februari ,0,",",".");?> 
                        </td>
                        <td>
                          <?php 
                        $panggilstts_komisi_februari = mysqli_query($con, "SELECT stts_komisi FROM  tbl_pemesanan WHERE stts='Y' AND bulan='Februari' AND tahun='$tahunsekarang' AND nama_mitra='$nama_mitra'") or die (mysqli_error($con));
                        $datastts_komisi_februari = mysqli_fetch_assoc($panggilstts_komisi_februari);

                        if($datastts_komisi_februari['stts_komisi']==0)
                        {
                          ?>
                          <center>
                          <button type="button" class="btn btn-xs bg-gradient-danger"> Belum di Cairkan</button>
                          </center>
                          <?php
                        }
                        else
                        {
                          ?>
                          <center>
                          <button type="button" class="btn btn-xs bg-gradient-success"> Sudah di Cairkan</button>
                          </center>
                          <?php
                        }
                        ?>
                        </td>
                        <td>
                        <center>
                        <?php
                              if($datastts_komisi_februari['stts_komisi']==0)
                              {
                                ?>
                                <center>
                                <a class="btn btn-xs btn-primary" href="pencairan.php?bulan=Februari&tahun=<?=$tahunsekarang;?>&mitra=<?=$nama_mitra;?>"><i class="nav-icon fas fa-hand-holding-usd"></i>Cairkan</a>
                                </center>
                                <?php
                              }
                              else
                              {
                                ?>
                                <center>
                                <button type="button" class="btn btn-xs bg-gradient-success" disabled> Sudah di Cairkan</button>
                                </center>
                                <?php
                              } 
                             ?>
                       </center>
                        </td>
                      </tr>
                      <tr>
                      <td>
                      3
                      </td>
                      <td>
                        Maret
                        </td>
                        <td>
                        <?php
                        $total_pengunjung_maret = mysqli_query($con, "SELECT SUM(total_pengunjung) AS semua_pengunjung_maret FROM tbl_pemesanan WHERE stts='Y' AND bulan='Maret' AND tahun='$tahunsekarang' AND nama_mitra='$nama_mitra' ") or die (mysqli_error($con));
                        $datapengunjung_maret = mysqli_fetch_assoc($total_pengunjung_maret);
                        $pengunjung_maret = $datapengunjung_maret['semua_pengunjung_maret'];
                        if($pengunjung_maret=="")
                        {
                          $pengunjung_maret = "0";
                          
                        }
                        else
                        {
                          $pengunjung_maret = $datapengunjung_maret['semua_pengunjung_maret'];
                        }        
                      ?>
                           <?=$pengunjung_maret;?>
                        </td>
                        <td>
                        <?php
                        $total_harga_maret = mysqli_query($con, "SELECT SUM(total_harga) AS semua_harga_maret FROM tbl_pemesanan WHERE stts='Y' AND bulan='Maret' AND tahun='$tahunsekarang' AND nama_mitra='$nama_mitra' ") or die (mysqli_error($con));
                        $dataharga_maret = mysqli_fetch_assoc($total_harga_maret);
                        $harga_maret = $dataharga_maret['semua_harga_maret'];
                        if($harga_maret=="")
                        {
                          $totalharga_maret= "0";
                          
                        }
                        else
                        {
                          $totalharga_maret = $harga_maret;
                        }        
                      ?>
                           Rp <?= number_format($totalharga_maret,0,",",".");?>

                          
                        </td>
                        <td>
                        <?php 
                        if ($pengunjung_maret <200)
                        {
                          $komisismitra_maret = '0';

                        }
                        if ($pengunjung_maret >=200 && $pengungjung_maret <=399)
                        {
                          $panggilkomisi_maret = mysqli_query($con,"SELECT komisi FROM tbl_komisimitra WHERE jumlah=200") or die (mysqli_error($con));
                          $datakomisi_maret = mysqli_fetch_assoc($panggilkomisi_maret);
                          $komisismitra_maret = $datakomisi_maret['komisi'];
                          
                        }
                        if ($pengunjung_maret >=400 && $pengungjung_maret <=599)
                        {
                          
                          $panggilkomisi_maret = mysqli_query($con,"SELECT komisi FROM tbl_komisimitra WHERE jumlah=400") or die (mysqli_error($con));
                          $datakomisi_maret = mysqli_fetch_assoc($panggilkomisi_maret);
                          $komisismitra_maret = $datakomisi_maret['komisi'];
                        }
                        if ($pengunjung_maret >=600)
                        {
                          
                          $panggilkomisi_maret = mysqli_query($con,"SELECT komisi FROM tbl_komisimitra WHERE jumlah=600") or die (mysqli_error($con));
                          $datakomisi_maret = mysqli_fetch_assoc($panggilkomisi_maret);
                          $komisismitra_maret = $datakomisi_maret['komisi'];
                        }
                       
                        ?>
                        <?=$komisismitra_maret;?> %
                        </td>
                        <td>
                          <?php 
                          $penghasilan_maret = ($komisismitra_maret/ 100)* $totalharga_maret;
                          ?>
                        Rp<?= number_format($penghasilan_maret ,0,",",".");?> 
                        </td>
                        <td>
                          <?php 
                        $panggilstts_komisi_maret = mysqli_query($con, "SELECT stts_komisi FROM  tbl_pemesanan WHERE stts='Y' AND bulan='Maret' AND tahun='$tahunsekarang' AND nama_mitra='$nama_mitra'") or die (mysqli_error($con));
                        $datastts_komisi_maret = mysqli_fetch_assoc($panggilstts_komisi_maret);

                        if($datastts_komisi_maret['stts_komisi']==0)
                        {
                          ?>
                          <center>
                          <button type="button" class="btn btn-xs bg-gradient-danger"> Belum di Cairkan</button>
                          </center>
                          <?php
                        }
                        else
                        {
                          ?>
                          <center>
                          <button type="button" class="btn btn-xs bg-gradient-success"> Sudah di Cairkan</button>
                          </center>
                          <?php
                        }
                        ?>
                        </td>
                        <td>
                        <center>
                        <?php
                              if($datastts_komisi_maret['stts_komisi']==0)
                              {
                                ?>
                                <center>
                                <a class="btn btn-xs btn-primary" href="pencairan.php?bulan=Maret&tahun=<?=$tahunsekarang;?>&mitra=<?=$nama_mitra;?>"><i class="nav-icon fas fa-hand-holding-usd"></i>Cairkan</a>
                                </center>
                                <?php
                              }
                              else
                              {
                                ?>
                                <center>
                                <button type="button" class="btn btn-xs bg-gradient-success" disabled> Sudah di Cairkan</button>
                                </center>
                                <?php
                              } 
                             ?>
                       </center>
                        </td>
                      </tr>

                      <tr>
                      <td>
                      4
                      </td>
                      <td>
                        April
                        </td>
                        <td>
                        <?php
                        $total_pengunjung_april = mysqli_query($con, "SELECT SUM(total_pengunjung) AS semua_pengunjung_april FROM tbl_pemesanan WHERE stts='Y' AND bulan='April' AND tahun='$tahunsekarang' AND nama_mitra='$nama_mitra' ") or die (mysqli_error($con));
                        $datapengunjung_april = mysqli_fetch_assoc($total_pengunjung_april);
                        $pengunjung_april = $datapengunjung_april['semua_pengunjung_april'];
                        if($pengunjung_april=="")
                        {
                          $pengunjung_april = "0";
                          
                        }
                        else
                        {
                          $pengunjung_april = $datapengunjung_april['semua_pengunjung_april'];
                        }        
                      ?>
                           <?=$pengunjung_april;?>
                        </td>
                        <td>
                        <?php
                        $total_harga_april = mysqli_query($con, "SELECT SUM(total_harga) AS semua_harga_april FROM tbl_pemesanan WHERE stts='Y' AND bulan='April' AND tahun='$tahunsekarang' AND nama_mitra='$nama_mitra' ") or die (mysqli_error($con));
                        $dataharga_april = mysqli_fetch_assoc($total_harga_april);
                        $harga_april = $dataharga_april['semua_harga_april'];
                        if($harga_april=="")
                        {
                          $totalharga_april= "0";
                          
                        }
                        else
                        {
                          $totalharga_april = $harga_april;
                        }        
                      ?>
                           Rp <?= number_format($totalharga_april,0,",",".");?>

                          
                        </td>
                        <td>
                        <?php 
                        if ($pengunjung_april <200)
                        {
                          $komisismitra_april = '0';

                        }
                        if ($pengunjung_april >=200 && $pengungjung_april <=399)
                        {
                          $panggilkomisi_april = mysqli_query($con,"SELECT komisi FROM tbl_komisimitra WHERE jumlah=200") or die (mysqli_error($con));
                          $datakomisi_april = mysqli_fetch_assoc($panggilkomisi_april);
                          $komisismitra_april = $datakomisi_april['komisi'];
                          
                        }
                        if ($pengunjung_april >=400 && $pengungjung_april <=599)
                        {
                          
                          $panggilkomisi_april = mysqli_query($con,"SELECT komisi FROM tbl_komisimitra WHERE jumlah=400") or die (mysqli_error($con));
                          $datakomisi_april = mysqli_fetch_assoc($panggilkomisi_april);
                          $komisismitra_april = $datakomisi_april['komisi'];
                        }
                        if ($pengunjung_april >=600)
                        {
                          
                          $panggilkomisi_april = mysqli_query($con,"SELECT komisi FROM tbl_komisimitra WHERE jumlah=600") or die (mysqli_error($con));
                          $datakomisi_april = mysqli_fetch_assoc($panggilkomisi_april);
                          $komisismitra_april = $datakomisi_april['komisi'];
                        }
                       
                        ?>
                        <?=$komisismitra_april;?> %
                        </td>
                        <td>
                          <?php 
                          $penghasilan_april = ($komisismitra_april/ 100)* $totalharga_april;
                          ?>
                        Rp<?= number_format($penghasilan_april ,0,",",".");?> 
                        </td>
                        <td>
                          <?php 
                        $panggilstts_komisi_april = mysqli_query($con, "SELECT stts_komisi FROM  tbl_pemesanan WHERE stts='Y' AND bulan='April' AND tahun='$tahunsekarang' AND nama_mitra='$nama_mitra'") or die (mysqli_error($con));
                        $datastts_komisi_april = mysqli_fetch_assoc($panggilstts_komisi_april);

                        if($datastts_komisi_april['stts_komisi']==0)
                        {
                          ?>
                          <center>
                          <button type="button" class="btn btn-xs bg-gradient-danger"> Belum di Cairkan</button>
                          </center>
                          <?php
                        }
                        else
                        {
                          ?>
                          <center>
                          <button type="button" class="btn btn-xs bg-gradient-success"> Sudah di Cairkan</button>
                          </center>
                          <?php
                        }
                        ?>
                        </td>
                        <td>
                        <center>
                        <?php
                              if($datastts_komisi_april['stts_komisi']==0)
                              {
                                ?>
                                <center>
                                <a class="btn btn-xs btn-primary" href="pencairan.php?bulan=April&tahun=<?=$tahunsekarang;?>&mitra=<?=$nama_mitra;?>"><i class="nav-icon fas fa-hand-holding-usd"></i>Cairkan</a>
                                </center>
                                <?php
                              }
                              else
                              {
                                ?>
                                <center>
                                <button type="button" class="btn btn-xs bg-gradient-success" disabled> Sudah di Cairkan</button>
                                </center>
                                <?php
                              } 
                             ?>
                       </center>
                        </td>
                      </tr>

                      <tr>
                      <td>
                      5
                      </td>
                      <td>
                        Mei
                        </td>
                        <td>
                        <?php
                        $total_pengunjung_mei = mysqli_query($con, "SELECT SUM(total_pengunjung) AS semua_pengunjung_mei FROM tbl_pemesanan WHERE stts='Y' AND bulan='Mei' AND tahun='$tahunsekarang' AND nama_mitra='$nama_mitra' ") or die (mysqli_error($con));
                        $datapengunjung_mei = mysqli_fetch_assoc($total_pengunjung_mei);
                        $pengunjung_mei = $datapengunjung_mei['semua_pengunjung_mei'];
                        if($pengunjung_mei=="")
                        {
                          $pengunjung_mei = "0";
                          
                        }
                        else
                        {
                          $pengunjung_mei = $datapengunjung_mei['semua_pengunjung_mei'];
                        }        
                      ?>
                           <?=$pengunjung_mei;?>
                        </td>
                        <td>
                        <?php
                        $total_harga_mei = mysqli_query($con, "SELECT SUM(total_harga) AS semua_harga_mei FROM tbl_pemesanan WHERE stts='Y' AND bulan='Mei' AND tahun='$tahunsekarang' AND nama_mitra='$nama_mitra' ") or die (mysqli_error($con));
                        $dataharga_mei = mysqli_fetch_assoc($total_harga_mei);
                        $harga_mei = $dataharga_mei['semua_harga_mei'];
                        if($harga_mei=="")
                        {
                          $totalharga_mei= "0";
                          
                        }
                        else
                        {
                          $totalharga_mei = $harga_mei;
                        }        
                      ?>
                           Rp <?= number_format($totalharga_mei,0,",",".");?>

                          
                        </td>
                        <td>
                        <?php 
                        if ($pengunjung_mei <200)
                        {
                          $komisismitra_mei = '0';

                        }
                        if ($pengunjung_mei >=200 && $pengungjung_mei <=399)
                        {
                          $panggilkomisi_mei = mysqli_query($con,"SELECT komisi FROM tbl_komisimitra WHERE jumlah=200") or die (mysqli_error($con));
                          $datakomisi_mei = mysqli_fetch_assoc($panggilkomisi_mei);
                          $komisismitra_mei = $datakomisi_mei['komisi'];
                          
                        }
                        if ($pengunjung_mei >=400 && $pengungjung_mei <=599)
                        {
                          
                          $panggilkomisi_mei = mysqli_query($con,"SELECT komisi FROM tbl_komisimitra WHERE jumlah=400") or die (mysqli_error($con));
                          $datakomisi_mei = mysqli_fetch_assoc($panggilkomisi_mei);
                          $komisismitra_mei = $datakomisi_mei['komisi'];
                        }
                        if ($pengunjung_mei >=600)
                        {
                          
                          $panggilkomisi_mei = mysqli_query($con,"SELECT komisi FROM tbl_komisimitra WHERE jumlah=600") or die (mysqli_error($con));
                          $datakomisi_mei = mysqli_fetch_assoc($panggilkomisi_mei);
                          $komisismitra_mei = $datakomisi_mei['komisi'];
                        }
                       
                        ?>
                        <?=$komisismitra_mei;?> %
                        </td>
                        <td>
                          <?php 
                          $penghasilan_mei = ($komisismitra_mei/ 100)* $totalharga_mei;
                          ?>
                        Rp<?= number_format($penghasilan_mei ,0,",",".");?> 
                        </td>
                        <td>
                          <?php 
                        $panggilstts_komisi_mei = mysqli_query($con, "SELECT stts_komisi FROM  tbl_pemesanan WHERE stts='Y' AND bulan='Mei' AND tahun='$tahunsekarang' AND nama_mitra='$nama_mitra'") or die (mysqli_error($con));
                        $datastts_komisi_mei = mysqli_fetch_assoc($panggilstts_komisi_mei);

                        if($datastts_komisi_mei['stts_komisi']==0)
                        {
                          ?>
                          <center>
                          <button type="button" class="btn btn-xs bg-gradient-danger"> Belum di Cairkan</button>
                          </center>
                          <?php
                        }
                        else
                        {
                          ?>
                          <center>
                          <button type="button" class="btn btn-xs bg-gradient-success"> Sudah di Cairkan</button>
                          </center>
                          <?php
                        }
                        ?>
                        </td>
                        <td>
                        <center>
                        <?php
                              if($datastts_komisi_mei['stts_komisi']==0)
                              {
                                ?>
                                <center>
                                <a class="btn btn-xs btn-primary" href="pencairan.php?bulan=Mei&tahun=<?=$tahunsekarang;?>&mitra=<?=$nama_mitra;?>"><i class="nav-icon fas fa-hand-holding-usd"></i>Cairkan</a>
                                </center>
                                <?php
                              }
                              else
                              {
                                ?>
                                <center>
                                <button type="button" class="btn btn-xs bg-gradient-success" disabled> Sudah di Cairkan</button>
                                </center>
                                <?php
                              } 
                             ?>
                       </center>
                        </td>
                      </tr>

                      <tr>
                      <td>
                      6
                      </td>
                      <td>
                        Juni
                        </td>
                        <td>
                        <?php
                        $total_pengunjung_juni = mysqli_query($con, "SELECT SUM(total_pengunjung) AS semua_pengunjung_juni FROM tbl_pemesanan WHERE stts='Y' AND bulan='Juni' AND tahun='$tahunsekarang' AND nama_mitra='$nama_mitra' ") or die (mysqli_error($con));
                        $datapengunjung_juni = mysqli_fetch_assoc($total_pengunjung_juni);
                        $pengunjung_juni = $datapengunjung_juni['semua_pengunjung_juni'];
                        if($pengunjung_juni=="")
                        {
                          $pengunjung_juni = "0";
                          
                        }
                        else
                        {
                          $pengunjung_juni = $datapengunjung_juni['semua_pengunjung_juni'];
                        }        
                      ?>
                           <?=$pengunjung_juni;?>
                        </td>
                        <td>
                        <?php
                        $total_harga_juni = mysqli_query($con, "SELECT SUM(total_harga) AS semua_harga_juni FROM tbl_pemesanan WHERE stts='Y' AND bulan='Juni' AND tahun='$tahunsekarang' AND nama_mitra='$nama_mitra' ") or die (mysqli_error($con));
                        $dataharga_juni = mysqli_fetch_assoc($total_harga_juni);
                        $harga_juni = $dataharga_juni['semua_harga_juni'];
                        if($harga_juni=="")
                        {
                          $totalharga_juni= "0";
                          
                        }
                        else
                        {
                          $totalharga_juni = $harga_juni;
                        }        
                      ?>
                           Rp <?= number_format($totalharga_juni,0,",",".");?>

                          
                        </td>
                        <td>
                        <?php 
                        if ($pengunjung_juni <200)
                        {
                          $komisismitra_juni = '0';

                        }
                        if ($pengunjung_juni >=200 && $pengungjung_juni <=399)
                        {
                          $panggilkomisi_juni = mysqli_query($con,"SELECT komisi FROM tbl_komisimitra WHERE jumlah=200") or die (mysqli_error($con));
                          $datakomisi_juni = mysqli_fetch_assoc($panggilkomisi_juni);
                          $komisismitra_juni = $datakomisi_juni['komisi'];
                          
                        }
                        if ($pengunjung_juni >=400 && $pengungjung_juni <=599)
                        {
                          
                          $panggilkomisi_juni = mysqli_query($con,"SELECT komisi FROM tbl_komisimitra WHERE jumlah=400") or die (mysqli_error($con));
                          $datakomisi_juni = mysqli_fetch_assoc($panggilkomisi_juni);
                          $komisismitra_juni = $datakomisi_juni['komisi'];
                        }
                        if ($pengunjung_juni >=600)
                        {
                          
                          $panggilkomisi_juni = mysqli_query($con,"SELECT komisi FROM tbl_komisimitra WHERE jumlah=600") or die (mysqli_error($con));
                          $datakomisi_juni = mysqli_fetch_assoc($panggilkomisi_juni);
                          $komisismitra_juni = $datakomisi_juni['komisi'];
                        }
                       
                        ?>
                        <?=$komisismitra_juni;?> %
                        </td>
                        <td>
                          <?php 
                          $penghasilan_juni = ($komisismitra_juni/ 100)* $totalharga_juni;
                          ?>
                        Rp<?= number_format($penghasilan_juni ,0,",",".");?> 
                        </td>
                        <td>
                          <?php 
                        $panggilstts_komisi_juni = mysqli_query($con, "SELECT stts_komisi FROM  tbl_pemesanan WHERE stts='Y' AND bulan='Juni' AND tahun='$tahunsekarang' AND nama_mitra='$nama_mitra'") or die (mysqli_error($con));
                        $datastts_komisi_juni = mysqli_fetch_assoc($panggilstts_komisi_juni);

                        if($datastts_komisi_juni['stts_komisi']==0)
                        {
                          ?>
                          <center>
                          <button type="button" class="btn btn-xs bg-gradient-danger"> Belum di Cairkan</button>
                          </center>
                          <?php
                        }
                        else
                        {
                          ?>
                          <center>
                          <button type="button" class="btn btn-xs bg-gradient-success"> Sudah di Cairkan</button>
                          </center>
                          <?php
                        }
                        ?>
                        </td>
                        <td>
                        <center>
                        <?php
                              if($datastts_komisi_juni['stts_komisi']==0)
                              {
                                ?>
                                <center>
                                <a class="btn btn-xs btn-primary" href="pencairan.php?bulan=Juni&tahun=<?=$tahunsekarang;?>&mitra=<?=$nama_mitra;?>"><i class="nav-icon fas fa-hand-holding-usd"></i>Cairkan</a>
                                </center>
                                <?php
                              }
                              else
                              {
                                ?>
                                <center>
                                <button type="button" class="btn btn-xs bg-gradient-success" disabled> Sudah di Cairkan</button>
                                </center>
                                <?php
                              } 
                             ?>
                       </center>
                        </td>
                      </tr>

                      <tr>
                      <td>
                      7
                      </td>
                      <td>
                        Juli
                        </td>
                        <td>
                        <?php
                        $total_pengunjung_juli = mysqli_query($con, "SELECT SUM(total_pengunjung) AS semua_pengunjung_juli FROM tbl_pemesanan WHERE stts='Y' AND bulan='Juli' AND tahun='$tahunsekarang' AND nama_mitra='$nama_mitra' ") or die (mysqli_error($con));
                        $datapengunjung_juli = mysqli_fetch_assoc($total_pengunjung_juli);
                        $pengunjung_juli = $datapengunjung_juli['semua_pengunjung_juli'];
                        if($pengunjung_juli=="")
                        {
                          $pengunjung_juli = "0";
                          
                        }
                        else
                        {
                          $pengunjung_juli = $datapengunjung_juli['semua_pengunjung_juli'];
                        }        
                      ?>
                           <?=$pengunjung_juli;?>
                        </td>
                        <td>
                        <?php
                        $total_harga_juli = mysqli_query($con, "SELECT SUM(total_harga) AS semua_harga_juli FROM tbl_pemesanan WHERE stts='Y' AND bulan='Juli' AND tahun='$tahunsekarang' AND nama_mitra='$nama_mitra' ") or die (mysqli_error($con));
                        $dataharga_juli = mysqli_fetch_assoc($total_harga_juli);
                        $harga_juli = $dataharga_juli['semua_harga_juli'];
                        if($harga_juli=="")
                        {
                          $totalharga_juli= "0";
                          
                        }
                        else
                        {
                          $totalharga_juli = $harga_juli;
                        }        
                      ?>
                           Rp <?= number_format($totalharga_juli,0,",",".");?>

                          
                        </td>
                        <td>
                        <?php 
                        if ($pengunjung_juli <200)
                        {
                          $komisismitra_juli = '0';

                        }
                        if ($pengunjung_juli >=200 && $pengungjung_juli <=399)
                        {
                          $panggilkomisi_juli = mysqli_query($con,"SELECT komisi FROM tbl_komisimitra WHERE jumlah=200") or die (mysqli_error($con));
                          $datakomisi_juli = mysqli_fetch_assoc($panggilkomisi_juli);
                          $komisismitra_juli = $datakomisi_juli['komisi'];
                          
                        }
                        if ($pengunjung_juli >=400 && $pengungjung_juli <=599)
                        {
                          
                          $panggilkomisi_juli = mysqli_query($con,"SELECT komisi FROM tbl_komisimitra WHERE jumlah=400") or die (mysqli_error($con));
                          $datakomisi_juli = mysqli_fetch_assoc($panggilkomisi_juli);
                          $komisismitra_juli = $datakomisi_juli['komisi'];
                        }
                        if ($pengunjung_juli >=600)
                        {
                          
                          $panggilkomisi_juli = mysqli_query($con,"SELECT komisi FROM tbl_komisimitra WHERE jumlah=600") or die (mysqli_error($con));
                          $datakomisi_juli = mysqli_fetch_assoc($panggilkomisi_juli);
                          $komisismitra_juli = $datakomisi_juli['komisi'];
                        }
                       
                        ?>
                        <?=$komisismitra_juli;?> %
                        </td>
                        <td>
                          <?php 
                          $penghasilan_juli = ($komisismitra_juli/ 100)* $totalharga_juli;
                          ?>
                        Rp<?= number_format($penghasilan_juli ,0,",",".");?> 
                        </td>
                        <td>
                          <?php 
                        $panggilstts_komisi_juli = mysqli_query($con, "SELECT stts_komisi FROM  tbl_pemesanan WHERE stts='Y' AND bulan='Juli' AND tahun='$tahunsekarang' AND nama_mitra='$nama_mitra'") or die (mysqli_error($con));
                        $datastts_komisi_juli = mysqli_fetch_assoc($panggilstts_komisi_juli);

                        if($datastts_komisi_juli['stts_komisi']==0)
                        {
                          ?>
                          <center>
                          <button type="button" class="btn btn-xs bg-gradient-danger"> Belum di Cairkan</button>
                          </center>
                          <?php
                        }
                        else
                        {
                          ?>
                          <center>
                          <button type="button" class="btn btn-xs bg-gradient-success"> Sudah di Cairkan</button>
                          </center>
                          <?php
                        }
                        ?>
                        </td>
                        <td>
                        <center>
                        <?php
                              if($datastts_komisi_juli['stts_komisi']==0)
                              {
                                ?>
                                <center>
                                <a class="btn btn-xs btn-primary" href="pencairan.php?bulan=Juli&tahun=<?=$tahunsekarang;?>&mitra=<?=$nama_mitra;?>"><i class="nav-icon fas fa-hand-holding-usd"></i>Cairkan</a>
                                </center>
                                <?php
                              }
                              else
                              {
                                ?>
                                <center>
                                <button type="button" class="btn btn-xs bg-gradient-success" disabled> Sudah di Cairkan</button>
                                </center>
                                <?php
                              } 
                             ?>
                       </center>
                        </td>
                      </tr>

                      <tr>
                      <td>
                      8
                      </td>
                      <td>
                        Agustus
                        </td>
                        <td>
                        <?php
                        $total_pengunjung_agustus = mysqli_query($con, "SELECT SUM(total_pengunjung) AS semua_pengunjung_agustus FROM tbl_pemesanan WHERE stts='Y' AND bulan='Agustus' AND tahun='$tahunsekarang' AND nama_mitra='$nama_mitra' ") or die (mysqli_error($con));
                        $datapengunjung_agustus = mysqli_fetch_assoc($total_pengunjung_agustus);
                        $pengunjung_agustus = $datapengunjung_agustus['semua_pengunjung_agustus'];
                        if($pengunjung_agustus=="")
                        {
                          $pengunjung_agustus = "0";
                          
                        }
                        else
                        {
                          $pengunjung_agustus = $datapengunjung_agustus['semua_pengunjung_agustus'];
                        }        
                      ?>
                           <?=$pengunjung_agustus;?>
                        </td>
                        <td>
                        <?php
                        $total_harga_agustus = mysqli_query($con, "SELECT SUM(total_harga) AS semua_harga_agustus FROM tbl_pemesanan WHERE stts='Y' AND bulan='Agustus' AND tahun='$tahunsekarang' AND nama_mitra='$nama_mitra' ") or die (mysqli_error($con));
                        $dataharga_agustus = mysqli_fetch_assoc($total_harga_agustus);
                        $harga_agustus = $dataharga_agustus['semua_harga_agustus'];
                        if($harga_agustus=="")
                        {
                          $totalharga_agustus= "0";
                          
                        }
                        else
                        {
                          $totalharga_agustus = $harga_agustus;
                        }        
                      ?>
                           Rp <?= number_format($totalharga_agustus,0,",",".");?>

                          
                        </td>
                        <td>
                        <?php 
                        if ($pengunjung_agustus <200)
                        {
                          $komisismitra_agustus = '0';

                        }
                        if ($pengunjung_agustus >=200 && $pengungjung_agustus <=399)
                        {
                          $panggilkomisi_agustus = mysqli_query($con,"SELECT komisi FROM tbl_komisimitra WHERE jumlah=200") or die (mysqli_error($con));
                          $datakomisi_agustus = mysqli_fetch_assoc($panggilkomisi_agustus);
                          $komisismitra_agustus = $datakomisi_agustus['komisi'];
                          
                        }
                        if ($pengunjung_agustus >=400 && $pengungjung_agustus <=599)
                        {
                          
                          $panggilkomisi_agustus = mysqli_query($con,"SELECT komisi FROM tbl_komisimitra WHERE jumlah=400") or die (mysqli_error($con));
                          $datakomisi_agustus = mysqli_fetch_assoc($panggilkomisi_agustus);
                          $komisismitra_agustus = $datakomisi_agustus['komisi'];
                        }
                        if ($pengunjung_agustus >=600)
                        {
                          
                          $panggilkomisi_agustus = mysqli_query($con,"SELECT komisi FROM tbl_komisimitra WHERE jumlah=600") or die (mysqli_error($con));
                          $datakomisi_agustus = mysqli_fetch_assoc($panggilkomisi_agustus);
                          $komisismitra_agustus = $datakomisi_agustus['komisi'];
                        }
                       
                        ?>
                        <?=$komisismitra_agustus;?> %
                        </td>
                        <td>
                          <?php 
                          $penghasilan_agustus = ($komisismitra_agustus/ 100)* $totalharga_agustus;
                          ?>
                        Rp<?= number_format($penghasilan_agustus ,0,",",".");?> 
                        </td>
                        <td>
                          <?php 
                        $panggilstts_komisi_agustus = mysqli_query($con, "SELECT stts_komisi FROM  tbl_pemesanan WHERE stts='Y' AND bulan='Agustus' AND tahun='$tahunsekarang' AND nama_mitra='$nama_mitra'") or die (mysqli_error($con));
                        $datastts_komisi_agustus = mysqli_fetch_assoc($panggilstts_komisi_agustus);

                        if($datastts_komisi_agustus['stts_komisi']==0)
                        {
                          ?>
                          <center>
                          <button type="button" class="btn btn-xs bg-gradient-danger"> Belum di Cairkan</button>
                          </center>
                          <?php
                        }
                        else
                        {
                          ?>
                          <center>
                          <button type="button" class="btn btn-xs bg-gradient-success"> Sudah di Cairkan</button>
                          </center>
                          <?php
                        }
                        ?>
                        </td>
                        <td>
                        <center>
                        <?php
                              if($datastts_komisi_agustus['stts_komisi']==0)
                              {
                                ?>
                                <center>
                                <a class="btn btn-xs btn-primary" href="pencairan.php?bulan=Agustus&tahun=<?=$tahunsekarang;?>&mitra=<?=$nama_mitra;?>"><i class="nav-icon fas fa-hand-holding-usd"></i>Cairkan</a>
                                </center>
                                <?php
                              }
                              else
                              {
                                ?>
                                <center>
                                <button type="button" class="btn btn-xs bg-gradient-success" disabled> Sudah di Cairkan</button>
                                </center>
                                <?php
                              } 
                             ?>
                       </center>
                        </td>
                      </tr>

                      <tr>
                      <td>
                      9
                      </td>
                      <td>
                        September
                        </td>
                        <td>
                        <?php
                        $total_pengunjung_september = mysqli_query($con, "SELECT SUM(total_pengunjung) AS semua_pengunjung_september FROM tbl_pemesanan WHERE stts='Y' AND bulan='September' AND tahun='$tahunsekarang' AND nama_mitra='$nama_mitra' ") or die (mysqli_error($con));
                        $datapengunjung_september = mysqli_fetch_assoc($total_pengunjung_september);
                        $pengunjung_september = $datapengunjung_september['semua_pengunjung_september'];
                        if($pengunjung_september=="")
                        {
                          $pengunjung_september= "0";
                          
                        }
                        else
                        {
                          $pengunjung_september = $datapengunjung_september['semua_pengunjung_september'];
                        }        
                      ?>
                           <?=$pengunjung_september;?>
                        </td>
                        <td>
                        <?php
                        $total_harga_september = mysqli_query($con, "SELECT SUM(total_harga) AS semua_harga_september FROM tbl_pemesanan WHERE stts='Y' AND bulan='September' AND tahun='$tahunsekarang' AND nama_mitra='$nama_mitra' ") or die (mysqli_error($con));
                        $dataharga_september = mysqli_fetch_assoc($total_harga_september);
                        $harga_september = $dataharga_september['semua_harga_september'];
                        if($harga_september=="")
                        {
                          $totalharga_september= "0";
                          
                        }
                        else
                        {
                          $totalharga_september = $harga_september;
                        }        
                      ?>
                           Rp <?= number_format($totalharga_september,0,",",".");?>

                          
                        </td>
                        <td>
                        <?php 
                        if ($pengunjung_september <200)
                        {
                          $komisismitra_september = '0';

                        }
                        if ($pengunjung_september >=200 && $pengungjung_september <=399)
                        {
                          $panggilkomisi_september = mysqli_query($con,"SELECT komisi FROM tbl_komisimitra WHERE jumlah=200") or die (mysqli_error($con));
                          $datakomisi_september = mysqli_fetch_assoc($panggilkomisi_september);
                          $komisismitra_september = $datakomisi_september['komisi'];
                          
                        }
                        if ($pengunjung_september >=400 && $pengungjung_september <=599)
                        {
                          
                          $panggilkomisi_september = mysqli_query($con,"SELECT komisi FROM tbl_komisimitra WHERE jumlah=400") or die (mysqli_error($con));
                          $datakomisi_september = mysqli_fetch_assoc($panggilkomisi_september);
                          $komisismitra_september = $datakomisi_september['komisi'];
                        }
                        if ($pengunjung_september >=600)
                        {
                          
                          $panggilkomisi_september = mysqli_query($con,"SELECT komisi FROM tbl_komisimitra WHERE jumlah=600") or die (mysqli_error($con));
                          $datakomisi_september = mysqli_fetch_assoc($panggilkomisi_september);
                          $komisismitra_september = $datakomisi_september['komisi'];
                        }
                       
                        ?>
                        <?=$komisismitra_september;?> %
                        </td>
                        <td>
                          <?php 
                          $penghasilan_september = ($komisismitra_september/ 100)* $totalharga_september;
                          ?>
                        Rp<?= number_format($penghasilan_september ,0,",",".");?> 
                        </td>
                        <td>
                          <?php 
                        $panggilstts_komisi_september = mysqli_query($con, "SELECT stts_komisi FROM  tbl_pemesanan WHERE stts='Y' AND bulan='September' AND tahun='$tahunsekarang' AND nama_mitra='$nama_mitra'") or die (mysqli_error($con));
                        $datastts_komisi_september = mysqli_fetch_assoc($panggilstts_komisi_september);

                        if($datastts_komisi_september['stts_komisi']==0)
                        {
                          ?>
                          <center>
                          <button type="button" class="btn btn-xs bg-gradient-danger"> Belum di Cairkan</button>
                          </center>
                          <?php
                        }
                        else
                        {
                          ?>
                          <center>
                          <button type="button" class="btn btn-xs bg-gradient-success"> Sudah di Cairkan</button>
                          </center>
                          <?php
                        }
                        ?>
                        </td>
                        <td>
                        <center>
                        <?php
                              if($datastts_komisi_september['stts_komisi']==0)
                              {
                                ?>
                                <center>
                                <a class="btn btn-xs btn-primary" href="pencairan.php?bulan=September&tahun=<?=$tahunsekarang;?>&mitra=<?=$nama_mitra;?>"><i class="nav-icon fas fa-hand-holding-usd"></i>Cairkan</a>
                                </center>
                                <?php
                              }
                              else
                              {
                                ?>
                                <center>
                                <button type="button" class="btn btn-xs bg-gradient-success" disabled> Sudah di Cairkan</button>
                                </center>
                                <?php
                              } 
                             ?>
                       </center>
                        </td>
                      </tr>

                      <tr>
                      <td>
                      10
                      </td>
                      <td>
                        Oktober
                        </td>
                        <td>
                        <?php
                        $total_pengunjung_oktober = mysqli_query($con, "SELECT SUM(total_pengunjung) AS semua_pengunjung_oktober FROM tbl_pemesanan WHERE stts='Y' AND bulan='Oktober' AND tahun='$tahunsekarang' AND nama_mitra='$nama_mitra' ") or die (mysqli_error($con));
                        $datapengunjung_oktober = mysqli_fetch_assoc($total_pengunjung_oktober);
                        $pengunjung_oktober = $datapengunjung_oktober['semua_pengunjung_oktober'];
                        if($pengunjung_oktober=="")
                        {
                          $pengunjung_oktober= "0";
                          
                        }
                        else
                        {
                          $pengunjung_oktober = $datapengunjung_oktober['semua_pengunjung_oktober'];
                        }        
                      ?>
                           <?=$pengunjung_oktober;?>
                        </td>
                        <td>
                        <?php
                        $total_harga_oktober = mysqli_query($con, "SELECT SUM(total_harga) AS semua_harga_oktober FROM tbl_pemesanan WHERE stts='Y' AND bulan='Oktober' AND tahun='$tahunsekarang' AND nama_mitra='$nama_mitra' ") or die (mysqli_error($con));
                        $dataharga_oktober = mysqli_fetch_assoc($total_harga_oktober);
                        $harga_oktober = $dataharga_oktober['semua_harga_oktober'];
                        if($harga_oktober=="")
                        {
                          $totalharga_oktober= "0";
                          
                        }
                        else
                        {
                          $totalharga_oktober = $harga_oktober;
                        }        
                      ?>
                           Rp <?= number_format($totalharga_oktober,0,",",".");?>

                          
                        </td>
                        <td>
                        <?php 
                        if ($pengunjung_oktober <200)
                        {
                          $komisismitra_oktober = '0';

                        }
                        if ($pengunjung_oktober >=200 && $pengungjung_oktober <=399)
                        {
                          $panggilkomisi_oktober = mysqli_query($con,"SELECT komisi FROM tbl_komisimitra WHERE jumlah=200") or die (mysqli_error($con));
                          $datakomisi_oktober = mysqli_fetch_assoc($panggilkomisi_oktober);
                          $komisismitra_oktober = $datakomisi_oktober['komisi'];
                          
                        }
                        if ($pengunjung_oktober >=400 && $pengungjung_oktober <=599)
                        {
                          
                          $panggilkomisi_oktober = mysqli_query($con,"SELECT komisi FROM tbl_komisimitra WHERE jumlah=400") or die (mysqli_error($con));
                          $datakomisi_oktober = mysqli_fetch_assoc($panggilkomisi_oktober);
                          $komisismitra_oktober = $datakomisi_oktober['komisi'];
                        }
                        if ($pengunjung_oktober >=600)
                        {
                          
                          $panggilkomisi_oktober = mysqli_query($con,"SELECT komisi FROM tbl_komisimitra WHERE jumlah=600") or die (mysqli_error($con));
                          $datakomisi_oktober = mysqli_fetch_assoc($panggilkomisi_oktober);
                          $komisismitra_oktober = $datakomisi_oktober['komisi'];
                        }
                       
                        ?>
                        <?=$komisismitra_oktober;?> %
                        </td>
                        <td>
                          <?php 
                          $penghasilan_oktober = ($komisismitra_oktober/ 100)* $totalharga_oktober;
                          ?>
                        Rp<?= number_format($penghasilan_oktober ,0,",",".");?> 
                        </td>
                        <td>
                          <?php 
                        $panggilstts_komisi_oktober = mysqli_query($con, "SELECT stts_komisi FROM  tbl_pemesanan WHERE stts='Y' AND bulan='Oktober' AND tahun='$tahunsekarang' AND nama_mitra='$nama_mitra'") or die (mysqli_error($con));
                        $datastts_komisi_oktober = mysqli_fetch_assoc($panggilstts_komisi_oktober);

                        if($datastts_komisi_oktober['stts_komisi']==0)
                        {
                          ?>
                          <center>
                          <button type="button" class="btn btn-xs bg-gradient-danger"> Belum di Cairkan</button>
                          </center>
                          <?php
                        }
                        else
                        {
                          ?>
                          <center>
                          <button type="button" class="btn btn-xs bg-gradient-success"> Sudah di Cairkan</button>
                          </center>
                          <?php
                        }
                        ?>
                        </td>
                        <td>
                        <center>
                        <?php
                              if($datastts_komisi_oktober['stts_komisi']==0)
                              {
                                ?>
                                <center>
                                <a class="btn btn-xs btn-primary" href="pencairan.php?bulan=Oktober&tahun=<?=$tahunsekarang;?>&mitra=<?=$nama_mitra;?>"><i class="nav-icon fas fa-hand-holding-usd"></i>Cairkan</a>
                                </center>
                                <?php
                              }
                              else
                              {
                                ?>
                                <center>
                                <button type="button" class="btn btn-xs bg-gradient-success" disabled> Sudah di Cairkan</button>
                                </center>
                                <?php
                              } 
                             ?>
                       </center>
                        </td>
                      </tr>

                      <tr>
                      <td>
                      11
                      </td>
                      <td>
                        November
                        </td>
                        <td>
                        <?php
                        $total_pengunjung_november = mysqli_query($con, "SELECT SUM(total_pengunjung) AS semua_pengunjung_november FROM tbl_pemesanan WHERE stts='Y' AND bulan='November' AND tahun='$tahunsekarang' AND nama_mitra='$nama_mitra' ") or die (mysqli_error($con));
                        $datapengunjung_november = mysqli_fetch_assoc($total_pengunjung_november);
                        $pengunjung_november = $datapengunjung_november['semua_pengunjung_november'];
                        if($pengunjung_november=="")
                        {
                          $pengunjung_november = "0";
                          
                        }
                        else
                        {
                          $pengunjung_november = $datapengunjung_november['semua_pengunjung_november'];
                        }        
                      ?>
                           <?=$pengunjung_november;?>
                        </td>
                        <td>
                        <?php
                        $total_harga_november = mysqli_query($con, "SELECT SUM(total_harga) AS semua_harga_november FROM tbl_pemesanan WHERE stts='Y' AND bulan='November' AND tahun='$tahunsekarang' AND nama_mitra='$nama_mitra' ") or die (mysqli_error($con));
                        $dataharga_november = mysqli_fetch_assoc($total_harga_november);
                        $harga_november = $dataharga_november['semua_harga_november'];
                        if($harga_november=="")
                        {
                          $totalharga_november= "0";
                          
                        }
                        else
                        {
                          $totalharga_november = $harga_november;
                        }        
                      ?>
                           Rp <?= number_format($totalharga_november,0,",",".");?>

                          
                        </td>
                        <td>
                        <?php 
                        if ($pengunjung_november <200)
                        {
                          $komisismitra_november = '0';

                        }
                        if ($pengunjung_november >=200 && $pengungjung_november <=399)
                        {
                          $panggilkomisi_november = mysqli_query($con,"SELECT komisi FROM tbl_komisimitra WHERE jumlah=200") or die (mysqli_error($con));
                          $datakomisi_november = mysqli_fetch_assoc($panggilkomisi_november);
                          $komisismitra_november = $datakomisi_november['komisi'];
                          
                        }
                        if ($pengunjung_november >=400 && $pengungjung_november <=599)
                        {
                          
                          $panggilkomisi_november = mysqli_query($con,"SELECT komisi FROM tbl_komisimitra WHERE jumlah=400") or die (mysqli_error($con));
                          $datakomisi_november = mysqli_fetch_assoc($panggilkomisi_november);
                          $komisismitra_november = $datakomisi_november['komisi'];
                        }
                        if ($pengunjung_november >=600)
                        {
                          
                          $panggilkomisi_november = mysqli_query($con,"SELECT komisi FROM tbl_komisimitra WHERE jumlah=600") or die (mysqli_error($con));
                          $datakomisi_november = mysqli_fetch_assoc($panggilkomisi_november);
                          $komisismitra_november = $datakomisi_november['komisi'];
                        }
                       
                        ?>
                        <?=$komisismitra_november;?> %
                        </td>
                        <td>
                          <?php 
                          $penghasilan_november = ($komisismitra_november/ 100)* $totalharga_november;
                          ?>
                        Rp<?= number_format($penghasilan_november ,0,",",".");?> 
                        </td>
                        <td>
                          <?php 
                        $panggilstts_komisi_november = mysqli_query($con, "SELECT stts_komisi FROM  tbl_pemesanan WHERE stts='Y' AND bulan='November' AND tahun='$tahunsekarang' AND nama_mitra='$nama_mitra'") or die (mysqli_error($con));
                        $datastts_komisi_november = mysqli_fetch_assoc($panggilstts_komisi_november);

                        if($datastts_komisi_november['stts_komisi']==0)
                        {
                          ?>
                          <center>
                          <button type="button" class="btn btn-xs bg-gradient-danger"> Belum di Cairkan</button>
                          </center>
                          <?php
                        }
                        else
                        {
                          ?>
                          <center>
                          <button type="button" class="btn btn-xs bg-gradient-success"> Sudah di Cairkan</button>
                          </center>
                          <?php
                        }
                        ?>
                        </td>
                        <td>
                        <center>
                        <?php
                              if($datastts_komisi_november['stts_komisi']==0)
                              {
                                ?>
                                <center>
                                <a class="btn btn-xs btn-primary" href="pencairan.php?bulan=November&tahun=<?=$tahunsekarang;?>&mitra=<?=$nama_mitra;?>"><i class="nav-icon fas fa-hand-holding-usd"></i>Cairkan</a>
                                </center>
                                <?php
                              }
                              else
                              {
                                ?>
                                <center>
                                <button type="button" class="btn btn-xs bg-gradient-success" disabled> Sudah di Cairkan</button>
                                </center>
                                <?php
                              } 
                             ?>
                       </center>
                        </td>
                      </tr>

                      <tr>
                      <td>
                      12
                      </td>
                      <td>
                        Desember
                        </td>
                        <td>
                        <?php
                        $total_pengunjung_desember = mysqli_query($con, "SELECT SUM(total_pengunjung) AS semua_pengunjung_desember FROM tbl_pemesanan WHERE stts='Y' AND bulan='Desember' AND tahun='$tahunsekarang' AND nama_mitra='$nama_mitra' ") or die (mysqli_error($con));
                        $datapengunjung_desember = mysqli_fetch_assoc($total_pengunjung_desember);
                        $pengunjung_desember = $datapengunjung_desember['semua_pengunjung_desember'];
                        if($pengunjung_desember=="")
                        {
                          $pengunjung_desember = "0";
                          
                        }
                        else
                        {
                          $pengunjung_desember = $datapengunjung_desember['semua_pengunjung_desember'];
                        }        
                      ?>
                           <?=$pengunjung_desember;?>
                        </td>
                        <td>
                        <?php
                        $total_harga_desember = mysqli_query($con, "SELECT SUM(total_harga) AS semua_harga_desember FROM tbl_pemesanan WHERE stts='Y' AND bulan='Desember' AND tahun='$tahunsekarang' AND nama_mitra='$nama_mitra' ") or die (mysqli_error($con));
                        $dataharga_desember = mysqli_fetch_assoc($total_harga_desember);
                        $harga_desember = $dataharga_desember['semua_harga_desember'];
                        if($harga_desember=="")
                        {
                          $totalharga_desember= "0";
                          
                        }
                        else
                        {
                          $totalharga_desember = $harga_desember;
                        }        
                      ?>
                           Rp <?= number_format($totalharga_desember,0,",",".");?>

                          
                        </td>
                        <td>
                        <?php 
                        if ($pengunjung_desember <200)
                        {
                          $komisismitra_desember = '0';

                        }
                        if ($pengunjung_desember >=200 && $pengungjung_desember <=399)
                        {
                          $panggilkomisi_desember = mysqli_query($con,"SELECT komisi FROM tbl_komisimitra WHERE jumlah=200") or die (mysqli_error($con));
                          $datakomisi_desember = mysqli_fetch_assoc($panggilkomisi_desember);
                          $komisismitra_desember = $datakomisi_desember['komisi'];
                          
                        }
                        if ($pengunjung_desember >=400 && $pengungjung_desember <=599)
                        {
                          
                          $panggilkomisi_desember = mysqli_query($con,"SELECT komisi FROM tbl_komisimitra WHERE jumlah=400") or die (mysqli_error($con));
                          $datakomisi_desember = mysqli_fetch_assoc($panggilkomisi_desember);
                          $komisismitra_desember = $datakomisi_desember['komisi'];
                        }
                        if ($pengunjung_desember >=600)
                        {
                          
                          $panggilkomisi_desember = mysqli_query($con,"SELECT komisi FROM tbl_komisimitra WHERE jumlah=600") or die (mysqli_error($con));
                          $datakomisi_desember = mysqli_fetch_assoc($panggilkomisi_desember);
                          $komisismitra_desember = $datakomisi_desember['komisi'];
                        }
                       
                        ?>
                        <?=$komisismitra_desember;?> %
                        </td>
                        <td>
                          <?php 
                          $penghasilan_desember = ($komisismitra_desember/ 100)* $totalharga_desember;
                          ?>
                        Rp<?= number_format($penghasilan_desember ,0,",",".");?> 
                        </td>
                        <td>
                          <?php 
                        $panggilstts_komisi_desember = mysqli_query($con, "SELECT stts_komisi FROM  tbl_pemesanan WHERE stts='Y' AND bulan='Desember' AND tahun='$tahunsekarang' AND nama_mitra='$nama_mitra'") or die (mysqli_error($con));
                        $datastts_komisi_desember = mysqli_fetch_assoc($panggilstts_komisi_desember);

                        if($datastts_komisi_desember['stts_komisi']==0)
                        {
                          ?>
                          <center>
                          <button type="button" class="btn btn-xs bg-gradient-danger"> Belum di Cairkan</button>
                          </center>
                          <?php
                        }
                        else
                        {
                          ?>
                          <center>
                          <button type="button" class="btn btn-xs bg-gradient-success"> Sudah di Cairkan</button>
                          </center>
                          <?php
                        }
                        ?>
                        </td>
                        <td>
                        <center>
                        <?php
                              if($datastts_komisi_desember['stts_komisi']==0)
                              {
                                ?>
                                <center>
                                <a class="btn btn-xs btn-primary" href="pencairan.php?bulan=Desember&tahun=<?=$tahunsekarang;?>&mitra=<?=$nama_mitra;?>"><i class="nav-icon fas fa-hand-holding-usd"></i>Cairkan</a>
                                </center>
                                <?php
                              }
                              else
                              {
                                ?>
                                <center>
                                <button type="button" class="btn btn-xs bg-gradient-success" disabled> Sudah di Cairkan</button>
                                </center>
                                <?php
                              } 
                             ?>
                       </center>
                        </td>
                      </tr>

                    
              
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
              <input type="text" name="no_tiket" id="notiket" required>
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
              <label for="exampleInputEmail1">Nomer Hp</label>
              <input type="number" class="form-control" name="no_hp" placeholder="+62" required>
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
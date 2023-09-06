<?php 
  require_once "../database/config.php";

  $querygambar1 = mysqli_query($con, "SELECT * FROM tbl_image_slider WHERE id = '1' ") or die(mysqli_error($con));
  $querygambar2 = mysqli_query($con, "SELECT * FROM tbl_image_slider WHERE id = '2' ") or die(mysqli_error($con));
  $querygambar3 = mysqli_query($con, "SELECT * FROM tbl_image_slider WHERE id = '3' ") or die(mysqli_error($con));
  $querygambar4 = mysqli_query($con, "SELECT * FROM tbl_image_slider WHERE id = '4' ") or die(mysqli_error($con));

    $data1 = mysqli_fetch_assoc($querygambar1);
    $data2 = mysqli_fetch_assoc($querygambar2);
    $data3 = mysqli_fetch_assoc($querygambar3);
    $data4 = mysqli_fetch_assoc($querygambar4);
?>
<!DOCTYPE html>
<html class="no-js" lang="">

<head>
  <meta charset="utf-8">
  <title>Local Pride Market</title>
  <meta name="description" content="">
  <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1, maximum-scale=1">
  <link rel="stylesheet" href="styles/app.min.css"/>
  <link rel="shortcut icon" href="img/profile.jpg">
</head>

<body class="page-loading">
  <!-- page loading spinner -->
  <div class="pageload">
    <div class="pageload-inner">
      <div class="sk-rotating-plane"></div>
    </div>
  </div>
  <!-- /page loading spinner -->
  <div class="app signin v2 usersession">
    <div class="session-wrapper">
      <div class="session-carousel slide" data-ride="carousel" data-interval="3000">
        <!-- Wrapper for slides -->
        <div class="carousel-inner" role="listbox">
          <div class="item active" style="background-image:url(<?=$data1['path_image'];?>);background-size:cover;background-repeat: no-repeat;background-position: 50% 50%;">
          </div>
           <div class="item" style="background-image:url(<?=$data2['path_image'];?>);background-size:cover;background-repeat: no-repeat;background-position: 50% 50%;">
          </div>
          <div class="item" style="background-image:url(<?=$data3['path_image'];?>);background-size:cover;background-repeat: no-repeat;background-position: 50% 50%;">
          </div>
          <div class="item" style="background-image:url(<?=$data4['path_image'];?>);background-size:cover;background-repeat: no-repeat;background-position: 50% 50%;">
          </div>
        </div>
      </div>
      <div class="card bg-white  blue no-border" style="background-color:#ffffff;">
        <div class="card-block">
          <form role="form" class="form-layout" action="" method="post">
            <div class="text-center m-b">    

              <img src="img/profile.jpg" style='width:200px; height:200px;'/> 
              <h4 class="text-uppercase"><b><font color="#005caf">Berbagai Sepatu Lokal</font></b></h4>
              <h4 class="text-uppercase"><font color="#005caf">Local Pride Market</font></h4>
            </div>
            <div class="form-inputs p-b">
              <label class="text-uppercase"><font color="#005caf">Nomer HP</font></label>
              <input type="nomer_hp" class="form-control input-lg" name="nomer_hp" id="nomer_hp" placeholder="Nomer HP" required>
              <label class="text-uppercase"><font color="#005caf">PASSWORD</font></label>
              <input type="password" class="form-control input-lg" name="password" id="password"  placeholder="Password" required>
              <!-- <a href="lupapassword.php"><font color="#ffffff">Lupa Password?</font></a>
             --></div>
              
               <button class="btn btn-primary btn-block btn-lg" type="submit" name= "login" style="background-color:#005caf;"><font color="#ffffff"><img src="img/personkeyw.png">&nbsp<b>Login</b></font></button>
          <br>
          <center><font color="#005caf"><small><em> Copyright &copy; Local Pride Market </a></em></</small></font>
          <br/>  
           <font color="#005caf"><?php echo date("Y"); ?></</small></font>
            </center>
          </form>
          <?php
          if(isset($_POST['login']))
          {
                    $nomer_hp  = trim(mysqli_real_escape_string($con, $_POST['nomer_hp']));
                    $password  = sha1(trim(mysqli_real_escape_string($con, $_POST['password'])));
                    
                  $sql_login = mysqli_query($con, "SELECT * FROM tbl_pengguna WHERE nomer_hp = '$nomer_hp' AND kata_sandi = '$password'") or die(mysqli_error($con));
                        
                           if(mysqli_num_rows($sql_login) > 0 )
                           {
                            $data = mysqli_fetch_array($sql_login);
                            $peran = $data['peran'];
                            $nama = $data['nama_pengguna'];

                              if ($peran=="Admin")
                              {
                                session_start();
                                $_SESSION['user'] = $nomer_hp;
                                $_SESSION['nama'] = $nama;
                                $_SESSION['peran'] = $peran;
                                echo "<script>window.location='../backoffice';</script>";
                              }
                              elseif ($peran=="petugas")
                              {
                                session_start();
                                $_SESSION['user'] = $nomer_hp;
                                $_SESSION['nama'] = $nama;
                                $_SESSION['peran'] = $peran;
                                echo "<script>window.location='../petugas_backoffice';</script>";
                              }
                              elseif ($peran=="mitra")
                              {
                                session_start();
                                $_SESSION['user'] = $nomer_hp;
                                $_SESSION['nama'] = $nama;
                                $_SESSION['peran'] = $peran;
                                echo "<script>window.location='../mitra_backoffice';</script>";
                              }
                              else
                              {
                                echo "<script>window.location='../gagal';</script>";
                              }
                           }
                           else
                           {
                              echo "<script>window.location='../gagal';</script>";
                           }
           }             
                      ?>
        </div>
      </div>
    </div>
  </div>
 <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <script src="scripts/app.min.js"></script>
</body>

</html>
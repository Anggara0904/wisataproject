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
          <div class="item active" style="background-image:url(<?='../auth/'.$data1['path_image'];?>);background-size:cover;background-repeat: no-repeat;background-position: 50% 50%;">
          </div>
           <div class="item" style="background-image:url(<?='../auth/'.$data2['path_image'];?>);background-size:cover;background-repeat: no-repeat;background-position: 50% 50%;">
          </div>
          <div class="item" style="background-image:url(<?='../auth/'.$data3['path_image'];?>);background-size:cover;background-repeat: no-repeat;background-position: 50% 50%;">
          </div>
          <div class="item" style="background-image:url(<?='../auth/'.$data4['path_image'];?>);background-size:cover;background-repeat: no-repeat;background-position: 50% 50%;">
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
              <label class="text-uppercase"><font color="#005caf">USERNAME</font></label>
              <input type="username" class="form-control input-lg" name="username" id="username" placeholder="Username" required>
              <label class="text-uppercase"><font color="#005caf">PASSWORD</font></label>
              <input type="password" class="form-control input-lg" name="password" id="password"  placeholder="Password" required>
              <!-- <a href="lupapassword.php"><font color="#ffffff">Lupa Password?</font></a>
             --></div>
              
               <button class="btn btn-warning btn-block btn-lg" type="submit" name= "login" style="background-color:#16537e;"><font color="#ffffff"><img src="img/personkeyw.png">&nbsp<b>Login</b></font></button>
          <br>
          <center><font color="#005caf"><small><em> Copyright &copy; Local Pride Market </a></em></</small></font>
          <br/>  
           <font color="#005caf"><?php echo date("Y"); ?></</small></font>
            </center>
          </form>
          <?php
if(isset($_POST['login']))
          {
            $username  = trim(mysqli_real_escape_string($con, $_POST['username']));
            $password  = sha1(trim(mysqli_real_escape_string($con, $_POST['password'])));
            
$sql_login = mysqli_query($con, "SELECT * FROM tbl_pengguna WHERE username = '$username' AND kata_sandi = '$password'") or die(mysqli_error($con));
                        
                           if(mysqli_num_rows($sql_login) > 0 )
                           {
                            $data = mysqli_fetch_array($sql_login);
                            $nip = $data['NIP'];
                            $nama = $data['nama_pengguna'];
                             session_start();
                             $_SESSION['user'] = $username;
                             $_SESSION['nama'] = $nama;
                             $_SESSION['nip'] = $nip;
                             echo "<script>window.location='../backoffice';</script>";
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
  <div class="push"></div> 
  <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog modal-md">
      <div class="modal-content">
        <div class="modal-header" style="background-color:#ADD8E6;">
          <h4 class="modal-title"><font color="#000000">AKSES MASUK GAGAL!</font></h4>
        </div>
        <div class="modal-body">
          <h5><p><b>Cuyy, sepertinya terdapat kegagalan akses masuk ke sistem</b></p>
          <p>kayaknya Username atau password yang lu masukin salah, silahkan mencoba kembali yaaa cuy, Jika anda lupa password anda, silahkan hubungi administrator untuk melakukan reset password anda </p></h5>
           <p></p>
           <h5><p> Okee cuyyy, Enjoy aman! </p></h5>
        </div>
        <div class="modal-footer" style="background-color:#001f3f;">
          <button type="button" class="btn btn-default" data-dismiss="modal"><font color="#000000"><b> TUTUP </b></font></button>
        </div>
      </div>
    </div>
  </div>
</div>
 <script type="text/javascript">
    $(window).on('load',function(){
        $('#myModal').modal('show');
    });
</script>

</body>

</html>

<nav class="main-header navbar navbar-expand navbar-dark navbar-light" style="background-color:#005caf;">     
<!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <!-- Notifications Dropdown Menu -->
      <li class="nav-item dropdown">
        <a class="nav-link" data-toggle="dropdown" href="#">
        Assalamualaikum wr.wb, <?=$_SESSION['nama'];?> &nbsp&nbsp
        <i class="fas fa-user"></i>
        </a>
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
          <div class="dropdown-divider"></div>
          <a href="../ganti_pass" class="dropdown-item">
            <i class="fas fa-lock mr-2"></i> Ganti Password
          </a>
          <a href="../auth/logout.php" class="dropdown-item">
            <i class="fas fa-arrow-left mr-2"></i> Keluar Sistem
          </a>
          </div>
      </li>
    </ul>
</nav>
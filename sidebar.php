<aside class="main-sidebar sidebar-dark-primary elevation-4" style="background-color:#005caf">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
      <img src="../auth/img/profile.jpg" alt="profil" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">Wisata CiPanas</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      
      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->

          <li class="nav-item">
            <a href="../backoffice" class="nav-link <?php if ($halaman=='backoffice'){echo 'active';}?> ">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dasbor
              </p>
            </a>
          </li>

          <li class="nav-item">
            <a href="../backoffice_data_pengguna" class="nav-link <?php if ($halaman=='datapengguna'){echo 'active';}?> ">
              <i class="nav-icon fas fa-users"></i>
              <p>
                Data Petugas
              </p>
            </a>
          </li>

          <li class="nav-item">
            <a href="../backoffice_data_mitra" class="nav-link <?php if ($halaman=='datamitra'){echo 'active';}?> ">
              <i class="nav-icon fas fa-handshake"></i>
              <p>
                Data Mitra
              </p>
            </a>
          </li>

        <li class="nav-item">
            <a href="../backoffice_data_pemesanan" class="nav-link <?php if ($halaman=='datapemesanan'){echo 'active';}?> ">
              <i class="nav-icon fas fa-home"></i>
              <p>
                Data Pemesanan Tiket
              </p>
            </a>
        </li>

        <li class="nav-item">
            <a href="../backoffice_penjualan_tiket" class="nav-link <?php if ($halaman=='penjualan'){echo 'active';}?> ">
              <i class="nav-icon fas fa-hand-holding-usd"></i>
              <p>
                Penjualan Tiket
              </p>
            </a>
        </li>
        
        <li class="nav-item">
            <a href="../backoffice_setingharga_tiket" class="nav-link <?php if ($halaman=='setingharga'){echo 'active';}?> ">
              <i class="nav-icon fas fa-dollar-sign"></i>
              <p>
                Setting Harga Tiket
              </p>
            </a>
        </li>

        <li class="nav-item">
            <a href="../backoffice_seting_komisimitra" class="nav-link <?php if ($halaman=='komisi_mitra'){echo 'active';}?> ">
              <i class="nav-icon fas fa-dollar-sign"></i>
              <p>
                Setting Komisi Mitra
              </p>
            </a>
        </li>

        <li class="nav-item">
            <a href="../ganti_pass" class="nav-link <?php if ($halaman=='ganti_pass'){echo 'active';}?> ">
              <i class="nav-icon fas fa-lock"></i>
              <p>
                Ganti Password
              </p>
            </a>
        </li>

          <li class="nav-item">
            <a href="../auth/logout.php" class="nav-link">
              <i class="nav-icon fas fa-sign-out-alt"></i>
              <p>
                Keluar
              </p>
            </a>
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>
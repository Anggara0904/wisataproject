<aside class="main-sidebar sidebar-dark-primary elevation-4" style="background-color:#005caf">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
      <img src="../auth/img/wisata.png" alt="profil" class="brand-image img-circle elevation-4" style="opacity: .6">
      <span class="brand-text font-weight-light">Petugas Wisata</span>
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
            <a href="../petugas_backoffice" class="nav-link <?php if ($halaman=='petugasbackoffice'){echo 'active';}?> ">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dasbor
              </p>
            </a>
          </li>

          <li class="nav-item">
            <a href="../petugas_data_pemesanan" class="nav-link <?php if ($halaman=='petugasdatapemesanan'){echo 'active';}?> ">
              <i class="nav-icon fas fa-users"></i>
              <p>
                Pemesanan Tiket
              </p>
            </a>
        </li>

        <li class="nav-item">
            <a href="../petugas_data_penjualan" class="nav-link <?php if ($halaman=='petugasdatapenjualantiket'){echo 'active';}?> ">
              <i class="nav-icon fas fa-money-bill-alt"></i>
              <p>
                Penjualan Tiket
              </p>
            </a>
        </li>

        <li class="nav-item">
            <a href="../petugas_ganti_pass" class="nav-link <?php if ($halaman=='petugasgantipass'){echo 'active';}?> ">
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
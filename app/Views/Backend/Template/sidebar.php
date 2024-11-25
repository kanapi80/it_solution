 <!-- ======= Sidebar ======= -->
 <aside id="sidebar" class="sidebar">

<ul class="sidebar-nav" id="sidebar-nav">

  <li class="nav-item">
	<a class="nav-link collapsed" href="<?= base_url('admin/dashboard-admin'); ?>">
	  <i class="bi bi-grid"></i>
	  <span>Dashboard</span>
	</a>
  </li><!-- End Dashboard Nav -->

  <li class="nav-item">
	<a class="nav-link collapsed" data-bs-target="#components-nav" data-bs-toggle="collapse" href="#">
	  <i class="bi bi-menu-button-wide"></i><span>Simrs v2</span><i class="bi bi-chevron-down ms-auto"></i>
	</a>
	<ul id="components-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
	  <li>
		<a href="<?= base_url('page/pegawai'); ?>">
		  <i class="bi bi-circle"></i><span>Pegawai</span>
		</a>
	  </li>
	  <li>
		<a href="components-accordion.html">
		  <i class="bi bi-circle"></i><span>Ruangan</span>
		</a>
	  </li>
	  <li>
		<a href="components-badges.html">
		  <i class="bi bi-circle"></i><span>Pasien</span>
		</a>
	  </li>
	  <li>
		<a href="components-breadcrumbs.html">
		  <i class="bi bi-circle"></i><span>Tindakan</span>
		</a>
	  </li>
	 <li>
		<a href="<?= base_url('page/pengguna'); ?>">
		  <i class="bi bi-circle"></i><span>Users</span>
		</a>
	  </li>
	    <!--<li>
		<a href="components-cards.html">
		  <i class="bi bi-circle"></i><span>Cards</span>
		</a>
	  </li>
	  <li>
		<a href="components-carousel.html">
		  <i class="bi bi-circle"></i><span>Carousel</span>
		</a>
	  </li>
	  <li>
		<a href="components-list-group.html">
		  <i class="bi bi-circle"></i><span>List group</span>
		</a>
	  </li>
	  <li>
		<a href="components-modal.html">
		  <i class="bi bi-circle"></i><span>Modal</span>
		</a>
	  </li>
	  <li>
		<a href="components-tabs.html">
		  <i class="bi bi-circle"></i><span>Tabs</span>
		</a>
	  </li>
	  <li>
		<a href="components-pagination.html">
		  <i class="bi bi-circle"></i><span>Pagination</span>
		</a>
	  </li>
	  <li>
		<a href="components-progress.html">
		  <i class="bi bi-circle"></i><span>Progress</span>
		</a>
	  </li>
	  <li>
		<a href="components-spinners.html">
		  <i class="bi bi-circle"></i><span>Spinners</span>
		</a>
	  </li>
	  <li>
		<a href="components-tooltips.html">
		  <i class="bi bi-circle"></i><span>Tooltips</span>
		</a>
	  </li> -->
	</ul>
  </li><!-- End Components Nav -->

  <li class="nav-item">
	<a class="nav-link collapsed" data-bs-target="#forms-nav" data-bs-toggle="collapse" href="#">
	  <i class="bi bi-journal-text"></i><span>Sipayu</span><i class="bi bi-chevron-down ms-auto"></i>
	</a>
	<ul id="forms-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
	  <li>
		<a href="<?= base_url('sipayu/registerrajal'); ?>">
		  <i class="bi bi-circle"></i><span>Rawat Jalan</span>
		</a>
	  </li>
	  <li>
		<a href="forms-layouts.html">
		  <i class="bi bi-circle"></i><span>Rawat Inap</span>
		</a>
	  </li>
	  <li>
		<a href="<?= base_url('sipayu/cari'); ?>">
		  <i class="bi bi-circle"></i><span>IGD</span>
		</a>
	  </li>
	  <li>
		<a href="<?= base_url('sipayu/kebersamaan'); ?>">
		  <i class="bi bi-circle"></i><span>Kebersamaan</span>
		</a>
	  </li>
	  <li>
		<a href="<?= base_url('sipayu/tindakan'); ?>">
		  <i class="bi bi-circle"></i><span>Prosedur Non Bedah</span>
		</a>
	  </li>
	</ul>
  </li><!-- End Forms Nav -->

  <li class="nav-item">
	<a class="nav-link collapsed" data-bs-target="#tables-nav" data-bs-toggle="collapse" href="#">
	  <i class="bi bi-layout-text-window-reverse"></i><span>ejaspel</span><i class="bi bi-chevron-down ms-auto"></i>
	</a>
	<ul id="tables-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
	  <li>
		<a href="<?= base_url('page/modul'); ?>">
		  <i class="bi bi-circle"></i><span>Modules</span>
		</a>
	  </li>
	  <li>
		<a href="<?= base_url('page/pengguna'); ?>">
		  <i class="bi bi-circle"></i><span>Users</span>
		</a>
	  </li>
	</ul>
  </li><!-- End Tables Nav -->

  <li class="nav-item">
	<a class="nav-link collapsed" data-bs-target="#charts-nav" data-bs-toggle="collapse" href="#">
	  <i class="bi bi-bar-chart"></i><span>Problems</span><i class="bi bi-chevron-down ms-auto"></i>
	</a>
	<ul id="charts-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
	  <li>
		<a href="charts-chartjs.html">
		  <i class="bi bi-circle"></i><span>APS</span>
		</a>
	  </li>
	  <li>
		<a href="charts-apexcharts.html">
		  <i class="bi bi-circle"></i><span>Laporan</span>
		</a>
	  </li>
	  <li>
		<a href="charts-echarts.html">
		  <i class="bi bi-circle"></i><span>Surat Kontrol</span>
		</a>
	  </li>
	</ul>
  </li><!-- End Charts Nav -->

  <li class="nav-item">
	<a class="nav-link collapsed" data-bs-target="#icons-nav" data-bs-toggle="collapse" href="#">
	  <i class="bi bi-gem"></i><span>Icons</span><i class="bi bi-chevron-down ms-auto"></i>
	</a>
	<ul id="icons-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
	  <li>
		<a href="icons-bootstrap.html">
		  <i class="bi bi-circle"></i><span>Bootstrap Icons</span>
		</a>
	  </li>
	  <li>
		<a href="icons-remix.html">
		  <i class="bi bi-circle"></i><span>Remix Icons</span>
		</a>
	  </li>
	  <li>
		<a href="icons-boxicons.html">
		  <i class="bi bi-circle"></i><span>Boxicons</span>
		</a>
	  </li>
	</ul>
  </li><!-- End Icons Nav -->

  <li class="nav-heading">Pages</li>

  <li class="nav-item">
	<a class="nav-link collapsed" href="users-profile.html">
	  <i class="bi bi-person"></i>
	  <span>Profile</span>
	</a>
  </li><!-- End Profile Page Nav -->

  <li class="nav-item">
	<a class="nav-link collapsed" href="<?= base_url('users/viewUsers'); ?>">
	  <i class="bi bi-person"></i>
	  <span>ServerSide</span>
	</a>
  </li><!-- End F.A.Q Page Nav -->

  <li class="nav-item">
	<a class="nav-link collapsed" href="<?= base_url('users/users'); ?>">
	  <i class="bi bi-envelope"></i>
	  <span>Users</span>
	</a>
  </li><!-- End Contact Page Nav -->

  <!-- <li class="nav-item">
	<a class="nav-link collapsed" href="pages-register.html">
	  <i class="bi bi-card-list"></i>
	  <span>Register</span>
	</a>
  </li> -->
  <!-- End Register Page Nav -->

  <li class="nav-item">
	<a class="nav-link collapsed" href="<?= base_url('admin/login-admin'); ?>">
	  <i class="bi bi-box-arrow-in-right"></i>
	  <span>Login</span>
	</a>
  </li><!-- End Login Page Nav -->

  <!-- <li class="nav-item">
	<a class="nav-link collapsed" href="pages-error-404.html">
	  <i class="bi bi-dash-circle"></i>
	  <span>Error 404</span>
	</a>
  </li> -->
  <!-- End Error 404 Page Nav -->

  <!-- <li class="nav-item">
	<a class="nav-link " href="pages-blank.html">
	  <i class="bi bi-file-earmark"></i>
	  <span>Blank</span>
	</a>
  </li> -->
  <!-- End Blank Page Nav -->

</ul>

</aside><!-- End Sidebar-->
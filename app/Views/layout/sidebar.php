<!-- ======= Sidebar ======= -->
<aside id="sidebar" class="sidebar">

	<ul class="sidebar-nav" id="sidebar-nav">
		<?php if (session()->get('Ses_Level') == '1') : ?>

			<li class="nav-item">
				<a class="nav-link collapsed" href="<?= base_url('admin/dashboard-admin'); ?>">
					<i class="bi bi-grid"></i>
					<span>Dashboard</span>
				</a>
			</li><!-- End Dashboard Nav -->

			<li class="nav-item">
				<a class="nav-link collapsed" data-bs-target="#components-nav" data-bs-toggle="collapse" href="#">
					<i class="bi bi-menu-button-wide"></i><span>SIMRS V2</span><i class="bi bi-chevron-down ms-auto"></i>
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
				</ul>
			</li><!-- End Components Nav -->

			<li class="nav-item">
				<a class="nav-link collapsed" data-bs-target="#forms-nav" data-bs-toggle="collapse" href="#">
					<i class="bi bi-journal-text"></i><span>SIPAYU</span><i class="bi bi-chevron-down ms-auto"></i>
				</a>
				<ul id="forms-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
					<li>
						<a href="<?= base_url('sipayu/registerrajal'); ?>">
							<i class="bi bi-circle"></i><span>Rawat Jalan</span>
						</a>
					</li>
					<li>
						<a href="<?= base_url('sipayu/cariranap'); ?>">
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
							<i class="bi bi-circle"></i><span>Tindakan</span>
						</a>
					</li>
					<li>
						<a href="<?= base_url('sipayu/doktergp'); ?>">
							<i class="bi bi-circle"></i><span>DokterGP</span>
						</a>
					</li>
					<li>
						<a href="<?= base_url('sipayu/alldokter'); ?>">
							<i class="bi bi-circle"></i><span>OJL</span>
						</a>
					</li>
				</ul>
			</li><!-- End Forms Nav -->

			<li class="nav-item">
				<a class="nav-link collapsed" data-bs-target="#tables-nav" data-bs-toggle="collapse" href="#">
					<i class="bi bi-layout-text-window-reverse"></i><span>JASPEL</span><i class="bi bi-chevron-down ms-auto"></i>
				</a>
				<ul id="tables-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
					<li>
						<a href="<?= base_url('jaspel/jasarajal'); ?>">
							<i class="bi bi-circle"></i><span>Rajal</span>
						</a>
					</li>
					<li>
						<a href="<?= base_url('jaspel/jasaranap'); ?>" id="jaspelranap">
							<i class="bi bi-circle"></i><span>Ranap</span>
						</a>
					</li>
					<li>
						<a href="<?= base_url('jaspel/jasaigd'); ?>">
							<i class="bi bi-circle"></i><span>I G D</span>
						</a>
					</li>
				</ul>
			</li><!-- End Tables Nav -->

			<li class="nav-item">
				<a class="nav-link collapsed" data-bs-target="#charts-nav" data-bs-toggle="collapse" href="#">
					<i class="bi bi-bar-chart"></i><span>PROBLEM</span><i class="bi bi-chevron-down ms-auto"></i>
				</a>
				<ul id="charts-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
					<li>
						<a href="<?= base_url('problem/getstatusAps'); ?>">
							<i class="bi bi-circle"></i><span>APS</span>
						</a>
					</li>
					<li>
						<a href="<?= base_url('problem/getReport'); ?>">
							<i class="bi bi-circle"></i><span>Report</span>
						</a>
					</li>
					<li>
						<a href="charts-echarts.html">
							<i class="bi bi-circle"></i><span>LapOperasi</span>
						</a>
					</li>
				</ul>
			</li><!-- End Charts Nav -->

			<!-- End Icons Nav -->


			<li class="nav-heading">Pages</li>
			<li class="nav-item">
				<a class="nav-link collapsed" data-bs-target="#icons-nav" data-bs-toggle="collapse" href="#">
					<i class="bi bi-gem"></i><span>STUDY</span><i class="bi bi-chevron-down ms-auto"></i>
				</a>
				<ul id="icons-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
					<li>
						<a href="<?= base_url('users/users'); ?>">
							<i class="bi bi-circle"></i><span>CRUD User</span>
						</a>
					</li>
					<li>
						<a href="<?= base_url('users/viewUsers'); ?>">
							<i class="bi bi-circle"></i><span>ServerSide</span>
						</a>
					</li>
					<li class="nav-item">
						<a class="nav-link collapsed" href="<?= base_url('jkn/merge-pdf'); ?>">
							<i class="bi bi-circle"></i>
							<span>Merger File</span>
						</a>
					</li>
					<li>
						<a href="icons-boxicons.html">
							<i class="bi bi-circle"></i><span>Boxicons</span>
						</a>
					</li>
				</ul>
			</li>

			<li class="nav-heading">Work</li>
			<li class="nav-item">
				<a class="nav-link collapsed" href="<?= base_url('users/dokumentasi'); ?>">
					<i class="bi bi-box-arrow-in-right"></i>
					<span>DOKUMENTASI</span>
				</a>
			</li>
			<!-- End Login Page Nav -->
			<!-- JKN -->
			<li class="nav-heading">JKN</li>
			<li class="nav-item">
				<a class="nav-link collapsed" href="<?= base_url('jkn/listpasien'); ?>">
					<i class="bi bi-box-arrow-in-right"></i>
					<span>RAWAT JALAN</span>
				</a>
			</li>
			<li class="nav-item">
				<a class="nav-link collapsed" href="<?= base_url('jkn/listpasienranap'); ?>">
					<i class="bi bi-box-arrow-in-left"></i>
					<span>RAWAT INAP</span>
				</a>
			</li>
			<!-- VCLAIM -->
			<li class="nav-item">
				<a class="nav-link collapsed" href="<?= base_url('vclaim/seppersonal'); ?>">
					<i class="bi bi-slack"></i><span>VCLAIM V2</span>
				</a>
			</li>
			<!-- <ul id="vclaim-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
 				<li>
 					<a href="<?= base_url('vclaim/seppersonal'); ?>">
 						<i class="bi bi-circle"></i><span>SEP</span>
 					</a>
 				</li>
 				<li>
 					<a href="<?= base_url('vclaim/signature'); ?>">
 						<i class="bi bi-circle"></i><span>Signature</span>
 					</a>
 				</li>

 			</ul>
 			</li> -->
			<li class="nav-item">
				<a class="nav-link collapsed" data-bs-target="#jkn-nav" data-bs-toggle="collapse" href="#">
					<i class="bi bi-gem"></i><span>RAJAL</span><i class="bi bi-chevron-down ms-auto"></i>
				</a>
				<ul id="jkn-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
					<li>
						<a href="<?= base_url('jkn/cetaksep'); ?>">
							<i class="bi bi-circle"></i><span>S E P</span>
						</a>
					</li>
					<li>
						<a href="<?= base_url('jkn/cetakbilling'); ?>">
							<i class="bi bi-circle"></i><span>Billing</span>
						</a>
					</li>
					<li>
						<a href="<?= base_url('jkn/cetakresume'); ?>">
							<i class="bi bi-circle"></i><span>Resume</span>
						</a>
					</li>
					<li>
						<a href="<?= base_url('jkn/cetaklaboratorium'); ?>">
							<i class="bi bi-circle"></i><span>Laboratorium</span>
						</a>
					</li>
					<li>
						<a href="<?= base_url('jkn/cetakradiologi'); ?>">
							<i class="bi bi-circle"></i><span>Radiologi</span>
						</a>
					</li>
				</ul>
			</li>

			<!-- End Blank Page Nav -->
		<?php endif; ?>
		<?php if (session()->get('Ses_Tupoksi') == 'POLIKLINIK') : ?>
			<li class="nav-item">
				<a class="nav-link collapsed" href="<?= base_url('admin/dashboard-admin'); ?>">
					<i class="bi bi-grid"></i>
					<span>Dashboard</span>
				</a>
			</li>
			<li class="nav-heading">JKN</li>
			<li class="nav-item">
				<a class="nav-link collapsed" href="<?= base_url('jkn/listpasien'); ?>">
					<i class="bi bi-box-arrow-in-right"></i>
					<span>RAWAT JALAN</span>
				</a>
			</li>
			<li class="nav-item">
				<a class="nav-link collapsed" href="<?= base_url('jkn/merge-pdf'); ?>">
					<i class="bi bi-circle"></i>
					<span>Merger File</span>
				</a>
			</li>
			<li class="nav-item">
				<a class="nav-link collapsed" data-bs-target="#tables-nav" data-bs-toggle="collapse" href="#">
					<i class="bi bi-layout-text-window-reverse"></i><span>JASPEL</span><i class="bi bi-chevron-down ms-auto"></i>
				</a>
				<ul id="tables-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
					<li>
						<a href="<?= base_url('jaspel/jasarajal'); ?>">
							<i class="bi bi-circle"></i><span>Rajal</span>
						</a>
					</li>
					<li>
						<a href="<?= base_url('jaspel/jasaranap'); ?>" id="jaspelranap">
							<i class="bi bi-circle"></i><span>Ranap</span>
						</a>
					</li>
					<li>
						<a href="<?= base_url('jaspel/jasaigd'); ?>">
							<i class="bi bi-circle"></i><span>I G D</span>
						</a>
					</li>
				</ul>
			</li><!-- End Tables Nav -->
		<?php endif; ?>
		<!-- RAWAT INAP -->
		<?php if (session()->get('Ses_Tupoksi') == 'RAWAT INAP') : ?>
			<li class="nav-item">
				<a class="nav-link collapsed" href="<?= base_url('admin/dashboard-admin'); ?>">
					<i class="bi bi-grid"></i>
					<span>Dashboard</span>
				</a>
			</li>
			<li class="nav-heading">JKN</li>
			<li class="nav-item">
				<a class="nav-link collapsed" href="<?= base_url('jkn/listpasienranap'); ?>">
					<i class="bi bi-box-arrow-in-right"></i>
					<span>RAWAT INAP</span>
				</a>
			</li>
			<li class="nav-item">
				<a class="nav-link collapsed" href="<?= base_url('jkn/merge-pdf'); ?>">
					<i class="bi bi-circle"></i>
					<span>Merger File</span>
				</a>
			</li>
			<li class="nav-item">
				<a class="nav-link collapsed" data-bs-target="#tables-nav" data-bs-toggle="collapse" href="#">
					<i class="bi bi-layout-text-window-reverse"></i><span>JASPEL</span><i class="bi bi-chevron-down ms-auto"></i>
				</a>
				<ul id="tables-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
					<li>
						<a href="<?= base_url('jaspel/jasarajal'); ?>">
							<i class="bi bi-circle"></i><span>Rajal</span>
						</a>
					</li>
					<li>
						<a href="<?= base_url('jaspel/jasaranap'); ?>" id="jaspelranap">
							<i class="bi bi-circle"></i><span>Ranap</span>
						</a>
					</li>
					<li>
						<a href="<?= base_url('jaspel/jasaigd'); ?>">
							<i class="bi bi-circle"></i><span>I G D</span>
						</a>
					</li>
				</ul>
			</li><!-- End Tables Nav -->
		<?php endif; ?>

		<?php if (session()->get('Ses_Tupoksi') == 'KEUANGAN') : ?>
			<li class="nav-item">
				<a class="nav-link collapsed" data-bs-target="#forms-nav" data-bs-toggle="collapse" href="#">
					<i class="bi bi-journal-text"></i><span>SIPAYU</span><i class="bi bi-chevron-down ms-auto"></i>
				</a>
				<ul id="forms-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
					<li>
						<a href="<?= base_url('sipayu/registerrajal'); ?>">
							<i class="bi bi-circle"></i><span>Rawat Jalan</span>
						</a>
					</li>
					<li>
						<a href="<?= base_url('sipayu/cariranap'); ?>">
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
							<i class="bi bi-circle"></i><span>Tindakan</span>
						</a>
					</li>
					<li>
						<a href="<?= base_url('sipayu/doktergp'); ?>">
							<i class="bi bi-circle"></i><span>DokterGP</span>
						</a>
					</li>
				</ul>
			</li>
		<?php endif; ?>
	</ul>

</aside><!-- End Sidebar-->
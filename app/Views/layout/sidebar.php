<!-- ======= Sidebar ======= -->
<aside id="sidebar" class="sidebar">

	<ul class="sidebar-nav" id="sidebar-nav">
		<?php if (session()->get('Ses_Tupoksi') == 'ADMINISTRATOR') : ?>

			<li class="nav-item">
				<a class="nav-link collapsed" href="<?= base_url('admin/dashboard-admin'); ?>">
					<i class="bi bi-grid"></i>
					<span>DASHBOARD</span>
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
						<a href="<?= base_url('page/ruangan'); ?>">
							<i class="bi bi-circle"></i><span>Ruangan</span>
						</a>
					</li>
					<li>
						<a href="<?= base_url('page/pasien'); ?>">
							<i class="bi bi-circle"></i><span>Pasien</span>
						</a>
					</li>
					<li>
						<a href="<?= base_url('page/alltindakan'); ?>">
							<i class="bi bi-circle"></i><span>Tindakan</span>
						</a>
					</li>
					<li>
						<a href="<?= base_url('page/pengguna'); ?>">
							<i class="bi bi-circle"></i><span>Users</span>
						</a>
					</li>
					<li>
						<a href="<?= base_url('page/dokter'); ?>">
							<i class="bi bi-circle"></i><span>Dokter</span>
						</a>
					</li>
					<li>
						<a href="<?= base_url('page/depolayanan'); ?>">
							<i class="bi bi-circle"></i><span>Depo Layanan</span>
						</a>
					</li>
					<li>
						<a href="<?= base_url('page/kunjungan'); ?>">
							<i class="bi bi-circle"></i><span>Kunjungan</span>
						</a>
					</li>
				</ul>
			</li><!-- End Components Nav -->
			<!-- SIPAYU  -->
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
			</li>
			<!-- END SIPAYU  -->
			<!-- SMARTREMUN  -->
			<li class="nav-item">
				<a class="nav-link collapsed" data-bs-target="#smartremun-nav" data-bs-toggle="collapse" href="#">
					<i class="bi bi-journal-text"></i><span>SMARTREMUN</span><i class="bi bi-chevron-down ms-auto"></i>
				</a>
				<ul id="smartremun-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
					<li>
						<a href="<?= base_url('sipayu/rekon_rajal'); ?>">
							<i class="bi bi-circle"></i><span>Rawat Jalan</span>
						</a>
					</li>
					<li>
						<a href="<?= base_url('sipayu/rekon_ranap'); ?>">
							<i class="bi bi-circle"></i><span>Rawat Inap</span>
						</a>
					</li>
					<li>
						<a href="<?= base_url('sipayu/rekon_igd'); ?>">
							<i class="bi bi-circle"></i><span>IGD</span>
						</a>
					</li>
					<li>
						<a href="<?= base_url('sipayu/rekon_operasi'); ?>">
							<i class="bi bi-circle"></i><span>Kamar Operasi</span>
						</a>
					</li>
					<li>
						<a href="<?= base_url('sipayu/rekon_laboratorium'); ?>">
							<i class="bi bi-circle"></i><span>Laboratorium</span>
						</a>
					</li>
					<li>
						<a href="<?= base_url('sipayu/rekon_radiologi'); ?>">
							<i class="bi bi-circle"></i><span>Radiologi</span>
						</a>
					</li>
					<li>
						<a href="<?= base_url('sipayu/rekon_farmasi'); ?>">
							<i class="bi bi-circle"></i><span>Farmasi</span>
						</a>
					</li>
				</ul>
			</li>
			<!-- END SMARTREMUN  -->

			<li class="nav-item">
				<a class="nav-link collapsed" data-bs-target="#tabless-nav" data-bs-toggle="collapse" href="#">
					<i class="bi bi-layout-text-window-reverse"></i><span>JASPEL</span><i class="bi bi-chevron-down ms-auto"></i>
				</a>
				<ul id="tabless-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
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
					<li>
						<a href="<?= base_url('jaspel/jasaoperasi'); ?>">
							<i class="bi bi-circle"></i><span>Kamar Operasi</span>
						</a>
					</li>
				</ul>
			</li><!-- End Tables Nav -->
			<!-- IMUT AYU  -->
			<li class="nav-item">
				<a class="nav-link collapsed" href="<?= base_url('simutayu/form_munas'); ?>">
					<i class="bi bi-bar-chart"></i>
					<span>SI IMUT AYU</span>
				</a>
			</li>
			</li>
			<!-- END IMUT AYU  -->
			<!-- SIPEJUANG  -->
			<li class="nav-item">
				<a class="nav-link collapsed" href="<?= base_url('sipejuang/dashboardpengajuan'); ?>">
					<i class="bi bi-file-earmark-ppt"></i>
					<span>SIPEJUANG</span>
				</a>
			</li>
			</li>
			<!-- END SIPEJUANG  -->
			<li class="nav-item">
				<a class="nav-link collapsed" data-bs-target="#charts-nav" data-bs-toggle="collapse" href="#">
					<i class="bi bi-book-half"></i><span>PROBLEM</span><i class="bi bi-chevron-down ms-auto"></i>
				</a>
				<ul id="charts-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
					<li>
						<a href="<?= base_url('problem/getstatusaps'); ?>">
							<i class="bi bi-circle"></i><span>APS</span>
						</a>
					</li>
					<li>
						<a href="<?= base_url('problem/getReport'); ?>">
							<i class="bi bi-circle"></i><span>Report</span>
						</a>
					</li>
					<li>
						<a href="<?= base_url('problem/getdataisnull'); ?>">
							<i class="bi bi-circle"></i><span>DataIsNull</span>
						</a>
					</li>
					<li>
						<a href="<?= base_url('problem/monitoring_tte'); ?>">
							<i class="bi bi-circle"></i><span>Monitoring TTE</span>
						</a>
					</li>
					<li>
						<a href="<?= base_url('problem/monitoring_jkn'); ?>">
							<i class="bi bi-circle"></i><span>Dashboard JKN</span>
						</a>
					</li>
				</ul>
			</li>
			<!-- End Charts Nav -->

			<!-- End Icons Nav -->
			<li class="nav-heading">Pages</li>
			<li class="nav-item">
				<a class="nav-link collapsed" data-bs-target="#icons-nav" data-bs-toggle="collapse" href="#">
					<i class="bi bi-gem"></i><span>STUDY</span><i class="bi bi-chevron-down ms-auto"></i>
				</a>
				<ul id="icons-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
					<li>
						<a href="<?= base_url('users/users'); ?>">
							<i class="bi bi-circle"></i><span>CRUD</span>
						</a>
					</li>
					<li>
						<a href="<?= base_url('users/viewUsers'); ?>">
							<i class="bi bi-circle"></i><span>ServerSide</span>
						</a>
					</li>
					<li>
						<a href="<?= base_url('jkn/merge-pdf'); ?>">
							<i class="bi bi-circle"></i>
							<span>Merger File</span>
						</a>
					</li>
					<li>
						<a href="<?= base_url('users/pdf_view'); ?>">
							<i class="bi bi-circle"></i>
							<span>PDF VIew</span>
						</a>
					</li>





				</ul>

			</li>

			<!-- End Login Page Nav -->
			<!-- JKN  -->
			<li class="nav-item">
				<a class="nav-link collapsed" data-bs-target="#tables-nav" data-bs-toggle="collapse" href="#">
					<i class="bi bi-layout-text-window-reverse"></i><span>JKN</span><i class="bi bi-chevron-down ms-auto"></i>
				</a>
				<ul id="tables-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
					<li>
						<a href="<?= base_url('jkn/listpasien'); ?>">
							<i class="bi bi-circle"></i>
							<span>Rawat Jalan</span>
						</a>
					</li>
					<li>
						<a href="<?= base_url('jkn/listpasienranap'); ?>">
							<i class="bi bi-circle"></i>
							<span>Rawat Inap</span>
						</a>
					</li>
					<li>
						<a href="<?= base_url('vclaim/seppersonal'); ?>">
							<i class="bi bi-circle"></i><span>Vclaim V2</span>
						</a>
					</li>
					<li class="nav-heading">Pages</li>
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
			</li>

	</ul>
	<li class="nav-item">
		<a class="nav-link collapsed" href="<?= base_url('users/dokumentasi'); ?>">
			<i class="bi bi-gear"></i>
			<span>NOTE</span>
		</a>
	</li>
	</li>
	<!-- END JKN  -->
	<!-- End Blank Page Nav -->
<?php endif; ?>

<!-- POLIKLINIK  -->
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
		<a class="nav-link collapsed" href="<?= base_url('page/kunjungan'); ?>">
			<i class="bi bi-file-earmark-ppt-fill"></i>
			<span>Kunjungan</span>
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
	</li>

	<!-- SMARTREMUN  -->
	<li class="nav-item">
		<a class="nav-link collapsed" data-bs-target="#sipayu-nav" data-bs-toggle="collapse" href="#">
			<i class="bi bi-layout-text-window-reverse"></i><span>SIPAYU</span><i class="bi bi-chevron-down ms-auto"></i>
		</a>
		<ul id="sipayu-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
			<li>
				<a href="<?= base_url('sipayu/rekon_rajal'); ?>">
					<i class="bi bi-circle"></i><span>Rajal</span>
				</a>
			</li>
			<li>
				<a href="<?= base_url('sipayu/rekon_ranap'); ?>">
					<i class="bi bi-circle"></i><span>Ranap</span>
				</a>
			</li>
			<li>
				<a href="<?= base_url('jaspel/jasaigd'); ?>">
					<i class="bi bi-circle"></i><span>I G D</span>
				</a>
			</li>
		</ul>
	</li>
	<!-- END SMARTREMUN -->
	<!-- VCLAIM -->
	<li class="nav-item">
		<a class="nav-link collapsed" href="<?= base_url('vclaim/seppersonal'); ?>">
			<i class="bi bi-slack"></i><span>VCLAIM V2</span>
		</a>
	</li>
	<li class="nav-item">
		<a class="nav-link collapsed" href="<?= base_url('simutayu/form_munas'); ?>">
			<i class="bi bi-bar-chart"></i>
			<span>SI IMUT AYU</span>
		</a>
	</li>
	</li>
	<li class="nav-item">
		<a class="nav-link collapsed" href="<?= base_url('sipejuang/dashboardpengajuan'); ?>">
			<i class="bi bi-file-earmark-ppt"></i>
			<span>SIPEJUANG</span>
		</a>
	</li>
<?php endif; ?>
<!-- END POLIKLINIK  -->


<!-- RAWAT INAP -->
<?php /*if (session()->get('Ses_Tupoksi') == 'RAWAT INAP') :*/ ?>
<?php
if (
	session()->get('Ses_Tupoksi') == 'RAWAT INAP'
) :
?>
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
		<a class="nav-link collapsed" href="<?= base_url('page/kunjungan'); ?>">
			<i class="bi bi-file-earmark-ppt-fill"></i>
			<span>Kunjungan</span>
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
	</li>
	<!-- VCLAIM -->
	<li class="nav-item">
		<a class="nav-link collapsed" href="<?= base_url('vclaim/seppersonal'); ?>">
			<i class="bi bi-slack"></i><span>VCLAIM V2</span>
		</a>
	</li>
	<!-- End Tables Nav -->
	<!-- SMARTREMUN  -->
	<li class="nav-item">
		<a class="nav-link collapsed" data-bs-target="#smartremun-nav" data-bs-toggle="collapse" href="#">
			<i class="bi bi-journal-text"></i><span>SMARTREMUN</span><i class="bi bi-chevron-down ms-auto"></i>
		</a>
		<ul id="smartremun-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
			<li>
				<a href="<?= base_url('sipayu/rekon_rajal'); ?>">
					<i class="bi bi-circle"></i><span>Rawat Jalan</span>
				</a>
			</li>
			<li>
				<a href="<?= base_url('sipayu/rekon_ranap'); ?>">
					<i class="bi bi-circle"></i><span>Rawat Inap</span>
				</a>
			</li>
			<li>
				<a href="<?= base_url('sipayu/rekon_igd'); ?>">
					<i class="bi bi-circle"></i><span>IGD</span>
				</a>
			</li>
			<!--<li>-->
			<!--	<a href="<?= base_url('sipayu/rekon_operasi'); ?>">-->
			<!--		<i class="bi bi-circle"></i><span>Kamar Operasi</span>-->
			<!--	</a>-->
			<!--</li>-->
			<!--<li>-->
			<!--	<a href="<?= base_url('sipayu/rekon_laboratorium'); ?>">-->
			<!--		<i class="bi bi-circle"></i><span>Laboratorium</span>-->
			<!--	</a>-->
			<!--</li>-->
			<!--<li>-->
			<!--	<a href="<?= base_url('sipayu/rekon_radiologi'); ?>">-->
			<!--		<i class="bi bi-circle"></i><span>Radiologi</span>-->
			<!--	</a>-->
			<!--</li>-->
			<!--<li>-->
			<!--	<a href="<?= base_url('sipayu/alldokter'); ?>">-->
			<!--		<i class="bi bi-circle"></i><span>Farmasi</span>-->
			<!--	</a>-->
			<!--</li>-->
		</ul>
	</li>
	<!-- END SMARTREMUN  -->
	<li class="nav-item">
		<a class="nav-link collapsed" href="<?= base_url('simutayu/form_munas'); ?>">
			<i class="bi bi-bar-chart"></i>
			<span>SI IMUT AYU</span>
		</a>
	</li>
	</li>
	<li class="nav-item">
		<a class="nav-link collapsed" href="<?= base_url('sipejuang/dashboardpengajuan'); ?>">
			<i class="bi bi-file-earmark-ppt"></i>
			<span>SIPEJUANG</span>
		</a>
	</li>
<?php endif; ?>
<!-- END SIPEJUANG  -->
<!-- END RAWAT INAP  -->

<!-- KEUANGAN  -->
<?php if (session()->get('Ses_Tupoksi') == 'KEUANGAN') : ?>
	<li class="nav-item">
		<a class="nav-link collapsed" data-bs-target="#forms-nav" data-bs-toggle="collapse" href="#">
			<i class="bi bi-journal-text"></i><span>SIPAYU</span><i class="bi bi-chevron-down ms-auto"></i>
		</a>
		<ul id="forms-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
			<!--<li>-->
			<!--	<a href="<?= base_url('sipayu/registerrajal'); ?>">-->
			<!--		<i class="bi bi-circle"></i><span>Rawat Jalan</span>-->
			<!--	</a>-->
			<!--</li>-->
			<!--<li>-->
			<!--	<a href="<?= base_url('sipayu/cariranap'); ?>">-->
			<!--		<i class="bi bi-circle"></i><span>Rawat Inap</span>-->
			<!--	</a>-->
			<!--</li>-->
			<!--<li>-->
			<!--	<a href="<?= base_url('sipayu/cari'); ?>">-->
			<!--		<i class="bi bi-circle"></i><span>IGD</span>-->
			<!--	</a>-->
			<!--</li>-->
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
	<!-- IMUT AYU  -->
	<li class="nav-item">
		<a class="nav-link collapsed" href="<?= base_url('simutayu/form_munas'); ?>">
			<i class="bi bi-bar-chart"></i>
			<span>SI IMUT AYU</span>
		</a>
	</li>
	</li>
	<!-- END IMUT AYU  -->
	<!-- SIPEJUANG  -->
	<li class="nav-item">
		<a class="nav-link collapsed" href="<?= base_url('sipejuang/dashboardpengajuan'); ?>">
			<i class="bi bi-file-earmark-ppt"></i>
			<span>SIPEJUANG</span>
		</a>
	</li>
	</li>
	<!-- END SIPEJUANG  -->
<?php endif; ?>

<!-- END KEUANGAN  -->

<!-- JKN  -->
<?php if (session()->get('Ses_Tupoksi') == 'JKN') : ?>
	<li class="nav-item">
		<a class="nav-link collapsed" href="<?= base_url('problem/monitoring_jkn'); ?>">
			<i class="bi bi-house"></i><span>DASHBOARD</span>
		</a>
	</li>
	<li class="nav-item">
		<a class="nav-link collapsed" href="<?= base_url('vclaim/seppersonal'); ?>">
			<i class="bi bi-slack"></i><span>VCLAIM V2</span>
		</a>
	</li>
	<!-- JKN  -->
	<li class="nav-item">
		<a class="nav-link collapsed" data-bs-target="#tables-nav" data-bs-toggle="collapse" href="#">
			<i class="bi bi-layout-text-window-reverse"></i><span>JKN</span><i class="bi bi-chevron-down ms-auto"></i>
		</a>
		<ul id="tables-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
			<li>
				<a href="<?= base_url('jkn/listpasien'); ?>">
					<i class="bi bi-circle"></i>
					<span>Rawat Jalan</span>
				</a>
			</li>
			<li>
				<a href="<?= base_url('jkn/listpasienranap'); ?>">
					<i class="bi bi-circle"></i>
					<span>Rawat Inap</span>
				</a>
			</li>
			<li>
				<a href="<?= base_url('problem/getdataisnull'); ?>">
					<i class="bi bi-circle"></i><span>DataIsNull</span>
				</a>
			</li>
			<!-- <li>
				<a href="<?= base_url('vclaim/seppersonal'); ?>">
					<i class="bi bi-circle"></i><span>Vclaim V2</span>
				</a>
			</li> -->

	</li>

	</ul>

	</li>
	<!-- END JKN  -->
	<!-- IMUT AYU  -->
	<li class="nav-item">
		<a class="nav-link collapsed" href="<?= base_url('simutayu/form_munas'); ?>">
			<i class="bi bi-bar-chart"></i>
			<span>SI IMUT AYU</span>
		</a>
	</li>
	</li>
	<!-- END IMUT AYU  -->
	<!-- SIPEJUANG  -->
	<li class="nav-item">
		<a class="nav-link collapsed" href="<?= base_url('sipejuang/dashboardpengajuan'); ?>">
			<i class="bi bi-file-earmark-ppt"></i>
			<span>SIPEJUANG</span>
		</a>
	</li>
	</li>
	<!-- END SIPEJUANG  -->
	<li class="nav-item">
		<a class="nav-link collapsed" href="<?= base_url('jkn/merge-pdf'); ?>">
			<i class="bi bi-journal-plus"></i>
			<span>MERGE FILES</span>
		</a>
	</li>
<?php endif; ?>
<!-- IGD -->
<?php
if (session()->get('Ses_Tupoksi') == 'IGD') : ?>
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
			<span>I G D</span>
		</a>
	</li>
	<li class="nav-item">
		<a class="nav-link collapsed" href="<?= base_url('jkn/listpasienranap'); ?>">
			<i class="bi bi-box-arrow-in-right"></i>
			<span>RAWAT INAP</span>
		</a>
	</li>
	<li class="nav-item">
		<a class="nav-link collapsed" href="<?= base_url('page/kunjungan'); ?>">
			<i class="bi bi-file-earmark-ppt-fill"></i>
			<span>Kunjungan</span>
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
	</li>
	<!-- VCLAIM -->
	<li class="nav-item">
		<a class="nav-link collapsed" href="<?= base_url('vclaim/seppersonal'); ?>">
			<i class="bi bi-slack"></i><span>VCLAIM V2</span>
		</a>
	</li>
	<!-- End Tables Nav -->
	<!-- SMARTREMUN  -->
	<li class="nav-item">
		<a class="nav-link collapsed" data-bs-target="#smartremun-nav" data-bs-toggle="collapse" href="#">
			<i class="bi bi-journal-text"></i><span>SMARTREMUN</span><i class="bi bi-chevron-down ms-auto"></i>
		</a>
		<ul id="smartremun-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
			<li>
				<a href="<?= base_url('sipayu/rekon_rajal'); ?>">
					<i class="bi bi-circle"></i><span>Rawat Jalan</span>
				</a>
			</li>
			<li>
				<a href="<?= base_url('sipayu/rekon_ranap'); ?>">
					<i class="bi bi-circle"></i><span>Rawat Inap</span>
				</a>
			</li>
			<li>
				<a href="<?= base_url('sipayu/rekon_igd'); ?>">
					<i class="bi bi-circle"></i><span>IGD</span>
				</a>
			</li>
			<li>
				<a href="<?= base_url('sipayu/rekon_operasi'); ?>">
					<i class="bi bi-circle"></i><span>Kamar Operasi</span>
				</a>
			</li>
			<li>
				<a href="<?= base_url('sipayu/rekon_laboratorium'); ?>">
					<i class="bi bi-circle"></i><span>Laboratorium</span>
				</a>
			</li>
			<li>
				<a href="<?= base_url('sipayu/rekon_radiologi'); ?>">
					<i class="bi bi-circle"></i><span>Radiologi</span>
				</a>
			</li>
			<li>
				<a href="<?= base_url('sipayu/alldokter'); ?>">
					<i class="bi bi-circle"></i><span>Farmasi</span>
				</a>
			</li>
		</ul>
	</li>
	<!-- END SMARTREMUN  -->
	<li class="nav-item">
		<a class="nav-link collapsed" href="<?= base_url('simutayu/form_munas'); ?>">
			<i class="bi bi-bar-chart"></i>
			<span>SI IMUT AYU</span>
		</a>
	</li>
	</li>
	<li class="nav-item">
		<a class="nav-link collapsed" href="<?= base_url('sipejuang/dashboardpengajuan'); ?>">
			<i class="bi bi-file-earmark-ppt"></i>
			<span>SIPEJUANG</span>
		</a>
	</li>
<?php endif; ?>
<!-- SIPEJUANG  -->
<!-- END IGD  -->

<!--KAMAR OPERASI -->
<?php
if (session()->get('Ses_Tupoksi') == 'KAMAR OPERASI') : ?>
	<li class="nav-item">
		<a class="nav-link collapsed" href="<?= base_url('admin/dashboard-admin'); ?>">
			<i class="bi bi-grid"></i>
			<span>Dashboard</span>
		</a>
	</li>
	<!--<li class="nav-heading">JKN</li>-->
	<li class="nav-item">
		<a class="nav-link collapsed" href="<?= base_url('jkn/listpasien'); ?>">
			<i class="bi bi-box-arrow-in-left"></i>
			<span>RAWAT JALAN</span>
		</a>
	</li>
	<li class="nav-item">
		<a class="nav-link collapsed" href="<?= base_url('jkn/listpasienranap'); ?>">
			<i class="bi bi-box-arrow-in-right"></i>
			<span>RAWAT INAP</span>
		</a>
	</li>
	<li class="nav-item">
		<a class="nav-link collapsed" href="<?= base_url('page/kunjungan'); ?>">
			<i class="bi bi-file-earmark-ppt-fill"></i>
			<span>KUNJUNGAN</span>
		</a>
	</li>
	<li class="nav-item">
		<a class="nav-link collapsed" href="<?= base_url('jkn/merge-pdf'); ?>">
			<i class="bi bi-file-earmark-plus"></i>
			<span>MERGE FILES</span>
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
	</li>
	<!-- VCLAIM -->
	<li class="nav-item">
		<a class="nav-link collapsed" href="<?= base_url('vclaim/seppersonal'); ?>">
			<i class="bi bi-slack"></i><span>VCLAIM V2</span>
		</a>
	</li>
	<!-- End Tables Nav -->
	<!-- SMARTREMUN  -->
	<li class="nav-item">
		<a class="nav-link collapsed" data-bs-target="#smartremun-nav" data-bs-toggle="collapse" href="#">
			<i class="bi bi-journal-text"></i><span>SMARTREMUN</span><i class="bi bi-chevron-down ms-auto"></i>
		</a>
		<ul id="smartremun-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
			<li>
				<a href="<?= base_url('sipayu/rekon_rajal'); ?>">
					<i class="bi bi-circle"></i><span>Rawat Jalan</span>
				</a>
			</li>
			<li>
				<a href="<?= base_url('sipayu/rekon_ranap'); ?>">
					<i class="bi bi-circle"></i><span>Rawat Inap</span>
				</a>
			</li>
			<li>
				<a href="<?= base_url('sipayu/rekon_igd'); ?>">
					<i class="bi bi-circle"></i><span>IGD</span>
				</a>
			</li>
			<li>
				<a href="<?= base_url('sipayu/rekon_operasi'); ?>">
					<i class="bi bi-circle"></i><span>Kamar Operasi</span>
				</a>
			</li>
			<li>
				<a href="<?= base_url('sipayu/rekon_laboratorium'); ?>">
					<i class="bi bi-circle"></i><span>Laboratorium</span>
				</a>
			</li>
			<li>
				<a href="<?= base_url('sipayu/rekon_radiologi'); ?>">
					<i class="bi bi-circle"></i><span>Radiologi</span>
				</a>
			</li>
			<li>
				<a href="<?= base_url('sipayu/alldokter'); ?>">
					<i class="bi bi-circle"></i><span>Farmasi</span>
				</a>
			</li>
		</ul>
	</li>
	<!-- END SMARTREMUN  -->
	<li class="nav-item">
		<a class="nav-link collapsed" href="<?= base_url('simutayu/form_munas'); ?>">
			<i class="bi bi-bar-chart"></i>
			<span>SI IMUT AYU</span>
		</a>
	</li>
	</li>
	<li class="nav-item">
		<a class="nav-link collapsed" href="<?= base_url('sipejuang/dashboardpengajuan'); ?>">
			<i class="bi bi-file-earmark-ppt"></i>
			<span>SIPEJUANG</span>
		</a>
	</li>
<?php endif; ?>

<!--END KAMAR OPERASI -->

<!--LABORATORIM DAN RADIOLOGI -->
<?php
if (
	session()->get('Ses_Tupoksi') == 'LABORATORIUM' ||
	session()->get('Ses_Tupoksi') == 'RADIOLOGI'
) :
?>
	<li class="nav-item">
		<a class="nav-link collapsed" href="<?= base_url('admin/dashboard-admin'); ?>">
			<i class="bi bi-grid"></i>
			<span>Dashboard</span>
		</a>
	</li>
	<!--<li class="nav-heading">JKN</li>-->
	<!--<li class="nav-item">-->
	<!--	<a class="nav-link collapsed" href="<?= base_url('jkn/listpasienranap'); ?>">-->
	<!--		<i class="bi bi-box-arrow-in-right"></i>-->
	<!--		<span>RAWAT INAP</span>-->
	<!--	</a>-->
	<!--</li>-->
	<li class="nav-item">
		<a class="nav-link collapsed" href="<?= base_url('page/kunjungan'); ?>">
			<i class="bi bi-file-earmark-ppt-fill"></i>
			<span>Kunjungan</span>
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
	</li>
	<!-- VCLAIM -->
	<li class="nav-item">
		<a class="nav-link collapsed" href="<?= base_url('vclaim/seppersonal'); ?>">
			<i class="bi bi-slack"></i><span>VCLAIM V2</span>
		</a>
	</li>
	<!-- End Tables Nav -->
	<!-- SMARTREMUN  -->
	<li class="nav-item">
		<a class="nav-link collapsed" data-bs-target="#smartremun-nav" data-bs-toggle="collapse" href="#">
			<i class="bi bi-journal-text"></i><span>SMARTREMUN</span><i class="bi bi-chevron-down ms-auto"></i>
		</a>
		<ul id="smartremun-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
			<!--<li>-->
			<!--	<a href="<?= base_url('sipayu/rekon_rajal'); ?>">-->
			<!--		<i class="bi bi-circle"></i><span>Rawat Jalan</span>-->
			<!--	</a>-->
			<!--</li>-->
			<!--<li>-->
			<!--	<a href="<?= base_url('sipayu/rekon_ranap'); ?>">-->
			<!--		<i class="bi bi-circle"></i><span>Rawat Inap</span>-->
			<!--	</a>-->
			<!--</li>-->
			<!--<li>-->
			<!--	<a href="<?= base_url('sipayu/rekon_igd'); ?>">-->
			<!--		<i class="bi bi-circle"></i><span>IGD</span>-->
			<!--	</a>-->
			<!--</li>-->
			<!--<li>-->
			<!--	<a href="<?= base_url('sipayu/rekon_operasi'); ?>">-->
			<!--		<i class="bi bi-circle"></i><span>Kamar Operasi</span>-->
			<!--	</a>-->
			<!--</li>-->
			<li>
				<a href="<?= base_url('sipayu/rekon_laboratorium'); ?>">
					<i class="bi bi-circle"></i><span>Laboratorium</span>
				</a>
			</li>
			<li>
				<a href="<?= base_url('sipayu/rekon_radiologi'); ?>">
					<i class="bi bi-circle"></i><span>Radiologi</span>
				</a>
			</li>
			<li>
				<a href="<?= base_url('sipayu/alldokter'); ?>">
					<i class="bi bi-circle"></i><span>Farmasi</span>
				</a>
			</li>
		</ul>
	</li>
	<!-- END SMARTREMUN  -->
	<li class="nav-item">
		<a class="nav-link collapsed" href="<?= base_url('simutayu/form_munas'); ?>">
			<i class="bi bi-bar-chart"></i>
			<span>SI IMUT AYU</span>
		</a>
	</li>
	</li>
	<li class="nav-item">
		<a class="nav-link collapsed" href="<?= base_url('sipejuang/dashboardpengajuan'); ?>">
			<i class="bi bi-file-earmark-ppt"></i>
			<span>SIPEJUANG</span>
		</a>
	</li>
<?php endif; ?>

<!--END LAB & RAD -->


</ul>

</aside><!-- End Sidebar-->
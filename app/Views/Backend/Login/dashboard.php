<?= $this->extend('layout/template'); ?>
<?= $this->section('content'); ?>
<main id="main" class="main">
	<?php if (session()->get('Ses_Level') == '1') : ?>
		<div class="pagetitle">
			<h6 class="fw-bold">APLIKASI RSUD</h6>
			<nav>
				<ol class="breadcrumb">
					<li class="breadcrumb-item"><a href="index.html"><a href="<?= base_url('admin/dashboard-admin'); ?>">Home</a></li>
					<li class="breadcrumb-item">Pages</li>
					<li class="breadcrumb-item active"><a href="<?= base_url('admin/dashboard-admin'); ?>">Dashboard</a></li>
				</ol>
			</nav>
		</div><!-- End Page Title -->
		<section class="section">
			<div class="row">
				<div class="col-lg-12">
					<div class="card">
						<div class="card-body mt-4">
							<!-- <h5 class="card-title">List Aplikasi</h5> -->
							<a href="http://192.168.4.47:8080/" target="_blank">
								<button class="btn btn-success btn-sm">
									<i class="bi bi-play-fill"></i> iTRSUD
								</button>
							</a>
							<a href="http://192.168.71.2/apps/SIMpel/#welcome" target="_blank">
								<button class="btn btn-outline-success btn-sm">
									<i class="bi bi-play-fill"></i> SIMRS V2
								</button>
							</a>
							<a href="http://192.168.24.76:8081/smartRemun/" target="_blank">
								<button class="btn btn-outline-success btn-sm">
									<i class="bi bi-play-fill"></i> SIPAYU
								</button>
							</a>
							<a href="http://192.168.71.9" target="_blank">
								<button class="btn btn-outline-success btn-sm">
									<i class="bi bi-play-fill"></i> DTS
								</button>
							</a>
							<a href="http://192.168.121.2" target="_blank">
								<button class="btn btn-outline-success btn-sm">
									<i class="bi bi-play-fill"></i> SIPEJUANG
								</button>
							</a>
							</a>
							<a href="http://192.168.52.2/simra/login.php" target="_blank">
								<button class="btn btn-outline-success btn-sm">
									<i class="bi bi-play-fill"></i> SIMRA
								</button>
							</a>
							<a href="http://192.168.52.2/jaspel/login.php" target="_blank">
								<button class="btn btn-outline-success btn-sm ">
									<i class="bi bi-play-fill"></i> JASPEL
								</button>
							</a>
							<a href="http://192.168.52.3" target="_blank">
								<button class="btn btn-outline-success btn-sm">
									<i class="bi bi-play-fill"></i> SIMUT AYU
								</button>
							</a>
							<a href="http://192.168.52.11/#/display" target="_blank">
								<button class="btn btn-outline-success btn-sm fc-red">
									<i class="bi bi-play-fill"></i> ANTREAN
								</button>
							</a>
							<a href="http://192.168.21.112/simrs/login.php" target="_blank">
								<button class="btn btn-outline-success btn-sm">
									<i class="bi bi-play-fill"></i> SIMRS V1
								</button>
							</a>
							<a href="http://192.168.121.6/poskasir" target="_blank">
								<button class="btn btn-outline-success btn-sm">
									<i class="bi bi-play-fill"></i> POSKASIR
								</button>
							</a>
							<a href="https://si-asik.web.id/" target="_blank">
								<button class="btn btn-outline-success btn-sm">
									<i class="bi bi-play-fill"></i> SIASIK
								</button>
							</a>
						</div>
		</section>
		<!--Acording-->
		<section class="section dashboard">
			<div class="row">
				<!-- Left side columns -->
				<div class="col-lg-8">
					<div class="row">
						<!-- Sales Card -->
						<div class="col-xxl-4 col-md-6">
							<div class="card info-card sales-card">
								<div class="filter">
									<a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
									<ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
										<li class="dropdown-header text-start">
											<h6>SIGN IN</h6>
										</li>
										<li><a class="dropdown-item" href="#">Us : root</a></li>
										<li><a class="dropdown-item" href="#">Ps : bismillah123</a></li>
										<!-- <li><a class="dropdown-item" href="#">This Year</a></li> -->
									</ul>
								</div>
								<div class="card-body">
									<h5 class="card-title">Proxmox <span>| VS SIMRS V2</span></h5>
									<div class="d-flex align-items-center">
										<div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
											<a href="https://192.168.70.2:8006/#v1:0:18:4:::::::" target="_blank">
												<img src="<?= base_url() ?>/assets/img/proxmox.png" alt="" style="width:40px;height:40px" class="smooth-blink">
											</a>
										</div>
										<div class="ps-3">
											<h6>PROX</h6>
											<span class="text-success small pt-1 fw-bold">VE</span> <span class="text-muted small pt-2 ps-1">Virtual Environmet</span>
										</div>
									</div>
								</div>
							</div>
						</div>
						<div class="col-xxl-4 col-md-6">
							<div class="card info-card sales-card">
								<div class="filter">
									<a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
									<ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
										<li class="dropdown-header text-start">
											<h6>SIGN IN</h6>
										</li>
										<li><a class="dropdown-item" href="#">Us : root</a></li>
										<li><a class="dropdown-item" href="#">Ps : bismillah123</a></li>
										<!-- <li><a class="dropdown-item" href="#">This Year</a></li> -->
									</ul>
								</div>
								<div class="card-body">
									<h5 class="card-title">Proxmox <span>| VS SIMRS V1</span></h5>
									<div class="d-flex align-items-center">
										<div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
											<a href="https://192.168.111.2:8006/#v1:0:18:4:::::::" target="_blank">
												<img src="<?= base_url() ?>/assets/img/proxmox.png" alt="" style="width:40px;height:40px" class="smooth-blink">
											</a>
										</div>
										<div class="ps-3">
											<h6>PROX</h6>
											<span class="text-success small pt-1 fw-bold">VE</span> <span class="text-muted small pt-2 ps-1">Virtual Environmet</span>
										</div>
									</div>
								</div>
							</div>
						</div>
						<!-- End Sales Card -->
						<!-- Revenue Card -->
						<div class="col-xxl-4 col-md-6">
							<div class="card info-card revenue-card">
								<div class="filter">
									<a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
									<ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
										<li class="dropdown-header text-start">
											<h6>SIGN IN</h6>
										</li>
										<li><a class="dropdown-item" href="#">Us : superadmin</a></li>
										<li><a class="dropdown-item" href="#">Ps: itrsud2024</a></li>
									</ul>
								</div>
								<div class="card-body">
									<h5 class="card-title">AA Panel <span>| MS</span></h5>
									<div class="d-flex align-items-center">
										<div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
											<a href="https://192.168.121.6:4444/webpanel" target="_blank">
												<img src="<?= base_url() ?>/assets/img/aaPanel.png" alt="" style="width:40px;height:40px" class="smooth-blink">
											</a>
										</div>
										<div class="ps-3">
											<h6>PANEL</h6>
											<span class="text-success small pt-1 fw-bold">AA</span> <span class="text-muted small pt-2 ps-1">Panel Linux</span>
										</div>
									</div>
								</div>
							</div>
						</div><!-- End Revenue Card -->
						<!-- Customers Card -->
						<div class="col-xxl-4 col-xl-12">
							<div class="card info-card customers-card">
								<div class="filter">
									<a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
									<ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
										<li class="dropdown-header text-start">
											<h6>SIGN IN</h6>
										</li>
										<li><a class="dropdown-item" href="#">Us : itrsudindramayu</a></li>
										<li><a class="dropdown-item" href="#">Ps : itrsud2024</a></li>
									</ul>
								</div>
								<div class="card-body">
									<h5 class="card-title">KUMA <span>| Monitoring</span></h5>
									<div class="d-flex align-items-center">
										<div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
											<a href="http://192.168.121.4:3001/dashboard" target="_blank">
												<img src="<?= base_url() ?>/assets/img/kuma.png" alt="" style="width:40px;height:40px" class="smooth-blink">
											</a>
										</div>
										<div class="ps-3">
											<h6>UPTIME</h6>
											<span class="text-danger small pt-1 fw-bold">UK</span> <span class="text-muted small pt-2 ps-1">Monitoring Server</span>
										</div>
									</div>
								</div>
							</div>
						</div><!-- End Customers Card -->
						<!-- Reports -->
						<div class="col-12">
							<div class="card">
								<div class="filter">
									<a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
									<ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
										<li class="dropdown-header text-start">
											<h6>Filter</h6>
										</li>
										<li><a class="dropdown-item" href="#">Today</a></li>
										<li><a class="dropdown-item" href="#">This Month</a></li>
										<li><a class="dropdown-item" href="#">This Year</a></li>
									</ul>
								</div>
								<div class="card-body">
									<h5 class="card-title">Produktifitas <span>/Today</span></h5>
									<!-- Line Chart -->
									<div id="reportsChart"></div>
									<script>
										document.addEventListener("DOMContentLoaded", () => {
											new ApexCharts(document.querySelector("#reportsChart"), {
												series: [{
													name: 'Sales',
													data: [31, 40, 28, 51, 42, 82, 56],
												}, {
													name: 'Revenue',
													data: [11, 32, 45, 32, 34, 52, 41]
												}, {
													name: 'Customers',
													data: [15, 11, 32, 18, 9, 24, 11]
												}],
												chart: {
													height: 350,
													type: 'area',
													toolbar: {
														show: false
													},
												},
												markers: {
													size: 4
												},
												colors: ['#4154f1', '#2eca6a', '#ff771d'],
												fill: {
													type: "gradient",
													gradient: {
														shadeIntensity: 1,
														opacityFrom: 0.3,
														opacityTo: 0.4,
														stops: [0, 90, 100]
													}
												},
												dataLabels: {
													enabled: false
												},
												stroke: {
													curve: 'smooth',
													width: 2
												},
												xaxis: {
													type: 'datetime',
													categories: ["2018-09-19T00:00:00.000Z", "2018-09-19T01:30:00.000Z", "2018-09-19T02:30:00.000Z", "2018-09-19T03:30:00.000Z", "2018-09-19T04:30:00.000Z", "2018-09-19T05:30:00.000Z", "2018-09-19T06:30:00.000Z"]
												},
												tooltip: {
													x: {
														format: 'dd/MM/yy HH:mm'
													},
												}
											}).render();
										});
									</script>
									<!-- End Line Chart -->

								</div>

							</div>
						</div><!-- End Reports -->

						<!-- Recent Sales -->
						<div class="col-12">
							<div class="card recent-sales overflow-auto">

								<div class="filter">
									<a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
									<ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
										<li class="dropdown-header text-start">
											<h6>Filter</h6>
										</li>

										<li><a class="dropdown-item" href="#">Today</a></li>
										<li><a class="dropdown-item" href="#">This Month</a></li>
										<li><a class="dropdown-item" href="#">This Year</a></li>
									</ul>
								</div>

								<div class="card-body">
									<h5 class="card-title">Administrator <span>| Today</span></h5>

									<table class="table table-striped" style="font-size: 12px;">
										<thead>
											<!-- <tr>
												<th colspan="7">
													<button class="btn btn-info btn btn-sm me-1" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Add" onclick="window.location.href='<?= base_url('users/addusers'); ?>'"><i class="bi bi-plus"></i></button>
													<button class="btn btn-success btn btn-sm me-1" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Export Excel" onclick="window.location.href='<?= base_url('users/export-excel'); ?>'"><i class="bi bi-file-earmark-excel"></i></button>
													<a href="<?= base_url('users/cetak_pdf'); ?>" class="btn btn-danger btn btn-sm me-1" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Export PDF" target="_blank"><i class="bi bi-file-earmark-pdf-fill"></i></a>

												</th>
											</tr> -->
											<tr class="align-middle">
												<th class="text-center">
													<b>ID</b>
												</th>
												<th>NAMA LENGKAP</th>
												<th>USERNAMA</th>
												<!-- <th data-type="date" data-format="YYYY/DD/MM">NIK</th> -->
												<th class="text-center">LEVEL</th>
												<th class="text-center">TUPOKSI</th>
												<th class="text-center">STATUS</th>
											</tr>
										</thead>
										<tbody>
											<tr class="align-middle">
												<?php foreach ($selectadmin as $dtUser) : ?>
													<td class="text-center"><?= esc($dtUser['IdAdmin']) ?></td>
													<td><?= esc($dtUser['NamaAdmin']) ?></td>
													<td><?= esc($dtUser['UserName']) ?></td>
													<td class="text-center"><?php if (esc($dtUser['Level']) == 1) : ?> ADMINISTRATOR <?php else : ?> USER <?php endif; ?></td>
													<td class="text-center"><?= esc($dtUser['Tupoksi']) ?></td>
													<td class="text-center"><?php if (esc($dtUser['Status']) == 1) : ?>
															<span class="badge text-bg-success">AKTIF</span>
														<?php else : ?>
															<span class="badge text-bg-danger">TIDAK AKTIF</span>
														<?php endif; ?>
													</td>

											</tr>
										<?php endforeach ?>
										</tbody>
									</table>

								</div>

							</div>
						</div><!-- End Recent Sales -->



					</div>
				</div><!-- End Left side columns -->

				<!-- Right side columns -->
				<div class="col-lg-4">

					<!-- Recent Activity -->
					<div class="card">
						<div class="filter">
							<a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
							<ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
								<li class="dropdown-header text-start">
									<h6>Filter</h6>
								</li>

								<li><a class="dropdown-item" href="#">Today</a></li>
								<li><a class="dropdown-item" href="#">This Month</a></li>
								<li><a class="dropdown-item" href="#">This Year</a></li>
							</ul>
						</div>

						<div class="card-body">
							<h5 class="card-title">Recent Activity <span>| Today</span></h5>

							<div class="activity">
								<?php foreach ($selectadmin as $dtUser) : ?>
									<div class="activity-item d-flex">
										<div class="activite-label"><?= esc($dtUser['IdAdmin']) ?></div>
										<?php
										$statusClass = ($dtUser['IdAdmin'] % 2 == 0) ? 'success' : 'danger';
										?>
										<i class='bi bi-circle-fill activity-badge  text-<?= esc($statusClass) ?> align-self-start' data-bs-toggle="tooltip" data-bs-placement="top"></i>
										<div class=" activity-content">
											<?= esc($dtUser['NamaAdmin']) ?> <a href="#" class="fw-bold text-dark"><?= esc($dtUser['Tupoksi']) ?></a> | <?php if (esc($dtUser['Status']) == 1) : ?>
												<span class="badge text-bg-success">AKTIF</span>
											<?php else : ?>
												<span class="badge text-bg-danger">TIDAK AKTIF</span>
											<?php endif; ?>
										</div>
									</div><!-- End activity item-->
								<?php endforeach ?>
								<!-- End activity item-->

							</div>

						</div>
					</div><!-- End Recent Activity -->

					<!-- Budget Report -->
					<div class="card">
						<div class="filter">
							<a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
							<ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
								<li class="dropdown-header text-start">
									<h6>Filter</h6>
								</li>

								<li><a class="dropdown-item" href="#">Today</a></li>
								<li><a class="dropdown-item" href="#">This Month</a></li>
								<li><a class="dropdown-item" href="#">This Year</a></li>
							</ul>
						</div>

						<div class="card-body pb-0">
							<h5 class="card-title">Budget Report <span>| This Month</span></h5>

							<div id="budgetChart" style="min-height: 400px;" class="echart"></div>

							<script>
								document.addEventListener("DOMContentLoaded", () => {
									var budgetChart = echarts.init(document.querySelector("#budgetChart")).setOption({
										legend: {
											data: ['Allocated Budget', 'Actual Spending']
										},
										radar: {
											// shape: 'circle',
											indicator: [{
													name: 'Sales',
													max: 6500
												},
												{
													name: 'Administration',
													max: 16000
												},
												{
													name: 'Information Technology',
													max: 30000
												},
												{
													name: 'Customer Support',
													max: 38000
												},
												{
													name: 'Development',
													max: 52000
												},
												{
													name: 'Marketing',
													max: 25000
												}
											]
										},
										series: [{
											name: 'Budget vs spending',
											type: 'radar',
											data: [{
													value: [4200, 3000, 20000, 35000, 50000, 18000],
													name: 'Allocated Budget'
												},
												{
													value: [5000, 14000, 28000, 26000, 42000, 21000],
													name: 'Actual Spending'
												}
											]
										}]
									});
								});
							</script>
						</div>
					</div><!-- End Budget Report -->
				</div><!-- End Right side columns -->

			</div>
		</section>
		</div>
		</div>
		</div>
		</div>
		</section>
	<?php endif; ?>

	<?php if (session()->get('Ses_Tupoksi') == 'POLIKLINIK' || session()->get('Ses_Tupoksi') == 'RAWAT INAP' || session()->get('Ses_Tupoksi') == 'KEUANGAN'): ?>

		<section class="section dashboard">
			<div class="row">

				<!-- Left side columns -->
				<div class="col-lg-12">
					<div class="row">
						<!-- SIPAYU -->
						<div class="col-xxl-3 col-md-3">
							<div class="card info-card sales-card">
								<div class="card-body">
									<h5 class="card-title">SIPAYU <span>| Pengolahan Jasa</span></h5>
									<div class="d-flex align-items-center">
										<div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
											<i class="bi bi-calendar2-range"></i>
										</div>
										<div class="ps-3">
											<a href="http://192.168.24.76:8081/smartRemun/" target="_blank">
												<button class="btn btn-outline-primary btn-sm">
													<i class="bi bi-play-fill"></i> SIPAYU
												</button>
											</a>
										</div>
									</div>
								</div>
							</div>
						</div>
						<!-- END SIPAYU -->
						<!-- JASPEL -->
						<div class="col-xxl-3 col-md-3">
							<div class="card info-card sales-card">
								<div class="card-body">
									<h5 class="card-title">JASPEL <span>| Jasa Pihak Ketiga</span></h5>
									<div class="d-flex align-items-center">
										<div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
											<i class="bi bi-grid" style="color: green;"></i>
										</div>
										<div class="ps-3">
											<!-- <h6> > </h6> -->
											<!-- <span class="text-success small pt-1 fw-bold">12%</span> <span class="text-muted small pt-2 ps-1">increase</span> -->
											<a href="http://192.168.52.2/jaspel/login.php" target="_blank">
												<button class="btn btn-outline-success btn-sm">
													<i class="bi bi-play-fill"></i> JASPEL
												</button>
											</a>
										</div>
									</div>
								</div>
							</div>
						</div>
						<!-- END JASPEL -->
						<!-- SIMRS -->
						<div class="col-xxl-3 col-md-3">
							<div class="card info-card sales-card">
								<div class="card-body">
									<h5 class="card-title">SIMRS <span>| SIMRS GOS V2</span></h5>
									<div class="d-flex align-items-center">
										<div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
											<i class="bi bi-grid" style="color: green;"></i>
										</div>
										<div class="ps-3">
											<a href="http://192.168.71.2/apps/SIMpel/#welcome" target="_blank">
												<button class="btn btn-outline-info btn-sm"><i class="bi bi-play-fill"></i>GOS V2
										</div>
									</div>
								</div>
								</button>
								</a>
							</div>
						</div>
						<!-- END SIMRS -->
						<!-- DTS -->
						<div class="col-xxl-3 col-md-3">
							<div class="card info-card sales-card">
								<div class="card-body">
									<h5 class="card-title">DTS <span>| DT System</span></h5>
									<div class="d-flex align-items-center">
										<div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
											<i class="bi bi-grid" style="color: green;"></i>
										</div>
										<div class="ps-3">
											<a href="http://192.168.71.9" target="_blank">
												<button class="btn btn-outline-info btn-sm">
													<i class="bi bi-play-fill"></i>D T S
										</div>
									</div>
								</div>
								</button>
								</a>
							</div>
						</div>
						<!-- END DTS -->
						<!-- SIPEJUANG -->
						<div class="col-xxl-3 col-md-3">
							<div class="card info-card sales-card">
								<div class="card-body">
									<h5 class="card-title">SIPEJUANG <span>| Amprahan</span></h5>
									<div class="d-flex align-items-center">
										<div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
											<i class="bi bi-grid" style="color:#ffc107;"></i>
										</div>
										<div class="ps-3">
											<a href="http://192.168.121.2" target="_blank">
												<button class="btn btn-outline-warning btn-sm">
													<i class="bi bi-play-fill"></i>SIPEJUANG
										</div>
									</div>
								</div>
								</button>
								</a>
							</div>
						</div>
						<!-- END SIPEJUANG -->
						<!-- SIIMUT AYU -->
						<div class="col-xxl-3 col-md-3">
							<div class="card info-card sales-card">
								<div class="card-body">
									<h5 class="card-title">SIMUT AYU <span>| Mutu</span></h5>
									<div class="d-flex align-items-center">
										<div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
											<i class="bi bi-grid" style="color: red;"></i>
										</div>
										<div class="ps-3">
											<a href="http://192.168.52.3" target="_blank">
												<button class="btn btn-outline-danger btn-sm">
													<i class="bi bi-play-fill"></i>SIMUT AYU
										</div>
									</div>
								</div>
								</button>
								</a>
							</div>
						</div>
						<!-- END SIIMUT AYU -->

					</div>
				</div>
			</div>
		<?php endif; ?>
</main>
<!-- End #main -->
<?= $this->endSection(); ?>`
<?= $this->extend('layout/template'); ?>
<?= $this->section('content'); ?>
<main id="main" class="main">
	<?php if (session()->get('Ses_Level') == '1') : ?>
		<div class="pagetitle">
			<h6 class="fw-bold">INDIKATOR MUTU</h6>
			<nav>
				<ol class="breadcrumb">
					<li class="breadcrumb-item"><a href="index.html"><a href="<?= base_url('admin/dashboard-admin'); ?>">SIIMUTAYU</a></li>
					<li class="breadcrumb-item">Indikator Mutu</li>
					<!-- <li class="breadcrumb-item active"><a href="<?= base_url('admin/dashboard-admin'); ?>">Dashboard</a></li> -->
				</ol>
			</nav>
		</div><!-- End Page Title -->

		<!-- MUTU NASIONAL  -->
		<?php foreach ($mutu as $jenis) : ?>
			<section class="section">
				<div class="row">
					<div class="col-3 col-md-3 col-lg-3">
						<div class="card text-dark bg-light">
							<div class="card-header p-1 m-0 ps-2">
								<span class="badge text-bg-success"><?= $jenis['id']; ?></span> <?= $jenis['nama']; ?>
							</div>
							<div class="card-body p-2 ps-3 text-secondary">

							</div>
						</div>
					</div>

				</div>
			</section>
		<?php endforeach ?>
		<!-- END MUTU NASIONAL  -->
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
						<!-- <div class="col-xxl-4 col-xl-12"> -->
						<div class="col-xxl-4 col-md-6">
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
												<?php foreach ($mutu as $dtUser) : ?>
													<td class="text-center"><?= esc($dtUser['id']) ?></td>
													<td><?= esc($dtUser['id']) ?></td>
													<td><?= esc($dtUser['nama']) ?></td>
													<td class="text-center"><?php if (esc($dtUser['nama']) == 1) : ?> ADMINISTRATOR <?php else : ?> USER <?php endif; ?></td>
													<td class="text-center"><?= esc($dtUser['nama']) ?></td>
													<td class="text-center"><?php if (esc($dtUser['nama']) == 1) : ?>
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
								<?php foreach ($mutu as $dtUser) : ?>
									<div class="activity-item d-flex">
										<div class="activite-label"><?= esc($dtUser['id']) ?></div>
										<?php
										$statusClass = ($dtUser['id'] % 2 == 0) ? 'success' : 'danger';
										?>
										<i class='bi bi-circle-fill activity-badge  text-<?= esc($statusClass) ?> align-self-start' data-bs-toggle="tooltip" data-bs-placement="top"></i>
										<div class=" activity-content">
											<?= esc($dtUser['nama']) ?> <a href="#" class="fw-bold text-dark"><?= esc($dtUser['nama']) ?></a> | <?php if (esc($dtUser['id']) == 1) : ?>
												<span class="badge text-bg-success">AKTIF</span>
											<?php else : ?>
												<span class="badge text-bg-danger">TIDAK AKTIF</span>
												<?php endif; ?>a
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


</main>
<!-- End #main -->
<?= $this->endSection(); ?>`
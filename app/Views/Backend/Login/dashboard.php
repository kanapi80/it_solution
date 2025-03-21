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
					<!-- <div class="card"> -->
					<div class="card-body mt-4 p-0 mb-3">
						<!-- <h5 class="card-title">List Aplikasi</h5> -->
						<a href="http://admin.site/" target="_blank">
							<button class="btn btn-success btn-sm btn-shadow text-start">
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
						<!-- </div> -->
		</section>
		<!--Acording-->
		<section class="section dashboard">
			<div class="row">
				<!-- Left side columns -->
				<div class="col-lg-8">
					<div class="row">
						<!-- Sales Card -->
						<div class="col-xxl-3 col-md-3">
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
									<h5 class="card-title">Proxmox <span>| V2</span></h5>
									<div class="d-flex align-items-center">
										<div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
											<a href="https://192.168.70.2:8006/#v1:0:18:4:::::::" target="_blank">
												<img src="<?= base_url() ?>/assets/img/proxmox.png" alt="" style="width:40px;height:40px" class="smooth-blink">
											</a>
										</div>
										<div class="ps-3">
											<!-- <h6>PROX</h6> -->
											<span class="badge bg-success text-white small pt-1 fw-bold">VE</span> <span class="text-muted small pt-2 ps-1">Virtual Environmet</span>
										</div>
									</div>
								</div>
							</div>
						</div>
						<div class="col-xxl-3 col-md-3">
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
									<h5 class="card-title">Proxmox <span>| V1</span></h5>
									<div class="d-flex align-items-center">
										<div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
											<a href="https://192.168.111.2:8006/#v1:0:18:4:::::::" target="_blank">
												<img src="<?= base_url() ?>/assets/img/proxmox.png" alt="" style="width:40px;height:40px" class="smooth-blink">
											</a>
										</div>
										<div class="ps-3">
											<!-- <h6>PROX</h6> -->
											<span class="badge bg-info text-white small pt-1 fw-bold">VE</span> <span class="text-muted small pt-2 ps-1">Virtual Environmet</span>
										</div>
									</div>
								</div>
							</div>
						</div>
						<!-- End Sales Card -->
						<!-- Revenue Card -->
						<div class="col-xxl-3 col-md-3">
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
											<!-- <h6>PANEL</h6> -->
											<span class="badge bg-warning text-dark small pt-1 fw-bold">AA</span> <span class="text-muted small pt-2 ps-1">Panel Linux</span>
										</div>
									</div>
								</div>
							</div>
						</div><!-- End Revenue Card -->
						<!-- Customers Card -->
						<!-- <div class="col-xxl-4 col-xl-12"> -->
						<div class="col-xxl-3 col-md-3">
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
									<h5 class="card-title">KUMA <span>| Mon</span></h5>
									<div class="d-flex align-items-center">
										<div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
											<a href="http://192.168.121.4:3001/dashboard" target="_blank">
												<img src="<?= base_url() ?>/assets/img/kuma.png" alt="" style="width:40px;height:40px" class="smooth-blink">
											</a>
										</div>
										<div class="ps-3">
											<!-- <h6>UPTIME</h6> -->
											<span class="badge bg-primary text-white small pt-1 fw-bold">UK</span> <span class="text-muted small pt-2 ps-1">Monitoring Server</span>
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

								<!-- <div class="filter">
									<a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
									<ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
										<li class="dropdown-header text-start">
											<h6>Filter</h6>
										</li>

										<li><a class="dropdown-item" href="#">Today</a></li>
										<li><a class="dropdown-item" href="#">This Month</a></li>
										<li><a class="dropdown-item" href="#">This Year</a></li>
									</ul>
								</div> -->

								<div class="card-body">
									<div class="card-body d-flex align-items-center justify-content-between">
										<div class="d-flex align-items-center">
											<button onclick="window.location.reload();" class="btn btn-primary btn-xs rounded-1" data-bs-toggle="tooltip" data-bs-placement="top" title="Refresh">
												<i class="bi bi-arrow-clockwise"></i>
											</button>
											<h5 class="card-title mb-0 ms-2">Monitoring TTE <span>| Today</span></h5>
										</div>
										<div class="d-flex align-items-center">
											<button type="button" class="btn btn-outline-success btn-sm fs-7 me-2" id="btn-filter"
												onclick="window.open('http://esign.indramayukab.go.id', '_blank')">
												<?= str_replace('"', '', $configtte['URL']); ?>
											</button>
											<input type="hidden" name="id" value="87" id="id">
											<?php $status = str_replace('"', '', trim($configtte['ST_STATUS'])); ?>
											<button type="button" id="toggleButton" class="btn btn-<?= ($status === 'true') ? 'success' : 'danger'; ?> btn-sm fs-7 <?= ($status === 'true') ? 'blink' : ''; ?>"
												onclick="updateGrouping()" data-bs-toggle="tooltip" data-bs-placement="top" title="<?= ($status === 'true') ? 'Non Aktifkan' : 'Aktifkan'; ?>">
												<i class="bi <?= ($status === 'true') ? 'bi-circle-fill' : 'bi-circle'; ?>"></i>
												<?= ($status === 'true') ? 'Aktif' : 'Non Aktif'; ?>
											</button>
										</div>
									</div>

									<!-- <table class="table table-borderless w-100 table-sm table-striped" style="font-size: 10px;" id="listuser">
										<thead>
											<tr class="align-middle bg-success text-white">
												<th class="text-center bg-success text-white" width="3%">NO</th>
												<th class="text-start bg-success text-white ps-2" width="10%">NAMA</th>
												<th class="text-start bg-success text-white" width="12%">USERNAME</th>
												<th class="text-start bg-success text-white" width="12%">PASSWORD</th>
												<th class="text-start bg-success text-white" width="15%">RUANGAN</th>
												<th class="text-center bg-success text-white" width="8%">AREA</th>
												<th class="text-start bg-success text-white" width="10%">STATUS</th>
											</tr>
										</thead>
										<tbody>
										</tbody>
									</table> -->

									<table class="table table-borderless w-100 table-sm table-striped" style="font-size: 10px;">
										<tr>
											<th class="text-center bg-success  text-white">NO</th>
											<!-- <th class="bg-success  text-white">ID</th> -->
											<th class="bg-success  text-white">TANGGAL</th>
											<th class="bg-success  text-white text-center">CODE</th>
											<th class="bg-success  text-white">RESPONSE</th>
											<th class="bg-success  text-white">DOKTER</th>
										</tr>
										<?php
										$tte_limit = array_slice($tte, 0, 15); // Ambil 15 data pertama

										$no = 1;
										foreach ($tte_limit as $row) : ?>
											<tr class="align-middle">
												<td class="text-center"><?= $no++ ?></td>
												<!-- <td><?= $row['ID'] ?></td> -->
												<td><?= $row['TANGGAL'] ?></td>
												<td class="text-center"><?php if ($row['STATUS_CODE'] == '200') : ?> <span class="badge bg-success rounded-1"><?= $row['STATUS_CODE'] ?></span> <?php else : ?> <span class="badge bg-danger rounded-1"><?= $row['STATUS_CODE'] ?></span><?php endif; ?></td>
												<td><?php if ($row['STATUS_CODE'] == '200') : ?> <i class="bi bi-check2-square text-success"></i> <?php $string = $row['DOK'];
																																					$string = str_replace('"', '', $string);
																																					echo $string; ?><?php else : ?><?= $row['ERROR'] ?> <span class="badge bg-danger rounded-1"><?= $row['ST_CODE'] ?></span><?php endif; ?></td>
												<td><?= $row['DPJP'] ?></td>

											</tr>
										<?php endforeach; ?>

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
							<h5 class="card-title">User Activity <span>| Today</span></h5>

							<div class="activity" style="font-size: 12px;">
								<?php foreach ($selectadmin as $dtUser) : ?>
									<div class="activity-item d-flex">
										<div class="activite-label text-end pe-2"><?= esc($dtUser['id']) ?></div>
										<?php
										$statusClass = ($dtUser['id'] % 2 == 0) ? 'success' : 'danger';
										?>
										<i class='bi bi-circle-fill activity-badge text-<?= esc($statusClass) ?> align-self-start' data-bs-toggle="tooltip" data-bs-placement="top"></i>
										<div class="activity-content">
											<?= esc($dtUser['email']) ?>
											<a href="#" class="fw-bold text-dark"><?= esc($dtUser['locationcode']) ?></a>
											<?php if ($dtUser['status'] == 1) : ?>
												<span class="badge text-bg-success rounded-1">AKTIF</span>
											<?php else : ?>
												<span class="badge text-bg-danger rounded-1">TIDAK AKTIF</span>
											<?php endif; ?>
										</div>
									</div>
								<?php endforeach; ?>
							</div>

							<!-- Pagination -->
							<div class="pagination mt-3 pagination justify-content-end">
								<nav aria-label="Page navigation example">
									<ul class="pagination justify-content-end pagination-sm">
										<?php
										$currentPage = $pager->getCurrentPage();
										$pageCount = $pager->getPageCount();
										$startPage = max(1, $currentPage - 1);
										$endPage = min($pageCount, $currentPage + 1);
										?>

										<!-- Tombol Previous -->
										<?php if ($currentPage > 1) : ?>
											<li class="page-item">
												<a class="page-link" href="<?= $pager->getPreviousPageURI() ?>" aria-label="Previous">
													<span aria-hidden="true">&laquo;</span>
												</a>
											</li>
										<?php endif; ?>

										<!-- Menampilkan Maksimal 3 Halaman -->
										<?php for ($i = $startPage; $i <= $endPage; $i++) : ?>
											<li class="page-item <?= ($currentPage == $i) ? 'active' : '' ?>">
												<a class="page-link" href="<?= $pager->getPageURI($i) ?>"><?= $i ?></a>
											</li>
										<?php endfor; ?>

										<!-- Tombol Next -->
										<?php if ($currentPage < $pageCount) : ?>
											<li class="page-item">
												<a class="page-link" href="<?= $pager->getNextPageURI() ?>" aria-label="Next">
													<span aria-hidden="true">&raquo;</span>
												</a>
											</li>
										<?php endif; ?>
									</ul>
								</nav>

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
		<?php if (session()->get('Ses_Tupoksi') == 'JKN'): ?>
			<?php echo view('problem/monitoring_jkn'); ?>
		<?php endif; ?>

</main>
<!-- End #main -->

<script>
	$(document).ready(function() {
		$('#listuser').DataTable({
			"processing": true,
			"serverSide": true,
			"responsive": true,
			"ajax": {
				"url": "<?= base_url('admin/listusers') ?>",
				"type": "get",
				"dataSrc": function(json) {
					console.log(json);
					return json.data;
				},
				"error": function(xhr, error, thrown) {
					console.error('Error:', error, thrown);
				}
			},
			"columns": [{
					"data": null,
					"className": "text-center",
					"sortable": false,
					"orderable": false,
					render: function(data, type, row, meta) {
						return meta.row + meta.settings._iDisplayStart + 1;
					}
				},

				{
					"data": "firstname",
					"orderable": true

				},
				{
					"data": "email",
					"className": "text-start",
					"orderable": false
				},
				{
					"data": "password",
					"className": "text-start",
					"orderable": false
				},
				{
					"data": "locationcode",
				},
				{
					"data": "locationname",
					"className": "text-center",
					"orderable": false
					// "visible": false
				},

				{
					"data": "status",
					"className": "text-center",
					render: function(data, type, row) {
						return data === '1' ? ' <span class="badge bg-primary"> Aktif' : ' <span class="badge bg-danger"> Tidak Aktif';
					},
					"searchable": false
				}

			],
			"order": [
				[4, "desc"]
			],
			"pageLength": 10,
			"lengthMenu": [10, 25, 50, 75, 100],
			language: {
				"lengthMenu": " _MENU_ ",
				"search": "",
				"searchPlaceholder": "Cari data...",
				paginate: {
					first: '<button class="btn btn-outline-success btn-xsx"> <i class="ri ri-rewind-fill"></i> </button>',
					last: '<button class="btn btn-outline-success btn-xsx"> <i class="ri ri-rewind-fill" style="transform: scaleX(-1); display: inline-block;"></i> </button>',
					next: '<button class="btn btn-outline-success btn-xsx"> <i class="ri ri-play-fill"></i> </button>',
					previous: '<button class="btn btn-outline-success btn-xsx"> <i class="ri ri-play-fill" style="transform: scaleX(-1); display: inline-block;"></i> </button>',
					current: '<button class="btn btn-success btn-xsx"> <i class="bi bi-skip-backward-fill"></i> </button>'
				},
				pagingType: "simple",
				info: "Menampilkan _START_ - _END_ dari _TOTAL_ Data",
				infoEmpty: "Menampilkan 0 - 0 dari 0 data",
				infoFiltered: "(filtered from _MAX_ total entries)",

			},
			"deferRender": true,
			"initComplete": function() {
				$('[data-bs-toggle="tooltip"]').tooltip();
				$('#listpengajuan').css('font-size', '11px');
				$('#listpengajuan thead th').css({
					'background-color': '#28a745',
					'color': 'white'
				});
				$('.dataTables_filter input').css('margin-bottom', '10px').css('font-size', '11px').addClass('form-control form-control-xsx');
				$('.dataTables_length select').css('margin-bottom', '10px').css('font-size', '11px').addClass('form-control form-control-xsx');
				$('.paginate_button').css('color', 'white').css('font-size', '10px');
				$('.dt-info').css('font-size', '11px');
				// $('.dt-input').css('font-size', '11px').css('padding', '5px').css('padding-right', '10px').css('padding-left', '10px');
			},
			"drawCallback": function() {
				$('[data-bs-toggle="tooltip"]').tooltip(); // Inisialisasi tooltip setiap kali tabel di-draw
			},
		});

	});

	function updateGrouping() {
		let id = document.querySelector('input[name="id"]').value;

		if (!id) {
			customSwal.fire({
				icon: "warning",
				title: "Peringatan!",
				text: "Silakan masukkan ID terlebih dahulu.",
				confirmButtonColor: "#f39c12",
				confirmButtonText: "OK"
			});
			return;
		}

		fetch(`<?= base_url('problem/update_monitoring') ?>`)
			.then(response => response.json())
			.then(data => {
				if (data.status === "success") {
					customSwal.fire({
						icon: "success",
						title: "Berhasil!",
						text: data.message,
						confirmButtonColor: "#3085d6",
						confirmButtonText: "OK"
					}).then(() => {
						window.location.reload(true); // Reload halaman setelah update sukses
					});
				} else {
					customSwal.fire({
						icon: "error",
						title: "Gagal!",
						text: data.message,
						confirmButtonColor: "#d33",
						confirmButtonText: "OK"
					});
				}
			})
			.catch(error => {
				customSwal.fire({
					icon: "error",
					title: "Kesalahan!",
					text: "Terjadi kesalahan saat mengupdate data.",
					confirmButtonColor: "#d33",
					confirmButtonText: "OK"
				});
			});


		function updateGrouping() {
			let button = document.getElementById("toggleButton");

			// Toggle class 'blink'
			if (button.classList.contains("blink")) {
				button.classList.remove("blink");
			} else {
				button.classList.add("blink");
			}

			// AJAX atau Fetch untuk update status di backend
		}

	}
</script>
<?= $this->endSection(); ?>`
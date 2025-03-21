<?= $this->extend('layout/template'); ?>
<?= $this->section('content'); ?>
<main id="main" class="main">

	<div class="pagetitle">
		<h6 class="fw-bold">DOKUMENTASI</h6>
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
					<div class="card-body">
						<h5 class="card-title">Catatan SIMRS Gos V2</h5>

						<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#pdfModal">
							Lihat PDF
						</button>

						<div class="modal fade" id="pdfModal" tabindex="-1" aria-labelledby="pdfModalLabel" aria-hidden="true">
							<div class="modal-dialog modal-lg">
								<div class="modal-content">
									<div class="modal-header">
										<h5 class="modal-title" id="pdfModalLabel">Dokumen PDF</h5>
										<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
									</div>
									<div class="modal-body">
										<iframe src="<?= esc($fileUrl) ?>" width="100%" height="500px"></iframe>
									</div>
								</div>
							</div>
						</div>


					</div>
				</div>
			</div>


		</div>
		</div>
	</section>
</main><!-- End #main -->
<?= $this->endSection(); ?>`
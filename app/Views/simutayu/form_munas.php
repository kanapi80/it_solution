<?= $this->extend('layout/template'); ?>
<?= $this->section('content'); ?>

<main id="main" class="main">
	<div class="pagetitle">
		<h6 class="fw-bold">INDIKATOR MUTU</h6>
		<nav>
			<ol class="breadcrumb">
				<li class="breadcrumb-item">SIIMUTAYU</li>
				<li class="breadcrumb-item">Indikator Mutu</li>
				<li class="breadcrumb-item active"><?php echo (session('Ses_UserName')); ?></li>
			</ol>
		</nav>
	</div><!-- End Page Title -->
	<!-- MUTU NASIONAL  -->
	<?php
	$groupedIndikator = [];
	foreach ($indikator as $item) {
		$groupedIndikator[$item['NamaJenis']][] = $item;
	}
	?>

	<?php foreach ($groupedIndikator as $jenisNama => $items) : ?>
		<section class="section">
			<div class="row g-0">
				<div class="col-12 col-md-12 col-lg-12">
					<div class="card text-dark bg-light">
						<div class="card-header p-1 m-0 ps-3">
							<i class="bi bi-journal-plus text-success"></i>
							<b class="text-dark ps-1"> <?php echo strtoupper($jenisNama); ?></b>
						</div>
						<div class="card-body p-2 ps-3 text-secondary">
							<table class="table table-bordered w-100 table-sm table-striped" style="font-size: 11px;">
								<thead>
									<tr class="align-middle bg-success text-white">
										<th class="text-center bg-success text-white" width="3%">NO</th>
										<th class="text-start bg-success text-white ps-2" width="67%">INDIKATOR</th>
										<th class="text-center bg-success text-white" width="9%">STANDAR</th>
										<th class="text-center bg-success text-white" width="9%">STATUS</th>
										<th class="text-center bg-success text-white" width="10%">AKSI</th>
									</tr>
								</thead>
								<tbody>
									<tr class="align-middle">
										<?php $no = 1;
										foreach ($items as $dtUser) : ?>
											<td class="text-center"><?= esc($no++); ?></td>
											<td class="text-start ps-2">
												<?php if (esc($dtUser['stat']) == 'Aktif') : ?>

													<form id="formInputMunas<?= $dtUser['id']; ?>" action="<?= base_url('simutayu/input_munas') ?>" method="post" target="_blank">
														<input type="hidden" name="id" value="<?= esc($dtUser['id']); ?>">
														<input type="hidden" name="unit_id" value="<?= esc($dtUser['unit_id']); ?>">
														<input type="hidden" name="jenis_id" value="<?= esc($dtUser['jenis_id']); ?>">
														<input type="hidden" name="nama_jenis" value="<?= esc($dtUser['NamaJenis']); ?>">
													</form>
												<?php else : ?> <i class="bi bi-dash-circle-fill text-danger"></i>
												<?php endif; ?>
												<button class="btn btn-outline-hover btn-xs text-secondary rounded-1" data-bs-toggle="tooltip"
													data-bs-placement="bottom" title="Input Indikator"
													onclick="document.getElementById('formInputMunas<?= $dtUser['id']; ?>').submit();">
													<?= esc($dtUser['nama']) ?>
												</button>
											</td>
											<td class="text-center"><?= esc($dtUser['standar']) ?></td>
											<td class="text-center"><?php if (esc($dtUser['stat']) == 'Aktif') : ?>
													<i class="bi bi-check-circle text-success"></i>
												<?php else : ?> <i class="bi bi-dash-circle-fill text-danger"></i>
												<?php endif; ?>
											</td>
											<td class="text-center">
												<button class="btn btn-outline-success btn btn-xs" onclick="editIndikator(<?= $dtUser['id']; ?>)">
													<i class="bi bi-pencil-fill"></i>
												</button>
												<button class="btn btn-outline-danger btn-xs"
													data-bs-toggle="tooltip"
													title="Hapus"
													onclick="hapusIndikator(<?= $dtUser['id']; ?>)">
													<i class="bi bi-trash-fill"></i>
												</button>
											</td>
									</tr>
								<?php endforeach ?>
								</tbody>
							</table>
						</div>
					</div>
				</div>
			</div>
		</section>
	<?php endforeach ?>
	<!-- END MUTU NASIONAL  -->
	<!-- EDIT INDIKATOR -->
	<div class="modal fade" id="editpenyedia" tabindex="-1">
		<div class="modal-dialog modal-lg">
			<div class="modal-content">
				<div class="modal-header bg-success text-white g-0 m-0 ">
					<h6 class="modal-title fw-bold"><i class="bi bi-file-ppt"></i> Edit Indikator </h6>
					<button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
				</div>
				<div class="modal-body">
					<form class="row g-2" action="<?= base_url('simutayu/update_indikator') ?>" method="POST" id="formUpdate">
						<?= csrf_field() ?>
						<div class="col-md-12 mt-0">
							<label for="judul" class="form-label form-label-sm">Judul Indikator</label>
							<input type="text" class="form-control form-control-xs" name="judul" id="judul" disabled>
							<input type="text" name="id" id="id">
						</div>
						<div class="col-md-6">
							<label for="tujuan" class="form-label form-label-sm">Tujuan</label>
							<input type="text" class="form-control form-control-xs" placeholder="-" name="tujuan" id="tujuan">
						</div>
						<div class="col-md-6">
							<label for="definisi" class="form-label form-label-sm">Definisi</label>
							<input type="text" class="form-control form-control-xs" name="definisi" id="definisi" placeholder="-">
						</div>
						<div class="col-md-6">
							<label for="inklusi" class="form-label form-label-sm">Inklusi</label>
							<input type="text" class="form-control form-control-xs" placeholder="-" name="inklusi" id="inklusi">
						</div>
						<div class="col-md-6">
							<label for="eksklusi" class="form-label form-label-sm">Eksklusi</label>
							<input type="text" class="form-control form-control-xs" placeholder="-" name="eksklusi" id="eksklusi">
						</div>
						<div class="col-md-6">
							<label for="numerator" class="form-label form-label-sm">Numerator</label>
							<textarea class="form-control form-control-xs" placeholder="Numerator" name="numerator" id="numerator" rows="3"></textarea>
						</div>
						<div class="col-md-6">
							<label for="denumerator" class="form-label form-label-sm">Denumerator</label>
							<textarea class="form-control form-control-xs" placeholder="Denumerator" name="denumerator" id="denumerator" rows="3"></textarea>
						</div>
						<div class="col-md-6">
							<label for="frekuensi" class="form-label form-label-sm">Frekuensi</label>
							<select class="form-select form-control-xs" name="frekuensi" id="frekuensi">
								<option value="Harian">Harian</option>
								<option value="Mingguan">Mingguan</option>
								<option value="Bulanan">Bulanan</option>
								<option value="Tahunan">Tahunan</option>
							</select>
						</div>
						<div class="col-md-6">
							<label for="periode" class="form-label form-label-sm">Periode Analisa</label>
							<input type="text" class="form-control form-control-xs" placeholder="Periode" name="periode" id="periode">
						</div>
						<div class="col-md-6">
							<label for="tipe_indikator" class="form-label form-label-sm">Tipe Indikator</label>
							<select name="tipe" class="form-control form-control-xs" id="tipe">
								<?php foreach ($tipe as $key => $value) : ?>
									<option value="<?= $value['id'] ?>"> <?= $value['nama'] ?></option>
								<?php endforeach; ?>
							</select>
						</div>
						<div class="col-md-6">
							<label for="sumber_data" class="form-label form-label-sm">Sumber Data</label>
							<input type="text" class="form-control form-control-xs" placeholder="Sumber Data" name="sumber_data" id="sumber_data">
						</div>
						<div class="col-md-6">
							<label for="penanggung_jawab" class="form-label form-label-sm">Penanggung Jawab</label>
							<input type="text" class="form-control form-control-xs" placeholder="Penanggung Jawab" name="penanggung_jawab" id="penanggung_jawab"></input>
						</div>
						<div class="col-md-4">
							<label for="standar" class="form-label form-label-sm">Standar</label>
							<input type="text" class="form-control form-control-xs" placeholder="Standar" name="standar" id="standar">
						</div>
						<div class="col-md-2 mb-2">
							<label for="standar" class="form-label form-label-sm">Status</label>
							<select class="form-select form-control-xs" name="status" id="status">
								<option value="Aktif">Aktif</option>
								<option value="Tidak">Tidak Aktif</option>
							</select>
						</div>
						<div class="col-12 text-end mt-2">
							<button class="btn btn-success btn-sm" type="submit"><i class="bi bi-save"></i> Update</button>
							<button class="btn btn-outline-success btn-sm" type="reset"><i class="bi bi-arrow-clockwise"></i> Reset</button>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>

	<!-- END UPDATE INDIKATOR -->

</main>
<!-- End #main -->
<script>
	$(document).ready(function() {
		$('#editIndikator').on('show.bs.modal', function() {
			console.log('Modal akan dibuka!');
		});
	});

	function editIndikator(id) {
		$.ajax({
			url: "<?= base_url('simutayu/getIndikatorById') ?>/" + id, // Panggil controller untuk mendapatkan data
			type: "GET",
			dataType: "json",
			success: function(response) {
				console.log(response); // Debugging untuk melihat data yang diterima

				if (response) {
					$(".modal-title").html('<i class="bi bi-file-ppt"></i> Edit Indikator ' + response.NamaJenis);
					// Isi input modal dengan data dari database
					$("#judul").val(response.nama);
					$("#id").val(response.id);
					$("#definisi").val(response.definisi);
					$("#tujuan").val(response.tujuan);
					$("#inklusi").val(response.inklusi);
					$("#eksklusi").val(response.eksklusi);
					$("#numerator").val(response.num);
					$("#denumerator").val(response.denum);
					$("#periode").val(response.periode_analisa);
					$("#tipe").val(response.tipe_id).change();
					$("#frekuensi").val(response.frekuensi).change();
					$("#status").val(response.stat).change();
					$("#sumber_data").val(response.sumber_data);
					$("#penanggung_jawab").val(response.nama_pj);
					$("#standar").val(response.standar);


					// Tampilkan modal
					var modal = new bootstrap.Modal(document.getElementById("editpenyedia"));
					modal.show();
				} else {
					alert("Data tidak ditemukan!");
				}
			},
			error: function(xhr, status, error) {
				console.log("Error: " + xhr.responseText);
			}
		});
	}
	document.addEventListener("DOMContentLoaded", function() {
		document.querySelectorAll("[id^=formInputMunas]").forEach(form => {
			form.addEventListener("submit", function(event) {
				console.log("Form submitted:", form);
			});
		});
	});

	<?php if (session()->getFlashdata('success')) : ?>

		customSwal.fire({
			icon: 'success',
			title: 'Berhasil!',
			text: '<?= session()->getFlashdata('success'); ?>'
		});
	<?php endif; ?>
	<?php if (session()->getFlashdata('error')) : ?>
		customSwal.fire({
			icon: 'error',
			title: 'Gagal!',
			text: '<?= session()->getFlashdata('error'); ?>'
		});
	<?php endif; ?>

	function hapusIndikator(id) {
		customSwal.fire({
			title: "Yakin ingin menghapus?",
			text: "Data yang dihapus tidak bisa dikembalikan!",
			icon: "warning",
			showCancelButton: true,
			confirmButtonColor: "#d33",
			cancelButtonColor: "#3085d6",
			confirmButtonText: "Ya, Hapus!"
		}).then((result) => {
			if (result.isConfirmed) {
				window.location.href = "<?= base_url('simutayu/hapus_indikator/') ?>" + id;
			}
		});
	}

	$(document).ready(function() {
		$("#formUpdate").on("submit", function(e) {
			e.preventDefault(); // Mencegah reload halaman
			$.ajax({
				url: "<?= base_url('simutayu/update_indikator') ?>", // Sesuaikan dengan route
				type: "POST",
				data: $(this).serialize(),
				dataType: "json",
				success: function(response) {
					if (response.status === "success") {
						customSwal.fire({
							icon: "success",
							title: "Berhasil!",
							text: response.message
						}).then(() => {
							location.reload(); // Refresh halaman setelah sukses
						});
					} else {
						customSwal.fire({
							icon: "error",
							title: "Gagal!",
							text: response.message
						});
					}
				},
				error: function() {
					customSwal.fire({
						icon: "error",
						title: "Error!",
						text: "Terjadi kesalahan saat menghubungkan ke server."
					});
				}
			});
		});
	});
</script>


<?= $this->endSection(); ?>
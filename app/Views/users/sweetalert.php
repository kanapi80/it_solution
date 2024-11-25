<?= $this->include('Backend/Template/header'); ?>
<?= $this->include('Backend/Template/sidebar'); ?>
 
<main id="main" class="main">

<div class="pagetitle">
  <h1>Data Users</h1>
  <nav>
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="index.html">Home</a></li>
      <li class="breadcrumb-item">Tables</li>
      <li class="breadcrumb-item active">Data</li>
    </ol>
  </nav>
</div><!-- End Page Title -->

<section class="section">
  <div class="row">
    <div class="col-lg-12">

    <h1>Contoh SweetAlert di CodeIgniter 4</h1>
<form action="/alert/submitForm" method="post">
    <button type="submit">Submit</button>
</form>
<?= $this->endSection() ?>

<?= $this->section('scripts') ?>
<script>
    <?php if (session()->has('success')) : ?>
        Swal.fire({
            icon: 'success',
            title: 'Berhasil',
            text: '<?= session('success') ?>',
        });
    <?php endif; ?>
</script>

    </div>
  </div>
</section>

</main><!-- End #main -->

  <?= $this->include('Backend/Template/footer'); ?>
 
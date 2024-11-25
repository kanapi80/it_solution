<?= $this->extend('layout/template'); ?>
<?= $this->section('content'); ?>


<main id="main" class="main">

  <div class="pagetitle">
    <h6 class="fw-bold">SEP PASIEN BPJS RAWAT JALAN</h6>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="index.html">Home</a></li>
        <li class="breadcrumb-item">VClaim</li>
        <li class="breadcrumb-item active fw-bold">SEP BPJS</li>
      </ol>
    </nav>
  </div>

  <section class="section">
    <div class="row">
      <div class="col-lg-12">
        <div class="card" style="border-top:3px solid #adb5bd; border-radius: 10px">
          <div class="card-body card-body-sm mt-2">
            <h5>Signature</h5>
            <p><strong>X-cons-id:</strong> <?= htmlspecialchars($data) ?></p>
            <p><strong>X-timestamp:</strong> <?= htmlspecialchars($tStamp) ?></p>
            <p><strong>X-signature:</strong> <?= htmlspecialchars($encodedSignature) ?></p>
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
</main>

<?= $this->endsection() ?>
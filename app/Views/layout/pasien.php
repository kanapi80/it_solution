<!-- ======= Sidebar ======= -->
<aside id="sidebar" class="sidebar">

  <ul class="sidebar-nav" id="sidebar-nav">
    <?php if (session()->get('Ses_Tupoksi') == 'ADMINISTRATOR') : ?>

      <li class="nav-item">
        <a class="nav-link collapsed" href="<?= base_url('admin/dashboard-admin'); ?>">
          <i class="bi bi-grid"></i>
          <span>Dashboard</span>
        </a>
      </li><!-- End Dashboard Nav -->

      <li class="nav-item">
        <a class="nav-link collapsed" href="<?= base_url('admin/dashboard-admin'); ?>">
          <i class="bi bi-file-earmark-medical"></i>
          <span>CPPT</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link collapsed" href="<?= base_url('admin/dashboard-admin'); ?>">
          <i class="bi bi-person-plus"></i>
          <span>Layanan</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link collapsed" href="<?= base_url('admin/dashboard-admin'); ?>">
          <i class="bi bi-window-dock"></i>
          <span>Laboratorium</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link collapsed" href="<?= base_url('admin/dashboard-admin'); ?>">
          <i class="bi bi-file-easel"></i>
          <span>Radiologi</span>
        </a>
      </li>
  </ul>
<?php endif; ?>
</aside><!-- End Sidebar-->
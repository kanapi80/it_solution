<?= $this->extend('layout/template'); ?>
<?= $this->section('content'); ?>

<main id="main" class="main">

    <div class="pagetitle">
        <h6 class="fw-bold">DATA DEPO LAYANAN</h6>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.html">SIMRS V2</a></li>
                <li class="breadcrumb-item">Farmasi</li>
                <li class="breadcrumb-item active">Data Depo Layanan</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <section class="section">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body mt-4">
                        <div class="col-lg-12">
                            <div>
                                <?php if (session()->getFlashdata('success')) : ?>
                                    <div class="alert alert-success alert-dismissible fade show p-3 mt-3" role="alert">
                                        <?php echo session()->getFlashdata('success'); ?>
                                        <button type="button" class="btn-close btn-close-black" data-bs-dismiss="alert" aria-label="Close"></button>
                                    </div>
                                <?php endif; ?>
                                <div id="alert-container">
                                </div>
                            </div>
                            <table class="table table-striped w-100 table-sm table-borderless" id="depo" style="font-size: 10px;">
                                <thead>
                                    <tr>
                                        <th class="bg-success text-white text-center">NO</th>
                                        <th class="bg-success text-white text-center">ID</th>
                                        <th class="bg-success text-white text-start">DEPO</th>
                                        <th class="bg-success text-white text-start">RUANGAN</th>
                                        <th class="bg-success text-white text-start">MULAI</th>
                                        <th class="bg-success text-white text-center">SELESAI</th>
                                        <th class="bg-success text-white text-start">STATUS</th>
                                    </tr>
                                </thead>
                                <tbody>
                                </tbody>
                            </table>

                        </div>
                    </div>

                </div>
            </div>
    </section>

</main><!-- End #main -->
<script>
    $(document).ready(function() {
        $('#depo').DataTable({
            "processing": true,
            "serverSide": true,
            "ajax": {
                "url": "<?= base_url('page/getdepolayanan') ?>",
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
                    render: function(data, type, row, meta) {
                        return meta.row + meta.settings._iDisplayStart + 1;
                    }
                },

                {
                    "data": "ID",
                    "className": "text-center",
                    "searchable": false
                },
                {
                    "data": "NAMA_DEPO",
                    "className": "text-start"
                },
                {
                    "data": "NAMA_RUANGAN",
                    // "searchable": false
                },
                {
                    "data": "MULAI",
                    "searchable": false
                },
                {
                    "data": "SELESAI",
                    "searchable": false,
                    "className": "text-center"
                },
                {
                    "data": "STATUS",
                    "className": "text-center",
                    render: function(data, type, row) {
                        return '<input type="checkbox" class="dataTables_checkbox box" data-bs-toggle="tooltip" data-bs-placement="left" title="Update Status"  ' +
                            (data == 1 ? 'checked' : '') +
                            ' data-id="' + row.ID + '" />';
                    }
                },
            ],
            "pageLength": 15,
            "lengthMenu": [15, 25, 50, 75, 100],
            language: {
                "lengthMenu": " _MENU_ ",
                "search": "",
                "searchPlaceholder": "Cari data...",
                paginate: {
                    first: '<button class="btn btn-outline-success btn-sm"> <i class="ri ri-rewind-fill"></i> </button>',
                    last: '<button class="btn btn-outline-success btn-sm"> <i class="ri ri-rewind-fill" style="transform: scaleX(-1); display: inline-block;"></i> </button>',
                    next: '<button class="btn btn-outline-success btn-sm"> <i class="ri ri-play-fill"></i> </button>',
                    previous: '<button class="btn btn-outline-success btn-sm"> <i class="ri ri-play-fill" style="transform: scaleX(-1); display: inline-block;"></i> </button>',
                    current: '<button class="btn btn-success btn-sm"> <i class="bi bi-skip-backward-fill"></i> </button>'
                },
                pagingType: "simple",
                info: "Menampilkan _START_ - _END_ dari _TOTAL_ Data",
                infoEmpty: "Menampilkan 0 - 0 dari 0 data",
                infoFiltered: "(filtered from _MAX_ total entries)",


            },

            "deferRender": true,
            "initComplete": function() {
                $('[data-bs-toggle="tooltip"]').tooltip();
                $('#example').css('font-size', '12px');
                $('#example thead th').css({
                    'background-color': '#28a745',
                    'color': 'white'
                });
                $('#example td, #example th').css('text-align', 'center');
                $('.dataTables_filter input').css('margin-bottom', '10px').css('font-size', '14px').addClass('form-control form-control-sm');
                $('.dataTables_length select').css('margin-bottom', '10px').css('font-size', '14px').addClass('form-select form-select-sm');
                $('.dt-info').css('font-size', '13px');
                $('.dt-input').css('font-size', '13px').css('padding', '5px').css('padding-right', '10px').css('padding-left', '10px');
                $('.dataTables_paginate').css('font-size', '11px');
                $('.dt-paging-button.current').css('font-size', '12px');
            }
        });

        $('#depo').on('change', '.dataTables_checkbox', function() {
            var checkbox = $(this);
            var userId = checkbox.data('id');
            var status = checkbox.is(':checked') ? 1 : 0;

            $.ajax({
                url: '<?= base_url('page/updatestatus') ?>', // URL endpoint
                type: 'POST',
                data: {
                    id: userId,
                    status: status,
                    <?= csrf_token() ?>: '<?= csrf_hash() ?>' // Mengirimkan token CSRF
                },
                success: function(response) {
                    var alertClass = response.success ? 'alert-success' : 'alert-danger';
                    var message = response.success ? 'Status updated successfully' : 'Failed to update status';
                    var alertHtml = `
                    <div class="alert ${alertClass} alert-dismissible fade show p-3 mt-3" role="alert">
                        ${message}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                `;
                    // Update alert container
                    $('#alert-container').html(alertHtml);
                },
                error: function() {
                    var alertHtml = `
                    <div class="alert alert-danger alert-dismissible fade show p-3 mt-3" role="alert">
                        An error occurred while updating the status
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                `;
                    $('#alert-container').html(alertHtml);
                }
            });
        });

    });
</script>



<?= $this->endsection() ?>
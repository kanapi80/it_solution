<?= $this->extend('layout/template'); ?>
<?= $this->section('content'); ?>
<style>
    table,
    th,
    td {
        border-collapse: collapse;
        font: 12px verdana;
        border: 1px #c0c0c0 solid;
        color: #808080;
    }

    table tr:hover td {
        background: #BBDEFB;
    }

    table th {
        background-color: #BBDEFB;
        color: #1a73eb;
        padding: 8px;
    }

    table tr:nth-child(odd) {
        background-color: #E3F2FD;
    }

    @media only screen and (max-width:500px) {
        table {
            display: table;
            /* Tetap dalam bentuk tabel */
            width: 100%;
            overflow-x: auto;
            /* Tambahkan scrolling horizontal */
        }

        thead,
        tbody,
        tr,
        th,
        td {
            display: table-cell;
            /* Pertahankan bentuk tabel */
        }

        table {
            white-space: nowrap;
            /* Hindari baris tabel terputus */
        }
    }

    @media only screen and (max-width:500px) {

        table,
        thead,
        tbody,
        th,
        td,
        tr {
            display: block;
        }

        thead tr {
            position: absolute;
            top: -9999px;
            left: -9999px;
        }

        tr {
            margin: 0 0 1rem 0;
        }

        td {
            position: relative;
            padding-left: 160px;
        }

        td:before {
            position: absolute;
            top: 0;
            left: 6px;
            width: 25%;
            padding-right: 10px;
            white-space: nowrap;
            color: #1a73eb;
        }

        td:nth-of-type(1):before {
            content: "No.";
        }

        td:nth-of-type(2):before {
            content: "Nama";
        }

        td:nth-of-type(3):before {
            content: "Versi";
        }

        td:nth-of-type(4):before {
            content: "Tanggal Rilis";
        }

        td:nth-of-type(5):before {
            content: "Versi Kernel Linux";
        }

        td:nth-of-type(6):before {
            content: "Level API";
        }

        td:nth-of-type(7):before {
            content: "Fitur";
        }
    }
</style>
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


                            <table id="depo">
                                <thead>
                                    <tr>
                                        <th>No.</th>
                                        <th>Nama</th>
                                        <th>Versi Android</th>
                                        <th>Tanggal Rilis</th>
                                        <th>Versi Kernel Linux</th>
                                        <th>Level API</th>
                                        <th>Fitur</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>1</td>
                                        <td>Froyo</td>
                                        <td>2.2</td>
                                        <td>10 Mei 2010</td>
                                        <td>?</td>
                                        <td>8</td>
                                        <td>USB tethering and Wi-Fi hotspot functionality</td>
                                    </tr>
                                    <tr>
                                        <td>2</td>
                                        <td>Gingerbread</td>
                                        <td>2.3</td>
                                        <td>6 Desember 2010</td>
                                        <td>2.6.35</td>
                                        <td>9-10</td>
                                        <td>Support for Near Field Communication (NFC)</td>
                                    </tr>
                                    <tr>
                                        <td>3</td>
                                        <td>Honeycomb</td>
                                        <td>3.0</td>
                                        <td>22 Februari 2011</td>
                                        <td>2.6.36</td>
                                        <td>11-13</td>
                                        <td>Increased ability of applications to access files on the SD card</td>
                                    </tr>
                                    <tr>
                                        <td>4</td>
                                        <td>Ice Cream Sandwich</td>
                                        <td>4.0</td>
                                        <td>19 Oktober 2011</td>
                                        <td>3.0.1</td>
                                        <td>14-15</td>
                                        <td>Improvements to graphics, databases, spell-checking and Bluetooth functionality</td>
                                    </tr>
                                    <tr>
                                        <td>5</td>
                                        <td>Jelly Bean</td>
                                        <td>4.1</td>
                                        <td>9 Juli 2012</td>
                                        <td>3.0.31-39</td>
                                        <td>16-18</td>
                                        <td>Bluetooth Audio/Video Remote Control Profile (AVRCP) 1.3 support</td>
                                    </tr>
                                    <tr>
                                        <td>6</td>
                                        <td>Kitkat</td>
                                        <td>4.4</td>
                                        <td>31 Oktober 2013</td>
                                        <td>3.10</td>
                                        <td>19-20</td>
                                        <td>UI updates for Google Maps navigation and alarmsv</td>
                                    </tr>
                                    <tr>
                                        <td>7</td>
                                        <td>Lollipop</td>
                                        <td>5.0</td>
                                        <td>12 November 2014</td>
                                        <td>3.16</td>
                                        <td>21-22</td>
                                        <td>Ability to join Wi-Fi networks and control paired Bluetooth devices from quick settings</td>
                                    </tr>
                                    <tr>
                                        <td>8</td>
                                        <td>Marshmallow</td>
                                        <td>6.0</td>
                                        <td>28 Mei 2015</td>
                                        <td>3.18</td>
                                        <td>23</td>
                                        <td>Doze mode, which reduces CPU speed while the screen is off in order to save battery life</td>
                                    </tr>
                                    <tr>
                                        <td>9</td>
                                        <td>Nougat</td>
                                        <td>7.0</td>
                                        <td>22 Agustus 2016</td>
                                        <td>4.4</td>
                                        <td>24-25</td>
                                        <td>Touch/display performance improvements</td>
                                    </tr>
                                    <tr>
                                        <td>10</td>
                                        <td>Oreo</td>
                                        <td>8.0</td>
                                        <td>21 Agustus 2017</td>
                                        <td>4.10</td>
                                        <td>26-27</td>
                                        <td>Bluetooth battery level for connected devices, accessible in Quick Settings</td>
                                    </tr>
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
            "responsive": true,
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
                    // "className": "text-center",
                    "sortable": false,
                    "render": function(data, type, row, meta) {
                        return `<td data-label="NO">${meta.row + meta.settings._iDisplayStart + 1}</td>`;
                    }
                },
                {
                    "data": "ID",
                    // "className": "text-center",
                    "render": function(data) {
                        return `<td data-label="ID">${data}</td>`;
                    }
                },
                {
                    "data": "NAMA_DEPO",
                    // "className": "text-start",
                    "render": function(data) {
                        return `<td data-label="DEPO">${data}</td>`;
                    }
                },
                {
                    "data": "NAMA_RUANGAN",
                    "render": function(data) {
                        return `<td data-label="RUANGAN">${data}</td>`;
                    }
                },
                {
                    "data": "MULAI",
                    "render": function(data) {
                        return `<td data-label="MULAI">${data}</td>`;
                    }
                },
                {
                    "data": "SELESAI",
                    // "className": "text-center",
                    "render": function(data) {
                        return `<td data-label="SELESAI">${data}</td>`;
                    }
                },
                {
                    "data": "STATUS",
                    // "className": "text-center",
                    "render": function(data, type, row) {
                        return `<td data-label="STATUS">
                        <input type="checkbox" class="dataTables_checkbox box" 
                               ${(data == 1 ? 'checked' : '')} 
                               data-id="${row.ID}" />
                    </td>`;
                    }
                }
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
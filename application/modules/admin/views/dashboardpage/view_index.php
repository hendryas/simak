<div class="wrapper">
    <div class="container-fluid">
        <!-- Page-Title -->
        <div class="row mt-3">
            <div class="col-sm-12">
                <div class="page-title-box">
                    <div class="btn-group float-right">
                        <ol class="breadcrumb hide-phone p-0 m-0">
                            <li class="breadcrumb-item"><a href="#"><?php echo $title; ?></a></li>
                        </ol>
                    </div>
                    <h4 class="page-title"><?php echo $title; ?></h4>
                </div>
            </div>
        </div>
        <!-- end page title end breadcrumb -->

        <!--====START CONTENT HERE =====-->
        <div class="row">
            <!-- Dashboard Summary -->
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 mb-4">
                <div class="card bg-primary text-white">
                    <div class="card-body">
                        <h5 class="card-title text-white">Dashboard Ringkasan</h5>
                        <div class="row">
                            <div class="col-md-3 text-center">
                                <i class="fas fa-user-graduate fa-3x mb-2 ml-4"></i>
                                <h2 class="text-white"><?php echo count($dataMahasiswa) ?></h2>
                                <p class="text-white">Total Mahasiswa</p>
                            </div>
                            <div class="col-md-3 text-center">
                                <i class="fas fa-chalkboard-teacher fa-3x mb-2 ml-4"></i>
                                <h2 class="text-white"><?php echo count($dataDosen) ?></h2>
                                <p class="text-white">Total Dosen</p>
                            </div>
                            <div class="col-md-3 text-center text-white">
                                <i class="fas fa-book fa-3x mb-2 ml-4"></i>
                                <h2 class="text-white"><?php echo count($dataValidasiKhs) ?></h2>
                                <p class="text-white">Total Validasi KHS</p>
                            </div>
                            <div class="col-md-3 text-center">
                                <i class="fas fa-book fa-3x mb-2 ml-4"></i>
                                <h2 class="text-white"><?php echo count($dataValidasiKrs) ?></h2>
                                <p class="text-white">Total Validasi KRS</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <!-- Quick Access Menu -->
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 mb-4">
                <div class="card">
                    <div class="card-header bg-success text-white">
                        <h5 class="mb-0 ml-3 text-white">Akses Cepat</h5>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-3 col-sm-6 mb-3">
                                <a href="<?php echo base_url('admin/user'); ?>" class="btn btn-lg btn-block btn-outline-primary">
                                    <i class="fas fa-users mb-2"></i><br>Manajemen Pengguna
                                </a>
                            </div>
                            <div class="col-md-3 col-sm-6 mb-3">
                                <a href="<?php echo base_url('validasikhs'); ?>" class="btn btn-lg btn-block btn-outline-success">
                                    <i class="fas fa-book-open mb-2"></i><br>Manajemen Validasi KHS
                                </a>
                            </div>
                            <div class="col-md-3 col-sm-6 mb-3">
                                <a href="<?php echo base_url('validasikrs'); ?>" class="btn btn-lg btn-block btn-outline-info">
                                    <i class="fas fa-chart-bar mb-2"></i><br>Manajemen Validasi KRS
                                </a>
                            </div>
                            <div class="col-md-3 col-sm-6 mb-3">
                                <a href="<?php echo base_url('message'); ?>" class="btn btn-lg btn-block btn-outline-warning">
                                    <i class="fas fa-comments mb-2"></i><br>CHAT
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <!-- Recent Activities -->
            <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12 mb-4">
                <div class="card">
                    <div class="card-header bg-info text-white">
                        <h5 class="mb-0 ml-3 text-white">Kalender Akademik</h5>
                    </div>
                    <div class="card-body">
                        <ul class="list-group">
                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                <a href="<?php echo base_url('assets/file_akademik/kalender-akademik.pdf'); ?>">Kalender Akademik</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>

            <!-- Upcoming Events -->
            <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12 mb-4">
                <div class="card">
                    <div class="card-header bg-warning text-dark">
                        <h5 class="mb-0 ml-3 text-white">Pedoman Bimbingan Akademik</h5>
                    </div>
                    <div class="card-body">
                        <ul class="list-group">
                            <li class="list-group-item">
                                <a href="<?php echo base_url('assets/file_akademik/kalender-akademik.pdf'); ?>">Pedoman Bimbingan Akademik</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>

        <!-- New Calendar Section -->
        <div class="row">
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 mb-4">
                <div class="card">
                    <div class="card-header bg-primary text-white">
                        <h5 class="mb-0 ml-3 text-white">Kalender</h5>
                    </div>
                    <div class="card-body">
                        <div id="calendar"></div>
                    </div>
                </div>
            </div>
        </div>
        <!--====END CONTENT HERE =====-->
    </div> <!-- end container -->
</div>
<!-- end wrapper -->

<!-- Footer -->
<?php $this->load->view('templates/footers/footer'); ?>
<!-- End Footer -->


<script>
    document.addEventListener('DOMContentLoaded', function() {
        var calendarEl = document.getElementById('calendar');
        var calendar = new FullCalendar.Calendar(calendarEl, {
            initialView: 'dayGridMonth',
            headerToolbar: {
                left: 'prev,next today',
                center: 'title',
                right: 'dayGridMonth,timeGridWeek,timeGridDay'
            },
            events: [{
                    title: 'Orientasi Mahasiswa Baru',
                    start: '2024-07-15'
                },
                {
                    title: 'Awal Semester Ganjil',
                    start: '2024-08-01'
                },
                {
                    title: 'Batas Akhir Pembayaran SPP',
                    start: '2024-08-20'
                }
                // Add more events as needed
            ]
        });
        calendar.render();
    });
</script>
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

    <div class="row layout-top-spacing">
      <div class="col-xl-12 col-lg-6 col-md-6 col-sm-6 col-12 layout-spacing">
        <div class="widget widget-five">
          <div class="widget-content">
            <div class="header">
              <div class="header-body">
                <h3> <b>Selamat Datang, <?php echo $user['name'] ?></b> </h3>
              </div>
            </div>
            <div class="">
              <div class="ml-3 mt-2">
                <p>Di Sistem Informasi Bimbingan Akademik Program Studi Manajemen Pendidikan FIP UNJ.</p>
                <br>
                <a href="<?php echo base_url('assets/file_akademik/kalender-akademik.pdf'); ?>" class="btn btn-sm btn-success mb-3"> <i class="mdi mdi-download text-primary"></i> Pedoman Bimbingan Akademik</a>
              </div>
              <div class="ml-3 mt-2">
                <h6><i class="mdi mdi-file-import text-primary"></i>Unduhan</h6>
                <ul>
                  <li>
                    <a href="<?php echo base_url('assets/file_akademik/kalender-akademik.pdf'); ?>">Kalender Akademik</a>
                  </li>
                </ul>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!--  -->
      <div class="col-xl-4 col-lg-6 col-md-6 col-sm-6 col-12 layout-spacing">
        <div class="widget widget-five">
          <div class="widget-content">
            <div class="header">
              <div class="header-body">
                <h6>JUMLAH MAHASISWA</h6>
              </div>
            </div>
            <div class="w-content">
              <div class="">
                <p class="task-left">
                  <?php echo count($dataMahasiswa) ?>
                </p>
                <p class="task-completed"><span>Jumlah Mahasiswa adalah : <?php echo count($dataMahasiswa) ?> </span></p>
              </div>
            </div>
          </div>
        </div>
      </div>

      <div class="col-xl-4 col-lg-6 col-md-6 col-sm-6 col-12 layout-spacing">
        <div class="widget widget-five">
          <div class="widget-content">
            <div class="header">
              <div class="header-body">
                <h6>JUMLAH DOSEN</h6>
              </div>
            </div>
            <div class="w-content">
              <div class="">
                <p class="task-left">
                  <?php echo count($dataDosen) ?>
                </p>
                <p class="task-completed"><span>Jumlah Dosen adalah : <?php echo count($dataDosen) ?> </span></p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>



  </div> <!-- end container -->
</div>
<!-- end wrapper -->


<!-- Footer -->
<?php $this->load->view('templates/footers/footer'); ?>
<!-- End Footer -->
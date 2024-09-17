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
      <div class="col-md-6 offset-md-3">
        <div class="card">
          <div class="card-header bg-primary text-white">
            <h5 class="card-title mb-0 ml-5 text-white">Profil Saya</h5>
          </div>
          <?php if ($user['id_role'] != 3) : ?>
            <div class="card-body">
              <div class="row">
                <div class="col-md-4">
                  <?php if ($user_profile['id_role'] == 3) : ?>
                    <img src="<?php echo base_url('assets/img/dosen/' . $user_profile['foto']); ?>" class="img-fluid rounded-circle mb-3" alt="Foto Profil" width="150">
                  <?php else : ?>
                    <img src="<?php echo base_url('assets/img/mhs/' . $user_profile['foto']); ?>" class="img-fluid rounded-circle mb-3" alt="Foto Profil" width="150">
                  <?php endif; ?>
                </div>
                <div class="col-md-8">
                  <div class="row">
                    <div class="col-md-6">
                      <h5>Nama Lengkap</h5>
                      <p><?php echo $user_profile['name'] ?></p>
                    </div>
                    <div class="col-md-6">
                      <h5>Email</h5>
                      <p><?php echo $user_profile['email'] ?></p>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-6">
                      <h5>Phone</h5>
                      <p><?php echo $user_profile['phone'] ?></p>
                    </div>
                    <div class="col-md-6">
                      <h5>NIM</h5>
                      <p><?php echo $user_profile['nim'] ?></p>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-6">
                      <h5>Angkatan</h5>
                      <p><?php echo $user_profile['tahun_masuk'] ?></p>
                    </div>
                    <div class="col-md-6">
                      <h5>Dosen Pembimbing</h5>
                      <p><?php echo $user_profile['nama'] ?></p>
                    </div>
                  </div>



                </div>
              </div>
            </div>
          <?php else : ?>
            <div class="card-body">
              <div class="row">
                <div class="col-md-4">
                  <?php if ($user_profile['id_role'] == 3) : ?>
                    <img src="<?php echo base_url('assets/img/dosen/' . $user_profile['foto']); ?>" class="img-fluid rounded-circle mb-3" alt="Foto Profil" width="150">
                  <?php else : ?>
                    <img src="<?php echo base_url('assets/img/mhs/' . $user_profile['foto']); ?>" class="img-fluid rounded-circle mb-3" alt="Foto Profil" width="150">
                  <?php endif; ?>
                </div>
                <div class="col-md-8">
                  <div class="row">
                    <div class="col-md-6">
                      <h5>Nama</h5>
                      <p><?php echo $user_profile['name'] ?></p>
                    </div>
                    <div class="col-md-6">
                      <h5>Email</h5>
                      <p><?php echo $user_profile['email'] ?></p>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-6">
                      <h5>Phone</h5>
                      <p><?php echo $user_profile['phone'] ?></p>
                    </div>
                    <div class="col-md-6">
                      <h5>NIP</h5>
                      <p><?php echo $user_profile['nip'] ?></p>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-6">
                      <h5>NIDN</h5>
                      <p><?php echo $user_profile['nidn'] ?></p>
                    </div>
                  </div>



                </div>
              </div>
            </div>
          <?php endif; ?>
        </div>
      </div>
    </div>

    <div class="row layout-top-spacing">
      <br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>

    </div>

    <!--====END CONTENT HERE =====-->

  </div> <!-- end container -->
</div>
<!-- end wrapper -->


<!-- Footer -->
<?php $this->load->view('templates/footers/footer'); ?>
<!-- End Footer -->
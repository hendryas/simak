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
    <div class="col-lg">
      <div class="card m-b-30">
        <div class="card-body">

          <?php echo form_error('menu', '<div class="alert alert-danger text-center" role="alert">', '</div>'); ?>

          <?php echo $this->session->flashdata('message'); ?>

          <a href="#" class="btn btn-primary waves-effect waves-light mb-3" data-toggle="modal" data-target="#newTambahData">Tambah Data</a>

          <div class="table-responsive">
            <table id="datatable" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
              <thead>
                <tr class="text-center">
                  <th>#</th>
                  <th>Nama</th>
                  <th>NIM</th>
                  <th>Email</th>
                  <th>No.HP</th>
                  <th>Tahun Masuk</th>
                  <th>Foto</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
                <?php
                $no = 1;
                ?>
                <?php foreach ($dataMahasiswa as $data) : ?>
                  <tr class="text-center">
                    <th scope="row"><?php echo $no; ?></th>
                    <td><?php echo $data['nama']; ?></td>
                    <td><?php echo $data['nim']; ?></td>
                    <td><?php echo $data['email']; ?></td>
                    <td><?php echo $data['no_hp']; ?></td>
                    <td><?php echo $data['tahun_masuk']; ?></td>
                    <td>
                      <img src="<?php echo base_url('assets/img/mhs/' . $data['foto']) ?>" alt="" width="200">
                    </td>
                    <td>
                      <a href="#"><span class="badge badge-success waves-effect waves-light" data-toggle="modal" data-target="#newEditModal<?php echo $data['id_mahasiswa']; ?>">Edit</span></a>
                      <a class="btn-hapus" href="<?php echo base_url('mahasiswa/deleteData/') . encrypt_url($data['id_mahasiswa']); ?>"><span class="badge badge-danger waves-effect waves-light ml-3">Delete</span></a>
                    </td>
                  </tr>
                  <?php $no++; ?>
                <?php endforeach; ?>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div> <!-- end col -->
    <!--====END CONTENT HERE =====-->

  </div> <!-- end container -->
</div>
<!-- end wrapper -->


<!-- Footer -->
<?php $this->load->view('templates/footers/footer'); ?>
<!-- End Footer -->

<!-- START TAMBAH MENU MODAL -->
<div class="modal fade" id="newTambahData" tabindex="-1" aria-labelledby="newTambahDataLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="newTambahDataLabel">Tambah Data Baru</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="<?php echo base_url(); ?>mahasiswa" method="POST" enctype="multipart/form-data">
        <div class="modal-body">
          <div class="form-group">
            <label for="nama">Nama Mahasiswa</label>
            <input type="text" class="form-control" id="nama" name="nama" autocomplete="off" required>
          </div>
          <div class="form-group">
            <label for="email">Email</label>
            <input type="email" class="form-control" id="email" name="email" autocomplete="off" required>
          </div>
          <div class="form-group">
            <label for="no_hp">No HP</label>
            <input type="text" class="form-control" id="no_hp" name="no_hp" autocomplete="off" required>
          </div>
          <div class="form-group">
            <label for="nim">NIM</label>
            <input type="text" class="form-control" id="nim" name="nim" autocomplete="off" required>
          </div>
          <div class="form-group">
            <label for="tahun_masuk">Tahun Masuk</label>
            <input class="form-control" id="tahun_masuk" name="tahun_masuk" type="number" min="1900" max="2100" step="1" autocomplete="off" required>
          </div>
          <div class="form-group">
            <label for="foto">Foto Mahasiswa</label>
            <input class="form-control" type="file" accept="image/jpeg, image/png" placeholder="Input Gambar" name="foto" id="foto" required>
          </div>

        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">Tambah</button>
        </div>
      </form>
    </div>
  </div>
</div>
<!-- END TAMBAH MENU MODAL -->

<!-- START EDIT MENU MODAL -->
<?php
foreach ($dataMahasiswa as $mahasiswa) :  ?>
  <div class="modal fade" id="newEditModal<?php echo $mahasiswa['id_mahasiswa']; ?>" tabindex="-1" aria-labelledby="newEditModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="newEditModalLabel">Edit Data</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form action="<?php echo base_url(); ?>mahasiswa/editData" method="POST" enctype="multipart/form-data">
          <input type="hidden" name="id_mahasiswa" value="<?php echo $mahasiswa['id_mahasiswa']; ?>">
          <div class="modal-body">
            <div class="form-group">
              <label for="nama">Nama Mahasiswa</label>
              <input type="text" class="form-control" id="nama" name="nama" autocomplete="off" value="<?php echo $mahasiswa['nama'] ?>" required>
            </div>
            <div class="form-group">
              <label for="email">Email</label>
              <input type="email" class="form-control" id="email" name="email" autocomplete="off" value="<?php echo $mahasiswa['email'] ?>" required>
            </div>
            <div class="form-group">
              <label for="no_hp">No HP</label>
              <input type="text" class="form-control" id="no_hp" name="no_hp" autocomplete="off" value="<?php echo $mahasiswa['no_hp'] ?>" required>
            </div>
            <div class="form-group">
              <label for="nim">NIM</label>
              <input type="text" class="form-control" id="nim" name="nim" autocomplete="off" value="<?php echo $mahasiswa['nim'] ?>" required>
            </div>
            <div class="form-group">
              <label for="tahun_masuk">Tahun Masuk</label>
              <input class="form-control" id="tahun_masuk" name="tahun_masuk" type="number" min="1900" max="2100" step="1" value="<?php echo $mahasiswa['tahun_masuk'] ?>" autocomplete="off" required>
            </div>
            <div class="form-group">
              <label for="preview" class="col-sm-2 col-form-label">Preview</label>
              <div class="col-sm-10">
                <img id="preview_gambar_barang" src="<?= base_url('assets/img/mhs/' . $mahasiswa['foto']) ?>" width="200">
              </div>
              <label for="foto" class="mt-3">Foto Mahasiswa</label>
              <input class="form-control" type="file" accept="image/jpeg, image/png" placeholder="Input Gambar" name="foto" id="foto">
            </div>

          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary">Edit</button>
          </div>
        </form>
      </div>
    </div>
  </div>
<?php endforeach; ?>
<!-- END EDIT MENU MODAL -->
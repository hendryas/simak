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
                  <th>Email</th>
                  <th>No. Hp</th>
                  <th>Program Studi</th>
                  <th>Status</th>
                  <th>Jabatan Fungsional</th>
                  <th>Foto</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
                <?php
                $no = 1;
                ?>
                <?php foreach ($dataDosen as $data) : ?>
                  <tr class="text-center">
                    <th scope="row"><?php echo $no; ?></th>
                    <td><?php echo $data['nama']; ?></td>
                    <td><?php echo $data['email']; ?></td>
                    <td><?php echo $data['no_telp']; ?></td>
                    <td><?php echo $data['progdi']; ?></td>
                    <td><?php echo $data['status']; ?></td>
                    <td><?php echo $data['jabatan_fungsional']; ?></td>
                    <td>
                      <img src="<?php echo base_url('assets/img/dosen/' . $data['foto']) ?>" alt="" width="200">
                    </td>
                    <td>
                      <a href="#"><span class="badge badge-success waves-effect waves-light" data-toggle="modal" data-target="#newEditModal<?php echo $data['id_dosen']; ?>">Edit</span></a>
                      <a class="btn-hapus" href="<?php echo base_url('dosen/deleteData/') . encrypt_url($data['id_dosen']); ?>"><span class="badge badge-danger waves-effect waves-light ml-3">Delete</span></a>
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
      <form action="<?php echo base_url(); ?>dosen" method="POST" enctype="multipart/form-data">
        <div class="modal-body">
          <div class="form-group">
            <label for="nama">Nama Dosen</label>
            <input type="text" class="form-control" id="nama" name="nama" autocomplete="off" required>
          </div>
          <div class="form-group">
            <label for="email">Email</label>
            <input type="email" class="form-control" id="email" name="email" autocomplete="off" required>
          </div>
          <div class="form-group">
            <label for="no_telp">No HP</label>
            <input type="text" class="form-control" id="no_telp" name="no_telp" autocomplete="off" required>
          </div>
          <div class="form-group">
            <label for="progdi">Program Studi</label>
            <input type="text" class="form-control" id="progdi" name="progdi" autocomplete="off" required>
          </div>
          <div class="form-group">
            <label for="status_dosen">Status</label>
            <input type="text" class="form-control" id="status_dosen" name="status_dosen" autocomplete="off" required>
          </div>
          <div class="form-group">
            <label for="pendidikan_tertinggi">Pendidikan Tinggi</label>
            <input type="text" class="form-control" id="pendidikan_tertinggi" name="pendidikan_tertinggi" autocomplete="off" required>
          </div>
          <div class="form-group">
            <label for="jenis_kelamin">Jenis Kelamin</label>
            <input type="text" class="form-control" id="jenis_kelamin" name="jenis_kelamin" autocomplete="off" required>
          </div>
          <div class="form-group">
            <label for="jabatan_fungsional">Jabatan Fungsional</label>
            <input type="text" class="form-control" id="jabatan_fungsional" name="jabatan_fungsional" autocomplete="off" required>
          </div>
          <div class="form-group">
            <label for="foto">Foto Dosen</label>
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
foreach ($dataDosen as $dosen) :  ?>
  <div class="modal fade" id="newEditModal<?php echo $dosen['id_dosen']; ?>" tabindex="-1" aria-labelledby="newEditModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="newEditModalLabel">Edit Data</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form action="<?php echo base_url(); ?>dosen/editData" method="POST" enctype="multipart/form-data">
          <input type="hidden" name="id_dosen" value="<?php echo $dosen['id_dosen']; ?>">
          <div class="modal-body">
            <div class="form-group">
              <label for="nama">Nama Dosen</label>
              <input type="text" class="form-control" id="nama" name="nama" autocomplete="off" value="<?php echo $dosen['nama'] ?>" required>
            </div>
            <div class="form-group">
              <label for="email">Email</label>
              <input type="email" class="form-control" id="email" name="email" autocomplete="off" value="<?php echo $dosen['email'] ?>" required>
            </div>
            <div class="form-group">
              <label for="no_telp">No HP</label>
              <input type="text" class="form-control" id="no_telp" name="no_telp" autocomplete="off" value="<?php echo $dosen['no_telp'] ?>" required>
            </div>
            <div class="form-group">
              <label for="progdi">Program Studi</label>
              <input type="text" class="form-control" id="progdi" name="progdi" autocomplete="off" value="<?php echo $dosen['progdi'] ?>" required>
            </div>
            <div class="form-group">
              <label for="status_dosen">Status</label>
              <input type="text" class="form-control" id="status_dosen" name="status_dosen" autocomplete="off" value="<?php echo $dosen['status'] ?>" required>
            </div>
            <div class="form-group">
              <label for="pendidikan_tertinggi">Pendidikan Tinggi</label>
              <input type="text" class="form-control" id="pendidikan_tertinggi" name="pendidikan_tertinggi" autocomplete="off" value="<?php echo $dosen['pendidikan_tertinggi'] ?>" required>
            </div>
            <div class="form-group">
              <label for="jenis_kelamin">Jenis Kelamin</label>
              <input type="text" class="form-control" id="jenis_kelamin" name="jenis_kelamin" autocomplete="off" value="<?php echo $dosen['jenis_kelamin'] ?>" required>
            </div>
            <div class="form-group">
              <label for="jabatan_fungsional">Jabatan Fungsional</label>
              <input type="text" class="form-control" id="jabatan_fungsional" name="jabatan_fungsional" autocomplete="off" value="<?php echo $dosen['jabatan_fungsional'] ?>" required>
            </div>
            <div class="form-group">
              <label for="preview" class="col-sm-2 col-form-label">Preview</label>
              <div class="col-sm-10">
                <img id="preview_gambar_barang" src="<?= base_url('assets/img/dosen/' . $dosen['foto']) ?>" width="200">
              </div>
              <label for="foto" class="mt-3">Foto Dosen</label>
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
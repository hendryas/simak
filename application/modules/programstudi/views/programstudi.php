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
                  <th>Nama Program Studi</th>
                  <th>Jenjang</th>
                  <th>Akreditasi</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
                <?php $no = 1; ?>
                <?php foreach ($dataProgramStudi as $data) : ?>
                  <tr class="text-center">
                    <th scope="row"><?php echo $no; ?></th>
                    <td><?php echo $data['nama_program_studi']; ?></td>
                    <td><?php echo $data['jenjang']; ?></td>
                    <td><?php echo $data['akreditasi']; ?></td>
                    <td>
                      <a href="#"><span class="badge badge-success waves-effect waves-light" data-toggle="modal" data-target="#newEditModal<?php echo $data['id_program_studi']; ?>">Edit</span></a>
                      <a class="btn-hapus" href="<?php echo base_url('programstudi/deleteData/') . encrypt_url($data['id_program_studi']); ?>"><span class="badge badge-danger waves-effect waves-light ml-3">Delete</span></a>
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
      <form action="<?php echo base_url(); ?>programstudi" method="POST">
        <div class="modal-body">
          <div class="form-group">
            <label for="nama_program_studi">Nama Program Studi</label>
            <input type="text" class="form-control" id="nama_program_studi" name="nama_program_studi" autocomplete="off" required>
          </div>
          <div class="form-group">
            <label for="jenjang">Jenjang</label>
            <input type="text" class="form-control" id="jenjang" name="jenjang" autocomplete="off" required>
          </div>
          <div class="form-group">
            <label for="akreditasi">Akreditasi</label>
            <input type="text" class="form-control" id="akreditasi" name="akreditasi" autocomplete="off" required>
          </div>
          <div class="form-group">
            <label for="akreditasi">Fakultas</label>
            <select name="nama_fakultas" id="nama_fakultas" class="form-control selectpicker" data-live-search="true" required>
              <option value="">Pilih Fakultas </option>
              <?php foreach ($dataFakultas as $fakultas) : ?>
                <option value="<?php echo $fakultas['id_fakultas']; ?>"><?php echo $fakultas['nama_fakultas']; ?></option>
              <?php endforeach; ?>
            </select>
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
foreach ($dataProgramStudi as $programstudi) :  ?>
  <div class="modal fade" id="newEditModal<?php echo $programstudi['id_program_studi']; ?>" tabindex="-1" aria-labelledby="newEditModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="newEditModalLabel">Edit Data</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form action="<?php echo base_url(); ?>fakultas/editData" method="POST">
          <input type="hidden" name="id_program_studi" value="<?php echo $programstudi['id_program_studi']; ?>">
          <div class="modal-body">
            <div class="form-group">
              <label for="nama_program_studi">Nama Program Studi</label>
              <input type="text" class="form-control" id="nama_program_studi" name="nama_program_studi" autocomplete="off" value="<?php echo $programstudi['nama_program_studi']; ?>" required>
            </div>
            <div class="form-group">
              <label for="jenjang">Jenjang</label>
              <input type="text" class="form-control" id="jenjang" name="jenjang" autocomplete="off" value="<?php echo $programstudi['jenjang']; ?>" required>
            </div>
            <div class="form-group">
              <label for="akreditasi">Akreditasi</label>
              <input type="text" class="form-control" id="akreditasi" name="akreditasi" autocomplete="off" value="<?php echo $programstudi['akreditasi']; ?>" required>
            </div>
            <div class="form-group">
              <label for="akreditasi">Fakultas</label>
              <select name="nama_fakultas" id="nama_fakultas" class="form-control selectpicker" data-live-search="true" required>
                <option value="">Pilih Fakultas </option>
                <?php foreach ($dataFakultas as $fakultas) : ?>
                  <option value="<?php echo $fakultas['id_fakultas']; ?>"><?php echo $fakultas['nama_fakultas']; ?></option>
                <?php endforeach; ?>
              </select>
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
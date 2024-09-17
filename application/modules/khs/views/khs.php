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
                  <th>No.</th>
                  <th>Semester</th>
                  <th>SKS</th>
                  <th>File Upload</th>
                  <th>File Validasi</th>
                  <th>Status</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
                <?php
                $no = 1;
                ?>
                <?php foreach ($dataKhs as $data) : ?>
                  <tr class="text-center">
                    <th scope="row"><?php echo $no; ?></th>
                    <td><?php echo $data['semester']; ?></td>
                    <td><?php echo $data['sks']; ?></td>
                    <td>
                      <?php if (!empty($data['file_upload'])) : ?>
                        <a class="btn btn-primary btn-sm" href="javascript:void(0);" onclick="showPdf('<?php echo base_url('assets/file_upload/mhs/' . $data['file_upload']); ?>')">
                          Download File
                        </a>
                        <br>
                        <br>
                        <?php echo $data['file_upload']; ?>
                      <?php else : ?>
                        No file uploaded.
                      <?php endif; ?>
                    </td>
                    <td>
                      <?php if (!empty($data['file_validasi'])) : ?>
                        <a class="btn btn-primary btn-sm" href="javascript:void(0);" onclick="showPdf('<?php echo base_url('assets/file_upload/mhs/' . $data['file_validasi']); ?>')">
                          Download File
                        </a>
                        <br>
                        <br>
                        <?php echo $data['file_validasi']; ?>
                      <?php else : ?>
                        No file uploaded.
                      <?php endif; ?>
                    </td>
                    <td><?php echo $data['status']; ?></td>
                    <td>
                      <a href="#"><span class="badge badge-success waves-effect waves-light" data-toggle="modal" data-target="#newEditModal<?php echo $data['id_khs']; ?>">Edit</span></a>
                      <a class="btn-hapus" href="<?php echo base_url('khs/deleteData/') . encrypt_url($data['id_khs']); ?>"><span class="badge badge-danger waves-effect waves-light ml-3">Delete</span></a>
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
      <form action="<?php echo base_url(); ?>khs" method="POST" enctype="multipart/form-data">
        <div class="modal-body">
          <div class="form-group">
            <label for="semester">Semester</label>
            <input type="number" class="form-control" id="semester" name="semester" autocomplete="off" required>
          </div>
          <div class="form-group">
            <label for="sks">SKS</label>
            <input type="number" class="form-control" id="sks" name="sks" autocomplete="off" required>
          </div>
          <div class="form-group">
            <label for="file_upload">Upload File</label>
            <input class="form-control" type="file" accept="application/pdf" placeholder="Input File" name="file_upload" id="file_upload" required>
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
foreach ($dataKhs as $khs) :  ?>
  <div class="modal fade" id="newEditModal<?php echo $khs['id_khs']; ?>" tabindex="-1" aria-labelledby="newEditModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="newEditModalLabel">Edit Data</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form action="<?php echo base_url(); ?>khs/editData" method="POST" enctype="multipart/form-data">
          <input type="hidden" name="id_khs" value="<?php echo $khs['id_khs']; ?>">
          <div class="modal-body">
            <div class="form-group">
              <label for="semester">Semester</label>
              <input type="number" class="form-control" id="semester" name="semester" autocomplete="off" value="<?php echo $khs['semester'] ?>" required>
            </div>
            <div class="form-group">
              <label for="sks">SKS</label>
              <input type="number" class="form-control" id="sks" name="sks" autocomplete="off" value="<?php echo $khs['sks'] ?>" required>
            </div>
            <div class="form-group">
              <label for="file_upload">Upload File</label>
              <input class="form-control" type="file" accept="application/pdf" placeholder="Input File" name="file_upload" id="file_upload">
              <small class="text-red"><?php echo $khs['file_upload'] ?></small>
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


<iframe id="pdfIframe" src="" style="display:none; width:100%; height:500px;" frameborder="0"></iframe>

<script>
  function showPdf(pdfUrl) {
    var iframe = document.getElementById('pdfIframe');
    iframe.src = pdfUrl;
    iframe.style.display = 'block'; // Make the iframe visible
  }
</script>
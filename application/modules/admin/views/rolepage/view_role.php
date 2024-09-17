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
        <div class="col-lg-6">
            <div class="card m-b-30">
                <div class="card-body">
                    <h4 class="mt-0 header-title">Silahkan buat menu management anda</h4>
                    <p class="text-muted m-b-30 font-14">
                        Liat tutorial <a href="#">disini</a>.
                    </p>

                    <?php echo form_error('role', '<div class="alert alert-danger text-center" role="alert">', '</div>'); ?>

                    <?php echo $this->session->flashdata('message'); ?>

                    <a href="#" class="btn btn-primary waves-effect waves-light mb-3" data-toggle="modal" data-target="#newRoleModal">Tambahkan role baru</a>

                    <div class="table-responsive">
                        <table class="table table-hover mb-0">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Role</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $no = 1; ?>
                                <?php foreach ($role as $r) : ?>
                                    <tr>
                                        <th scope="row"><?php echo $no; ?></th>
                                        <td><?php echo $r['role']; ?></td>
                                        <td>
                                            <a href="<?php echo base_url('admin/role/roleaccess/') . encrypt_url($r['id']); ?>"><span class="badge badge-warning waves-effect waves-light">access</span></a>
                                            <a href="#"><span class="badge badge-success waves-effect waves-light" data-toggle="modal" data-target="#newEditRoleModal<?php echo $r['id']; ?>">Edit</span></a>
                                            <a class="btn-hapus" href="<?php echo base_url('admin/role/deleterole/') . encrypt_url($r['id']); ?>"><span class="badge badge-danger waves-effect waves-light">Delete</span></a>
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

<!-- START TAMBAH ROLE MODAL -->
<div class="modal fade" id="newRoleModal" tabindex="-1" aria-labelledby="newRoleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="newRoleModalLabel">Tambah Role Baru</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="<?php echo base_url(); ?>admin/role" method="POST">
                <div class="modal-body">
                    <div class="form-group">
                        <input type="text" class="form-control" id="role" name="role" placeholder="Nama Role" autocomplete="off">
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
<!-- END TAMBAH ROLE MODAL -->

<!-- START EDIT ROLE MODAL -->
<?php
foreach ($role as $r) :  ?>
    <div class="modal fade" id="newEditRoleModal<?php echo $r['id']; ?>" tabindex="-1" aria-labelledby="newEditRoleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="newEditRoleModalLabel">Edit Role</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="<?php echo base_url(); ?>admin/editrole" method="POST">
                    <input type="hidden" name="id" value="<?php echo $r['id']; ?>">
                    <div class="modal-body">
                        <div class="form-group">
                            <input type="text" class="form-control" id="role_edit" name="role_edit" placeholder="Nama Role" autocomplete="off" value="<?php echo $r['role']; ?>">
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
<!-- END EDIT ROLE MODAL -->
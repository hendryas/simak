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

                    <h4 class="mt-0 header-title">Management Role</h4>
                    <p class="text-muted m-b-30 font-14">
                        Liat tutorial <a href="#">disini</a>.
                    </p>

                    <?php echo form_error('user', '<div class="alert alert-danger text-center" role="alert">', '</div>'); ?>

                    <?php echo $this->session->flashdata('message'); ?>

                    <div class="table-responsive">
                        <table id="datatable" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                            <thead>
                                <tr class="text-center">

                                    <th>E-mail</th>
                                    <th>Name</th>
                                    <th>Role</th>
                                    <th>Tanggal Daftar</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $no = 1; ?>
                                <?php foreach ($peserta as $pst) : ?>
                                    <tr class="text-center">

                                        <td><?php echo $pst['email']; ?></td>
                                        <td><?php echo $pst['name']; ?></td>
                                        <td><?php echo $pst['role']; ?></td>
                                        <td><?php echo date('d-m-Y', strtotime($pst['date_created'])); ?>
                                            <span class="text-danger"><?php echo date('H:i', strtotime($pst['date_created'])); ?></span>
                                        <td>
                                            <a href="#"><span class="badge badge-success waves-effect waves-light" data-toggle="modal" data-target="#newEditUserModal<?php echo $pst['id']; ?>">Edit</span></a>
                                            <a class="btn-hapus" href="<?php echo base_url('master/deleteuser/') . $pst['id']; ?>"><span class="badge badge-danger waves-effect waves-light ml-3">Delete</span></a>
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

<!-- START EDIT USER MODAL -->
<?php
foreach ($peserta as $pst) :  ?>
    <div class="modal fade" id="newEditUserModal<?php echo $pst['email']; ?>" tabindex="-1" aria-labelledby="newUserModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="newEditUserModalLabel">Edit User</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="<?php echo base_url(); ?>master/edituser" method="POST">
                    <input type="hidden" name="id" value="<?php echo $pst['email']; ?>">
                    <div class="modal-body">
                        <div class="form-group">
                            <input type="text" class="form-control" id="email" name="email" placeholder="E-mail" autocomplete="off" readonly value="<?php echo $pst['email']; ?>" required>
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" id="name" name="name" placeholder="Nama" autocomplete="off" readonly value="<?php echo $pst['name']; ?>" required>
                        </div>
                        <div class="form-group">
                            <select name="id_role" id="id_role" class="form-control selectpicker" data-live-search="true" required>
                                <option value="">Select Role</option>
                                <?php foreach ($role as $rl) : ?>
                                    <option value="<?php echo $rl['id']; ?>"><?php echo $rl['role']; ?></option>
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
<!-- END EDIT USER MODAL -->
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
        <div class="col-lg-12">
            <div class="card m-b-30">
                <div class="card-body">

                    <h4 class="mt-0 header-title">Silahkan buat submenu management level 3 anda</h4>
                    <p class="text-muted m-b-30 font-14">
                        Pastikan nama <b>url</b> sama dengan nama menu pada <b>tabel user menu</b>.
                    </p>
                    <?php if (validation_errors()) : ?>
                        <div class="alert alert-danger text-center" role="alert">
                            <?php echo validation_errors(); ?>
                        </div>
                    <?php endif; ?>

                    <?php echo $this->session->flashdata('message'); ?>

                    <a href="#" class="btn btn-primary waves-effect waves-light mb-3" data-toggle="modal" data-target="#newSubMenuModal">Tambahkan submenu baru</a>

                    <div class="table-responsive">
                        <table id="datatable" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                            <thead>
                                <tr class="text-center">
                                    <th>#</th>
                                    <th>Title</th>
                                    <th>Submenu Level 2</th>
                                    <th>Url</th>
                                    <th>Icon</th>
                                    <th>Active</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $no = 1; ?>
                                <?php foreach ($subMenu as $sm) : ?>
                                    <tr class="text-center">
                                        <th scope="row"><?php echo $no; ?></th>
                                        <td><?php echo $sm['title']; ?></td>
                                        <td><?php echo $sm['title2']; ?></td>
                                        <td><?php echo $sm['url']; ?></td>
                                        <td><?php echo $sm['icon']; ?></td>
                                        <?php if ($sm['is_active'] == 1) : ?>
                                            <td>
                                                <p>Aktif</p>
                                            </td>
                                        <?php elseif ($sm['is_active'] == 0) : ?>
                                            <td>
                                                <p>Tidak Aktif</p>
                                            </td>
                                        <?php endif; ?>
                                        <td>
                                            <a href="#"><span class="badge badge-success waves-effect waves-light" data-toggle="modal" data-target="#newEditSubmenuModal<?php echo $sm['id']; ?>">Edit</span></a>
                                            <a class="btn-hapus" href="<?php echo base_url('master/menulevel3/deletemenulevel3/') . encrypt_url($sm['id']); ?>"><span class="badge badge-danger waves-effect waves-light ml-3">Delete</span></a>
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


<!-- START TAMBAH SUBMENU MODAL -->
<div class="modal fade" id="newSubMenuModal" tabindex="-1" aria-labelledby="newSubMenuModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="newSubMenuModalLabel">Tambah Sub Menu Baru</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="<?php echo base_url(); ?>master/menulevel3" method="POST">
                <div class="modal-body">
                    <div class="form-group">
                        <input type="text" class="form-control" id="title" name="title" placeholder="Submenu title" autocomplete="off">
                    </div>
                    <div class="form-group">
                        <select name="has_sub_menu_id" id="has_sub_menu_id" class="form-control selectpicker" data-live-search="true" required>
                            <option value="">Select SubMenu Level 2</option>
                            <?php foreach ($has_sub_menu as $hsm) : ?>
                                <option value="<?php echo $hsm['id']; ?>"><?php echo $hsm['title']; ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" id="url" name="url" placeholder="Submenu url" autocomplete="off">
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" id="icon" name="icon" placeholder="Submenu icon" autocomplete="off">
                    </div>
                    <div class="form-group">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="1" name="is_active" id="is_active" checked>
                            <label class="form-check-label" for="is_active">
                                Active?
                            </label>
                        </div>
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
<!-- END TAMBAH SUBMENU MODAL -->

<!-- START EDIT SUBMENU MODAL -->
<?php
foreach ($subMenu as $sm) :  ?>
    <div class="modal fade" id="newEditSubmenuModal<?php echo $sm['id']; ?>" tabindex="-1" aria-labelledby="newEditSubmenuModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="newEditSubmenuModalLabel">Edit Sub Menu Baru</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="<?php echo base_url(); ?>master/menulevel3/editmenulevel3" method="POST">
                    <div class="modal-body">
                        <div class="form-group">
                            <input name="id" type="hidden" value="<?php echo $sm['id']; ?>">
                            <input name="menu_id" type="hidden" value="<?php echo $sm['has_sub_menu_id']; ?>">
                            <input type="text" class="form-control" id="title" name="title" placeholder="Submenu title" autocomplete="off" value="<?php echo $sm['title']; ?>">
                        </div>
                        <div class="form-group">
                            <select name="has_sub_menu_id" id="has_sub_menu_id" class="form-control selectpicker" data-live-search="true" required>
                                <option value="">Select SubMenu Level 2</option>
                                <?php foreach ($has_sub_menu as $hsm) : ?>
                                    <option value="<?php echo $hsm['id']; ?>"><?php echo $hsm['title']; ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" id="url" name="url" placeholder="Submenu url" autocomplete="off" value="<?php echo $sm['url']; ?>">
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" id="icon" name="icon" placeholder="Submenu icon" autocomplete="off" value="<?php echo $sm['icon']; ?>">
                        </div>
                        <div class="form-group">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="1" name="is_active" id="is_active" checked>
                                <label class="form-check-label" for="is_active">
                                    Active?
                                </label>
                            </div>
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
<!-- END EDIT SUBMENU MODAL -->
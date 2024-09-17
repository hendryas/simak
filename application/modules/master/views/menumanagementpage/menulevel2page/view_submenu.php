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

                    <h4 class="mt-0 header-title">Silahkan buat submenu management level 2 anda</h4>
                    <p class="text-muted m-b-30 font-14">
                        Pastikan nama <b>url</b> sama dengan nama menu pada <b>tabel user menu</b>.
                    </p>
                    <?php if (validation_errors()) : ?>
                        <div class="alert alert-danger text-center" role="alert">
                            <?php echo validation_errors(); ?>
                        </div>
                    <?php endif; ?>

                    <?php echo $this->session->flashdata('message'); ?>

                    <a href="#" class="btn btn-primary waves-effect waves-light mb-3" data-toggle="modal" data-target="#newHasSubMenuModal">Tambahkan submenu level 2 baru</a>
                    <div class="table-responsive">
                        <table id="datatable" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                            <thead>
                                <tr class="text-center">
                                    <th>#</th>
                                    <th>Title</th>
                                    <th>Menu</th>
                                    <th>Url</th>
                                    <th>Icon</th>
                                    <th>Active</th>
                                    <th>Status Submenu</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $no = 1; ?>
                                <?php foreach ($hassubmenu as $hsm) : ?>
                                    <tr class="text-center">
                                        <th scope="row"><?php echo $no; ?></th>
                                        <td><?php echo $hsm['title']; ?></td>
                                        <td><?php echo $hsm['menu']; ?></td>
                                        <td><?php echo $hsm['url']; ?></td>
                                        <td><?php echo $hsm['icon']; ?></td>
                                        <?php if ($hsm['is_active'] == 1) : ?>
                                            <td>
                                                <p>Aktif</p>
                                            </td>
                                        <?php elseif ($hsm['is_active'] == 0) : ?>
                                            <td>
                                                <p>Tidak Aktif</p>
                                            </td>
                                        <?php endif; ?>
                                        <?php if ($hsm['status_sub'] == 1) : ?>
                                            <td>
                                                <p>Tidak Ada Submenu Level 3</p>
                                            </td>
                                        <?php elseif ($hsm['status_sub'] == 0) : ?>
                                            <td>
                                                <p>Ada Submenu Level 3</p>
                                            </td>
                                        <?php endif; ?>
                                        <td>
                                            <a href="#"><span class="badge badge-success waves-effect waves-light" data-toggle="modal" data-target="#newEditHasSubmenuModal<?php echo $hsm['id']; ?>">Edit</span></a>
                                            <a class="btn-hapus" href="<?php echo base_url('master/menulevel2/deletemenulevel2/') . encrypt_url($hsm['id']); ?>"><span class="badge badge-danger waves-effect waves-light ml-3">Delete</span></a>
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
<div class="modal fade" id="newHasSubMenuModal" tabindex="-1" aria-labelledby="newHasSubMenuModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="newHasSubMenuModalLabel">Tambah Submenu Level 2 Baru</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <form action="<?php echo base_url(); ?>master/menulevel2" method="POST">
                <div class="modal-body">
                    <div class="form-group">
                        <p>Jika diberi submenu level 3 ,mohon isikan kolom url dengan tanda #</p>
                    </div>
                    <div class="form-group">
                        <label for="title">Title</label>
                        <input type="text" class="form-control" id="title" name="title" placeholder="Submenu level 2 title" autocomplete="off">
                    </div>
                    <div class="form-group">
                        <label for="menu_id">Select Menu</label>
                        <select name="menu_id" id="menu_id" class="form-control selectpicker" data-live-search="true" required>
                            <option value="">Select Menu</option>
                            <?php foreach ($menu as $m) : ?>
                                <option value="<?php echo $m['id']; ?>"><?php echo $m['menu']; ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="status_sub">Status Submenu</label>
                        <select name="status_sub" id="status_sub" class="form-control selectpicker" data-live-search="true" required>
                            <option value="">Select Status Submenu</option>
                            <option value="0">Beri Submenu Level 3</option>
                            <option value="1">Tidak Ada Submenu Level 3</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="url">URL</label>
                        <input type="text" class="form-control" id="url" name="url" placeholder="Submenu level 2 url" autocomplete="off">
                    </div>
                    <div class="form-group">
                        <label for="icon">Icon</label>
                        <input type="text" class="form-control" id="icon" name="icon" placeholder="Submenu level 2 icon" autocomplete="off">
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
foreach ($hassubmenu as $hsm) :  ?>
    <div class="modal fade" id="newEditHasSubmenuModal<?php echo $hsm['id']; ?>" tabindex="-1" aria-labelledby="newEditHasSubmenuModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="newEditHasSubmenuModalLabel">Edit Submenu Level 2</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="<?php echo base_url(); ?>master/menulevel2/editmenulevel2" method="POST">
                    <div class="modal-body">
                        <div class="form-group">
                            <p>Jika diberi submenu level 3 ,mohon isikan kolom url dengan tanda #</p>
                        </div>
                        <div class="form-group">
                            <label for="menu_id">Title</label>
                            <input name="id" type="hidden" value="<?php echo $hsm['id']; ?>">
                            <input name="menu_id" type="hidden" value="<?php echo $hsm['menu_id']; ?>">
                            <input type="text" class="form-control" id="title" name="title" placeholder="Submenu level 2 title" autocomplete="off" value="<?php echo $hsm['title']; ?>">
                        </div>
                        <div class="form-group">
                            <label for="menu_id">Select Menu</label>
                            <select name="menu_id" id="menu_id" class="form-control selectpicker" data-live-search="true" required>
                                <option value="">Select Menu</option>
                                <?php foreach ($menu as $m) : ?>
                                    <option value="<?php echo $m['id']; ?>"><?php echo $m['menu']; ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="status_sub">Status Submenu</label>
                            <select name="status_sub" id="status_sub" class="form-control selectpicker" data-live-search="true" required>
                                <option value="">Select Status Submenu</option>
                                <option value="0">Beri Submenu Level 3</option>
                                <option value="1">Tidak Ada Submenu Level 3</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="url">URL</label>
                            <input type="text" class="form-control" id="url" name="url" placeholder="Submenu level 2 url" autocomplete="off" value="<?php echo $hsm['url']; ?>">
                        </div>
                        <div class="form-group">
                            <label for="icon">Icon</label>
                            <input type="text" class="form-control" id="icon" name="icon" placeholder="Submenu level 2 icon" autocomplete="off" value="<?php echo $hsm['icon']; ?>">
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
<!-- Loader -->
<div id="preloader">
    <div id="status">
        <div class="spinner"></div>
    </div>
</div>

<!-- Begin page -->

<div class="bg1">
    <!-- Bubble Animation using li -->
    <ul class="bubbles">
        <li></li>
        <li></li>
        <li></li>
        <li></li>
        <li></li>
        <li></li>
        <li></li>
        <li></li>
        <li></li>
        <li></li>
    </ul>
    <div class="content-center">
        <div class="content-desc-center">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-5 col-md-8">
                        <div class="card">
                            <div class="card-body">

                                <h3 class="text-center mt-0 m-b-15">
                                    <a href="<?php echo base_url(); ?>auth" class="logo logo-admin"><img src="<?php echo base_url(); ?>assets/images/logo-UNJ.png" height="130" alt="logo" style='border-radius: 10px 10px 10px 10px;'></a>
                                </h3>

                                <h4 class="text-muted text-center font-18"><b>Forgot Password</b></h4>
                                <?php echo $this->session->flashdata('message'); ?>

                                <div class="p-2">
                                    <form class="form-horizontal m-t-20" method="POST" action="<?php echo base_url(); ?>auth/forgotpassword">

                                        <div class="alert alert-danger alert-dismissible">
                                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                            Masukkan <b>Email</b> Anda dan instruksi akan dikirimkan kepada Anda!
                                        </div>

                                        <div class="form-group row">
                                            <div class="col-12">
                                                <input class="form-control" type="email" placeholder="Masukkan email..." name="email" id="email" value="<?php echo set_value('email'); ?>" autocomplete="off">
                                                <small class="text-danger"><?php echo form_error('email'); ?></small>
                                            </div>
                                        </div>

                                        <div class="form-group text-center row m-t-2">
                                            <div class="col-12">
                                                <button class="btn btn-primary btn-block waves-effect waves-light" type="submit">Send Email</button>
                                            </div>
                                        </div>

                                    </form>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
                <!-- end row -->
            </div>
        </div>
    </div>
</div>
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
                                    <a href="#" class="logo logo-admin"><img src="<?php echo base_url(); ?>assets/images/logo-UNJ.png" height="130" alt="logo" style='border-radius: 10px 10px 10px 10px;'></a>
                                </h3>

                                <h4 class="text-muted text-center font-18"><b>Sign In</b></h4>
                                <?php echo $this->session->flashdata('message'); ?>

                                <div class="p-2">
                                    <form class="form-horizontal m-t-5" method="POST" action="<?php echo base_url(); ?>auth/login">

                                        <div class="form-group row">
                                            <div class="col-12">
                                                <label for="email">E-mail</label>
                                                <input class="form-control" type="text" autocomplete="off" placeholder="E-mail" id="email" name="email" value="<?php echo set_value('email'); ?>">
                                                <small class="text-danger"><?php echo form_error('email'); ?></small>
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <div class="col-12">
                                                <label for="password">Password</label>
                                                <input class="form-control" type="password" placeholder="Password" id="password" name="password" data-toggle="password">
                                                <small class="text-danger"><?php echo form_error('password'); ?></small>
                                            </div>
                                        </div>

                                        <div class="input-group has-feedback">
                                            <div class="input-group-btn">
                                                <button type="button" class="btn btn-danger" disabled="disabled"><?php echo $captcha_img; ?></button>
                                            </div>
                                            <input type="text" name="captcha" class="form-control" autocomplete="off" placeholder="Captcha" required="required">
                                            <div class="input-group-addon"><i class="fa fa-key"></i></div>
                                        </div>
                                        <?php echo "<small style='color:red;'>" . form_error('captcha') . "</small>"; ?><br>

                                        <div class="form-group text-center row m-t-5">
                                            <div class="col-12">
                                                <button class="btn btn-primary btn-block waves-effect waves-light" type="submit">Log In</button>
                                            </div>
                                        </div>

                                        <div class="form-group m-t-5 mb-0 row text-center">
                                            <div class="col-sm-6 m-t-20">
                                                <!-- <a href="<?php echo base_url(); ?>auth/forgotpassword" class="text-muted"><i class="mdi mdi-lock"></i> Forgot your
                                                    password?</a> -->
                                            </div>
                                            <div class="col-sm-6 m-t-20">
                                                <a href="<?php echo base_url(); ?>auth/register" class="text-muted"><i class="mdi mdi-account-circle"></i> Create an account</a>
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
<style>
    .password_strength {
        padding: 0 5px;
        display: inline-block;
    }

    .password_strength_1 {
        background-color: #fcb6b1;
    }

    .password_strength_2 {
        background-color: #fccab1;
    }

    .password_strength_3 {
        background-color: #fcfbb1;
    }

    .password_strength_4 {
        background-color: #dafcb1;
    }

    .password_strength_5 {
        background-color: #bcfcb1;
    }
</style>

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

                                <?php echo $this->session->flashdata('message'); ?>

                                <div class="">
                                    <form enctype="multipart/form-data" class="form-horizontal" method="POST" action="<?php echo base_url('auth/register'); ?>">
                                        <div class="form-group row">
                                            <div class="col-12">
                                                <label for="name">Nama</label>
                                                <input class="form-control" type="text" autocomplete="off" placeholder="Nama" id="name" name="name" value="<?php echo set_value('name'); ?>">
                                                <small class="text-danger"><?php echo form_error('name'); ?></small>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <div class="col-6">
                                                <label for="tgl_lahir">Tanggal Lahir</label>
                                                <div class="input-group">
                                                    <input type="date" class="form-control" autocomplete="off" placeholder="dd-mm-yyyy" name="tgl_lahir" id="tgl_lhr" value="<?php echo set_value('tgl_lahir'); ?>">
                                                </div>
                                                <small class="text-danger"><?php echo form_error('tgl_lahir'); ?></small>
                                            </div>
                                            <div class="col-6">
                                                <label for="email">E-mail</label>
                                                <input class="form-control" type="text" autocomplete="off" placeholder="E-mail" id="email" name="email" value="<?php echo set_value('email'); ?>">
                                                <small class="text-danger"><?php echo form_error('email'); ?></small>
                                            </div>

                                        </div>

                                        <div class="form-group row">
                                            <div class="col-6">
                                                <label for="gender">Gender</label>
                                                <select class="form-control" name="gender" id="gender">
                                                    <option disabled selected hidden value="">- Select -</option>
                                                    <option value="Laki-laki">Laki-laki</option>
                                                    <option value="Perempuan">Perempuan</option>
                                                </select>
                                            </div>
                                            <div class="col-6">
                                                <label for="nim">NIM</label>
                                                <input class="form-control" type="text" autocomplete="off" placeholder="NIM" id="nim" name="nim" value="<?php echo set_value('nim'); ?>">
                                                <small class="text-danger"><?php echo form_error('nim'); ?></small>
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <div class="col-6">
                                                <label for="dosen">Dosen Pembimbing Akademik</label>
                                                <select class="form-control" name="dosen" id="dosen">
                                                    <option disabled selected hidden value="">- Select -</option>
                                                    <?php foreach ($dataDosen as $data) : ?>
                                                        <option value="<?php echo $data['id_dosen'] ?>"><?php echo $data['nama'] ?></option>
                                                    <?php endforeach; ?>
                                                </select>
                                            </div>
                                            <div class="col-6">
                                                <label for="phone">No. handphone</label>
                                                <input class="form-control" type="text" onkeypress="isInputNumber(event)" autocomplete="off" maxlength="16" placeholder="No. Handphone" id="phone" name="phone" value="<?php echo set_value('phone'); ?>">
                                                <small class="text-danger"><?php echo form_error('phone'); ?></small>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <div class="col-6">
                                                <label for="tahun_masuk">Tahun Masuk</label>
                                                <input class="form-control" type="text" autocomplete="off" placeholder="Tahun Masuk" id="tahun_masuk" name="tahun_masuk" value="<?php echo set_value('tahun_masuk'); ?>" pattern="\d{4}" title="Masukkan tahun dalam format YYYY">
                                                <small class="text-danger"><?php echo form_error('tahun_masuk'); ?></small>
                                            </div>
                                            <div class="col-6">
                                                <label for="foto">Foto</label>
                                                <input class="form-control" type="file" autocomplete="off" placeholder="NIM" id="foto" name="foto" value="<?php echo set_value('foto'); ?>">
                                                <small class="text-danger"><?php echo form_error('foto'); ?></small>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <div class="col-6">
                                                <label for="password">Password</label>
                                                <input class="form-control" type="password" placeholder="Password" id="password1" name="password1" data-toggle="password">
                                                <small class="text-danger"><?php echo form_error('password1'); ?></small>
                                            </div>

                                            <div class="col-6">
                                                <label for="password">Ulangi Password</label>
                                                <input class="form-control" type="password" placeholder="Password" id="password2" name="password2" data-toggle="password">
                                                <br>
                                                <small class="text-danger"><?php echo form_error('password2'); ?></small>
                                            </div>
                                        </div>


                                        <div class="form-group text-center row">
                                            <div class="col-12">
                                                <button class="btn btn-primary btn-block waves-effect waves-light" type="submit">Register</button>
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
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

<script>
    function comparePassword(event) {
        var password1, password2;

        if (event.type == 'change') {
            // this = pass1, el = pass2
            password1 = $(this);
            password2 = $(event.data.el);
        } else {
            // this = pass2, el = pass1
            password2 = $(this);
            password1 = $(event.data.el);
        }

        if (password1.val() != password2.val()) {
            password2[0].setCustomValidity(event.data.msg);
        } else {
            password2[0].setCustomValidity('');
        }
    }

    $(".password_match").each(function(i, e) {
        var msg = $(e).data('msg');
        if ($("input[type=password]", e).length == 2) {
            var elem = $("input[type=password]", e);
            $(elem[0]).change({
                el: elem[1],
                msg: msg
            }, comparePassword);
            $(elem[1]).keyup({
                el: elem[0],
                msg: msg
            }, comparePassword);
        }
    });
</script>

<script>
    (function($) {

        var passwordStrength = new function() {
            this.countRegexp = function(val, rex) {
                var match = val.match(rex);
                return match ? match.length : 0;
            };

            this.getStrength = function(val, minLength) {
                var len = val.length;

                // too short =(
                if (len < minLength) {
                    return 0;
                }

                var nums = this.countRegexp(val, /\d/g),
                    lowers = this.countRegexp(val, /[a-z]/g),
                    uppers = this.countRegexp(val, /[A-Z]/g),
                    specials = len - nums - lowers - uppers;

                // just one type of characters =(
                if (nums == len || lowers == len || uppers == len || specials == len) {
                    return 1;
                }

                var strength = 0;
                if (nums) {
                    strength += 2;
                }
                if (lowers) {
                    strength += uppers ? 4 : 3;
                }
                if (uppers) {
                    strength += lowers ? 4 : 3;
                }
                if (specials) {
                    strength += 5;
                }
                if (len > 10) {
                    strength += 1;
                }

                return strength;
            };

            this.getStrengthLevel = function(val, minLength) {
                var strength = this.getStrength(val, minLength);

                val = 1;
                if (strength <= 0) {
                    val = 1;
                } else if (strength > 0 && strength <= 4) {
                    val = 2;
                } else if (strength > 4 && strength <= 8) {
                    val = 3;
                } else if (strength > 8 && strength <= 12) {
                    val = 4;
                } else if (strength > 12) {
                    val = 5;
                }

                return val;
            };
        };

        $.fn.password_strength = function(options) {
            var settings = $.extend({
                'container': null,
                'bar': null, // thanks codemonkeyking
                'minLength': 6,
                'texts': {
                    1: 'Terlalu lemah',
                    2: 'Lemah',
                    3: 'Normal',
                    4: 'Kuat',
                    5: 'Sangat kuat'
                },
                'onCheck': null
            }, options);

            return this.each(function() {
                var container = null,
                    $bar = null;
                if (settings.container) {
                    container = $(settings.container);
                } else {
                    container = $('<span/>').attr('class', 'password_strength');
                    $(this).after(container);
                }

                if (settings.bar) {
                    $bar = $(settings.bar);
                }

                $(this).bind('keyup.password_strength', function() {
                    var val = $(this).val(),
                        level = passwordStrength.getStrengthLevel(val, settings.minLength);

                    if (val.length > 0) {
                        var _class = 'password_strength_' + level,
                            _barClass = 'password_bar_' + level;

                        if (!container.hasClass(_class) && level in settings.texts) {
                            container.text(settings.texts[level]).attr('class',
                                'password_strength ' + _class);
                        }
                        if ($bar && !$bar.hasClass(_barClass)) {
                            $bar.attr('class', 'password_bar ' + _barClass);
                        }
                    } else {
                        container.text('').attr('class', 'password_strength');
                        if ($bar) {
                            $bar.attr('class', 'password_bar');
                        }
                    }
                    if (settings.onCheck) {
                        settings.onCheck.call(this, level);
                    }
                });

                if ($(this).val() != '') { // thanks Jason Judge
                    $(this).trigger('keyup.password_strength');
                }
            });
        };

    })(jQuery);

    $('form').attr('autocomplete', 'off');
    $('#password1').password_strength();
</script>

<script>
    document.getElementById('tahun_masuk').addEventListener('input', function(e) {
        let value = e.target.value;
        if (value.length > 4) {
            e.target.value = value.slice(0, 4);
        }
    });
</script>
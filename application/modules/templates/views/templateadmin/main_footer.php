  <!-- jQuery  -->
  <script src="<?php echo base_url(); ?>assets/drixo/js/jquery.min.js"></script>
  <script src="<?php echo base_url(); ?>assets/drixo/js/bootstrap.bundle.min.js"></script>
  <script src="<?php echo base_url(); ?>assets/drixo/js/modernizr.min.js"></script>
  <script src="<?php echo base_url(); ?>assets/drixo/js/detect.js"></script>
  <script src="<?php echo base_url(); ?>assets/drixo/js/fastclick.js"></script>
  <script src="<?php echo base_url(); ?>assets/drixo/js/jquery.slimscroll.js"></script>
  <script src="<?php echo base_url(); ?>assets/drixo/js/jquery.blockUI.js"></script>
  <script src="<?php echo base_url(); ?>assets/drixo/js/waves.js"></script>

  <!-- My Jquery -->
  <script src="<?php echo base_url(); ?>assets/drixo/js/myscript.js"></script>

  <!-- App js -->
  <script src="<?php echo base_url(); ?>assets/drixo/js/app.js"></script>

  <!-- Font Awesome Js -->
  <script src="<?php echo base_url(); ?>assets/drixo/js/fontawesome5.min.js"></script>

  <!-- Font Awesome Pro Js -->
  <!-- <script src="<?php echo base_url(); ?>assets/plugins/font-awesome-pro-master/js/pro.js"></script> -->
  <script src="<?php echo base_url(); ?>assets/drixo/plugins/font-awesome-pro-master/js/pro.min.js"></script>

  <!-- Sweet Alert New -->
  <script src="<?= base_url('assets/drixo/app-assets/template/rs-diklit/'); ?>plugins/sweetalerts/promise-polyfill.js">
  </script>
  <script src="<?= base_url('assets/drixo/app-assets/template/rs-diklit/'); ?>plugins/sweetalerts/sweetalert2.min.js">
  </script>
  <script src="<?= base_url('assets/drixo/app-assets/template/rs-diklit/'); ?>plugins/sweetalerts/custom-sweetalert.js">
  </script>

  <!-- Bootstrap Show Password Js -->
  <script src="<?php echo base_url(); ?>assets/drixo/js/bootstrap-show-password.min.js"></script>

  <!-- Required datatable js -->
  <script src="<?php echo base_url(); ?>assets/drixo/plugins/datatables/jquery.dataTables.min.js"></script>
  <script src="<?php echo base_url(); ?>assets/drixo/plugins/datatables/dataTables.bootstrap4.min.js"></script>

  <!-- Buttons examples -->
  <script src="<?php echo base_url(); ?>assets/drixo/plugins/datatables/dataTables.buttons.min.js"></script>
  <script src="<?php echo base_url(); ?>assets/drixo/plugins/datatables/buttons.bootstrap4.min.js"></script>
  <script src="<?php echo base_url(); ?>assets/drixo/plugins/datatables/jszip.min.js"></script>
  <script src="<?php echo base_url(); ?>assets/drixo/plugins/datatables/pdfmake.min.js"></script>
  <script src="<?php echo base_url(); ?>assets/drixo/plugins/datatables/vfs_fonts.js"></script>
  <script src="<?php echo base_url(); ?>assets/drixo/plugins/datatables/buttons.html5.min.js"></script>
  <script src="<?php echo base_url(); ?>assets/drixo/plugins/datatables/buttons.print.min.js"></script>
  <script src="<?php echo base_url(); ?>assets/drixo/plugins/datatables/buttons.colVis.min.js"></script>

  <!-- Responsive examples -->
  <script src="<?php echo base_url(); ?>assets/drixo/plugins/datatables/dataTables.responsive.min.js"></script>
  <script src="<?php echo base_url(); ?>assets/drixo/plugins/datatables/responsive.bootstrap4.min.js"></script>

  <!-- Datatable init js -->
  <script src="<?php echo base_url(); ?>assets/drixo/pages/datatables.init.js"></script>

  <!-- Datetimepicker js -->
  <script src="<?php echo base_url(); ?>assets/drixo/js/bootstrap-datetimepicker.js"></script>
  <script src="<?php echo base_url(); ?>assets/drixo/js/moment-with-locales.js"></script>
  <script src="<?php echo base_url(); ?>assets/drixo/js/bootstrap-datepicker.min.js"></script>

  <!-- Datepicker js -->
  <script src="<?php echo base_url(); ?>assets/drixo/plugins/bootstrap-colorpicker/js/bootstrap-colorpicker.min.js">
  </script>
  <script src="<?php echo base_url(); ?>assets/drixo/plugins/bootstrap-datepicker/js/bootstrap-datepicker.min.js">
  </script>
  <script src="<?php echo base_url(); ?>assets/drixo/plugins/bootstrap-maxlength/bootstrap-maxlength.min.js"></script>
  <script src="<?php echo base_url(); ?>assets/drixo/plugins/bootstrap-touchspin/js/jquery.bootstrap-touchspin.min.js">
  </script>

  <!-- Select Search Js -->
  <script src="<?php echo base_url(); ?>assets/drixo/js/bootstrap-select.min.js"></script>

  <!-- Alertify js -->
  <script src="<?php echo base_url(); ?>assets/drixo/plugins/alertify/js/alertify.js"></script>
  <script src="<?php echo base_url(); ?>assets/drixo/pages/alertify-init.js"></script>

  <!-- Accordion -->
  <script href="<?= base_url('assets/drixo/app-assets/template/rs-diklit/'); ?>assets/js/components/ui-accordions.js">
  </script>

  <!-- <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.js"></script> -->
  <!-- <script src="<?php echo base_url(); ?>assets/js/summernote-lite.min.js"></script> -->
  <!-- <script src="<?= base_url('assets/drixo/app-assets/template/rs-diklit/'); ?>plugins/summernote/summernote-ext-resized-data-image.js"></script> -->
  <!-- BEGIN PAGE LEVEL PLUGINS/CUSTOM SCRIPTS -->

  <script>
$(function() {
    $('#tgl_order').datepicker({
        format: 'dd-mm-yyyy',
        autoclose: true,
        todayHighlight: true,
        startDate: '-0d'
    });
});
  </script>

  <script type="text/javascript">
$(document).ready(function() {
    $("#kota").change(function() {
        var url = "<?php echo site_url('customer/order/ajax_kecamatan'); ?>/" + $(this).val();
        $('#kecamatan').load(url);

        return false;
    })
});
  </script>

  <script>
<?= $this->session->flashdata('message'); ?>

$('.form-check-input').on('click', function() {
    const menuId = $(this).data('menu');
    const roleId = $(this).data('role');

    $.ajax({
        url: "<?php echo base_url('admin/role/changeaccess'); ?>",
        type: 'post',
        data: {
            menuId: menuId,
            roleId: roleId
        },
        success: function() {
            document.location.href = "<?php echo base_url('admin/role/roleaccess/'); ?>" +
                roleId; //ini seperti redirect,namun di ajax
        }
    });
});
  </script>
  <script>
$(function() {
    $('.carousel').carousel({
        interval: 1000 * 2 // 1000 x 1 = 1 second
    });
});
  </script>
  <script>
//==START==//
//==Format upload file==//
$('.custom-file-input').on('change', function() {
    let fileName = $(this).val().split('\\').pop();
    $(this).next('.custom-file-label').addClass("selected").html(fileName);
})

//==END==//
//==Format upload file==//

// $('.navbar-nav .navigation-link').click(function() {
//     $('.navbar-nav .navigation-link').removeClass('active');
//     $(this).addClass('active');
// })
$('.navbar-nav .navigation-link').on("click", function() {
    $(".navbar-nav").find(".active").removeClass('active');
    $(this).addClass('active');
});
$(document).ready(function() {
    $("[href]").each(function() {
        if (this.href == window.location.href) {
            $(".navbar-nav").find(".active").removeClass('active');
            $(this).addClass("active");
        }
    });
});

// setInterval(() => {
//   $.ajax({
//     type: 'POST',
//     data: {
//       additional: "additional",
//     },
//     async: true,
//     url: "<?= base_url('templates/timenow/time_now'); ?>",
//     success: function(data) {
//       $('.jam_skrng').html(data);
//     }
//   });
// }, 1000);
  </script>
  <!-- START TAMBAH ABSENSI PELATIHAN -->
  <script type="text/javascript">
$(document).ready(function() {
    $("#pilih_jadwal_pelatihan").change(function() {
        var url =
            "<?php echo site_url('master/cabsensipelatihanuser/absensipelatihan/add_materi_pelatihan'); ?>/" +
            $(this).val();
        $('#id_materi_pelatihan').load(url);

        return false;
    })
});
  </script>
  <!-- END TAMBAH ABSENSI PELATIHAN -->

  <!-- START EDIT ABSENSI PELATIHAN -->
  <script type="text/javascript">
$(document).ready(function() {
    $("#edit_pilih_jadwal_pelatihan").change(function() {
        var url =
            "<?php echo site_url('master/cabsensipelatihanuser/absensipelatihan/add_materi_pelatihan'); ?>/" +
            $(this).val();
        $('#edit_id_materi_pelatihan').load(url);

        return false;
    })
});
  </script>
  <!-- END EDIT ABSENSI PELATIHAN -->

  <!-- START Tambah/Edit TUGAS PELATIHAN -->
  <script type="text/javascript">
$(document).ready(function() {
    $(".pilih_jadwal_pelatihan").change(function() {
        var url =
            "<?php echo site_url('master/ctugaspelatihanuser/tugaspelatihan/add_materi_pelatihan'); ?>/" +
            $(this).val();
        $('.id_materi_pelatihan').load(url);

        return false;
    })
});
  </script>
  <!-- END Tambah/Edit TUGAS PELATIHAN -->

  <script>
//==START==//
//==Format Read More and Read Less==//
function myFunction() {
    var dots = document.getElementById("dots");
    var moreText = document.getElementById("more");
    var btnText = document.getElementById("myBtn");

    if (dots.style.display === "none") {
        dots.style.display = "inline";
        btnText.innerHTML = "Read more";
        moreText.style.display = "none";
    } else {
        dots.style.display = "none";
        btnText.innerHTML = "Read less";
        moreText.style.display = "inline";
    }
}
//==END==//
//==Format Read More and Read Less==//
  </script>

  <script>
//==START==//
//==Format Date Picker==//
$(function() {
    $('#tgl_streaming_pelatihan').datepicker({
        format: 'dd-mm-yyyy',
        autoclose: true,
        todayHighlight: true,
    });
});
//==END==//
//==Format Date Picker==//
  </script>

  <script>
//==START==//
//==Format Date Picker==//
$(function() {
    $('.tgl_pelatihan').datepicker({
        format: 'dd-mm-yyyy',
        autoclose: true,
        todayHighlight: true,
    });
});
//==END==//
//==Format Date Picker==//
  </script>

  <script>
const flashData = $('.flash-data').data('flashdata');
  </script>

  <script>
// TAMBAH SOAL PG
// var no_soal = 2;
// $('.tambah-pg').click(function() {
//     const pg = `
//             <div class="isi_soal">
//             <hr>
//                 <div class="form-group">
//                     <label for="">Soal No . ` + no_soal + `</label>
//                     <textarea name="nama_soal[]" cols="30" rows="2" class="summernote" wrap="hard" required></textarea>
//                 </div>
//                 <div class="row mt-2">
//                     <div class="col-lg-4">
//                         <div class="form-group">
//                             <label for="">Pilihan A</label>
//                             <div class="input-group">
//                                 <div class="input-group-prepend">
//                                     <span class="input-group-text" id="basic-addon5">A</span>
//                                 </div>
//                                 <input type="text" name="pg_1[]" class="form-control" placeholder="Opsi A" autocomplete="off" required>
//                             </div>
//                         </div>
//                     </div>
//                     <div class="col-lg-4">
//                         <div class="form-group">
//                             <label for="">Pilihan B</label>
//                             <div class="input-group">
//                                 <div class="input-group-prepend">
//                                     <span class="input-group-text" id="basic-addon5">B</span>
//                                 </div>
//                                 <input type="text" name="pg_2[]" class="form-control" placeholder="Opsi B" autocomplete="off" required>
//                             </div>
//                         </div>
//                     </div>
//                     <div class="col-lg-4">
//                         <div class="form-group">
//                             <label for="">Pilihan C</label>
//                             <div class="input-group">
//                                 <div class="input-group-prepend">
//                                     <span class="input-group-text" id="basic-addon5">C</span>
//                                 </div>
//                                 <input type="text" name="pg_3[]" class="form-control" placeholder="Opsi C" autocomplete="off" required>
//                             </div>
//                         </div>
//                     </div>
//                     <div class="col-lg-4">
//                         <div class="form-group">
//                             <label for="">Pilihan D</label>
//                             <div class="input-group">
//                                 <div class="input-group-prepend">
//                                     <span class="input-group-text" id="basic-addon5">D</span>
//                                 </div>
//                                 <input type="text" name="pg_4[]" class="form-control" placeholder="Opsi D" autocomplete="off" required>
//                             </div>
//                         </div>
//                     </div>
//                     <div class="col-lg-4">
//                         <div class="form-group">
//                             <label for="">Pilihan E</label>
//                             <div class="input-group">
//                                 <div class="input-group-prepend">
//                                     <span class="input-group-text" id="basic-addon5">E</span>
//                                 </div>
//                                 <input type="text" name="pg_5[]" class="form-control" placeholder="Opsi E" autocomplete="off" required>
//                             </div>
//                         </div>
//                     </div>
//                     <div class="col-lg-4">
//                         <div class="form-group">
//                             <label for="">Jawaban</label>
//                             <div class="input-group">
//                                 <div class="input-group-prepend">
//                                     <span class="input-group-text" id="basic-addon5" style="padding-right: 35px;">
//                                         <svg viewBox="0 0 24 24" width="24" height="24" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round" class="css-i6dzq1">
//                                             <polyline points="20 6 9 17 4 12"></polyline>
//                                         </svg>
//                                     </span>
//                                 </div>
//                                 <input type="text" name="jawaban[]" class="form-control" placeholder="Contoh : A" autocomplete="off" maxlength="1" required>
//                             </div>
//                         </div>
//                     </div>
//                 </div>
//                 <a href="javascript:void(0);" class="btn btn-danger hapus-pg">Hapus</a>
//             </div>
//            `;

//     $('#soal_pg').append(pg);
//     no_soal++;
// });

// $('#soal_pg').on('click', '.isi_soal a', function() {
//     $(this).parents('.isi_soal').remove();
// });

// $('.tambah-essay').click(function() {
//     const essay = `
//             <div class="isi_soal mt-2">
//                 <div class="form-group">
//                     <label for="">Soal No. ` + no_soal + `</label><br>
//                     <textarea class="summernote" name="soal[]" cols="30" rows="5" wrap="hard"></textarea>
//                 </div>
//                 <a href="javascript:void(0);" class="btn btn-danger hapus-pg">Hapus</a>
//             </div>
//            `;

//     $('#soal_essay').append(essay);
//     no_soal++;
// });
// $('#soal_essay').on('click', '.isi_soal a', function() {
//     $(this).parents('.isi_soal').remove();
// });
// $("circle-basic").steps({
//     cssClass: 'circle wizard'
// });

// END TAMBAH SOAL PG
  </script>

  <!-- <script>
    $(document).ready(function() {

      //updating the view with notifications using ajax

      function load_unseen_notification(view = '')

      {

        $.ajax({

          url: "<?php echo base_url(); ?>Notifikasi/user_notifi",
          method: "POST",
          data: {
            "view": view
          },
          dataType: "json",
          success: function(data)

          {

            $('.dropdown-menu-lg').html(data.notification);
            $('.count').show();
            if (data.unseen_notification > 0) {

              $('.count').html(data.unseen_notification);
            } else if (data.unseen_notification == '') {

              $('.count').hide();

            }

          }

        });

      }

      load_unseen_notification();


      // load new notifications

      $(document).on('click', '.dropdown-toggle', function() {

        $('.count').html('');

        load_unseen_notification('yes');

      });

      setInterval(function() {

        load_unseen_notification();;

      }, 1000);

    });
  </script> -->

  <script>
$('.btn-hapus').on('click', function(e) {
    e.preventDefault();
    const href = $(this).attr('href');
    swal({
        title: 'Are you sure?',
        text: "You won't be able to revert this!",
        type: 'warning',
        showCancelButton: true,
        confirmButtonText: 'Delete',
        padding: '2em'
    }).then(function(result) {
        if (result.value) {
            document.location.href = href
        }
    });
});
  </script>

  <script>
$('.btn-proses-ke-lokasi').on('click', function(e) {
    e.preventDefault();
    const href = $(this).attr('href');
    swal({
        title: 'Apakah kamu yakin?',
        text: "Ingin Memproses Order Menuju ke Lokasi Tujuan!",
        type: 'warning',
        showCancelButton: true,
        confirmButtonText: 'Proses',
        padding: '2em'
    }).then(function(result) {
        if (result.value) {
            document.location.href = href
        }
    });
});
  </script>

  <script>
//==START==//
//==Format Only input numbers==//
function isInputNumber(evt) {
    var ch = String.fromCharCode(evt.which);
    if (!(/[0-9]/.test(ch))) {
        evt.preventDefault();
    }
}
//==END==//
//==Format Only input numbers==//
  </script>

  </body>

  </html>
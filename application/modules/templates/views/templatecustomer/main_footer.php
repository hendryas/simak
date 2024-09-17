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

  <!-- File Upload  -->
  <script src="<?php echo base_url('assets/dropify/js/dropify.min.js'); ?>"></script>
  <script src="<?php echo base_url('assets/pages/jquery.form-upload.init.js') ?>"></script>

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
    //==START==//
    //==Format upload file==//
    $('.custom-file-input').on('change', function() {
      let fileName = $(this).val().split('\\').pop();
      $(this).next('.custom-file-label').addClass("selected").html(fileName);
    })

    //==END==//
    //==Format upload file==//

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
  </script>

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
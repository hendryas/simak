 <!-- jQuery first, then Popper.js, then Bootstrap JS -->
 <script src="<?php echo base_url(); ?>assets/drixo/js/jquery-3.2.1-multiform.min.js" type="text/javascript"></script>
 <script src="<?php echo base_url(); ?>assets/drixo/js/jquery-3.3.1.slim.min.js" type="text/javascript"></script>
 <script src="<?php echo base_url(); ?>assets/drixo/js/jquery-3.5.1.min.js" type="text/javascript"></script>
 <script src="<?php echo base_url(); ?>assets/drixo/js/jquery-ui-1.12.1.min.js" type="text/javascript"></script>
 <script src="<?php echo base_url(); ?>assets/drixo/js/bootstrap-multiform.bundle.min.js" type="text/javascript"></script>
 <script src="<?php echo base_url(); ?>assets/drixo/js/main.js" type="text/javascript"></script>
 <script src="<?php echo base_url(); ?>assets/drixo/js/bootstrap.bundle2.min.js" type="text/javascript"></script>

 <!-- jQuery TEMPLATE DEXIO  -->
 <script src="<?php echo base_url(); ?>assets/drixo/js/jquery.min.js"></script>
 <script src="<?php echo base_url(); ?>assets/drixo/js/bootstrap.bundle.min.js"></script>
 <script src="<?php echo base_url(); ?>assets/drixo/js/modernizr.min.js"></script>
 <script src="<?php echo base_url(); ?>assets/drixo/js/detect.js"></script>
 <script src="<?php echo base_url(); ?>assets/drixo/js/fastclick.js"></script>
 <script src="<?php echo base_url(); ?>assets/drixo/js/jquery.slimscroll.js"></script>
 <script src="<?php echo base_url(); ?>assets/drixo/js/jquery.blockUI.js"></script>
 <script src="<?php echo base_url(); ?>assets/drixo/js/waves.js"></script>

 <!-- App js -->
 <script src="<?php echo base_url(); ?>assets/drixo/js/app.js"></script>

 <!-- Datetimepicker js -->
 <script src="<?php echo base_url(); ?>assets/drixo/js/bootstrap-datetimepicker.js"></script>
 <script src="<?php echo base_url(); ?>assets/drixo/js/moment-with-locales.js"></script>
 <script src="<?php echo base_url(); ?>assets/drixo/js/bootstrap-datepicker.min.js"></script>

 <!-- Datepicker js -->
 <script src="<?php echo base_url(); ?>assets/drixo/plugins/bootstrap-colorpicker/js/bootstrap-colorpicker.min.js"></script>
 <script src="<?php echo base_url(); ?>assets/drixo/plugins/bootstrap-datepicker/js/bootstrap-datepicker.min.js"></script>
 <script src="<?php echo base_url(); ?>assets/drixo/plugins/bootstrap-maxlength/bootstrap-maxlength.min.js"></script>
 <script src="<?php echo base_url(); ?>assets/drixo/plugins/bootstrap-touchspin/js/jquery.bootstrap-touchspin.min.js"></script>

 <!-- Bootstrap Show Password Js -->
 <script src="<?php echo base_url(); ?>assets/drixo/js/bootstrap-show-password.min.js"></script>

 <!-- Sweet Alert New -->
 <script src="<?= base_url('assets/drixo/app-assets/template/rs-diklit/'); ?>plugins/sweetalerts/promise-polyfill.js"></script>
 <script src="<?= base_url('assets/drixo/app-assets/template/rs-diklit/'); ?>plugins/sweetalerts/sweetalert2.min.js"></script>
 <script src="<?= base_url('assets/drixo/app-assets/template/rs-diklit/'); ?>plugins/sweetalerts/custom-sweetalert.js"></script>

 <script type="text/javascript">
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

     //==START==//
     //==Format Date Picker==//
     $(function() {
         $('#tgl_lhr_pegawai').datepicker({
             format: 'dd-mm-yyyy',
             autoclose: true,
             todayHighlight: true,
         });
     });
     //==END==//
     //==Format Date Picker==//
 </script>
 <!-- <script src="<?php echo base_url(); ?>assets/plugins/password-strong/js/jquery.passwordRequirements.min.js"></script>
 <script>
     /* trigger when page is ready */
     $(document).ready(function() {
         $(".pr-password").passwordRequirements({

         });
         //   setTimeout(function() {
         //       location.reload();
         //       alert('a');
         //   }, 100)
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
 </body>

 </html>
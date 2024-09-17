    <!-- START FOOTER -->
    <footer class="bg-dark section">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="text-center">
                        <ul class="list-inline social-list mb-0">
                            <li class="list-inline-item"><a href="#" class="social-icon footer-link"><i
                                        class="mdi mdi-facebook"></i></a></li>
                            <li class="list-inline-item"><a href="#" class="social-icon footer-link"><i
                                        class="mdi mdi-twitter"></i></a></li>
                            <li class="list-inline-item"><a href="#" class="social-icon footer-link"><i
                                        class="mdi mdi-linkedin"></i></a></li>
                            <li class="list-inline-item"><a href="#" class="social-icon footer-link"><i
                                        class="mdi mdi-google-plus"></i></a></li>
                        </ul>
                        <!--end social-->
                    </div>
                    <div class="footer-terms">
                        <ul class="mb-0 list-inline text-center mt-4">
                            <li class="list-inline-item"><a href="#" class="footer-link">Terms & Condition</a></li>
                            <li class="list-inline-item"><a href="#" class="footer-link">Privacy Policy</a></li>
                            <li class="list-inline-item"><a href="#" class="footer-link">Contact Us</a></li>
                        </ul>
                    </div>
                    <!--end footer-terms-->
                    <div class="mt-4 pt-2 text-center">
                        <p class="text-white-50 mb-0">
                            <script>
                            document.write(new Date().getFullYear())
                            </script> &copy; Landsay - Design with <i class="mdi mdi-heart text-danger"></i> by
                            <a href="https://themeforest.net/search/themesdesign" class="text-muted">Themesdesign.</a>
                        </p>
                    </div>
                </div>
                <!--end row-->
            </div>
            <!--end row-->
        </div>
        <!--end container-->
    </footer>
    <!-- END FOOTER -->


    <!-- Modal -->
    <div class="modal fade" id="presentationVideo" tabindex="-1">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content  bg-transparent border-0">
                <div class="modal-body p-0">
                    <div class="text-end">
                        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"
                            aria-label="Close"></button>
                    </div>
                    <div class="ratio ratio-16x9">
                        <video id="VisaChipCardVideo" class="video-box" controls>
                            <source src="https://www.w3schools.com/html/mov_bbb.mp4" type="video/mp4">
                        </video>
                    </div>
                </div>
                <!--end modal-body-->
            </div>
            <!--end modal-content-->
        </div>
        <!--end modal-dialog-->
    </div>
    <!--end modal-->


    <!--start subscribe-Modal -->
    <div class="subscribe-modal modal fade" id="subscribe" tabindex="-1" aria-labelledby="subscribeform"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header border-0">
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <!--end modal-header-->
                <div class="modal-body text-center pt-0">
                    <img src="<?php echo base_url(); ?>assets/images/subscribe.png" alt="subscribe" class="img-fluid" />
                    <h5 class="modal-title mt-2 mb-2" id="subscribeform">Subscribe</h5>
                    <p class="text-muted mb-4">
                        Join your hand with us for a better life <br /> and beautiful future.
                    </p>
                    <form action="#">
                        <div class="input-group mb-3">
                            <input type="email" class="form-control border" id="subscribeemail"
                                placeholder="Enter your email" />
                            <button class="btn btn-primary btn-sm" type="submit" id="button-addon2">Subscribe</button>
                        </div>
                    </form>
                </div>
                <!--end modal-body-->
            </div>
            <!--end modal-content-->
        </div>
        <!--end modal-dialog-->
    </div>
    <!--end SUBSCRIBE modal-->



    <!--start back-to-top-->
    <!-- <button onclick="topFunction()" id="back-to-top">
        <i class="mdi mdi-arrow-up"></i>
    </button> -->
    <!--end back-to-top-->
    <div class="adminActions">
        <input type="checkbox" name="adminToggle" class="adminToggle" />
        <a class="adminButton" href="#!"><i class="fa fa-cog"></i></a>
        <div class="adminButtons">
            <a data-bs-toggle="modal" href="#modal" role="button" title="Add Company"><i class="fa fa-building"></i></a>
            <a href="#" title="Edit Company"><i class="fa fa-pen"></i></a>
            <a href="#" title="Add User"><i class="fa fa-user-plus"></i></a>
            <a href="#" title="Edit User"><i class="fa fa-user-edit"></i></a>
        </div>
    </div>
    <button onclick="topFunction()" id="back-to-top">
        <i class="mdi mdi-arrow-up"></i>
    </button>
    <!-- First modal dialog -->
    <div class="modal fade" id="modal" aria-hidden="true" aria-labelledby="..." tabindex="-1">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                ...
                <div class="modal-footer">
                    <!-- Toogle to second dialog -->
                    <button class="btn btn-primary btn-sm" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
    <!-- Bootstrap Bundale js -->
    <script src="<?php echo base_url(); ?>assets/js/bootstrap.bundle.min.js"></script>

    <!-- Swiper Slider js -->
    <script src="<?php echo base_url(); ?>assets/js/swiper-bundle.min.js"></script>

    <!-- Contact Js -->
    <script src="<?php echo base_url(); ?>assets/js/contact.js"></script>

    <!-- Index-init Js -->
    <script src="<?php echo base_url(); ?>assets/js/index.init.js"></script>

    <!-- App js -->
    <script src="<?php echo base_url(); ?>assets/js/app.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script>
tabControl();

var resizeTimer;
$(window).on('resize', function(e) {
    clearTimeout(resizeTimer);
    resizeTimer = setTimeout(function() {
        tabControl();
    }, 250);
});


function tabControl() {
    var tabs = $('.tabbed-content').find('.tabs');
    if (tabs.is(':visible')) {
        tabs.find('a').on('click', function(event) {
            event.preventDefault();
            var target = $(this).attr('href'),
                tabs = $(this).parents('.tabs'),
                buttons = tabs.find('a'),
                item = tabs.parents('.tabbed-content').find('.item');
            buttons.removeClass('active');
            item.removeClass('active');
            $(this).addClass('active');
            $(target).addClass('active');
        });
    } else {
        $('.item').on('click', function() {
            var container = $(this).parents('.tabbed-content'),
                currId = $(this).attr('id'),
                items = container.find('.item');
            container.find('.tabs a').removeClass('active');
            items.removeClass('active');
            $(this).addClass('active');
            container.find('.tabs a[href$="#' + currId + '"]').addClass('active');
        });
    }
}
    </script>
    </body>

    </html>
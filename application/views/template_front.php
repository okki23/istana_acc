<!doctype html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Book - eCommerce HTML5 Template</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Favicon -->
  
    <!-- all css here -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets_front/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets_front/css/magnific-popup.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets_front/css/animate.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets_front/css/owl.carousel.min.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets_front/css/themify-icons.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets_front/css/pe-icon-7-stroke.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets_front/css/meanmenu.min.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets_front/css/bundle.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets_front/css/style.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets_front/css/responsive.css">
    <script src="<?php echo base_url(); ?>assets_front/js/vendor/modernizr-2.8.3.min.js"></script>
</head>

<body>
    <!--[if lt IE 8]>
        <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->
    <!-- header start -->
    <header class="res-header-sm">
        <div class="header-top-wrapper theme-bg-2">
            <div class="container">
                <div class="header-top">
                    <div class="header-info">
                        <span>Contact 021-6908703, 021-6908709, 021-6929880 <a href="mailto:info@istana-acc.com">info@istana-acc.com</a></span>
                    </div>
                    <div class="book-login-register">
                        <ul>
                            <li><a href="<?php echo base_url('login_cust'); ?>"><i class="ti-user"></i>login</a></li>
                            <li><a href="<?php echo base_url('register'); ?>"><i class="ti-settings"></i>register</a></li>
                             
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="header-bottom clearfix">
            <div class="container">
                <div class="header-bottom-wrapper">
                    <div class="logo-2 ptb-40">
                        <a href="index.html">
                            <img src="<?php echo base_url();?>assets_front/img/logo.png" alt="">
                        </a>
                    </div>
                    <div class="menu-style-2 book-menu menu-hover">
                        <nav>
                            <ul>
                                <li><a href="index.html">Home</a> </li>
                                  
                             
                                <li><a href="contact.html">contact</a></li>
                            </ul>
                        </nav>
                    </div>
                    <div class="header-cart-2">
                        <a class="icon-cart" href="#">
                            <i class="ti-shopping-cart"></i>
                            
                        </a>
                         
                    </div>
                </div>
                <div class="row">
                    <div class="mobile-menu-area d-md-block col-md-12 col-lg-12 col-12 d-lg-none d-xl-none">
                        <div class="mobile-menu">
                            <nav id="mobile-menu-active">
                            <ul>
                                <li><a href="index.html">Home</a> </li>
                                  
                             
                                <li><a href="contact.html">contact</a></li>
                            </ul>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <?php 
	echo $this->load->view($konten);
	?>
  
    <footer class="footer-area">
       
        <div class="footer-bottom black-bg ptb-20">
            <div class="container">
                <div class="row">
                    <div class="col-12 text-center">
                        <div class="copyright">
                            <p>
                                Copyright ©
                                <a href="https://hastech.company/">HasTech</a> 2018 . All Right Reserved.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!-- modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-hidden="true">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span class="pe-7s-close" aria-hidden="true"></span>
        </button>
        <div class="modal-dialog modal-quickview-width" role="document">
            <div class="modal-content">
                <div class="modal-body">
                    <div class="qwick-view-left">
                        <div class="quick-view-learg-img">
                            <div class="quick-view-tab-content tab-content">
                                <div class="tab-pane active show fade" id="modal1" role="tabpanel">
                                    <img src="assets/img/quick-view/l1.jpg" alt="">
                                </div>
                                <div class="tab-pane fade" id="modal2" role="tabpanel">
                                    <img src="assets/img/quick-view/l2.jpg" alt="">
                                </div>
                                <div class="tab-pane fade" id="modal3" role="tabpanel">
                                    <img src="assets/img/quick-view/l3.jpg" alt="">
                                </div>
                            </div>
                        </div>
                        <div class="quick-view-list nav" role="tablist">
                            <a class="active" href="#modal1" data-toggle="tab" role="tab" aria-selected="true" aria-controls="home1">
                                <img src="assets/img/quick-view/s1.jpg" alt="">
                            </a>
                            <a href="#modal2" data-toggle="tab" role="tab" aria-selected="false" aria-controls="home2">
                                <img src="assets/img/quick-view/s2.jpg" alt="">
                            </a>
                            <a href="#modal3" data-toggle="tab" role="tab" aria-selected="false" aria-controls="home3">
                                <img src="assets/img/quick-view/s3.jpg" alt="">
                            </a>
                        </div>
                    </div>
                    <div class="qwick-view-right">
                        <div class="qwick-view-content">
                            <h3>Handcrafted Supper Mug</h3>
                            <div class="price">
                                <span class="new">$90.00</span>
                                <span class="old">$120.00  </span>
                            </div>
                            <div class="rating-number">
                                <div class="quick-view-rating">
                                    <i class="pe-7s-star"></i>
                                    <i class="pe-7s-star"></i>
                                    <i class="pe-7s-star"></i>
                                    <i class="pe-7s-star"></i>
                                    <i class="pe-7s-star"></i>
                                </div>
                                <div class="quick-view-number">
                                    <span>2 Ratting (S)</span>
                                </div>
                            </div>
                            <p>Lorem ipsum dolor sit amet, consectetur adip elit, sed do tempor incididun ut labore et dolore magna aliqua. Ut enim ad mi , quis nostrud veniam exercitation .</p>
                            <div class="quick-view-select">
                                <div class="select-option-part">
                                    <label>Size*</label>
                                    <select class="select">
                                        <option value="">- Please Select -</option>
                                        <option value="">900</option>
                                        <option value="">700</option>
                                    </select>
                                </div>
                                <div class="select-option-part">
                                    <label>Color*</label>
                                    <select class="select">
                                        <option value="">- Please Select -</option>
                                        <option value="">orange</option>
                                        <option value="">pink</option>
                                        <option value="">yellow</option>
                                    </select>
                                </div>
                            </div>
                            <div class="quickview-plus-minus">
                                <div class="cart-plus-minus">
                                    <input type="text" value="02" name="qtybutton" class="cart-plus-minus-box">
                                </div>
                                <div class="quickview-btn-cart">
                                    <a class="btn-hover-black" href="#">add to cart</a>
                                </div>
                                <div class="quickview-btn-wishlist">
                                    <a class="btn-hover" href="#"><i class="pe-7s-like"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>










    <!-- all js here -->
    <script src="<?php echo base_url(); ?>assets_front/js/vendor/jquery-1.12.0.min.js"></script>
    <script src="<?php echo base_url(); ?>assets_front/js/popper.js"></script>
    <script src="<?php echo base_url(); ?>assets_front/js/bootstrap.min.js"></script>
    <script src="<?php echo base_url(); ?>assets_front/js/jquery.magnific-popup.min.js"></script>
    <script src="<?php echo base_url(); ?>assets_front/js/isotope.pkgd.min.js"></script>
    <script src="<?php echo base_url(); ?>assets_front/js/imagesloaded.pkgd.min.js"></script>
    <script src="<?php echo base_url(); ?>assets_front/js/jquery.counterup.min.js"></script>
    <script src="<?php echo base_url(); ?>assets_front/js/waypoints.min.js"></script>
    <script src="<?php echo base_url(); ?>assets_front/js/ajax-mail.js"></script>
    <script src="<?php echo base_url(); ?>assets_front/js/owl.carousel.min.js"></script>
    <script src="<?php echo base_url(); ?>assets_front/js/plugins.js"></script>
    <script src="<?php echo base_url(); ?>assets_front/js/main.js"></script>
</body>

</html>
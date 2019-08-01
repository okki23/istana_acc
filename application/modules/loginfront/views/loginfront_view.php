<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>

 <!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=Edge">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <title> Istana Acessories  </title>
    <!-- Favicon-->
    <link rel="stylesheet" type="text/css" href="assets_front/styles/bootstrap4/bootstrap.min.css">
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.3/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets_front/plugins/OwlCarousel2-2.2.1/owl.carousel.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets_front/plugins/OwlCarousel2-2.2.1/owl.theme.default.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets_front/plugins/OwlCarousel2-2.2.1/animate.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets_front/styles/main_styles.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets_front/styles/responsive.css">

    
</head>
<body>
 
<div class="super_container">

<!-- Header -->

<header class="header trans_300">

    <!-- Top Navigation -->

    <div class="top_nav">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <div class="top_nav_left">free shipping on all u.s orders over $50</div>
                </div>
               
            </div>
        </div>
    </div>

    <!-- Main Navigation -->

    <div class="main_nav_container">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-right">
                    <div class="logo_container">
                         <img src="<?php echo base_url('upload/isclogo.png'); ?>" width="500px">
                    </div>
                    <nav class="navbar">
                        <ul class="navbar_menu">
                            <li><a href="<?php echo base_url('front'); ?>">home</a></li>
                      
                            <li><a href="<?php echo base_url('contact'); ?>">contact</a></li>
                            <?php 
                            if($this->session->userdata('username')){
                                echo ' <li><a href="javascript:void(0);">Welcome Okki!</a></li>';
                            }else{
                                echo ' <li><a href="'.base_url('loginfront').'">Login</a></li>';
                            }
                            ?>
                           
                           
                        </ul>
                        <ul class="navbar_user">
                            <?php
                            if($this->session->userdata('username')){
                            ?>

                                <li class="checkout">
                                <a href="<?php echo base_url('loginfront/logout'); ?>">
                                <i class="fa fa-unlock" aria-hidden="true"></i> 
                                </a>
                                </li>
                            
                            <li class="checkout">
                                <a href="#">
                                    <i class="fa fa-shopping-cart" aria-hidden="true"></i>
                                    <span id="checkout_items" class="checkout_items">2</span>
                                </a>
                            </li>
                            <?php
                            }else{
                            ?>
                            
                            
                            <?php
                            }
                            ?>
                      
                            
                        </ul>
                        <div class="hamburger_container">
                            <i class="fa fa-bars" aria-hidden="true"></i>
                        </div>
                    </nav>
                </div>
            </div>
        </div>
    </div>

</header>

<div class="fs_menu_overlay"></div>
<div class="hamburger_menu">
    <div class="hamburger_close"><i class="fa fa-times" aria-hidden="true"></i></div>
    <div class="hamburger_menu_content text-right">
        <ul class="menu_top_nav">
           
            <li class="menu_item has-children">
                <a href="#">
                    My Account
                    <i class="fa fa-angle-down"></i>
                </a>
                <ul class="menu_selection">
                    <li><a href="#"><i class="fa fa-sign-in" aria-hidden="true"></i>Sign In</a></li>
                    <li><a href="#"><i class="fa fa-user-plus" aria-hidden="true"></i>Register</a></li>
                </ul>
            </li>
            <li class="menu_item"><a href="<?php echo base_url('front'); ?>">home</a></li>
           
            <li class="menu_item"><a href="<?php echo base_url('loginfront'); ?>">loginfront</a></li>
        </ul>
    </div>
</div>

<!-- Slider -->
 
<!-- Banner -->
 
<!-- New Arrivals -->

<div class="container loginfront_container">
	<div class="col-lg-12">
    <div class="card" style="margin-top:200px;">
                    <div class="card-header">Login</div>
                    <div class="card-body">
                        <form action="<?php echo base_url('loginfront/auth'); ?>" method="POST">
                            <div class="form-group row">
                                <label for="email_address" class="col-md-4 col-form-label text-md-right">E-Mail Address</label>
                                <div class="col-md-6">
                                    <input type="text" id="email" class="form-control" name="email" required autofocus>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="password" class="col-md-4 col-form-label text-md-right">Password</label>
                                <div class="col-md-6">
                                    <input type="password" id="password" class="form-control" name="password" required>
                                </div>
                            </div>

                           

                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    Login
                                </button>
                                <br>
                                <p>Belum Punya Akun ?      <a href="<?php echo base_url('register'); ?>"> Register </a> </p>
                           
                              
                            </div>
                    </div>
                    </form>
                </div>
            </div>
    </div>
  
</div>



<!-- modal cari kategori -->
<div class="modal fade" id="DetailModal" tabindex="-1" role="dialog">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title" >Detail Barang</h4>
                    </div>
                    <div class="modal-body">
                            <button type="button" class="btn btn-danger" data-dismiss="modal">X Tutup</button>

                            <br>
                            <hr>

                             
                   </div>
                 
                </div>
            </div>
</div>


    <script src="<?php echo base_url(); ?>assets_front/js/jquery-3.2.1.min.js"></script>
    <script src="<?php echo base_url(); ?>assets_front/styles/bootstrap4/popper.js"></script>
    <script src="<?php echo base_url(); ?>assets_front/styles/bootstrap4/bootstrap.min.js"></script>
    <script src="<?php echo base_url(); ?>assets_front/plugins/Isotope/isotope.pkgd.min.js"></script>
    <script src="<?php echo base_url(); ?>assets_front/plugins/OwlCarousel2-2.2.1/owl.carousel.js"></script>
    <script src="<?php echo base_url(); ?>assets_front/plugins/easing/easing.js"></script>
    <script src="<?php echo base_url(); ?>assets_front/js/custom.js"></script>
    <script type="text/javascript">
    function ShowDetail(id){
    
    $("#DetailModal").modal({backdrop: 'static', keyboard: false,show:true});
    }
    </script>
</body>

</html>
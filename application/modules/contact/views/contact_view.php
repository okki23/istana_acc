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

                            if($this->session->userdata('email')){

                                echo ' <li><a href="javascript:void(0);">Welcome '.$this->session->userdata('full_name').'!</a></li>';

                            }else{

                                echo ' <li><a href="'.base_url('loginfront').'">Login</a></li>';

                            }

                            ?>

                           

                        </ul>

                        <ul class="navbar_user">

                            <?php

                            if($this->session->userdata('email')){

                            ?>



                                <li class="checkout">

                                <a href="<?php echo base_url('loginfront/logout'); ?>">

                                <i class="fa fa-unlock" aria-hidden="true"></i> 

                                </a>

                                </li>

                            

                            <li class="checkout">

                                <a href="<?php echo base_url('listcart'); ?>">

                                    <i class="fa fa-shopping-cart" aria-hidden="true"></i>

                                    <span id="checkout_items" class="checkout_items"> <?php echo $count_cart; ?></span>

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

           

            <li class="menu_item"><a href="<?php echo base_url('contact'); ?>">contact</a></li>

        </ul>

    </div>

</div>



<!-- Slider -->

 

<!-- Banner -->

 

<!-- New Arrivals -->



<div class="container contact_container">

		<div class="row">

			<div class="col">



				<!-- Breadcrumbs -->



			 



			</div>

		</div>



		<!-- Map Container -->



		<div class="row" >

            <div class="col" style="margin-top:180px;">

            <h2 align="center"> Contact </h2>

            <br>

			<iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d15867.758458227558!2d106.812375!3d-6.138815!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0xba0480c338b680d4!2sXuping+Jewelry!5e0!3m2!1sen!2sid!4v1564617124519!5m2!1sen!2sid" width="1100" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>

			</div>

		</div>



		<!-- Contact Us -->



		<div class="row">



			<div class="col-lg-6 contact_col">

				<div class="contact_contents">

				 

					<p> Jl. Asemka Raya No. 168, Jakarta Barat 11110 </p>

					<div>

						<p>  Telp : (021) 6908703, (021) 6908709, (021) 6929880 </p>
                        <p>  HP: 0821 8734 9926 </p>

						<p> info@istana-acc.com </p>
                        <p> istanasemka168@gmail.com </p>

					</div> 

					 
				</div>



				<!-- Follow Us -->

 



			</div>



			<div class="col-lg-6 get_in_touch_col">

				 

			</div>



		</div>

	</div>

 

<!-- Footer -->



<footer class="footer">

    <div class="container">

        <div class="row">

            <div class="col-lg-6">

           
            </div>

            <div class="col-lg-6">

                <div class="footer_social d-flex flex-row align-items-center justify-content-lg-end justify-content-center">

                    <ul>

                        <li><a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>

                        <li><a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>

                        <li><a href="#"><i class="fa fa-instagram" aria-hidden="true"></i></a></li>

                        <li><a href="#"><i class="fa fa-skype" aria-hidden="true"></i></a></li>

                        <li><a href="#"><i class="fa fa-pinterest" aria-hidden="true"></i></a></li>

                    </ul>

                </div>

            </div>

        </div>

        <div class="row">

            <div class="col-lg-12">

                <div class="footer_nav_container">

                    <div class="cr">©2018 All Rights Reserverd. This template is made with <i class="fa fa-heart-o" aria-hidden="true"></i> by <a href="#">Colorlib</a></div>

                </div>

            </div>

        </div>

    </div>

</footer>



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
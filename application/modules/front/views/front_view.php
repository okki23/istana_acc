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
                                echo ' <li><a href="javascript:void(0);">Welcome Okki!</a></li>';
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
           
           <li class="menu_item"><a href="<?php echo base_url('contact'); ?>">contact</a></li>
        </ul>
    </div>
</div>

<!-- Slider -->

<div class="main_slider" style="background-image:url(upload/banner.jpg)">
    <div class="container fill_height">
        <div class="row align-items-center fill_height">
            <div class="col">
                
            </div>
        </div>
    </div>
</div>

<!-- Banner -->
 
<!-- New Arrivals -->

<div class="new_arrivals">
    <div class="container">
        <div class="row">
            <div class="col text-center">
                <div class="section_title new_arrivals_title">
                    <h2> Our Products </h2>
                </div>
            </div>
        </div>
        <div class="row align-items-center">
            <div class="col text-center">
                <div class="new_arrivals_sorting">
                    <ul class="arrivals_grid_sorting clearfix button-group filters-button-group">
                        <li class="grid_sorting_button button d-flex flex-column justify-content-center align-items-center active is-checked" data-filter="*">all</li>
                        <?php
                            foreach($listcat as $key=>$val){
                                 
                                echo '<li class="grid_sorting_button button d-flex flex-column justify-content-center align-items-center" data-filter=".'.strtolower($val->nama_kategori).'"> '.$val->nama_kategori.'</li>';
                            }
                        ?>
                         
                    </ul>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <div class="product-grid" data-isotope='{ "itemSelector": ".product-item", "layoutMode": "fitRows" }'>
                    <?php
                    foreach($listitem as $k=>$v){
                      
                        echo '
                        <div class="product-item '.strtolower($v->nama_kategori).'">
                        <div class="product discount product_filter">
                            <div class="product_image">
                                <img src="'.base_url('upload/'.$v->foto).'" style="width:220px; height:200px;" alt="">
                            </div>
                          
                            <div class="product_info">
                                <h6 class="product_name"><a href="single.html"> '.$v->nama_barang.'</a></h6>
                                <div class="product_price">IDR '.number_format($v->harga).' </div>
                            </div>
                        </div>
                        <div class="red_button add_to_cart_button"><a href="javascript:void(0);" onclick="ShowDetail('.$v->id.');">detail</a></div>
                        <div class="red_button add_to_cart_button"><a href="javascript:void(0);">add to cart</a></div>
                    </div>';
                    }
                    ?>
                     
                </div>
            </div>
        </div>
    </div>
</div>
 
<!-- Footer -->

<footer class="footer">
    <div class="container">
        <div class="row">
            <div class="col-lg-6">
                <div class="footer_nav_container d-flex flex-sm-row flex-column align-items-center justify-content-lg-start justify-content-center text-center">
                    <ul class="footer_nav">
                        <li><a href="#">Blog</a></li>
                        <li><a href="#">FAQs</a></li>
                        <li><a href="contact.html">Contact us</a></li>
                    </ul>
                </div>
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


 <!-- modal detail -->
 <div class="modal fade" id="DetailModal" tabindex="-1" role="dialog">
                <div class="modal-dialog modal-lg" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title" >Detail</h4>
                        </div>
                        <div class="modal-body">
                                <button type="button" class="btn btn-danger" data-dismiss="modal">X Tutup</button>
                                <br>
                                <hr>
                                <table class="table table-bordered table-hovered">
                                <tr>
                                    <td>Nama Barang</td>
                                    <td>:</td>
                                    <td><div id="nama_barangdtl"> </div></td>
                                </tr>
                                <tr>
                                    <td>Kategori</td>
                                    <td>:</td>
                                    <td><div id="nama_kategoridtl"> </div></td>
                                </tr>
                                <tr>
                                    <td>Harga</td>
                                    <td>:</td>
                                    <td><div id="hargadtl"> </div></td>
                                </tr>
                                <tr>
                                    <td>Berat</td>
                                    <td>:</td>
                                    <td><div id="beratdtl"> </div></td>
                                </tr>
                                <tr>
                                    <td>Stock</td>
                                    <td>:</td>
                                    <td><div id="stockdtl"> </div></td>
                                </tr>
                                <tr>
                                    <td>Keterangan</td>
                                    <td>:</td>
                                    <td><div id="keterangandtl"> </div></td>
                                </tr>
                                <tr>
                                    <td>Foto</td>
                                    <td>:</td>
                                    <td>
                                     
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="3" align="center">  <img src="" class="img responsive" style="width:50%; height: 50%;" id="foto_dtl"> </td>
                                </tr>
                                </table>
                                 
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
      function numberWithCommas(x) {
            return x.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
        }
    function ShowDetail(id){
    
        $("#DetailModal").modal({backdrop: 'static', keyboard: false,show:true});
 
            $.ajax({
                url:"<?php echo base_url(); ?>barang/get_data_edit/"+id,
                type:"GET",
                dataType:"JSON", 
                success:function(result){ 
                    $("#id").val(result.id);
                    $("#nama_barangdtl").html(result.nama_barang);
                    $("#nama_kategoridtl").html(result.nama_kategori);            
                    $("#hargadtl").html("IDR "+numberWithCommas(result.harga));
                    $("#beratdtl").html(result.berat+" Gram");
                    $("#stockdtl").html(result.stock);
                    $("#keterangandtl").html(result.keterangan); 
                    //$("#fotodtl").html(result.foto); 
                    $("#foto_dtl").attr("src","upload/"+result.foto);
                    
                }
            });
    }
    </script>
</body>

</html>
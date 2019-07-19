   <!-- header end -->
   <div class="slider-area">
        <div class="slider-active owl-carousel">
            <div class="single-slider single-slider-book1 bg-img" style="background-image: url(assets_front/img/homeslide.jpg)">
                <div class="container">
                    <div class="slider-animation slider-content-book fadeinup-animated">
                        <h1 class="animated"><span>Knowledge</span> is</h1>
                        <h2 class="animated">Power.</h2>
                        <p class="animated">Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>
                        <a href="shop.html">More Books</a>
                    </div>
                </div>
            </div>
            <div class="single-slider single-slider-book1 bg-img" style="background-image: url(assets_front/img/homeslide.jpg)">
                <div class="container">
                    <div class="slider-animation slider-content-book fadeinup-animated">
                        <h1 class="animated"><span>Knowledge</span> is</h1>
                        <h2 class="animated">Power.</h2>
                        <p class="animated">Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>
                        <a href="shop.html">More Books</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- all products area start -->
    <div class="all-products-area pt-115 pb-50">
        <div class="pl-100 pr-100">
            <div class="container-fluid">
                <div class="section-title text-center mb-60">
                    <h2>All Products</h2>
                </div>
                <div class="product-style">
                    <div class="product-tab-list text-center mb-95 nav product-menu-mrg" role="tablist">
                    <?php
                    foreach($cat as $key=>$val){
                        echo ' <a href="#'.$val->nama_kategori.'" data-toggle="tab" role="tab" aria-selected="true" aria-controls="'.$val->nama_kategori.'">
                        <h4> '.$val->nama_kategori.' </h4>
                    </a>';
                    }
                    
                    ?>  
                     
                    </div>
                    <div class="tab-content">
                        <div class="tab-pane active show fade" id="home1" role="tabpanel">
                            <div class="custom-row">

                                <?php
                                    foreach($item as $key=>$val){
                                        echo ' <div class="custom-col-5 custom-col-style mb-65">
                                        <div class="product-wrapper">
                                            <div class="product-img">
                                                <a href="#">
                                                    <img src="'.base_url('upload/').$val->foto.'" alt="" >
                                                </a>
                                                 
                                                <div class="product-action">
                                                
                                                    <a class="animate-top" title="Add To Cart" href="#">
                                                        <i class="pe-7s-cart"></i>
                                                    </a>
                                                    <a class="animate-right" title="Quick View" data-toggle="modal" data-target="#exampleModal" href="#">
                                                        <i class="pe-7s-look"></i>
                                                    </a>
                                                </div>
                                            </div>
                                            <div class="product-content">
                                                <h4><a href="product-details.html">'.$val->nama_barang.'</a></h4>
                                                    <span>IDR. '.number_format($val->harga).'</span>
                                            </div>
                                        </div>
                                    </div>';
                                    }
                                    
                                ?>
                               
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
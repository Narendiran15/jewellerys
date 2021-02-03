<?php $this->load->view('site/common/header'); ?>
<main>
    <!-- hero slider area start -->
    <section class="slider-area">
        <div class="hero-slider-active slick-arrow-style slick-arrow-style_hero slick-dot-style">
            <!-- single slider item start -->
            <div class="hero-single-slide hero-overlay">
                <div class="hero-slider-item bg-img"
                    data-bg="<?php echo base_url();?>images/site/slider/home2-slide1.jpg">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="hero-slider-content slide-1">
                                    <h2 class="slide-title">Flower Diamond<span>Collection</span></h2>
                                    <h4 class="slide-desc">Budget Jewellery Starting At $295.99</h4>
                                    <a href="shop.html" class="btn btn-hero">Read More</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- single slider item end -->

            <!-- single slider item start -->
            <div class="hero-single-slide hero-overlay">
                <div class="hero-slider-item bg-img"
                    data-bg="<?php echo base_url();?>images/site/slider/home2-slide2.jpg">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="hero-slider-content slide-2">
                                    <h2 class="slide-title">New Diamond<span>& Wedding Rings</span></h2>
                                    <h4 class="slide-desc">Avail 15% off on Making Charges for all Jewellery</h4>
                                    <a href="shop.html" class="btn btn-hero">Read More</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- single slider item start -->

            <!-- single slider item start -->
            <div class="hero-single-slide hero-overlay">
                <div class="hero-slider-item bg-img"
                    data-bg="<?php echo base_url();?>images/site/slider/home1-slide1.jpg">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="hero-slider-content slide-3">
                                    <h2 class="slide-title">Grace Designer<span>Jewellery</span></h2>
                                    <h4 class="slide-desc">Rings, Occasion Pieces, Pandora & More.</h4>
                                    <a href="shop.html" class="btn btn-hero">Read More</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- single slider item start -->
        </div>
    </section>
    <!-- hero slider area end -->

    <!-- service policy area start -->
    <div class="service-policy">
        <div class="container">
            <div class="policy-block section-padding">
                <div class="row mtn-30">
                    <div class="col-sm-6 col-lg-3">
                        <div class="policy-item">
                            <div class="policy-icon">
                                <i class="pe-7s-plane"></i>
                            </div>
                            <div class="policy-content">
                                <h6>Free Shipping</h6>
                                <p>Free shipping all order</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-lg-3">
                        <div class="policy-item">
                            <div class="policy-icon">
                                <i class="pe-7s-help2"></i>
                            </div>
                            <div class="policy-content">
                                <h6>Support 24/7</h6>
                                <p>Support 24 hours a day</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-lg-3">
                        <div class="policy-item">
                            <div class="policy-icon">
                                <i class="pe-7s-back"></i>
                            </div>
                            <div class="policy-content">
                                <h6>Money Return</h6>
                                <p>30 days for free return</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-lg-3">
                        <div class="policy-item">
                            <div class="policy-icon">
                                <i class="pe-7s-credit"></i>
                            </div>
                            <div class="policy-content">
                                <h6>100% Payment Secure</h6>
                                <p>We ensure secure payment</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- service policy area end -->

    <!-- product area start -->
    <section class="product-area section-padding">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <!-- section title start -->
                    <div class="section-title text-center">
                        <h2 class="title">our products</h2>
                        <p class="sub-title">Add our products to weekly lineup</p>
                    </div>
                    <!-- section title start -->
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="product-container">
                        <!-- product tab menu start -->
                        <div class="product-tab-menu">
                            <ul class="nav justify-content-center">
                                <?php $i=0; foreach($out_products as $out_productss): ?>
                                <li><a href="#tab<?php  echo $out_productss->id; ?>"
                                        class="<?php echo ($i==0)?"active":""; ?>"
                                        data-toggle="tab"><?php  echo $out_productss->cname; ?></a></li>

                                <?php $i++; endforeach; ?>
                            </ul>
                        </div>
                        <!-- product tab menu end -->

                        <!-- product tab content start -->
                        <div class="tab-content">
                            <?php $i=0; foreach($out_products as $out_productss): ?>
                            <div class="tab-pane fade <?php echo ($i == 0)?"show active":""?>"
                                id="tab<?php echo $out_productss->id; ?>">
                                <div class="product-carousel-4 slick-row-10 slick-arrow-style">
                                    <?php $product =  get_our_product_by_cat($out_productss->id)->result(); 
                                    
                                    ?>
                                    <!-- product item start -->
                                    <?php foreach($product as $products): ?>
                                    <div class="product-item">
                                        <figure class="product-thumb">
                                            <a href="product-details.html">
                                                <img class="pri-img"
                                                    src="<?php echo base_url();?>images/site/product/product-1.jpg"
                                                    alt="product">
                                                <img class="sec-img"
                                                    src="<?php echo base_url();?>images/site/product/product-18.jpg"
                                                    alt="product">
                                            </a>
                                            <!--div class="product-badge">
                                                <div class="product-label new">
                                                    <span>new</span>
                                                </div>
                                                <div class="product-label discount">
                                                    <span>10%</span>
                                                </div>
                                            </div-->
                                            <div class="button-group">
                                                <a href="wishlist.html" data-toggle="tooltip" data-placement="left"
                                                    title="Add to wishlist"><i class="pe-7s-like"></i></a>
                                                <!--a href="compare.html" data-toggle="tooltip" data-placement="left"
                                                    title="Add to Compare"><i class="pe-7s-refresh-2"></i></a-->
                                                <a href="#" data-toggle="modal" data-target="#quick_view"><span
                                                        data-toggle="tooltip" data-placement="left"
                                                        title="Quick View"><i class="pe-7s-search"></i></span></a>
                                            </div>
                                            <div class="cart-hover">
                                                <button class="btn btn-cart">add to cart</button>
                                            </div>
                                        </figure>
                                        <div class="product-caption text-center">
                                            <div class="product-identity">
                                                <p class="manufacturer-name"><a
                                                        href="product-details.html"><?php echo $products->sub_cat_name; ?></a>
                                                </p>
                                            </div>
                                            <h6 class="product-name">
                                                <a href="product-details.html"><?php echo $products->pname; ?></a>
                                            </h6>
                                            <!--div class="price-box">
                                                <span class="price-regular">$60.00</span>
                                                <span class="price-old"><del>$70.00</del></span>
                                            </div-->
                                        </div>
                                    </div>
                                    <?php endforeach; ?>
                                </div>
                            </div>
                            <?php $i++; endforeach; ?>

                            <!-- product item end -->
                        </div>
                    </div>
                </div>
                <!-- product tab content end -->
            </div>
        </div>
        </div>
        </div>
    </section>
    <!-- product area end -->

    <!-- banner statistics area start -->
    <div class="banner-statistics-area">
        <div class="container">
            <div class="row row-20 mtn-20">
                <div class="col-sm-6">
                    <figure class="banner-statistics mt-20">
                        <a href="#">
                            <img src="<?php echo base_url();?>images/site/banner/img1-top.jpg" alt="product banner">
                        </a>
                        <div class="banner-content text-right">
                            <h5 class="banner-text1">BEAUTIFUL</h5>
                            <h2 class="banner-text2">Wedding<span>Rings</span></h2>
                            <a href="shop.html" class="btn btn-text">Shop Now</a>
                        </div>
                    </figure>
                </div>
                <div class="col-sm-6">
                    <figure class="banner-statistics mt-20">
                        <a href="#">
                            <img src="<?php echo base_url();?>images/site/banner/img2-top.jpg" alt="product banner">
                        </a>
                        <div class="banner-content text-center">
                            <h5 class="banner-text1">EARRINGS</h5>
                            <h2 class="banner-text2">Tangerine Floral <span>Earring</span></h2>
                            <a href="shop.html" class="btn btn-text">Shop Now</a>
                        </div>
                    </figure>
                </div>
                <div class="col-sm-6">
                    <figure class="banner-statistics mt-20">
                        <a href="#">
                            <img src="<?php echo base_url();?>images/site/banner/img3-top.jpg" alt="product banner">
                        </a>
                        <div class="banner-content text-center">
                            <h5 class="banner-text1">NEW ARRIVALLS</h5>
                            <h2 class="banner-text2">Pearl<span>Necklaces</span></h2>
                            <a href="shop.html" class="btn btn-text">Shop Now</a>
                        </div>
                    </figure>
                </div>
                <div class="col-sm-6">
                    <figure class="banner-statistics mt-20">
                        <a href="#">
                            <img src="<?php echo base_url();?>images/site/banner/img4-top.jpg" alt="product banner">
                        </a>
                        <div class="banner-content text-right">
                            <h5 class="banner-text1">NEW DESIGN</h5>
                            <h2 class="banner-text2">Diamond<span>Jewelry</span></h2>
                            <a href="shop.html" class="btn btn-text">Shop Now</a>
                        </div>
                    </figure>
                </div>
            </div>
        </div>
    </div>
    <!-- banner statistics area end -->

    <!-- featured product area start -->
    <section class="feature-product section-padding">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <!-- section title start -->
                    <div class="section-title text-center">
                        <h2 class="title">featured products</h2>
                        <p class="sub-title">Add featured products to weekly lineup</p>
                    </div>
                    <!-- section title start -->
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="product-carousel-4_2 slick-row-10 slick-arrow-style">
                        <?php  foreach($featured_products as $featured_productsss): ?>
                        <div class="product-item">
                            <figure class="product-thumb">
                                <a href="product-details.html">
                                    <img class="pri-img" src="<?php echo base_url();?>images/site/product/product-6.jpg"
                                        alt="product">
                                    <img class="sec-img"
                                        src="<?php echo base_url();?>images/site/product/product-13.jpg" alt="product">
                                </a>
                               
                                <div class="button-group">
                                    <a href="wishlist.html" data-toggle="tooltip" data-placement="left"
                                        title="Add to wishlist"><i class="pe-7s-like"></i></a>
                                
                                    <a href="#" data-toggle="modal" data-target="#quick_view"><span
                                            data-toggle="tooltip" data-placement="left" title="Quick View"><i
                                                class="pe-7s-search"></i></span></a>
                                </div>
                                <div class="cart-hover">
                                    <button class="btn btn-cart">add to cart</button>
                                </div>
                            </figure>
                            <div class="product-caption text-center">
                                <div class="product-identity">
                                    <p class="manufacturer-name"><a href="product-details.html"><?php echo $featured_productsss->sub_cat_name; ?></a></p>
                                </div>
                            
                                <h6 class="product-name">
                                    <a href="product-details.html"><?php echo $featured_productsss->pname; ?></a>
                                </h6>
                                <!--div class="price-box">
                                    <span class="price-regular">$60.00</span>
                                    <span class="price-old"><del>$70.00</del></span>
                                </div-->
                            </div>
                        </div>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- featured product area end -->

    <!-- testimonial area start -->
    <section class="testimonial-area section-padding bg-img"
        data-bg="<?php echo base_url();?>images/site/testimonial/testimonials-bg.jpg">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <!-- section title start -->
                    <div class="section-title text-center">
                        <h2 class="title">testimonials</h2>
                        <p class="sub-title">What they say</p>
                    </div>
                    <!-- section title start -->
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="testimonial-thumb-wrapper">
                        <div class="testimonial-thumb-carousel">
                            <div class="testimonial-thumb">
                                <img src="<?php echo base_url();?>images/site/testimonial/testimonial-1.png"
                                    alt="testimonial-thumb">
                            </div>
                            <div class="testimonial-thumb">
                                <img src="<?php echo base_url();?>images/site/testimonial/testimonial-2.png"
                                    alt="testimonial-thumb">
                            </div>
                            <div class="testimonial-thumb">
                                <img src="<?php echo base_url();?>images/site/testimonial/testimonial-3.png"
                                    alt="testimonial-thumb">
                            </div>
                            <div class="testimonial-thumb">
                                <img src="<?php echo base_url();?>images/site/testimonial/testimonial-2.png"
                                    alt="testimonial-thumb">
                            </div>
                        </div>
                    </div>
                    <div class="testimonial-content-wrapper">
                        <div class="testimonial-content-carousel">
                            <div class="testimonial-content">
                                <p>Vivamus a lobortis ipsum, vel condimentum magna. Etiam id turpis tortor. Nunc
                                    scelerisque, nisi a blandit varius, nunc purus venenatis ligula, sed venenatis orci
                                    augue nec sapien. Cum sociis natoque</p>
                                <div class="ratings">
                                    <span><i class="fa fa-star-o"></i></span>
                                    <span><i class="fa fa-star-o"></i></span>
                                    <span><i class="fa fa-star-o"></i></span>
                                    <span><i class="fa fa-star-o"></i></span>
                                    <span><i class="fa fa-star-o"></i></span>
                                </div>
                                <h5 class="testimonial-author">lindsy niloms</h5>
                            </div>
                            <div class="testimonial-content">
                                <p>Vivamus a lobortis ipsum, vel condimentum magna. Etiam id turpis tortor. Nunc
                                    scelerisque, nisi a blandit varius, nunc purus venenatis ligula, sed venenatis orci
                                    augue nec sapien. Cum sociis natoque</p>
                                <div class="ratings">
                                    <span><i class="fa fa-star-o"></i></span>
                                    <span><i class="fa fa-star-o"></i></span>
                                    <span><i class="fa fa-star-o"></i></span>
                                    <span><i class="fa fa-star-o"></i></span>
                                    <span><i class="fa fa-star-o"></i></span>
                                </div>
                                <h5 class="testimonial-author">Daisy Millan</h5>
                            </div>
                            <div class="testimonial-content">
                                <p>Vivamus a lobortis ipsum, vel condimentum magna. Etiam id turpis tortor. Nunc
                                    scelerisque, nisi a blandit varius, nunc purus venenatis ligula, sed venenatis orci
                                    augue nec sapien. Cum sociis natoque</p>
                                <div class="ratings">
                                    <span><i class="fa fa-star-o"></i></span>
                                    <span><i class="fa fa-star-o"></i></span>
                                    <span><i class="fa fa-star-o"></i></span>
                                    <span><i class="fa fa-star-o"></i></span>
                                    <span><i class="fa fa-star-o"></i></span>
                                </div>
                                <h5 class="testimonial-author">Anamika lusy</h5>
                            </div>
                            <div class="testimonial-content">
                                <p>Vivamus a lobortis ipsum, vel condimentum magna. Etiam id turpis tortor. Nunc
                                    scelerisque, nisi a blandit varius, nunc purus venenatis ligula, sed venenatis orci
                                    augue nec sapien. Cum sociis natoque</p>
                                <div class="ratings">
                                    <span><i class="fa fa-star-o"></i></span>
                                    <span><i class="fa fa-star-o"></i></span>
                                    <span><i class="fa fa-star-o"></i></span>
                                    <span><i class="fa fa-star-o"></i></span>
                                    <span><i class="fa fa-star-o"></i></span>
                                </div>
                                <h5 class="testimonial-author">Maria Mora</h5>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- testimonial area end -->

    <!-- group product start -->
    <section class="group-product-area section-padding">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <div class="group-product-banner">
                        <figure class="banner-statistics">
                            <a href="#">
                                <img src="<?php echo base_url();?>images/site/banner/img-bottom-banner.jpg"
                                    alt="product banner">
                            </a>
                            <div class="banner-content banner-content_style3 text-center">
                                <h6 class="banner-text1">BEAUTIFUL</h6>
                                <h2 class="banner-text2">Wedding Rings</h2>
                                <a href="shop.html" class="btn btn-text">Shop Now</a>
                            </div>
                        </figure>
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="categories-group-wrapper">
                        <!-- section title start -->
                        <div class="section-title-append">
                            <h4>best seller product</h4>
                            <div class="slick-append"></div>
                        </div>
                        <!-- section title start -->

                        <!-- group list carousel start -->
                        <div class="group-list-item-wrapper">
                            <div class="group-list-carousel">
                                <!-- group list item start -->
                                <div class="group-slide-item">
                                    <div class="group-item">
                                        <div class="group-item-thumb">
                                            <a href="product-details.html">
                                                <img src="<?php echo base_url();?>images/site/product/product-1.jpg"
                                                    alt="">
                                            </a>
                                        </div>
                                        <div class="group-item-desc">
                                            <h5 class="group-product-name"><a href="product-details.html">
                                                    Diamond Exclusive ring</a></h5>
                                            <div class="price-box">
                                                <span class="price-regular">$50.00</span>
                                                <span class="price-old"><del>$29.99</del></span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- group list item end -->

                                <!-- group list item start -->
                                <div class="group-slide-item">
                                    <div class="group-item">
                                        <div class="group-item-thumb">
                                            <a href="product-details.html">
                                                <img src="<?php echo base_url();?>images/site/product/product-3.jpg"
                                                    alt="">
                                            </a>
                                        </div>
                                        <div class="group-item-desc">
                                            <h5 class="group-product-name"><a href="product-details.html">
                                                    Handmade Golden ring</a></h5>
                                            <div class="price-box">
                                                <span class="price-regular">$55.00</span>
                                                <span class="price-old"><del>$30.00</del></span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- group list item end -->

                                <!-- group list item start -->
                                <div class="group-slide-item">
                                    <div class="group-item">
                                        <div class="group-item-thumb">
                                            <a href="product-details.html">
                                                <img src="<?php echo base_url();?>images/site/product/product-5.jpg"
                                                    alt="">
                                            </a>
                                        </div>
                                        <div class="group-item-desc">
                                            <h5 class="group-product-name"><a href="product-details.html">
                                                    exclusive gold Jewelry</a></h5>
                                            <div class="price-box">
                                                <span class="price-regular">$45.00</span>
                                                <span class="price-old"><del>$25.00</del></span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- group list item end -->

                                <!-- group list item start -->
                                <div class="group-slide-item">
                                    <div class="group-item">
                                        <div class="group-item-thumb">
                                            <a href="product-details.html">
                                                <img src="<?php echo base_url();?>images/site/product/product-7.jpg"
                                                    alt="">
                                            </a>
                                        </div>
                                        <div class="group-item-desc">
                                            <h5 class="group-product-name"><a href="product-details.html">
                                                    Perfect Diamond earring</a></h5>
                                            <div class="price-box">
                                                <span class="price-regular">$50.00</span>
                                                <span class="price-old"><del>$29.99</del></span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- group list item end -->

                                <!-- group list item start -->
                                <div class="group-slide-item">
                                    <div class="group-item">
                                        <div class="group-item-thumb">
                                            <a href="product-details.html">
                                                <img src="<?php echo base_url();?>images/site/product/product-9.jpg"
                                                    alt="">
                                            </a>
                                        </div>
                                        <div class="group-item-desc">
                                            <h5 class="group-product-name"><a href="product-details.html">
                                                    Handmade Golden Necklace</a></h5>
                                            <div class="price-box">
                                                <span class="price-regular">$90.00</span>
                                                <span class="price-old"><del>$100.</del></span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- group list item end -->

                                <!-- group list item start -->
                                <div class="group-slide-item">
                                    <div class="group-item">
                                        <div class="group-item-thumb">
                                            <a href="product-details.html">
                                                <img src="<?php echo base_url();?>images/site/product/product-11.jpg"
                                                    alt="">
                                            </a>
                                        </div>
                                        <div class="group-item-desc">
                                            <h5 class="group-product-name"><a href="product-details.html">
                                                    Handmade Golden Necklace</a></h5>
                                            <div class="price-box">
                                                <span class="price-regular">$20.00</span>
                                                <span class="price-old"><del>$30.00</del></span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- group list item end -->

                                <!-- group list item start -->
                                <div class="group-slide-item">
                                    <div class="group-item">
                                        <div class="group-item-thumb">
                                            <a href="product-details.html">
                                                <img src="<?php echo base_url();?>images/site/product/product-13.jpg"
                                                    alt="">
                                            </a>
                                        </div>
                                        <div class="group-item-desc">
                                            <h5 class="group-product-name"><a href="product-details.html">
                                                    Handmade Golden ring</a></h5>
                                            <div class="price-box">
                                                <span class="price-regular">$55.00</span>
                                                <span class="price-old"><del>$30.00</del></span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- group list item end -->

                                <!-- group list item start -->
                                <div class="group-slide-item">
                                    <div class="group-item">
                                        <div class="group-item-thumb">
                                            <a href="product-details.html">
                                                <img src="<?php echo base_url();?>images/site/product/product-15.jpg"
                                                    alt="">
                                            </a>
                                        </div>
                                        <div class="group-item-desc">
                                            <h5 class="group-product-name"><a href="product-details.html">
                                                    exclusive gold Jewelry</a></h5>
                                            <div class="price-box">
                                                <span class="price-regular">$45.00</span>
                                                <span class="price-old"><del>$25.00</del></span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- group list item end -->
                            </div>
                        </div>
                        <!-- group list carousel start -->
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="categories-group-wrapper">
                        <!-- section title start -->
                        <div class="section-title-append">
                            <h4>on-sale product</h4>
                            <div class="slick-append"></div>
                        </div>
                        <!-- section title start -->

                        <!-- group list carousel start -->
                        <div class="group-list-item-wrapper">
                            <div class="group-list-carousel">
                                <!-- group list item start -->
                                <div class="group-slide-item">
                                    <div class="group-item">
                                        <div class="group-item-thumb">
                                            <a href="product-details.html">
                                                <img src="<?php echo base_url();?>images/site/product/product-17.jpg"
                                                    alt="">
                                            </a>
                                        </div>
                                        <div class="group-item-desc">
                                            <h5 class="group-product-name"><a href="product-details.html">
                                                    Handmade Golden Necklace</a></h5>
                                            <div class="price-box">
                                                <span class="price-regular">$50.00</span>
                                                <span class="price-old"><del>$29.99</del></span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- group list item end -->

                                <!-- group list item start -->
                                <div class="group-slide-item">
                                    <div class="group-item">
                                        <div class="group-item-thumb">
                                            <a href="product-details.html">
                                                <img src="<?php echo base_url();?>images/site/product/product-16.jpg"
                                                    alt="">
                                            </a>
                                        </div>
                                        <div class="group-item-desc">
                                            <h5 class="group-product-name"><a href="product-details.html">
                                                    Handmade Golden Necklaces</a></h5>
                                            <div class="price-box">
                                                <span class="price-regular">$55.00</span>
                                                <span class="price-old"><del>$30.00</del></span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- group list item end -->

                                <!-- group list item start -->
                                <div class="group-slide-item">
                                    <div class="group-item">
                                        <div class="group-item-thumb">
                                            <a href="product-details.html">
                                                <img src="<?php echo base_url();?>images/site/product/product-12.jpg"
                                                    alt="">
                                            </a>
                                        </div>
                                        <div class="group-item-desc">
                                            <h5 class="group-product-name"><a href="product-details.html">
                                                    exclusive silver top bracellet</a></h5>
                                            <div class="price-box">
                                                <span class="price-regular">$45.00</span>
                                                <span class="price-old"><del>$25.00</del></span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- group list item end -->

                                <!-- group list item start -->
                                <div class="group-slide-item">
                                    <div class="group-item">
                                        <div class="group-item-thumb">
                                            <a href="product-details.html">
                                                <img src="<?php echo base_url();?>images/site/product/product-11.jpg"
                                                    alt="">
                                            </a>
                                        </div>
                                        <div class="group-item-desc">
                                            <h5 class="group-product-name"><a href="product-details.html">
                                                    top Perfect Diamond necklace</a></h5>
                                            <div class="price-box">
                                                <span class="price-regular">$50.00</span>
                                                <span class="price-old"><del>$29.99</del></span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- group list item end -->

                                <!-- group list item start -->
                                <div class="group-slide-item">
                                    <div class="group-item">
                                        <div class="group-item-thumb">
                                            <a href="product-details.html">
                                                <img src="<?php echo base_url();?>images/site/product/product-7.jpg"
                                                    alt="">
                                            </a>
                                        </div>
                                        <div class="group-item-desc">
                                            <h5 class="group-product-name"><a href="product-details.html">
                                                    Diamond Exclusive earrings</a></h5>
                                            <div class="price-box">
                                                <span class="price-regular">$90.00</span>
                                                <span class="price-old"><del>$100.</del></span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- group list item end -->

                                <!-- group list item start -->
                                <div class="group-slide-item">
                                    <div class="group-item">
                                        <div class="group-item-thumb">
                                            <a href="product-details.html">
                                                <img src="<?php echo base_url();?>images/site/product/product-2.jpg"
                                                    alt="">
                                            </a>
                                        </div>
                                        <div class="group-item-desc">
                                            <h5 class="group-product-name"><a href="product-details.html">
                                                    corano top exclusive jewellry</a></h5>
                                            <div class="price-box">
                                                <span class="price-regular">$20.00</span>
                                                <span class="price-old"><del>$30.00</del></span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- group list item end -->

                                <!-- group list item start -->
                                <div class="group-slide-item">
                                    <div class="group-item">
                                        <div class="group-item-thumb">
                                            <a href="product-details.html">
                                                <img src="<?php echo base_url();?>images/site/product/product-18.jpg"
                                                    alt="">
                                            </a>
                                        </div>
                                        <div class="group-item-desc">
                                            <h5 class="group-product-name"><a href="product-details.html">
                                                    Handmade Golden ring</a></h5>
                                            <div class="price-box">
                                                <span class="price-regular">$55.00</span>
                                                <span class="price-old"><del>$30.00</del></span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- group list item end -->

                                <!-- group list item start -->
                                <div class="group-slide-item">
                                    <div class="group-item">
                                        <div class="group-item-thumb">
                                            <a href="product-details.html">
                                                <img src="<?php echo base_url();?>images/site/product/product-14.jpg"
                                                    alt="">
                                            </a>
                                        </div>
                                        <div class="group-item-desc">
                                            <h5 class="group-product-name"><a href="product-details.html">
                                                    exclusive gold Jewelry</a></h5>
                                            <div class="price-box">
                                                <span class="price-regular">$45.00</span>
                                                <span class="price-old"><del>$25.00</del></span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- group list item end -->
                            </div>
                        </div>
                        <!-- group list carousel start -->
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- group product end -->

    <!-- latest blog area start -->
    <!-- latest blog area end -->

    <!-- brand logo area start -->
    <div class="brand-logo section-padding pt-0">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="brand-logo-carousel slick-row-10 slick-arrow-style">
                        <!-- single brand start -->
                        <div class="brand-item">
                            <a href="#">
                                <img src="<?php echo base_url();?>images/site/brand/1.png" alt="">
                            </a>
                        </div>
                        <!-- single brand end -->

                        <!-- single brand start -->
                        <div class="brand-item">
                            <a href="#">
                                <img src="<?php echo base_url();?>images/site/brand/2.png" alt="">
                            </a>
                        </div>
                        <!-- single brand end -->

                        <!-- single brand start -->
                        <div class="brand-item">
                            <a href="#">
                                <img src="<?php echo base_url();?>images/site/brand/3.png" alt="">
                            </a>
                        </div>
                        <!-- single brand end -->

                        <!-- single brand start -->
                        <div class="brand-item">
                            <a href="#">
                                <img src="<?php echo base_url();?>images/site/brand/4.png" alt="">
                            </a>
                        </div>
                        <!-- single brand end -->

                        <!-- single brand start -->
                        <div class="brand-item">
                            <a href="#">
                                <img src="<?php echo base_url();?>images/site/brand/5.png" alt="">
                            </a>
                        </div>
                        <!-- single brand end -->

                        <!-- single brand start -->
                        <div class="brand-item">
                            <a href="#">
                                <img src="<?php echo base_url();?>images/site/brand/6.png" alt="">
                            </a>
                        </div>
                        <!-- single brand end -->
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- brand logo area end -->
</main>
<?php $this->load->view('site/common/footer'); ?>
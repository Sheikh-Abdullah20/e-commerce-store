<!DOCTYPE html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8" />
    <title>Nest - Home</title>
    <meta http-equiv="x-ua-compatible" content="ie=edge" />
    <meta name="description" content="" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta property="og:title" content="" />
    <meta property="og:type" content="" />
    <meta property="og:url" content="" />
    <meta property="og:image" content="" />
    <!-- Favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="assets/imgs/theme/favicon.svg" />
    <!-- Template CSS -->
    <link rel="stylesheet" href="assets/css/plugins/animate.min.css" />
    <link rel="stylesheet" href="assets/css/main.css?v=6.0" />
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">

    <style>
        .logout_btn[type=submit]{
            font-size: 1rem;
            padding: 0.5rem;
            color: black;
        }
    </style>
</head>

<body>

    {{-- Profile Checker --}}
    @if(empty($user->profile))
    <div class="modal fade custom-modal" id="onloadModal" tabindex="-1" aria-labelledby="onloadModalLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-12">
                            <h1>Set Your Profile</h1>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-12">
                            <p>Create your personalized profile Picture to get the most out of your Nest shopping experience.</p>
                        </div>
                    </div>

                    <div class="row mt-5">
                        <div class="col-md-12">
                            <figure class="text-lg-center">
                                @isset($user->profile)
                                <img class="img-lg mb-3 img-avatar upload_button "
                                    src="{{ asset('storage/'. $user->profile) }}"
                                    alt="User Photo"
                                    style="width: 200px; clip-path: circle();cursor: pointer;" />
                                @else
                                <img class="img-lg mb-3 img-avatar upload_button" id="output"
                                    src="{{ asset('images/Add_image2.jpg') }}"
                                    alt="User Photo" style="width: 200px; clip-path: circle();cursor: pointer;" />
                                @endisset
                            </figure>
                            <form action="{{ route('profile.check') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <input type="file" onchange="document.querySelector('#output').src=window.URL.createObjectURL(this.files[0])" id="file" hidden name="profile">
                               
                                <div class="row text-center">
                                    @error('profile')
                                    <span class="text-danger mb-2">
                                        {{ $message }}
                                    </span>
                                @enderror
                                    <div class="col-12">
                                        <button type="submit" id="submit" class="btn btn-primary rounded font-md text-dark">Upload</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endif
    <!-- Quick view -->
    <header class="header-area header-style-1 header-height-2">
        <div class="mobile-promotion">
            <span>Grand opening, <strong>up to 15%</strong> off all items. Only <strong>3 days</strong> left</span>
        </div>
       
        <div class="header-middle header-middle-ptb-1 d-none d-lg-block">
            <div class="container">
                <div class="header-wrap">
                    <div class="logo logo-width-1">
                        <a href="{{ route('home') }}"><img src="{{ asset('assets/imgs/theme/logo.svg') }}" alt="logo" /></a>
                    </div>

                    <div class="header-right">
                        <div class="search-style-2">
                            <form action="{{ route('search.product') }}" method="GET">
                                @csrf
                                <select id="categoryFilter" name="category" class="select-active">
                                    <option value="">All Categories</option>
                                    @foreach ($categories as $category )
                                    <option value="{{ $category->id }}">{{ $category->category_name }}</option>
                                    @endforeach
                                </select>
                                <input type="text" placeholder="Search for items..." name="search" />
                                <button class="btn" style="background-color: rgb(33, 66, 30) !important;color:white !important;">Search</button>
                            </form>
                        </div>

                        <div class="header-action-right">
                            <div class="header-action-2">
                                <div class="search-location">
                                    
                                </div>
                                <div class="header-action-icon-2">
                                    <a href="{{ route('myaccount.profile') }}">
                                     <img class="img-xs rounded-circle" src="{{ asset('storage/' . $user->profile) }}" style="max-width: 40px !important; object-fit: cover"/>
                                    </a>
                                    <a href="{{ route('myaccount.profile') }}"><span class="lable ml-0 mx-2">{{ Auth()->user()->name }}</span></a>
                                    <div class="cart-dropdown-wrap cart-dropdown-hm2 account-dropdown">
                                        <ul>
                                            <li>
                                                <a href="{{ route('myaccount.profile') }}"><i class="fi fi-rs-user mr-10"></i>My
                                                    Account</a>
                                            </li>
                                         
                                          
                                            <li>
                                                <form action="{{ route('logout') }}" method="POST">
                                                    @csrf
                                                    <button type="submit" class='logout_btn'><i
                                                            class="fi fi-rs-sign-out mr-10"></i>Sign out</button>
                                                </form>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                        

                        


                    </div>
                </div>
            </div>
        </div>
        <div class="header-action-icon-2 d-block d-lg-none">
            <div class="burger-icon burger-icon-white">
                <span class="burger-icon-top"></span>
                <span class="burger-icon-mid"></span>
                <span class="burger-icon-bottom"></span>
            </div>
        </div>
    </header>
    <div class="mobile-header-active mobile-header-wrapper-style">
        <div class="mobile-header-wrapper-inner">
            <div class="mobile-header-top">
                <div class="mobile-header-logo">
                    <a href="index.html"><img src="{{ asset('assets/imgs/theme/logo.svg') }}" alt="logo" /></a>
                </div>
                <div class="mobile-menu-close close-style-wrap close-style-position-inherit">
                    <button class="close-style search-close">
                        <i class="icon-top"></i>
                        <i class="icon-bottom"></i>
                    </button>
                </div>
            </div>
            <div class="mobile-header-content-area">
                <div class="mobile-search search-style-3 mobile-header-border">
                    <form action="{{ route('search.product') }}" method="GET">
                        <input type="text" placeholder="Search for items…"  name="search"/>
                        <button type="submit"><i class="fi-rs-search"></i></button>
                    </form>
                </div>
                <div class="mobile-menu-wrap mobile-header-border">
                    <!-- mobile menu start -->
                    <nav>
                        <ul class="mobile-menu font-heading">
                            <li class="menu-item-has-children">
                                <a href="{{ route('home') }}">Home</a>
                            </li>
                            <li class="menu-item-has-children">
                                <a href="{{ route('myaccount.profile') }}">Account</a>
                            </li>
                        </ul>
                    </nav>
                    <!-- mobile menu end -->
                </div>
                <div class="mobile-header-info-wrap">
                    <div class="single-mobile-header-info">
                        <a href="page-contact.html"><i class="fi-rs-marker"></i> Our location </a>
                    </div>
                    <div class="single-mobile-header-info">
                        <a href="#"><i class="fi-rs-headphones"></i>(+01) - 2345 - 6789 </a>
                    </div>
                </div>
                <div class="mobile-social-icon mb-50">
                    <h6 class="mb-15">Follow Us</h6>
                   <a href="#"><img src="{{ asset('assets/imgs/theme/icons/icon-facebook-white.svg') }}" alt="" /></a>
                    <a href="#"><img src="{{ asset('assets/imgs/theme/icons/icon-twitter-white.svg') }}" alt="" /></a>
                    <a href="#"><img src="{{ asset('assets/imgs/theme/icons/icon-instagram-white.svg') }}" alt="" /></a>
                    <a href="#"><img src="{{ asset('assets/imgs/theme/icons/icon-pinterest-white.svg') }}" alt="" /></a>
                    <a href="#"><img src="{{ asset('assets/imgs/theme/icons/icon-youtube-white.svg') }}" alt="" /></a>
                </div>
            </div>
        </div>
    </div>
    <!--End header-->
    <x-alert/>
       <main class="main">
    <section class="home-slider position-relative mb-30">
    <div class="container">
        <div class="home-slide-cover mt-30">
            <div class="hero-slider-1 style-4 dot-style-1 dot-style-1-position-1">
                <div class="single-hero-slider single-animation-wrap"
                    style="background-image: url(assets/imgs/slider/slider-1.png)">
                    <div class="slider-content">
                        <h1 class="display-2 mb-40">
                            Don’t miss amazing<br />
                            grocery deals
                        </h1>
                        <p class="mb-65">Sign up for the daily newsletter</p>
                        <form class="form-subcriber d-flex">
                            <input type="email" placeholder="Your emaill address" />
                            <button class="btn" type="submit">Subscribe</button>
                        </form>
                    </div>
                </div>
                <div class="single-hero-slider single-animation-wrap"
                    style="background-image: url(assets/imgs/slider/slider-2.png)">
                    <div class="slider-content">
                        <h1 class="display-2 mb-40">
                            Fresh Vegetables<br />
                            Big discount
                        </h1>
                        <p class="mb-65">Save up to 50% off on your first order</p>
                        <form class="form-subcriber d-flex">
                            <input type="email" placeholder="Your emaill address" />
                            <button class="btn" type="submit">Subscribe</button>
                        </form>
                    </div>
                </div>
            </div>
            <div class="slider-arrow hero-slider-1-arrow"></div>
        </div>
    </div>
</section>
<!--End hero slider-->
<section class="popular-categories section-padding">
    <div class="container wow animate__animated animate__fadeIn">
        <div class="section-title">
            <div class="title">
                <h3>Featured Categories</h3>
               
            </div>
            <div class="slider-arrow slider-arrow-2 flex-right carausel-10-columns-arrow"
                id="carausel-10-columns-arrows"></div>
        </div>
        <div class="carausel-10-columns-cover position-relative">
            <div class="carausel-10-columns" id="carausel-10-columns">
                @foreach($products_In_Category as $category)
                <div class="card-2 bg-9 wow animate__animated animate__fadeInUp" data-wow-delay=".1s">
                    <figure class="img-hover-scale overflow-hidden">
                        <a href="{{ route('category.products',$category->id) }}"><img src="{{ asset('storage/' . $category->category_image) }}" alt="" /></a>
                    </figure>
                    <h6><a href="{{ route('category.products',$category->id) }}">{{ $category->category_name }}</a></h6>
                    <span>{{ $category->products->count() }} items</span>
                </div>
                @endforeach
               
             
            </div>
        </div>
    </div>
</section>
<!--End category slider-->
<section class="banners mb-25">
    <div class="container">
        <div class="row">
            <div class="col-lg-4 col-md-6">
                <div class="banner-img wow animate__animated animate__fadeInUp" data-wow-delay="0">
                    <img src="assets/imgs/banner/banner-1.png" alt="" />
                    <div class="banner-text">
                        <h4>
                            Everyday Fresh & <br />Clean with Our<br />
                            Products
                        </h4>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6">
                <div class="banner-img wow animate__animated animate__fadeInUp" data-wow-delay=".2s">
                    <img src="assets/imgs/banner/banner-2.png" alt="" />
                    <div class="banner-text">
                        <h4>
                            Make your Breakfast<br />
                            Healthy and Easy
                        </h4>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 d-md-none d-lg-flex">
                <div class="banner-img mb-sm-0 wow animate__animated animate__fadeInUp" data-wow-delay=".4s">
                    <img src="assets/imgs/banner/banner-3.png" alt="" />
                    <div class="banner-text">
                        <h4>The best Organic <br />Products Online</h4>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!--End banners-->
<section class="product-tabs section-padding position-relative">
    <div class="container">
        <div class="section-title style-2 wow animate__animated animate__fadeIn">
            <h3>Popular Products</h3>
        </div>
        <!--End nav-tabs-->
        <div class="tab-content" id="myTabContent">
            <div class="tab-pane fade show active" id="tab-one" role="tabpanel" aria-labelledby="tab-one">
                <div class="row product-grid-4">
                     @foreach($products as $product)
                    <div class="col-lg-1-5 col-md-4 col-12 col-sm-6">
                        <div class="product-cart-wrap mb-30 wow animate__animated animate__fadeIn"
                            data-wow-delay=".1s">
                            <div class="product-img-action-wrap">
                                <div class="product-img product-img-zoom">
                                    <a href="{{ route('product.cart',$product) }}">
                                        <img class="default-img" src="{{ asset('storage/' . $product->product_image) }}"
                                            alt="" />
                                         {{-- <img class="hover-img" src="assets/imgs/shop/product-1-2.jpg" alt="" />  --}}
                                    </a>
                                </div>
                                
                                <div class="product-badges product-badges-position product-badges-mrg">
                                    <span class="hot">Hot</span>
                                </div>
                            </div>
                            <div class="product-content-wrap">
                                <div class="product-category">
                                    <a href="{{ route('product.cart',$product) }}">{{ $product->category->category_name }}</a>
                                </div>
                                <h2><a href="{{ route('product.cart',$product) }}">{{ $product->product_name }}</a></h2>
                                <div class="product-rate-cover">
                                    <div class="product-rate d-inline-block">
                                        <div class="product-rating" style="width: 90%"></div>
                                    </div>
                                    <span class="font-small ml-5 text-muted"> (4.0)</span>
                                </div>
                                <div>
                                </div>
                                <div class="product-card-bottom">
                                    <div class="product-price">
                                    </div>
                                    <div class="add-cart">
                                        <a class="add" href="{{ route('product.cart',$product) }}"><i
                                                class="fi-rs-shopping-cart mr-5"></i>Add </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach 
                </div>
                <!--End product-grid-4-->
            </div>
            <!--En tab one-->
            <div class="tab-pane fade" id="tab-two" role="tabpanel" aria-labelledby="tab-two">
                <div class="row product-grid-4">
                    <div class="col-lg-1-5 col-md-4 col-12 col-sm-6">
                        <div class="product-cart-wrap mb-30">
                            <div class="product-img-action-wrap">
                                <div class="product-img product-img-zoom">
                                    <a href="shop-product-right.html">
                                        <img class="default-img" src="assets/imgs/shop/product-10-1.jpg"
                                            alt="" />
                                        <img class="hover-img" src="assets/imgs/shop/product-10-2.jpg" alt="" />
                                    </a>
                                </div>
                                <div class="product-action-1">
                                    <a aria-label="Add To Wishlist" class="action-btn"
                                        href="shop-wishlist.html"><i class="fi-rs-heart"></i></a>
                                    <a aria-label="Compare" class="action-btn" href="shop-compare.html"><i
                                            class="fi-rs-shuffle"></i></a>
                                    <a aria-label="Quick view" class="action-btn" data-bs-toggle="modal"
                                        data-bs-target="#quickViewModal"><i class="fi-rs-eye"></i></a>
                                </div>
                                <div class="product-badges product-badges-position product-badges-mrg">
                                    <span class="hot">Hot</span>
                                </div>
                            </div>
                            <div class="product-content-wrap">
                                <div class="product-category">
                                    <a href="shop-grid-right.html">Snack</a>
                                </div>
                                <h2><a href="shop-product-right.html">Seeds of Change Organic Quinoa, Brown, &
                                        Red Rice</a></h2>
                                <div class="product-rate-cover">
                                    <div class="product-rate d-inline-block">
                                        <div class="product-rating" style="width: 90%"></div>
                                    </div>
                                    <span class="font-small ml-5 text-muted"> (4.0)</span>
                                </div>
                                <div>
                                    <span class="font-small text-muted">By <a
                                            href="vendor-details-1.html">NestFood</a></span>
                                </div>
                                <div class="product-card-bottom">
                                    <div class="product-price">
                                        <span>$28.85</span>
                                        <span class="old-price">$32.8</span>
                                    </div>
                                    <div class="add-cart">
                                        <a class="add" href="shop-cart.html"><i
                                                class="fi-rs-shopping-cart mr-5"></i>Add </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--end product card-->
                    <div class="col-lg-1-5 col-md-4 col-12 col-sm-6">
                        <div class="product-cart-wrap mb-30">
                            <div class="product-img-action-wrap">
                                <div class="product-img product-img-zoom">
                                    <a href="shop-product-right.html">
                                        <img class="default-img" src="assets/imgs/shop/product-12-1.jpg"
                                            alt="" />
                                        <img class="hover-img" src="assets/imgs/shop/product-12-2.jpg" alt="" />
                                    </a>
                                </div>
                                <div class="product-action-1">
                                    <a aria-label="Add To Wishlist" class="action-btn"
                                        href="shop-wishlist.html"><i class="fi-rs-heart"></i></a>
                                    <a aria-label="Compare" class="action-btn" href="shop-compare.html"><i
                                            class="fi-rs-shuffle"></i></a>
                                    <a aria-label="Quick view" class="action-btn" data-bs-toggle="modal"
                                        data-bs-target="#quickViewModal"><i class="fi-rs-eye"></i></a>
                                </div>
                                <div class="product-badges product-badges-position product-badges-mrg">
                                    <span class="sale">Sale</span>
                                </div>
                            </div>
                            <div class="product-content-wrap">
                                <div class="product-category">
                                    <a href="shop-grid-right.html">Hodo Foods</a>
                                </div>
                                <h2><a href="shop-product-right.html">All Natural Italian-Style Chicken
                                        Meatballs</a></h2>
                                <div class="product-rate-cover">
                                    <div class="product-rate d-inline-block">
                                        <div class="product-rating" style="width: 80%"></div>
                                    </div>
                                    <span class="font-small ml-5 text-muted"> (3.5)</span>
                                </div>
                                <div>
                                    <span class="font-small text-muted">By <a
                                            href="vendor-details-1.html">Stouffer</a></span>
                                </div>
                                <div class="product-card-bottom">
                                    <div class="product-price">
                                        <span>$52.85</span>
                                        <span class="old-price">$55.8</span>
                                    </div>
                                    <div class="add-cart">
                                        <a class="add" href="shop-cart.html"><i
                                                class="fi-rs-shopping-cart mr-5"></i>Add </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--end product card-->
                    <div class="col-lg-1-5 col-md-4 col-12 col-sm-6">
                        <div class="product-cart-wrap mb-30">
                            <div class="product-img-action-wrap">
                                <div class="product-img product-img-zoom">
                                    <a href="shop-product-right.html">
                                        <img class="default-img" src="assets/imgs/shop/product-13-1.jpg"
                                            alt="" />
                                        <img class="hover-img" src="assets/imgs/shop/product-13-2.jpg" alt="" />
                                    </a>
                                </div>
                                <div class="product-action-1">
                                    <a aria-label="Add To Wishlist" class="action-btn"
                                        href="shop-wishlist.html"><i class="fi-rs-heart"></i></a>
                                    <a aria-label="Compare" class="action-btn" href="shop-compare.html"><i
                                            class="fi-rs-shuffle"></i></a>
                                    <a aria-label="Quick view" class="action-btn" data-bs-toggle="modal"
                                        data-bs-target="#quickViewModal"><i class="fi-rs-eye"></i></a>
                                </div>
                                <div class="product-badges product-badges-position product-badges-mrg">
                                    <span class="new">New</span>
                                </div>
                            </div>
                            <div class="product-content-wrap">
                                <div class="product-category">
                                    <a href="shop-grid-right.html">Snack</a>
                                </div>
                                <h2><a href="shop-product-right.html">Angie’s Boomchickapop Sweet & Salty Kettle
                                        Corn</a></h2>
                                <div class="product-rate-cover">
                                    <div class="product-rate d-inline-block">
                                        <div class="product-rating" style="width: 85%"></div>
                                    </div>
                                    <span class="font-small ml-5 text-muted"> (4.0)</span>
                                </div>
                                <div>
                                    <span class="font-small text-muted">By <a
                                            href="vendor-details-1.html">StarKist</a></span>
                                </div>
                                <div class="product-card-bottom">
                                    <div class="product-price">
                                        <span>$48.85</span>
                                        <span class="old-price">$52.8</span>
                                    </div>
                                    <div class="add-cart">
                                        <a class="add" href="shop-cart.html"><i
                                                class="fi-rs-shopping-cart mr-5"></i>Add </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--end product card-->
                    <div class="col-lg-1-5 col-md-4 col-12 col-sm-6">
                        <div class="product-cart-wrap mb-30">
                            <div class="product-img-action-wrap">
                                <div class="product-img product-img-zoom">
                                    <a href="shop-product-right.html">
                                        <img class="default-img" src="assets/imgs/shop/product-14-1.jpg"
                                            alt="" />
                                        <img class="hover-img" src="assets/imgs/shop/product-14-2.jpg" alt="" />
                                    </a>
                                </div>
                                <div class="product-action-1">
                                    <a aria-label="Add To Wishlist" class="action-btn"
                                        href="shop-wishlist.html"><i class="fi-rs-heart"></i></a>
                                    <a aria-label="Compare" class="action-btn" href="shop-compare.html"><i
                                            class="fi-rs-shuffle"></i></a>
                                    <a aria-label="Quick view" class="action-btn" data-bs-toggle="modal"
                                        data-bs-target="#quickViewModal"><i class="fi-rs-eye"></i></a>
                                </div>
                            </div>
                            <div class="product-content-wrap">
                                <div class="product-category">
                                    <a href="shop-grid-right.html">Vegetables</a>
                                </div>
                                <h2><a href="shop-product-right.html">Foster Farms Takeout Crispy Classic
                                        Buffalo Wings</a></h2>
                                <div class="product-rate-cover">
                                    <div class="product-rate d-inline-block">
                                        <div class="product-rating" style="width: 90%"></div>
                                    </div>
                                    <span class="font-small ml-5 text-muted"> (4.0)</span>
                                </div>
                                <div>
                                    <span class="font-small text-muted">By <a
                                            href="vendor-details-1.html">NestFood</a></span>
                                </div>
                                <div class="product-card-bottom">
                                    <div class="product-price">
                                        <span>$17.85</span>
                                        <span class="old-price">$19.8</span>
                                    </div>
                                    <div class="add-cart">
                                        <a class="add" href="shop-cart.html"><i
                                                class="fi-rs-shopping-cart mr-5"></i>Add </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--end product card-->
                    <div class="col-lg-1-5 col-md-4 col-12 col-sm-6">
                        <div class="product-cart-wrap mb-30">
                            <div class="product-img-action-wrap">
                                <div class="product-img product-img-zoom">
                                    <a href="shop-product-right.html">
                                        <img class="default-img" src="assets/imgs/shop/product-15-1.jpg"
                                            alt="" />
                                        <img class="hover-img" src="assets/imgs/shop/product-15-2.jpg" alt="" />
                                    </a>
                                </div>
                                <div class="product-action-1">
                                    <a aria-label="Add To Wishlist" class="action-btn"
                                        href="shop-wishlist.html"><i class="fi-rs-heart"></i></a>
                                    <a aria-label="Compare" class="action-btn" href="shop-compare.html"><i
                                            class="fi-rs-shuffle"></i></a>
                                    <a aria-label="Quick view" class="action-btn" data-bs-toggle="modal"
                                        data-bs-target="#quickViewModal"><i class="fi-rs-eye"></i></a>
                                </div>
                                <div class="product-badges product-badges-position product-badges-mrg">
                                    <span class="best">-14%</span>
                                </div>
                            </div>
                            <div class="product-content-wrap">
                                <div class="product-category">
                                    <a href="shop-grid-right.html">Pet Foods</a>
                                </div>
                                <h2><a href="shop-product-right.html">Blue Diamond Almonds Lightly Salted
                                        Vegetables</a></h2>
                                <div class="product-rate-cover">
                                    <div class="product-rate d-inline-block">
                                        <div class="product-rating" style="width: 90%"></div>
                                    </div>
                                    <span class="font-small ml-5 text-muted"> (4.0)</span>
                                </div>
                                <div>
                                    <span class="font-small text-muted">By <a
                                            href="vendor-details-1.html">NestFood</a></span>
                                </div>
                                <div class="product-card-bottom">
                                    <div class="product-price">
                                        <span>$23.85</span>
                                        <span class="old-price">$25.8</span>
                                    </div>
                                    <div class="add-cart">
                                        <a class="add" href="shop-cart.html"><i
                                                class="fi-rs-shopping-cart mr-5"></i>Add </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--end product card-->
                    <div class="col-lg-1-5 col-md-4 col-12 col-sm-6">
                        <div class="product-cart-wrap">
                            <div class="product-img-action-wrap">
                                <div class="product-img product-img-zoom">
                                    <a href="shop-product-right.html">
                                        <img class="default-img" src="assets/imgs/shop/product-16-1.jpg"
                                            alt="" />
                                        <img class="hover-img" src="assets/imgs/shop/product-16-2.jpg" alt="" />
                                    </a>
                                </div>
                                <div class="product-action-1">
                                    <a aria-label="Add To Wishlist" class="action-btn"
                                        href="shop-wishlist.html"><i class="fi-rs-heart"></i></a>
                                    <a aria-label="Compare" class="action-btn" href="shop-compare.html"><i
                                            class="fi-rs-shuffle"></i></a>
                                    <a aria-label="Quick view" class="action-btn" data-bs-toggle="modal"
                                        data-bs-target="#quickViewModal"><i class="fi-rs-eye"></i></a>
                                </div>
                            </div>
                            <div class="product-content-wrap">
                                <div class="product-category">
                                    <a href="shop-grid-right.html">Hodo Foods</a>
                                </div>
                                <h2><a href="shop-product-right.html">Chobani Complete Vanilla Greek Yogurt</a>
                                </h2>
                                <div class="product-rate-cover">
                                    <div class="product-rate d-inline-block">
                                        <div class="product-rating" style="width: 90%"></div>
                                    </div>
                                    <span class="font-small ml-5 text-muted"> (4.0)</span>
                                </div>
                                <div>
                                    <span class="font-small text-muted">By <a
                                            href="vendor-details-1.html">NestFood</a></span>
                                </div>
                                <div class="product-card-bottom">
                                    <div class="product-price">
                                        <span>$54.85</span>
                                        <span class="old-price">$55.8</span>
                                    </div>
                                    <div class="add-cart">
                                        <a class="add" href="shop-cart.html"><i
                                                class="fi-rs-shopping-cart mr-5"></i>Add </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--end product card-->
                    <div class="col-lg-1-5 col-md-4 col-12 col-sm-6">
                        <div class="product-cart-wrap">
                            <div class="product-img-action-wrap">
                                <div class="product-img product-img-zoom">
                                    <a href="shop-product-right.html">
                                        <img class="default-img" src="assets/imgs/shop/product-7-1.jpg"
                                            alt="" />
                                        <img class="hover-img" src="assets/imgs/shop/product-7-2.jpg" alt="" />
                                    </a>
                                </div>
                                <div class="product-action-1">
                                    <a aria-label="Add To Wishlist" class="action-btn"
                                        href="shop-wishlist.html"><i class="fi-rs-heart"></i></a>
                                    <a aria-label="Compare" class="action-btn" href="shop-compare.html"><i
                                            class="fi-rs-shuffle"></i></a>
                                    <a aria-label="Quick view" class="action-btn" data-bs-toggle="modal"
                                        data-bs-target="#quickViewModal"><i class="fi-rs-eye"></i></a>
                                </div>
                            </div>
                            <div class="product-content-wrap">
                                <div class="product-category">
                                    <a href="shop-grid-right.html">Meats</a>
                                </div>
                                <h2><a href="shop-product-right.html">Canada Dry Ginger Ale – 2 L Bottle - 200ml
                                        - 400g</a></h2>
                                <div class="product-rate-cover">
                                    <div class="product-rate d-inline-block">
                                        <div class="product-rating" style="width: 90%"></div>
                                    </div>
                                    <span class="font-small ml-5 text-muted"> (4.0)</span>
                                </div>
                                <div>
                                    <span class="font-small text-muted">By <a
                                            href="vendor-details-1.html">NestFood</a></span>
                                </div>
                                <div class="product-card-bottom">
                                    <div class="product-price">
                                        <span>$32.85</span>
                                        <span class="old-price">$33.8</span>
                                    </div>
                                    <div class="add-cart">
                                        <a class="add" href="shop-cart.html"><i
                                                class="fi-rs-shopping-cart mr-5"></i>Add </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--end product card-->
                    <div class="col-lg-1-5 col-md-4 col-12 col-sm-6">
                        <div class="product-cart-wrap">
                            <div class="product-img-action-wrap">
                                <div class="product-img product-img-zoom">
                                    <a href="shop-product-right.html">
                                        <img class="default-img" src="assets/imgs/shop/product-8-1.jpg"
                                            alt="" />
                                        <img class="hover-img" src="assets/imgs/shop/product-8-2.jpg" alt="" />
                                    </a>
                                </div>
                                <div class="product-action-1">
                                    <a aria-label="Add To Wishlist" class="action-btn"
                                        href="shop-wishlist.html"><i class="fi-rs-heart"></i></a>
                                    <a aria-label="Compare" class="action-btn" href="shop-compare.html"><i
                                            class="fi-rs-shuffle"></i></a>
                                    <a aria-label="Quick view" class="action-btn" data-bs-toggle="modal"
                                        data-bs-target="#quickViewModal"><i class="fi-rs-eye"></i></a>
                                </div>
                                <div class="product-badges product-badges-position product-badges-mrg">
                                    <span class="sale">Sale</span>
                                </div>
                            </div>
                            <div class="product-content-wrap">
                                <div class="product-category">
                                    <a href="shop-grid-right.html">Snack</a>
                                </div>
                                <h2><a href="shop-product-right.html">Encore Seafoods Stuffed Alaskan Salmon</a>
                                </h2>
                                <div class="product-rate-cover">
                                    <div class="product-rate d-inline-block">
                                        <div class="product-rating" style="width: 90%"></div>
                                    </div>
                                    <span class="font-small ml-5 text-muted"> (4.0)</span>
                                </div>
                                <div>
                                    <span class="font-small text-muted">By <a
                                            href="vendor-details-1.html">NestFood</a></span>
                                </div>
                                <div class="product-card-bottom">
                                    <div class="product-price">
                                        <span>$35.85</span>
                                        <span class="old-price">$37.8</span>
                                    </div>
                                    <div class="add-cart">
                                        <a class="add" href="shop-cart.html"><i
                                                class="fi-rs-shopping-cart mr-5"></i>Add </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--end product card-->
                    <div class="col-lg-1-5 col-md-4 col-12 col-sm-6">
                        <div class="product-cart-wrap">
                            <div class="product-img-action-wrap">
                                <div class="product-img product-img-zoom">
                                    <a href="shop-product-right.html">
                                        <img class="default-img" src="assets/imgs/shop/product-9-1.jpg"
                                            alt="" />
                                        <img class="hover-img" src="assets/imgs/shop/product-9-2.jpg" alt="" />
                                    </a>
                                </div>
                                <div class="product-action-1">
                                    <a aria-label="Add To Wishlist" class="action-btn"
                                        href="shop-wishlist.html"><i class="fi-rs-heart"></i></a>
                                    <a aria-label="Compare" class="action-btn" href="shop-compare.html"><i
                                            class="fi-rs-shuffle"></i></a>
                                    <a aria-label="Quick view" class="action-btn" data-bs-toggle="modal"
                                        data-bs-target="#quickViewModal"><i class="fi-rs-eye"></i></a>
                                </div>
                                <div class="product-badges product-badges-position product-badges-mrg">
                                    <span class="hot">Hot</span>
                                </div>
                            </div>
                            <div class="product-content-wrap">
                                <div class="product-category">
                                    <a href="shop-grid-right.html">Coffes</a>
                                </div>
                                <h2><a href="shop-product-right.html">Gorton’s Beer Battered Fish Fillets with
                                        soft paper</a></h2>
                                <div class="product-rate-cover">
                                    <div class="product-rate d-inline-block">
                                        <div class="product-rating" style="width: 90%"></div>
                                    </div>
                                    <span class="font-small ml-5 text-muted"> (4.0)</span>
                                </div>
                                <div>
                                    <span class="font-small text-muted">By <a href="vendor-details-1.html">Old
                                            El Paso</a></span>
                                </div>
                                <div class="product-card-bottom">
                                    <div class="product-price">
                                        <span>$23.85</span>
                                        <span class="old-price">$25.8</span>
                                    </div>
                                    <div class="add-cart">
                                        <a class="add" href="shop-cart.html"><i
                                                class="fi-rs-shopping-cart mr-5"></i>Add </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--end product card-->
                    <div class="col-lg-1-5 col-md-4 col-12 col-sm-6 d-none d-xl-block">
                        <div class="product-cart-wrap">
                            <div class="product-img-action-wrap">
                                <div class="product-img product-img-zoom">
                                    <a href="shop-product-right.html">
                                        <img class="default-img" src="assets/imgs/shop/product-10-1.jpg"
                                            alt="" />
                                        <img class="hover-img" src="assets/imgs/shop/product-10-2.jpg" alt="" />
                                    </a>
                                </div>
                                <div class="product-action-1">
                                    <a aria-label="Add To Wishlist" class="action-btn"
                                        href="shop-wishlist.html"><i class="fi-rs-heart"></i></a>
                                    <a aria-label="Compare" class="action-btn" href="shop-compare.html"><i
                                            class="fi-rs-shuffle"></i></a>
                                    <a aria-label="Quick view" class="action-btn" data-bs-toggle="modal"
                                        data-bs-target="#quickViewModal"><i class="fi-rs-eye"></i></a>
                                </div>
                            </div>
                            <div class="product-content-wrap">
                                <div class="product-category">
                                    <a href="shop-grid-right.html">Cream</a>
                                </div>
                                <h2><a href="shop-product-right.html">Haagen-Dazs Caramel Cone Ice Cream
                                        Ketchup</a></h2>
                                <div class="product-rate-cover">
                                    <div class="product-rate d-inline-block">
                                        <div class="product-rating" style="width: 50%"></div>
                                    </div>
                                    <span class="font-small ml-5 text-muted"> (2.0)</span>
                                </div>
                                <div>
                                    <span class="font-small text-muted">By <a
                                            href="vendor-details-1.html">Tyson</a></span>
                                </div>
                                <div class="product-card-bottom">
                                    <div class="product-price">
                                        <span>$22.85</span>
                                        <span class="old-price">$24.8</span>
                                    </div>
                                    <div class="add-cart">
                                        <a class="add" href="shop-cart.html"><i
                                                class="fi-rs-shopping-cart mr-5"></i>Add </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--end product card-->
                </div>
                <!--End product-grid-4-->
            </div>
            <!--En tab two-->
            <div class="tab-pane fade" id="tab-three" role="tabpanel" aria-labelledby="tab-three">
                <div class="row product-grid-4">
                    <div class="col-lg-1-5 col-md-4 col-12 col-sm-6">
                        <div class="product-cart-wrap mb-30">
                            <div class="product-img-action-wrap">
                                <div class="product-img product-img-zoom">
                                    <a href="shop-product-right.html">
                                        <img class="default-img" src="assets/imgs/shop/product-9-1.jpg"
                                            alt="" />
                                        <img class="hover-img" src="assets/imgs/shop/product-9-2.jpg" alt="" />
                                    </a>
                                </div>
                                <div class="product-action-1">
                                    <a aria-label="Add To Wishlist" class="action-btn"
                                        href="shop-wishlist.html"><i class="fi-rs-heart"></i></a>
                                    <a aria-label="Compare" class="action-btn" href="shop-compare.html"><i
                                            class="fi-rs-shuffle"></i></a>
                                    <a aria-label="Quick view" class="action-btn" data-bs-toggle="modal"
                                        data-bs-target="#quickViewModal"><i class="fi-rs-eye"></i></a>
                                </div>
                                <div class="product-badges product-badges-position product-badges-mrg">
                                    <span class="hot">Hot</span>
                                </div>
                            </div>
                            <div class="product-content-wrap">
                                <div class="product-category">
                                    <a href="shop-grid-right.html">Snack</a>
                                </div>
                                <h2><a href="shop-product-right.html">Seeds of Change Organic Quinoa, Brown, &
                                        Red Rice</a></h2>
                                <div class="product-rate-cover">
                                    <div class="product-rate d-inline-block">
                                        <div class="product-rating" style="width: 90%"></div>
                                    </div>
                                    <span class="font-small ml-5 text-muted"> (4.0)</span>
                                </div>
                                <div>
                                    <span class="font-small text-muted">By <a
                                            href="vendor-details-1.html">NestFood</a></span>
                                </div>
                                <div class="product-card-bottom">
                                    <div class="product-price">
                                        <span>$28.85</span>
                                        <span class="old-price">$32.8</span>
                                    </div>
                                    <div class="add-cart">
                                        <a class="add" href="shop-cart.html"><i
                                                class="fi-rs-shopping-cart mr-5"></i>Add </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--end product card-->
                    <div class="col-lg-1-5 col-md-4 col-12 col-sm-6">
                        <div class="product-cart-wrap mb-30">
                            <div class="product-img-action-wrap">
                                <div class="product-img product-img-zoom">
                                    <a href="shop-product-right.html">
                                        <img class="default-img" src="assets/imgs/shop/product-8-1.jpg"
                                            alt="" />
                                        <img class="hover-img" src="assets/imgs/shop/product-8-2.jpg" alt="" />
                                    </a>
                                </div>
                                <div class="product-action-1">
                                    <a aria-label="Add To Wishlist" class="action-btn"
                                        href="shop-wishlist.html"><i class="fi-rs-heart"></i></a>
                                    <a aria-label="Compare" class="action-btn" href="shop-compare.html"><i
                                            class="fi-rs-shuffle"></i></a>
                                    <a aria-label="Quick view" class="action-btn" data-bs-toggle="modal"
                                        data-bs-target="#quickViewModal"><i class="fi-rs-eye"></i></a>
                                </div>
                                <div class="product-badges product-badges-position product-badges-mrg">
                                    <span class="sale">Sale</span>
                                </div>
                            </div>
                            <div class="product-content-wrap">
                                <div class="product-category">
                                    <a href="shop-grid-right.html">Hodo Foods</a>
                                </div>
                                <h2><a href="shop-product-right.html">All Natural Italian-Style Chicken
                                        Meatballs</a></h2>
                                <div class="product-rate-cover">
                                    <div class="product-rate d-inline-block">
                                        <div class="product-rating" style="width: 80%"></div>
                                    </div>
                                    <span class="font-small ml-5 text-muted"> (3.5)</span>
                                </div>
                                <div>
                                    <span class="font-small text-muted">By <a
                                            href="vendor-details-1.html">Stouffer</a></span>
                                </div>
                                <div class="product-card-bottom">
                                    <div class="product-price">
                                        <span>$52.85</span>
                                        <span class="old-price">$55.8</span>
                                    </div>
                                    <div class="add-cart">
                                        <a class="add" href="shop-cart.html"><i
                                                class="fi-rs-shopping-cart mr-5"></i>Add </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--end product card-->
                    <div class="col-lg-1-5 col-md-4 col-12 col-sm-6">
                        <div class="product-cart-wrap mb-30">
                            <div class="product-img-action-wrap">
                                <div class="product-img product-img-zoom">
                                    <a href="shop-product-right.html">
                                        <img class="default-img" src="assets/imgs/shop/product-7-1.jpg"
                                            alt="" />
                                        <img class="hover-img" src="assets/imgs/shop/product-7-2.jpg" alt="" />
                                    </a>
                                </div>
                                <div class="product-action-1">
                                    <a aria-label="Add To Wishlist" class="action-btn"
                                        href="shop-wishlist.html"><i class="fi-rs-heart"></i></a>
                                    <a aria-label="Compare" class="action-btn" href="shop-compare.html"><i
                                            class="fi-rs-shuffle"></i></a>
                                    <a aria-label="Quick view" class="action-btn" data-bs-toggle="modal"
                                        data-bs-target="#quickViewModal"><i class="fi-rs-eye"></i></a>
                                </div>
                                <div class="product-badges product-badges-position product-badges-mrg">
                                    <span class="new">New</span>
                                </div>
                            </div>
                            <div class="product-content-wrap">
                                <div class="product-category">
                                    <a href="shop-grid-right.html">Snack</a>
                                </div>
                                <h2><a href="shop-product-right.html">Angie’s Boomchickapop Sweet & Salty Kettle
                                        Corn</a></h2>
                                <div class="product-rate-cover">
                                    <div class="product-rate d-inline-block">
                                        <div class="product-rating" style="width: 85%"></div>
                                    </div>
                                    <span class="font-small ml-5 text-muted"> (4.0)</span>
                                </div>
                                <div>
                                    <span class="font-small text-muted">By <a
                                            href="vendor-details-1.html">StarKist</a></span>
                                </div>
                                <div class="product-card-bottom">
                                    <div class="product-price">
                                        <span>$48.85</span>
                                        <span class="old-price">$52.8</span>
                                    </div>
                                    <div class="add-cart">
                                        <a class="add" href="shop-cart.html"><i
                                                class="fi-rs-shopping-cart mr-5"></i>Add </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--end product card-->
                    <div class="col-lg-1-5 col-md-4 col-12 col-sm-6">
                        <div class="product-cart-wrap mb-30">
                            <div class="product-img-action-wrap">
                                <div class="product-img product-img-zoom">
                                    <a href="shop-product-right.html">
                                        <img class="default-img" src="assets/imgs/shop/product-6-1.jpg"
                                            alt="" />
                                        <img class="hover-img" src="assets/imgs/shop/product-6-2.jpg" alt="" />
                                    </a>
                                </div>
                                <div class="product-action-1">
                                    <a aria-label="Add To Wishlist" class="action-btn"
                                        href="shop-wishlist.html"><i class="fi-rs-heart"></i></a>
                                    <a aria-label="Compare" class="action-btn" href="shop-compare.html"><i
                                            class="fi-rs-shuffle"></i></a>
                                    <a aria-label="Quick view" class="action-btn" data-bs-toggle="modal"
                                        data-bs-target="#quickViewModal"><i class="fi-rs-eye"></i></a>
                                </div>
                            </div>
                            <div class="product-content-wrap">
                                <div class="product-category">
                                    <a href="shop-grid-right.html">Vegetables</a>
                                </div>
                                <h2><a href="shop-product-right.html">Foster Farms Takeout Crispy Classic
                                        Buffalo Wings</a></h2>
                                <div class="product-rate-cover">
                                    <div class="product-rate d-inline-block">
                                        <div class="product-rating" style="width: 90%"></div>
                                    </div>
                                    <span class="font-small ml-5 text-muted"> (4.0)</span>
                                </div>
                                <div>
                                    <span class="font-small text-muted">By <a
                                            href="vendor-details-1.html">NestFood</a></span>
                                </div>
                                <div class="product-card-bottom">
                                    <div class="product-price">
                                        <span>$17.85</span>
                                        <span class="old-price">$19.8</span>
                                    </div>
                                    <div class="add-cart">
                                        <a class="add" href="shop-cart.html"><i
                                                class="fi-rs-shopping-cart mr-5"></i>Add </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--end product card-->
                    <div class="col-lg-1-5 col-md-4 col-12 col-sm-6">
                        <div class="product-cart-wrap mb-30">
                            <div class="product-img-action-wrap">
                                <div class="product-img product-img-zoom">
                                    <a href="shop-product-right.html">
                                        <img class="default-img" src="assets/imgs/shop/product-5-1.jpg"
                                            alt="" />
                                        <img class="hover-img" src="assets/imgs/shop/product-5-2.jpg" alt="" />
                                    </a>
                                </div>
                                <div class="product-action-1">
                                    <a aria-label="Add To Wishlist" class="action-btn"
                                        href="shop-wishlist.html"><i class="fi-rs-heart"></i></a>
                                    <a aria-label="Compare" class="action-btn" href="shop-compare.html"><i
                                            class="fi-rs-shuffle"></i></a>
                                    <a aria-label="Quick view" class="action-btn" data-bs-toggle="modal"
                                        data-bs-target="#quickViewModal"><i class="fi-rs-eye"></i></a>
                                </div>
                                <div class="product-badges product-badges-position product-badges-mrg">
                                    <span class="best">-14%</span>
                                </div>
                            </div>
                            <div class="product-content-wrap">
                                <div class="product-category">
                                    <a href="shop-grid-right.html">Pet Foods</a>
                                </div>
                                <h2><a href="shop-product-right.html">Blue Diamond Almonds Lightly Salted
                                        Vegetables</a></h2>
                                <div class="product-rate-cover">
                                    <div class="product-rate d-inline-block">
                                        <div class="product-rating" style="width: 90%"></div>
                                    </div>
                                    <span class="font-small ml-5 text-muted"> (4.0)</span>
                                </div>
                                <div>
                                    <span class="font-small text-muted">By <a
                                            href="vendor-details-1.html">NestFood</a></span>
                                </div>
                                <div class="product-card-bottom">
                                    <div class="product-price">
                                        <span>$23.85</span>
                                        <span class="old-price">$25.8</span>
                                    </div>
                                    <div class="add-cart">
                                        <a class="add" href="shop-cart.html"><i
                                                class="fi-rs-shopping-cart mr-5"></i>Add </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--end product card-->
                    <div class="col-lg-1-5 col-md-4 col-12 col-sm-6">
                        <div class="product-cart-wrap">
                            <div class="product-img-action-wrap">
                                <div class="product-img product-img-zoom">
                                    <a href="shop-product-right.html">
                                        <img class="default-img" src="assets/imgs/shop/product-4-1.jpg"
                                            alt="" />
                                        <img class="hover-img" src="assets/imgs/shop/product-4-2.jpg" alt="" />
                                    </a>
                                </div>
                                <div class="product-action-1">
                                    <a aria-label="Add To Wishlist" class="action-btn"
                                        href="shop-wishlist.html"><i class="fi-rs-heart"></i></a>
                                    <a aria-label="Compare" class="action-btn" href="shop-compare.html"><i
                                            class="fi-rs-shuffle"></i></a>
                                    <a aria-label="Quick view" class="action-btn" data-bs-toggle="modal"
                                        data-bs-target="#quickViewModal"><i class="fi-rs-eye"></i></a>
                                </div>
                            </div>
                            <div class="product-content-wrap">
                                <div class="product-category">
                                    <a href="shop-grid-right.html">Hodo Foods</a>
                                </div>
                                <h2><a href="shop-product-right.html">Chobani Complete Vanilla Greek Yogurt</a>
                                </h2>
                                <div class="product-rate-cover">
                                    <div class="product-rate d-inline-block">
                                        <div class="product-rating" style="width: 90%"></div>
                                    </div>
                                    <span class="font-small ml-5 text-muted"> (4.0)</span>
                                </div>
                                <div>
                                    <span class="font-small text-muted">By <a
                                            href="vendor-details-1.html">NestFood</a></span>
                                </div>
                                <div class="product-card-bottom">
                                    <div class="product-price">
                                        <span>$54.85</span>
                                        <span class="old-price">$55.8</span>
                                    </div>
                                    <div class="add-cart">
                                        <a class="add" href="shop-cart.html"><i
                                                class="fi-rs-shopping-cart mr-5"></i>Add </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--end product card-->
                    <div class="col-lg-1-5 col-md-4 col-12 col-sm-6">
                        <div class="product-cart-wrap">
                            <div class="product-img-action-wrap">
                                <div class="product-img product-img-zoom">
                                    <a href="shop-product-right.html">
                                        <img class="default-img" src="assets/imgs/shop/product-3-1.jpg"
                                            alt="" />
                                        <img class="hover-img" src="assets/imgs/shop/product-3-2.jpg" alt="" />
                                    </a>
                                </div>
                                <div class="product-action-1">
                                    <a aria-label="Add To Wishlist" class="action-btn"
                                        href="shop-wishlist.html"><i class="fi-rs-heart"></i></a>
                                    <a aria-label="Compare" class="action-btn" href="shop-compare.html"><i
                                            class="fi-rs-shuffle"></i></a>
                                    <a aria-label="Quick view" class="action-btn" data-bs-toggle="modal"
                                        data-bs-target="#quickViewModal"><i class="fi-rs-eye"></i></a>
                                </div>
                            </div>
                            <div class="product-content-wrap">
                                <div class="product-category">
                                    <a href="shop-grid-right.html">Meats</a>
                                </div>
                                <h2><a href="shop-product-right.html">Canada Dry Ginger Ale – 2 L Bottle - 200ml
                                        - 400g</a></h2>
                                <div class="product-rate-cover">
                                    <div class="product-rate d-inline-block">
                                        <div class="product-rating" style="width: 90%"></div>
                                    </div>
                                    <span class="font-small ml-5 text-muted"> (4.0)</span>
                                </div>
                                <div>
                                    <span class="font-small text-muted">By <a
                                            href="vendor-details-1.html">NestFood</a></span>
                                </div>
                                <div class="product-card-bottom">
                                    <div class="product-price">
                                        <span>$32.85</span>
                                        <span class="old-price">$33.8</span>
                                    </div>
                                    <div class="add-cart">
                                        <a class="add" href="shop-cart.html"><i
                                                class="fi-rs-shopping-cart mr-5"></i>Add </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--end product card-->
                    <div class="col-lg-1-5 col-md-4 col-12 col-sm-6">
                        <div class="product-cart-wrap">
                            <div class="product-img-action-wrap">
                                <div class="product-img product-img-zoom">
                                    <a href="shop-product-right.html">
                                        <img class="default-img" src="assets/imgs/shop/product-2-1.jpg"
                                            alt="" />
                                        <img class="hover-img" src="assets/imgs/shop/product-2-2.jpg" alt="" />
                                    </a>
                                </div>
                                <div class="product-action-1">
                                    <a aria-label="Add To Wishlist" class="action-btn"
                                        href="shop-wishlist.html"><i class="fi-rs-heart"></i></a>
                                    <a aria-label="Compare" class="action-btn" href="shop-compare.html"><i
                                            class="fi-rs-shuffle"></i></a>
                                    <a aria-label="Quick view" class="action-btn" data-bs-toggle="modal"
                                        data-bs-target="#quickViewModal"><i class="fi-rs-eye"></i></a>
                                </div>
                                <div class="product-badges product-badges-position product-badges-mrg">
                                    <span class="sale">Sale</span>
                                </div>
                            </div>
                            <div class="product-content-wrap">
                                <div class="product-category">
                                    <a href="shop-grid-right.html">Snack</a>
                                </div>
                                <h2><a href="shop-product-right.html">Encore Seafoods Stuffed Alaskan Salmon</a>
                                </h2>
                                <div class="product-rate-cover">
                                    <div class="product-rate d-inline-block">
                                        <div class="product-rating" style="width: 90%"></div>
                                    </div>
                                    <span class="font-small ml-5 text-muted"> (4.0)</span>
                                </div>
                                <div>
                                    <span class="font-small text-muted">By <a
                                            href="vendor-details-1.html">NestFood</a></span>
                                </div>
                                <div class="product-card-bottom">
                                    <div class="product-price">
                                        <span>$35.85</span>
                                        <span class="old-price">$37.8</span>
                                    </div>
                                    <div class="add-cart">
                                        <a class="add" href="shop-cart.html"><i
                                                class="fi-rs-shopping-cart mr-5"></i>Add </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--end product card-->
                    <div class="col-lg-1-5 col-md-4 col-12 col-sm-6">
                        <div class="product-cart-wrap">
                            <div class="product-img-action-wrap">
                                <div class="product-img product-img-zoom">
                                    <a href="shop-product-right.html">
                                        <img class="default-img" src="assets/imgs/shop/product-9-1.jpg"
                                            alt="" />
                                        <img class="hover-img" src="assets/imgs/shop/product-9-2.jpg" alt="" />
                                    </a>
                                </div>
                                <div class="product-action-1">
                                    <a aria-label="Add To Wishlist" class="action-btn"
                                        href="shop-wishlist.html"><i class="fi-rs-heart"></i></a>
                                    <a aria-label="Compare" class="action-btn" href="shop-compare.html"><i
                                            class="fi-rs-shuffle"></i></a>
                                    <a aria-label="Quick view" class="action-btn" data-bs-toggle="modal"
                                        data-bs-target="#quickViewModal"><i class="fi-rs-eye"></i></a>
                                </div>
                                <div class="product-badges product-badges-position product-badges-mrg">
                                    <span class="hot">Hot</span>
                                </div>
                            </div>
                            <div class="product-content-wrap">
                                <div class="product-category">
                                    <a href="shop-grid-right.html">Coffes</a>
                                </div>
                                <h2><a href="shop-product-right.html">Gorton’s Beer Battered Fish Fillets with
                                        soft paper</a></h2>
                                <div class="product-rate-cover">
                                    <div class="product-rate d-inline-block">
                                        <div class="product-rating" style="width: 90%"></div>
                                    </div>
                                    <span class="font-small ml-5 text-muted"> (4.0)</span>
                                </div>
                                <div>
                                    <span class="font-small text-muted">By <a href="vendor-details-1.html">Old
                                            El Paso</a></span>
                                </div>
                                <div class="product-card-bottom">
                                    <div class="product-price">
                                        <span>$23.85</span>
                                        <span class="old-price">$25.8</span>
                                    </div>
                                    <div class="add-cart">
                                        <a class="add" href="shop-cart.html"><i
                                                class="fi-rs-shopping-cart mr-5"></i>Add </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--end product card-->
                    <div class="col-lg-1-5 col-md-4 col-12 col-sm-6 d-none d-xl-block">
                        <div class="product-cart-wrap">
                            <div class="product-img-action-wrap">
                                <div class="product-img product-img-zoom">
                                    <a href="shop-product-right.html">
                                        <img class="default-img" src="assets/imgs/shop/product-1-1.jpg"
                                            alt="" />
                                        <img class="hover-img" src="assets/imgs/shop/product-1-2.jpg" alt="" />
                                    </a>
                                </div>
                                <div class="product-action-1">
                                    <a aria-label="Add To Wishlist" class="action-btn"
                                        href="shop-wishlist.html"><i class="fi-rs-heart"></i></a>
                                    <a aria-label="Compare" class="action-btn" href="shop-compare.html"><i
                                            class="fi-rs-shuffle"></i></a>
                                    <a aria-label="Quick view" class="action-btn" data-bs-toggle="modal"
                                        data-bs-target="#quickViewModal"><i class="fi-rs-eye"></i></a>
                                </div>
                            </div>
                            <div class="product-content-wrap">
                                <div class="product-category">
                                    <a href="shop-grid-right.html">Cream</a>
                                </div>
                                <h2><a href="shop-product-right.html">Haagen-Dazs Caramel Cone Ice Cream
                                        Ketchup</a></h2>
                                <div class="product-rate-cover">
                                    <div class="product-rate d-inline-block">
                                        <div class="product-rating" style="width: 50%"></div>
                                    </div>
                                    <span class="font-small ml-5 text-muted"> (2.0)</span>
                                </div>
                                <div>
                                    <span class="font-small text-muted">By <a
                                            href="vendor-details-1.html">Tyson</a></span>
                                </div>
                                <div class="product-card-bottom">
                                    <div class="product-price">
                                        <span>$22.85</span>
                                        <span class="old-price">$24.8</span>
                                    </div>
                                    <div class="add-cart">
                                        <a class="add" href="shop-cart.html"><i
                                                class="fi-rs-shopping-cart mr-5"></i>Add </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--end product card-->
                </div>
                <!--End product-grid-4-->
            </div>
            <!--En tab three-->
            <div class="tab-pane fade" id="tab-four" role="tabpanel" aria-labelledby="tab-four">
                <div class="row product-grid-4">
                    <div class="col-lg-1-5 col-md-4 col-12 col-sm-6">
                        <div class="product-cart-wrap mb-30">
                            <div class="product-img-action-wrap">
                                <div class="product-img product-img-zoom">
                                    <a href="shop-product-right.html">
                                        <img class="default-img" src="assets/imgs/shop/product-6-1.jpg"
                                            alt="" />
                                        <img class="hover-img" src="assets/imgs/shop/product-6-2.jpg" alt="" />
                                    </a>
                                </div>
                                <div class="product-action-1">
                                    <a aria-label="Add To Wishlist" class="action-btn"
                                        href="shop-wishlist.html"><i class="fi-rs-heart"></i></a>
                                    <a aria-label="Compare" class="action-btn" href="shop-compare.html"><i
                                            class="fi-rs-shuffle"></i></a>
                                    <a aria-label="Quick view" class="action-btn" data-bs-toggle="modal"
                                        data-bs-target="#quickViewModal"><i class="fi-rs-eye"></i></a>
                                </div>
                                <div class="product-badges product-badges-position product-badges-mrg">
                                    <span class="hot">Hot</span>
                                </div>
                            </div>
                            <div class="product-content-wrap">
                                <div class="product-category">
                                    <a href="shop-grid-right.html">Snack</a>
                                </div>
                                <h2><a href="shop-product-right.html">Seeds of Change Organic Quinoa, Brown, &
                                        Red Rice</a></h2>
                                <div class="product-rate-cover">
                                    <div class="product-rate d-inline-block">
                                        <div class="product-rating" style="width: 90%"></div>
                                    </div>
                                    <span class="font-small ml-5 text-muted"> (4.0)</span>
                                </div>
                                <div>
                                    <span class="font-small text-muted">By <a
                                            href="vendor-details-1.html">NestFood</a></span>
                                </div>
                                <div class="product-card-bottom">
                                    <div class="product-price">
                                        <span>$28.85</span>
                                        <span class="old-price">$32.8</span>
                                    </div>
                                    <div class="add-cart">
                                        <a class="add" href="shop-cart.html"><i
                                                class="fi-rs-shopping-cart mr-5"></i>Add </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--end product card-->
                    <div class="col-lg-1-5 col-md-4 col-12 col-sm-6">
                        <div class="product-cart-wrap mb-30">
                            <div class="product-img-action-wrap">
                                <div class="product-img product-img-zoom">
                                    <a href="shop-product-right.html">
                                        <img class="default-img" src="assets/imgs/shop/product-7-1.jpg"
                                            alt="" />
                                        <img class="hover-img" src="assets/imgs/shop/product-7-2.jpg" alt="" />
                                    </a>
                                </div>
                                <div class="product-action-1">
                                    <a aria-label="Add To Wishlist" class="action-btn"
                                        href="shop-wishlist.html"><i class="fi-rs-heart"></i></a>
                                    <a aria-label="Compare" class="action-btn" href="shop-compare.html"><i
                                            class="fi-rs-shuffle"></i></a>
                                    <a aria-label="Quick view" class="action-btn" data-bs-toggle="modal"
                                        data-bs-target="#quickViewModal"><i class="fi-rs-eye"></i></a>
                                </div>
                                <div class="product-badges product-badges-position product-badges-mrg">
                                    <span class="sale">Sale</span>
                                </div>
                            </div>
                            <div class="product-content-wrap">
                                <div class="product-category">
                                    <a href="shop-grid-right.html">Hodo Foods</a>
                                </div>
                                <h2><a href="shop-product-right.html">All Natural Italian-Style Chicken
                                        Meatballs</a></h2>
                                <div class="product-rate-cover">
                                    <div class="product-rate d-inline-block">
                                        <div class="product-rating" style="width: 80%"></div>
                                    </div>
                                    <span class="font-small ml-5 text-muted"> (3.5)</span>
                                </div>
                                <div>
                                    <span class="font-small text-muted">By <a
                                            href="vendor-details-1.html">Stouffer</a></span>
                                </div>
                                <div class="product-card-bottom">
                                    <div class="product-price">
                                        <span>$52.85</span>
                                        <span class="old-price">$55.8</span>
                                    </div>
                                    <div class="add-cart">
                                        <a class="add" href="shop-cart.html"><i
                                                class="fi-rs-shopping-cart mr-5"></i>Add </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--end product card-->
                    <div class="col-lg-1-5 col-md-4 col-12 col-sm-6">
                        <div class="product-cart-wrap mb-30">
                            <div class="product-img-action-wrap">
                                <div class="product-img product-img-zoom">
                                    <a href="shop-product-right.html">
                                        <img class="default-img" src="assets/imgs/shop/product-8-1.jpg"
                                            alt="" />
                                        <img class="hover-img" src="assets/imgs/shop/product-8-2.jpg" alt="" />
                                    </a>
                                </div>
                                <div class="product-action-1">
                                    <a aria-label="Add To Wishlist" class="action-btn"
                                        href="shop-wishlist.html"><i class="fi-rs-heart"></i></a>
                                    <a aria-label="Compare" class="action-btn" href="shop-compare.html"><i
                                            class="fi-rs-shuffle"></i></a>
                                    <a aria-label="Quick view" class="action-btn" data-bs-toggle="modal"
                                        data-bs-target="#quickViewModal"><i class="fi-rs-eye"></i></a>
                                </div>
                                <div class="product-badges product-badges-position product-badges-mrg">
                                    <span class="new">New</span>
                                </div>
                            </div>
                            <div class="product-content-wrap">
                                <div class="product-category">
                                    <a href="shop-grid-right.html">Snack</a>
                                </div>
                                <h2><a href="shop-product-right.html">Angie’s Boomchickapop Sweet & Salty Kettle
                                        Corn</a></h2>
                                <div class="product-rate-cover">
                                    <div class="product-rate d-inline-block">
                                        <div class="product-rating" style="width: 85%"></div>
                                    </div>
                                    <span class="font-small ml-5 text-muted"> (4.0)</span>
                                </div>
                                <div>
                                    <span class="font-small text-muted">By <a
                                            href="vendor-details-1.html">StarKist</a></span>
                                </div>
                                <div class="product-card-bottom">
                                    <div class="product-price">
                                        <span>$48.85</span>
                                        <span class="old-price">$52.8</span>
                                    </div>
                                    <div class="add-cart">
                                        <a class="add" href="shop-cart.html"><i
                                                class="fi-rs-shopping-cart mr-5"></i>Add </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--end product card-->
                    <div class="col-lg-1-5 col-md-4 col-12 col-sm-6">
                        <div class="product-cart-wrap mb-30">
                            <div class="product-img-action-wrap">
                                <div class="product-img product-img-zoom">
                                    <a href="shop-product-right.html">
                                        <img class="default-img" src="assets/imgs/shop/product-9-1.jpg"
                                            alt="" />
                                        <img class="hover-img" src="assets/imgs/shop/product-9-2.jpg" alt="" />
                                    </a>
                                </div>
                                <div class="product-action-1">
                                    <a aria-label="Add To Wishlist" class="action-btn"
                                        href="shop-wishlist.html"><i class="fi-rs-heart"></i></a>
                                    <a aria-label="Compare" class="action-btn" href="shop-compare.html"><i
                                            class="fi-rs-shuffle"></i></a>
                                    <a aria-label="Quick view" class="action-btn" data-bs-toggle="modal"
                                        data-bs-target="#quickViewModal"><i class="fi-rs-eye"></i></a>
                                </div>
                            </div>
                            <div class="product-content-wrap">
                                <div class="product-category">
                                    <a href="shop-grid-right.html">Vegetables</a>
                                </div>
                                <h2><a href="shop-product-right.html">Foster Farms Takeout Crispy Classic
                                        Buffalo Wings</a></h2>
                                <div class="product-rate-cover">
                                    <div class="product-rate d-inline-block">
                                        <div class="product-rating" style="width: 90%"></div>
                                    </div>
                                    <span class="font-small ml-5 text-muted"> (4.0)</span>
                                </div>
                                <div>
                                    <span class="font-small text-muted">By <a
                                            href="vendor-details-1.html">NestFood</a></span>
                                </div>
                                <div class="product-card-bottom">
                                    <div class="product-price">
                                        <span>$17.85</span>
                                        <span class="old-price">$19.8</span>
                                    </div>
                                    <div class="add-cart">
                                        <a class="add" href="shop-cart.html"><i
                                                class="fi-rs-shopping-cart mr-5"></i>Add </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--end product card-->
                    <div class="col-lg-1-5 col-md-4 col-12 col-sm-6">
                        <div class="product-cart-wrap mb-30">
                            <div class="product-img-action-wrap">
                                <div class="product-img product-img-zoom">
                                    <a href="shop-product-right.html">
                                        <img class="default-img" src="assets/imgs/shop/product-4-1.jpg"
                                            alt="" />
                                        <img class="hover-img" src="assets/imgs/shop/product-4-2.jpg" alt="" />
                                    </a>
                                </div>
                                <div class="product-action-1">
                                    <a aria-label="Add To Wishlist" class="action-btn"
                                        href="shop-wishlist.html"><i class="fi-rs-heart"></i></a>
                                    <a aria-label="Compare" class="action-btn" href="shop-compare.html"><i
                                            class="fi-rs-shuffle"></i></a>
                                    <a aria-label="Quick view" class="action-btn" data-bs-toggle="modal"
                                        data-bs-target="#quickViewModal"><i class="fi-rs-eye"></i></a>
                                </div>
                                <div class="product-badges product-badges-position product-badges-mrg">
                                    <span class="best">-14%</span>
                                </div>
                            </div>
                            <div class="product-content-wrap">
                                <div class="product-category">
                                    <a href="shop-grid-right.html">Pet Foods</a>
                                </div>
                                <h2><a href="shop-product-right.html">Blue Diamond Almonds Lightly Salted
                                        Vegetables</a></h2>
                                <div class="product-rate-cover">
                                    <div class="product-rate d-inline-block">
                                        <div class="product-rating" style="width: 90%"></div>
                                    </div>
                                    <span class="font-small ml-5 text-muted"> (4.0)</span>
                                </div>
                                <div>
                                    <span class="font-small text-muted">By <a
                                            href="vendor-details-1.html">NestFood</a></span>
                                </div>
                                <div class="product-card-bottom">
                                    <div class="product-price">
                                        <span>$23.85</span>
                                        <span class="old-price">$25.8</span>
                                    </div>
                                    <div class="add-cart">
                                        <a class="add" href="shop-cart.html"><i
                                                class="fi-rs-shopping-cart mr-5"></i>Add </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--end product card-->
                    <div class="col-lg-1-5 col-md-4 col-12 col-sm-6">
                        <div class="product-cart-wrap mb-30">
                            <div class="product-img-action-wrap">
                                <div class="product-img product-img-zoom">
                                    <a href="shop-product-right.html">
                                        <img class="default-img" src="assets/imgs/shop/product-3-1.jpg"
                                            alt="" />
                                        <img class="hover-img" src="assets/imgs/shop/product-3-2.jpg" alt="" />
                                    </a>
                                </div>
                                <div class="product-action-1">
                                    <a aria-label="Add To Wishlist" class="action-btn"
                                        href="shop-wishlist.html"><i class="fi-rs-heart"></i></a>
                                    <a aria-label="Compare" class="action-btn" href="shop-compare.html"><i
                                            class="fi-rs-shuffle"></i></a>
                                    <a aria-label="Quick view" class="action-btn" data-bs-toggle="modal"
                                        data-bs-target="#quickViewModal"><i class="fi-rs-eye"></i></a>
                                </div>
                            </div>
                            <div class="product-content-wrap">
                                <div class="product-category">
                                    <a href="shop-grid-right.html">Hodo Foods</a>
                                </div>
                                <h2><a href="shop-product-right.html">Chobani Complete Vanilla Greek Yogurt</a>
                                </h2>
                                <div class="product-rate-cover">
                                    <div class="product-rate d-inline-block">
                                        <div class="product-rating" style="width: 90%"></div>
                                    </div>
                                    <span class="font-small ml-5 text-muted"> (4.0)</span>
                                </div>
                                <div>
                                    <span class="font-small text-muted">By <a
                                            href="vendor-details-1.html">NestFood</a></span>
                                </div>
                                <div class="product-card-bottom">
                                    <div class="product-price">
                                        <span>$54.85</span>
                                        <span class="old-price">$55.8</span>
                                    </div>
                                    <div class="add-cart">
                                        <a class="add" href="shop-cart.html"><i
                                                class="fi-rs-shopping-cart mr-5"></i>Add </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--end product card-->
                    <div class="col-lg-1-5 col-md-4 col-12 col-sm-6">
                        <div class="product-cart-wrap">
                            <div class="product-img-action-wrap">
                                <div class="product-img product-img-zoom">
                                    <a href="shop-product-right.html">
                                        <img class="default-img" src="assets/imgs/shop/product-2-1.jpg"
                                            alt="" />
                                        <img class="hover-img" src="assets/imgs/shop/product-2-2.jpg" alt="" />
                                    </a>
                                </div>
                                <div class="product-action-1">
                                    <a aria-label="Add To Wishlist" class="action-btn"
                                        href="shop-wishlist.html"><i class="fi-rs-heart"></i></a>
                                    <a aria-label="Compare" class="action-btn" href="shop-compare.html"><i
                                            class="fi-rs-shuffle"></i></a>
                                    <a aria-label="Quick view" class="action-btn" data-bs-toggle="modal"
                                        data-bs-target="#quickViewModal"><i class="fi-rs-eye"></i></a>
                                </div>
                            </div>
                            <div class="product-content-wrap">
                                <div class="product-category">
                                    <a href="shop-grid-right.html">Meats</a>
                                </div>
                                <h2><a href="shop-product-right.html">Canada Dry Ginger Ale – 2 L Bottle - 200ml
                                        - 400g</a></h2>
                                <div class="product-rate-cover">
                                    <div class="product-rate d-inline-block">
                                        <div class="product-rating" style="width: 90%"></div>
                                    </div>
                                    <span class="font-small ml-5 text-muted"> (4.0)</span>
                                </div>
                                <div>
                                    <span class="font-small text-muted">By <a
                                            href="vendor-details-1.html">NestFood</a></span>
                                </div>
                                <div class="product-card-bottom">
                                    <div class="product-price">
                                        <span>$32.85</span>
                                        <span class="old-price">$33.8</span>
                                    </div>
                                    <div class="add-cart">
                                        <a class="add" href="shop-cart.html"><i
                                                class="fi-rs-shopping-cart mr-5"></i>Add </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--end product card-->
                    <div class="col-lg-1-5 col-md-4 col-12 col-sm-6">
                        <div class="product-cart-wrap">
                            <div class="product-img-action-wrap">
                                <div class="product-img product-img-zoom">
                                    <a href="shop-product-right.html">
                                        <img class="default-img" src="assets/imgs/shop/product-1-1.jpg"
                                            alt="" />
                                        <img class="hover-img" src="assets/imgs/shop/product-1-2.jpg" alt="" />
                                    </a>
                                </div>
                                <div class="product-action-1">
                                    <a aria-label="Add To Wishlist" class="action-btn"
                                        href="shop-wishlist.html"><i class="fi-rs-heart"></i></a>
                                    <a aria-label="Compare" class="action-btn" href="shop-compare.html"><i
                                            class="fi-rs-shuffle"></i></a>
                                    <a aria-label="Quick view" class="action-btn" data-bs-toggle="modal"
                                        data-bs-target="#quickViewModal"><i class="fi-rs-eye"></i></a>
                                </div>
                                <div class="product-badges product-badges-position product-badges-mrg">
                                    <span class="sale">Sale</span>
                                </div>
                            </div>
                            <div class="product-content-wrap">
                                <div class="product-category">
                                    <a href="shop-grid-right.html">Snack</a>
                                </div>
                                <h2><a href="shop-product-right.html">Encore Seafoods Stuffed Alaskan Salmon</a>
                                </h2>
                                <div class="product-rate-cover">
                                    <div class="product-rate d-inline-block">
                                        <div class="product-rating" style="width: 90%"></div>
                                    </div>
                                    <span class="font-small ml-5 text-muted"> (4.0)</span>
                                </div>
                                <div>
                                    <span class="font-small text-muted">By <a
                                            href="vendor-details-1.html">NestFood</a></span>
                                </div>
                                <div class="product-card-bottom">
                                    <div class="product-price">
                                        <span>$35.85</span>
                                        <span class="old-price">$37.8</span>
                                    </div>
                                    <div class="add-cart">
                                        <a class="add" href="shop-cart.html"><i
                                                class="fi-rs-shopping-cart mr-5"></i>Add </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--end product card-->
                    <div class="col-lg-1-5 col-md-4 col-12 col-sm-6">
                        <div class="product-cart-wrap">
                            <div class="product-img-action-wrap">
                                <div class="product-img product-img-zoom">
                                    <a href="shop-product-right.html">
                                        <img class="default-img" src="assets/imgs/shop/product-11-1.jpg"
                                            alt="" />
                                        <img class="hover-img" src="assets/imgs/shop/product-11-2.jpg" alt="" />
                                    </a>
                                </div>
                                <div class="product-action-1">
                                    <a aria-label="Add To Wishlist" class="action-btn"
                                        href="shop-wishlist.html"><i class="fi-rs-heart"></i></a>
                                    <a aria-label="Compare" class="action-btn" href="shop-compare.html"><i
                                            class="fi-rs-shuffle"></i></a>
                                    <a aria-label="Quick view" class="action-btn" data-bs-toggle="modal"
                                        data-bs-target="#quickViewModal"><i class="fi-rs-eye"></i></a>
                                </div>
                                <div class="product-badges product-badges-position product-badges-mrg">
                                    <span class="hot">Hot</span>
                                </div>
                            </div>
                            <div class="product-content-wrap">
                                <div class="product-category">
                                    <a href="shop-grid-right.html">Coffes</a>
                                </div>
                                <h2><a href="shop-product-right.html">Gorton’s Beer Battered Fish Fillets with
                                        soft paper</a></h2>
                                <div class="product-rate-cover">
                                    <div class="product-rate d-inline-block">
                                        <div class="product-rating" style="width: 90%"></div>
                                    </div>
                                    <span class="font-small ml-5 text-muted"> (4.0)</span>
                                </div>
                                <div>
                                    <span class="font-small text-muted">By <a href="vendor-details-1.html">Old
                                            El Paso</a></span>
                                </div>
                                <div class="product-card-bottom">
                                    <div class="product-price">
                                        <span>$23.85</span>
                                        <span class="old-price">$25.8</span>
                                    </div>
                                    <div class="add-cart">
                                        <a class="add" href="shop-cart.html"><i
                                                class="fi-rs-shopping-cart mr-5"></i>Add </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--end product card-->
                    <div class="col-lg-1-5 col-md-4 col-12 col-sm-6 d-none d-xl-block">
                        <div class="product-cart-wrap">
                            <div class="product-img-action-wrap">
                                <div class="product-img product-img-zoom">
                                    <a href="shop-product-right.html">
                                        <img class="default-img" src="assets/imgs/shop/product-12-1.jpg"
                                            alt="" />
                                        <img class="hover-img" src="assets/imgs/shop/product-12-2.jpg" alt="" />
                                    </a>
                                </div>
                                <div class="product-action-1">
                                    <a aria-label="Add To Wishlist" class="action-btn"
                                        href="shop-wishlist.html"><i class="fi-rs-heart"></i></a>
                                    <a aria-label="Compare" class="action-btn" href="shop-compare.html"><i
                                            class="fi-rs-shuffle"></i></a>
                                    <a aria-label="Quick view" class="action-btn" data-bs-toggle="modal"
                                        data-bs-target="#quickViewModal"><i class="fi-rs-eye"></i></a>
                                </div>
                            </div>
                            <div class="product-content-wrap">
                                <div class="product-category">
                                    <a href="shop-grid-right.html">Cream</a>
                                </div>
                                <h2><a href="shop-product-right.html">Haagen-Dazs Caramel Cone Ice Cream
                                        Ketchup</a></h2>
                                <div class="product-rate-cover">
                                    <div class="product-rate d-inline-block">
                                        <div class="product-rating" style="width: 50%"></div>
                                    </div>
                                    <span class="font-small ml-5 text-muted"> (2.0)</span>
                                </div>
                                <div>
                                    <span class="font-small text-muted">By <a
                                            href="vendor-details-1.html">Tyson</a></span>
                                </div>
                                <div class="product-card-bottom">
                                    <div class="product-price">
                                        <span>$22.85</span>
                                        <span class="old-price">$24.8</span>
                                    </div>
                                    <div class="add-cart">
                                        <a class="add" href="shop-cart.html"><i
                                                class="fi-rs-shopping-cart mr-5"></i>Add </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--end product card-->
                </div>
                <!--End product-grid-4-->
            </div>
            <!--En tab four-->
            <div class="tab-pane fade" id="tab-five" role="tabpanel" aria-labelledby="tab-five">
                <div class="row product-grid-4">
                    <div class="col-lg-1-5 col-md-4 col-12 col-sm-6">
                        <div class="product-cart-wrap mb-30">
                            <div class="product-img-action-wrap">
                                <div class="product-img product-img-zoom">
                                    <a href="shop-product-right.html">
                                        <img class="default-img" src="assets/imgs/shop/product-12-1.jpg"
                                            alt="" />
                                        <img class="hover-img" src="assets/imgs/shop/product-12-2.jpg" alt="" />
                                    </a>
                                </div>
                                <div class="product-action-1">
                                    <a aria-label="Add To Wishlist" class="action-btn"
                                        href="shop-wishlist.html"><i class="fi-rs-heart"></i></a>
                                    <a aria-label="Compare" class="action-btn" href="shop-compare.html"><i
                                            class="fi-rs-shuffle"></i></a>
                                    <a aria-label="Quick view" class="action-btn" data-bs-toggle="modal"
                                        data-bs-target="#quickViewModal"><i class="fi-rs-eye"></i></a>
                                </div>
                                <div class="product-badges product-badges-position product-badges-mrg">
                                    <span class="hot">Hot</span>
                                </div>
                            </div>
                            <div class="product-content-wrap">
                                <div class="product-category">
                                    <a href="shop-grid-right.html">Snack</a>
                                </div>
                                <h2><a href="shop-product-right.html">Seeds of Change Organic Quinoa, Brown, &
                                        Red Rice</a></h2>
                                <div class="product-rate-cover">
                                    <div class="product-rate d-inline-block">
                                        <div class="product-rating" style="width: 90%"></div>
                                    </div>
                                    <span class="font-small ml-5 text-muted"> (4.0)</span>
                                </div>
                                <div>
                                    <span class="font-small text-muted">By <a
                                            href="vendor-details-1.html">NestFood</a></span>
                                </div>
                                <div class="product-card-bottom">
                                    <div class="product-price">
                                        <span>$28.85</span>
                                        <span class="old-price">$32.8</span>
                                    </div>
                                    <div class="add-cart">
                                        <a class="add" href="shop-cart.html"><i
                                                class="fi-rs-shopping-cart mr-5"></i>Add </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--end product card-->
                    <div class="col-lg-1-5 col-md-4 col-12 col-sm-6">
                        <div class="product-cart-wrap mb-30">
                            <div class="product-img-action-wrap">
                                <div class="product-img product-img-zoom">
                                    <a href="shop-product-right.html">
                                        <img class="default-img" src="assets/imgs/shop/product-13-1.jpg"
                                            alt="" />
                                        <img class="hover-img" src="assets/imgs/shop/product-13-2.jpg" alt="" />
                                    </a>
                                </div>
                                <div class="product-action-1">
                                    <a aria-label="Add To Wishlist" class="action-btn"
                                        href="shop-wishlist.html"><i class="fi-rs-heart"></i></a>
                                    <a aria-label="Compare" class="action-btn" href="shop-compare.html"><i
                                            class="fi-rs-shuffle"></i></a>
                                    <a aria-label="Quick view" class="action-btn" data-bs-toggle="modal"
                                        data-bs-target="#quickViewModal"><i class="fi-rs-eye"></i></a>
                                </div>
                                <div class="product-badges product-badges-position product-badges-mrg">
                                    <span class="sale">Sale</span>
                                </div>
                            </div>
                            <div class="product-content-wrap">
                                <div class="product-category">
                                    <a href="shop-grid-right.html">Hodo Foods</a>
                                </div>
                                <h2><a href="shop-product-right.html">All Natural Italian-Style Chicken
                                        Meatballs</a></h2>
                                <div class="product-rate-cover">
                                    <div class="product-rate d-inline-block">
                                        <div class="product-rating" style="width: 80%"></div>
                                    </div>
                                    <span class="font-small ml-5 text-muted"> (3.5)</span>
                                </div>
                                <div>
                                    <span class="font-small text-muted">By <a
                                            href="vendor-details-1.html">Stouffer</a></span>
                                </div>
                                <div class="product-card-bottom">
                                    <div class="product-price">
                                        <span>$52.85</span>
                                        <span class="old-price">$55.8</span>
                                    </div>
                                    <div class="add-cart">
                                        <a class="add" href="shop-cart.html"><i
                                                class="fi-rs-shopping-cart mr-5"></i>Add </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--end product card-->
                    <div class="col-lg-1-5 col-md-4 col-12 col-sm-6">
                        <div class="product-cart-wrap mb-30">
                            <div class="product-img-action-wrap">
                                <div class="product-img product-img-zoom">
                                    <a href="shop-product-right.html">
                                        <img class="default-img" src="assets/imgs/shop/product-14-1.jpg"
                                            alt="" />
                                        <img class="hover-img" src="assets/imgs/shop/product-14-2.jpg" alt="" />
                                    </a>
                                </div>
                                <div class="product-action-1">
                                    <a aria-label="Add To Wishlist" class="action-btn"
                                        href="shop-wishlist.html"><i class="fi-rs-heart"></i></a>
                                    <a aria-label="Compare" class="action-btn" href="shop-compare.html"><i
                                            class="fi-rs-shuffle"></i></a>
                                    <a aria-label="Quick view" class="action-btn" data-bs-toggle="modal"
                                        data-bs-target="#quickViewModal"><i class="fi-rs-eye"></i></a>
                                </div>
                                <div class="product-badges product-badges-position product-badges-mrg">
                                    <span class="new">New</span>
                                </div>
                            </div>
                            <div class="product-content-wrap">
                                <div class="product-category">
                                    <a href="shop-grid-right.html">Snack</a>
                                </div>
                                <h2><a href="shop-product-right.html">Angie’s Boomchickapop Sweet & Salty Kettle
                                        Corn</a></h2>
                                <div class="product-rate-cover">
                                    <div class="product-rate d-inline-block">
                                        <div class="product-rating" style="width: 85%"></div>
                                    </div>
                                    <span class="font-small ml-5 text-muted"> (4.0)</span>
                                </div>
                                <div>
                                    <span class="font-small text-muted">By <a
                                            href="vendor-details-1.html">StarKist</a></span>
                                </div>
                                <div class="product-card-bottom">
                                    <div class="product-price">
                                        <span>$48.85</span>
                                        <span class="old-price">$52.8</span>
                                    </div>
                                    <div class="add-cart">
                                        <a class="add" href="shop-cart.html"><i
                                                class="fi-rs-shopping-cart mr-5"></i>Add </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--end product card-->
                    <div class="col-lg-1-5 col-md-4 col-12 col-sm-6">
                        <div class="product-cart-wrap mb-30">
                            <div class="product-img-action-wrap">
                                <div class="product-img product-img-zoom">
                                    <a href="shop-product-right.html">
                                        <img class="default-img" src="assets/imgs/shop/product-15-1.jpg"
                                            alt="" />
                                        <img class="hover-img" src="assets/imgs/shop/product-15-2.jpg" alt="" />
                                    </a>
                                </div>
                                <div class="product-action-1">
                                    <a aria-label="Add To Wishlist" class="action-btn"
                                        href="shop-wishlist.html"><i class="fi-rs-heart"></i></a>
                                    <a aria-label="Compare" class="action-btn" href="shop-compare.html"><i
                                            class="fi-rs-shuffle"></i></a>
                                    <a aria-label="Quick view" class="action-btn" data-bs-toggle="modal"
                                        data-bs-target="#quickViewModal"><i class="fi-rs-eye"></i></a>
                                </div>
                            </div>
                            <div class="product-content-wrap">
                                <div class="product-category">
                                    <a href="shop-grid-right.html">Vegetables</a>
                                </div>
                                <h2><a href="shop-product-right.html">Foster Farms Takeout Crispy Classic
                                        Buffalo Wings</a></h2>
                                <div class="product-rate-cover">
                                    <div class="product-rate d-inline-block">
                                        <div class="product-rating" style="width: 90%"></div>
                                    </div>
                                    <span class="font-small ml-5 text-muted"> (4.0)</span>
                                </div>
                                <div>
                                    <span class="font-small text-muted">By <a
                                            href="vendor-details-1.html">NestFood</a></span>
                                </div>
                                <div class="product-card-bottom">
                                    <div class="product-price">
                                        <span>$17.85</span>
                                        <span class="old-price">$19.8</span>
                                    </div>
                                    <div class="add-cart">
                                        <a class="add" href="shop-cart.html"><i
                                                class="fi-rs-shopping-cart mr-5"></i>Add </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--end product card-->
                    <div class="col-lg-1-5 col-md-4 col-12 col-sm-6">
                        <div class="product-cart-wrap mb-30">
                            <div class="product-img-action-wrap">
                                <div class="product-img product-img-zoom">
                                    <a href="shop-product-right.html">
                                        <img class="default-img" src="assets/imgs/shop/product-16-1.jpg"
                                            alt="" />
                                        <img class="hover-img" src="assets/imgs/shop/product-16-2.jpg" alt="" />
                                    </a>
                                </div>
                                <div class="product-action-1">
                                    <a aria-label="Add To Wishlist" class="action-btn"
                                        href="shop-wishlist.html"><i class="fi-rs-heart"></i></a>
                                    <a aria-label="Compare" class="action-btn" href="shop-compare.html"><i
                                            class="fi-rs-shuffle"></i></a>
                                    <a aria-label="Quick view" class="action-btn" data-bs-toggle="modal"
                                        data-bs-target="#quickViewModal"><i class="fi-rs-eye"></i></a>
                                </div>
                                <div class="product-badges product-badges-position product-badges-mrg">
                                    <span class="best">-14%</span>
                                </div>
                            </div>
                            <div class="product-content-wrap">
                                <div class="product-category">
                                    <a href="shop-grid-right.html">Pet Foods</a>
                                </div>
                                <h2><a href="shop-product-right.html">Blue Diamond Almonds Lightly Salted
                                        Vegetables</a></h2>
                                <div class="product-rate-cover">
                                    <div class="product-rate d-inline-block">
                                        <div class="product-rating" style="width: 90%"></div>
                                    </div>
                                    <span class="font-small ml-5 text-muted"> (4.0)</span>
                                </div>
                                <div>
                                    <span class="font-small text-muted">By <a
                                            href="vendor-details-1.html">NestFood</a></span>
                                </div>
                                <div class="product-card-bottom">
                                    <div class="product-price">
                                        <span>$23.85</span>
                                        <span class="old-price">$25.8</span>
                                    </div>
                                    <div class="add-cart">
                                        <a class="add" href="shop-cart.html"><i
                                                class="fi-rs-shopping-cart mr-5"></i>Add </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--end product card-->
                    <div class="col-lg-1-5 col-md-4 col-12 col-sm-6">
                        <div class="product-cart-wrap">
                            <div class="product-img-action-wrap">
                                <div class="product-img product-img-zoom">
                                    <a href="shop-product-right.html">
                                        <img class="default-img" src="assets/imgs/shop/product-5-1.jpg"
                                            alt="" />
                                        <img class="hover-img" src="assets/imgs/shop/product-5-2.jpg" alt="" />
                                    </a>
                                </div>
                                <div class="product-action-1">
                                    <a aria-label="Add To Wishlist" class="action-btn"
                                        href="shop-wishlist.html"><i class="fi-rs-heart"></i></a>
                                    <a aria-label="Compare" class="action-btn" href="shop-compare.html"><i
                                            class="fi-rs-shuffle"></i></a>
                                    <a aria-label="Quick view" class="action-btn" data-bs-toggle="modal"
                                        data-bs-target="#quickViewModal"><i class="fi-rs-eye"></i></a>
                                </div>
                            </div>
                            <div class="product-content-wrap">
                                <div class="product-category">
                                    <a href="shop-grid-right.html">Hodo Foods</a>
                                </div>
                                <h2><a href="shop-product-right.html">Chobani Complete Vanilla Greek Yogurt</a>
                                </h2>
                                <div class="product-rate-cover">
                                    <div class="product-rate d-inline-block">
                                        <div class="product-rating" style="width: 90%"></div>
                                    </div>
                                    <span class="font-small ml-5 text-muted"> (4.0)</span>
                                </div>
                                <div>
                                    <span class="font-small text-muted">By <a
                                            href="vendor-details-1.html">NestFood</a></span>
                                </div>
                                <div class="product-card-bottom">
                                    <div class="product-price">
                                        <span>$54.85</span>
                                        <span class="old-price">$55.8</span>
                                    </div>
                                    <div class="add-cart">
                                        <a class="add" href="shop-cart.html"><i
                                                class="fi-rs-shopping-cart mr-5"></i>Add </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--end product card-->
                    <div class="col-lg-1-5 col-md-4 col-12 col-sm-6">
                        <div class="product-cart-wrap">
                            <div class="product-img-action-wrap">
                                <div class="product-img product-img-zoom">
                                    <a href="shop-product-right.html">
                                        <img class="default-img" src="assets/imgs/shop/product-7-1.jpg"
                                            alt="" />
                                        <img class="hover-img" src="assets/imgs/shop/product-7-2.jpg" alt="" />
                                    </a>
                                </div>
                                <div class="product-action-1">
                                    <a aria-label="Add To Wishlist" class="action-btn"
                                        href="shop-wishlist.html"><i class="fi-rs-heart"></i></a>
                                    <a aria-label="Compare" class="action-btn" href="shop-compare.html"><i
                                            class="fi-rs-shuffle"></i></a>
                                    <a aria-label="Quick view" class="action-btn" data-bs-toggle="modal"
                                        data-bs-target="#quickViewModal"><i class="fi-rs-eye"></i></a>
                                </div>
                            </div>
                            <div class="product-content-wrap">
                                <div class="product-category">
                                    <a href="shop-grid-right.html">Meats</a>
                                </div>
                                <h2><a href="shop-product-right.html">Canada Dry Ginger Ale – 2 L Bottle - 200ml
                                        - 400g</a></h2>
                                <div class="product-rate-cover">
                                    <div class="product-rate d-inline-block">
                                        <div class="product-rating" style="width: 90%"></div>
                                    </div>
                                    <span class="font-small ml-5 text-muted"> (4.0)</span>
                                </div>
                                <div>
                                    <span class="font-small text-muted">By <a
                                            href="vendor-details-1.html">NestFood</a></span>
                                </div>
                                <div class="product-card-bottom">
                                    <div class="product-price">
                                        <span>$32.85</span>
                                        <span class="old-price">$33.8</span>
                                    </div>
                                    <div class="add-cart">
                                        <a class="add" href="shop-cart.html"><i
                                                class="fi-rs-shopping-cart mr-5"></i>Add </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--end product card-->
                    <div class="col-lg-1-5 col-md-4 col-12 col-sm-6">
                        <div class="product-cart-wrap">
                            <div class="product-img-action-wrap">
                                <div class="product-img product-img-zoom">
                                    <a href="shop-product-right.html">
                                        <img class="default-img" src="assets/imgs/shop/product-8-1.jpg"
                                            alt="" />
                                        <img class="hover-img" src="assets/imgs/shop/product-8-2.jpg" alt="" />
                                    </a>
                                </div>
                                <div class="product-action-1">
                                    <a aria-label="Add To Wishlist" class="action-btn"
                                        href="shop-wishlist.html"><i class="fi-rs-heart"></i></a>
                                    <a aria-label="Compare" class="action-btn" href="shop-compare.html"><i
                                            class="fi-rs-shuffle"></i></a>
                                    <a aria-label="Quick view" class="action-btn" data-bs-toggle="modal"
                                        data-bs-target="#quickViewModal"><i class="fi-rs-eye"></i></a>
                                </div>
                                <div class="product-badges product-badges-position product-badges-mrg">
                                    <span class="sale">Sale</span>
                                </div>
                            </div>
                            <div class="product-content-wrap">
                                <div class="product-category">
                                    <a href="shop-grid-right.html">Snack</a>
                                </div>
                                <h2><a href="shop-product-right.html">Encore Seafoods Stuffed Alaskan Salmon</a>
                                </h2>
                                <div class="product-rate-cover">
                                    <div class="product-rate d-inline-block">
                                        <div class="product-rating" style="width: 90%"></div>
                                    </div>
                                    <span class="font-small ml-5 text-muted"> (4.0)</span>
                                </div>
                                <div>
                                    <span class="font-small text-muted">By <a
                                            href="vendor-details-1.html">NestFood</a></span>
                                </div>
                                <div class="product-card-bottom">
                                    <div class="product-price">
                                        <span>$35.85</span>
                                        <span class="old-price">$37.8</span>
                                    </div>
                                    <div class="add-cart">
                                        <a class="add" href="shop-cart.html"><i
                                                class="fi-rs-shopping-cart mr-5"></i>Add </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--end product card-->
                    <div class="col-lg-1-5 col-md-4 col-12 col-sm-6">
                        <div class="product-cart-wrap">
                            <div class="product-img-action-wrap">
                                <div class="product-img product-img-zoom">
                                    <a href="shop-product-right.html">
                                        <img class="default-img" src="assets/imgs/shop/product-9-1.jpg"
                                            alt="" />
                                        <img class="hover-img" src="assets/imgs/shop/product-9-2.jpg" alt="" />
                                    </a>
                                </div>
                                <div class="product-action-1">
                                    <a aria-label="Add To Wishlist" class="action-btn"
                                        href="shop-wishlist.html"><i class="fi-rs-heart"></i></a>
                                    <a aria-label="Compare" class="action-btn" href="shop-compare.html"><i
                                            class="fi-rs-shuffle"></i></a>
                                    <a aria-label="Quick view" class="action-btn" data-bs-toggle="modal"
                                        data-bs-target="#quickViewModal"><i class="fi-rs-eye"></i></a>
                                </div>
                                <div class="product-badges product-badges-position product-badges-mrg">
                                    <span class="hot">Hot</span>
                                </div>
                            </div>
                            <div class="product-content-wrap">
                                <div class="product-category">
                                    <a href="shop-grid-right.html">Coffes</a>
                                </div>
                                <h2><a href="shop-product-right.html">Gorton’s Beer Battered Fish Fillets with
                                        soft paper</a></h2>
                                <div class="product-rate-cover">
                                    <div class="product-rate d-inline-block">
                                        <div class="product-rating" style="width: 90%"></div>
                                    </div>
                                    <span class="font-small ml-5 text-muted"> (4.0)</span>
                                </div>
                                <div>
                                    <span class="font-small text-muted">By <a href="vendor-details-1.html">Old
                                            El Paso</a></span>
                                </div>
                                <div class="product-card-bottom">
                                    <div class="product-price">
                                        <span>$23.85</span>
                                        <span class="old-price">$25.8</span>
                                    </div>
                                    <div class="add-cart">
                                        <a class="add" href="shop-cart.html"><i
                                                class="fi-rs-shopping-cart mr-5"></i>Add </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--end product card-->
                    <div class="col-lg-1-5 col-md-4 col-12 col-sm-6 d-none d-xl-block">
                        <div class="product-cart-wrap">
                            <div class="product-img-action-wrap">
                                <div class="product-img product-img-zoom">
                                    <a href="shop-product-right.html">
                                        <img class="default-img" src="assets/imgs/shop/product-10-1.jpg"
                                            alt="" />
                                        <img class="hover-img" src="assets/imgs/shop/product-10-2.jpg" alt="" />
                                    </a>
                                </div>
                                <div class="product-action-1">
                                    <a aria-label="Add To Wishlist" class="action-btn"
                                        href="shop-wishlist.html"><i class="fi-rs-heart"></i></a>
                                    <a aria-label="Compare" class="action-btn" href="shop-compare.html"><i
                                            class="fi-rs-shuffle"></i></a>
                                    <a aria-label="Quick view" class="action-btn" data-bs-toggle="modal"
                                        data-bs-target="#quickViewModal"><i class="fi-rs-eye"></i></a>
                                </div>
                            </div>
                            <div class="product-content-wrap">
                                <div class="product-category">
                                    <a href="shop-grid-right.html">Cream</a>
                                </div>
                                <h2><a href="shop-product-right.html">Haagen-Dazs Caramel Cone Ice Cream
                                        Ketchup</a></h2>
                                <div class="product-rate-cover">
                                    <div class="product-rate d-inline-block">
                                        <div class="product-rating" style="width: 50%"></div>
                                    </div>
                                    <span class="font-small ml-5 text-muted"> (2.0)</span>
                                </div>
                                <div>
                                    <span class="font-small text-muted">By <a
                                            href="vendor-details-1.html">Tyson</a></span>
                                </div>
                                <div class="product-card-bottom">
                                    <div class="product-price">
                                        <span>$22.85</span>
                                        <span class="old-price">$24.8</span>
                                    </div>
                                    <div class="add-cart">
                                        <a class="add" href="shop-cart.html"><i
                                                class="fi-rs-shopping-cart mr-5"></i>Add </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--end product card-->
                </div>
                <!--End product-grid-4-->
            </div>
            <!--En tab five-->
            <div class="tab-pane fade" id="tab-six" role="tabpanel" aria-labelledby="tab-six">
                <div class="row product-grid-4">
                    <div class="col-lg-1-5 col-md-4 col-12 col-sm-6">
                        <div class="product-cart-wrap mb-30">
                            <div class="product-img-action-wrap">
                                <div class="product-img product-img-zoom">
                                    <a href="shop-product-right.html">
                                        <img class="default-img" src="assets/imgs/shop/product-4-1.jpg"
                                            alt="" />
                                        <img class="hover-img" src="assets/imgs/shop/product-4-2.jpg" alt="" />
                                    </a>
                                </div>
                                <div class="product-action-1">
                                    <a aria-label="Add To Wishlist" class="action-btn"
                                        href="shop-wishlist.html"><i class="fi-rs-heart"></i></a>
                                    <a aria-label="Compare" class="action-btn" href="shop-compare.html"><i
                                            class="fi-rs-shuffle"></i></a>
                                    <a aria-label="Quick view" class="action-btn" data-bs-toggle="modal"
                                        data-bs-target="#quickViewModal"><i class="fi-rs-eye"></i></a>
                                </div>
                                <div class="product-badges product-badges-position product-badges-mrg">
                                    <span class="hot">Hot</span>
                                </div>
                            </div>
                            <div class="product-content-wrap">
                                <div class="product-category">
                                    <a href="shop-grid-right.html">Snack</a>
                                </div>
                                <h2><a href="shop-product-right.html">Seeds of Change Organic Quinoa, Brown, &
                                        Red Rice</a></h2>
                                <div class="product-rate-cover">
                                    <div class="product-rate d-inline-block">
                                        <div class="product-rating" style="width: 90%"></div>
                                    </div>
                                    <span class="font-small ml-5 text-muted"> (4.0)</span>
                                </div>
                                <div>
                                    <span class="font-small text-muted">By <a
                                            href="vendor-details-1.html">NestFood</a></span>
                                </div>
                                <div class="product-card-bottom">
                                    <div class="product-price">
                                        <span>$28.85</span>
                                        <span class="old-price">$32.8</span>
                                    </div>
                                    <div class="add-cart">
                                        <a class="add" href="shop-cart.html"><i
                                                class="fi-rs-shopping-cart mr-5"></i>Add </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--end product card-->
                    <div class="col-lg-1-5 col-md-4 col-12 col-sm-6">
                        <div class="product-cart-wrap mb-30">
                            <div class="product-img-action-wrap">
                                <div class="product-img product-img-zoom">
                                    <a href="shop-product-right.html">
                                        <img class="default-img" src="assets/imgs/shop/product-6-1.jpg"
                                            alt="" />
                                        <img class="hover-img" src="assets/imgs/shop/product-6-2.jpg" alt="" />
                                    </a>
                                </div>
                                <div class="product-action-1">
                                    <a aria-label="Add To Wishlist" class="action-btn"
                                        href="shop-wishlist.html"><i class="fi-rs-heart"></i></a>
                                    <a aria-label="Compare" class="action-btn" href="shop-compare.html"><i
                                            class="fi-rs-shuffle"></i></a>
                                    <a aria-label="Quick view" class="action-btn" data-bs-toggle="modal"
                                        data-bs-target="#quickViewModal"><i class="fi-rs-eye"></i></a>
                                </div>
                                <div class="product-badges product-badges-position product-badges-mrg">
                                    <span class="sale">Sale</span>
                                </div>
                            </div>
                            <div class="product-content-wrap">
                                <div class="product-category">
                                    <a href="shop-grid-right.html">Hodo Foods</a>
                                </div>
                                <h2><a href="shop-product-right.html">All Natural Italian-Style Chicken
                                        Meatballs</a></h2>
                                <div class="product-rate-cover">
                                    <div class="product-rate d-inline-block">
                                        <div class="product-rating" style="width: 80%"></div>
                                    </div>
                                    <span class="font-small ml-5 text-muted"> (3.5)</span>
                                </div>
                                <div>
                                    <span class="font-small text-muted">By <a
                                            href="vendor-details-1.html">Stouffer</a></span>
                                </div>
                                <div class="product-card-bottom">
                                    <div class="product-price">
                                        <span>$52.85</span>
                                        <span class="old-price">$55.8</span>
                                    </div>
                                    <div class="add-cart">
                                        <a class="add" href="shop-cart.html"><i
                                                class="fi-rs-shopping-cart mr-5"></i>Add </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--end product card-->
                    <div class="col-lg-1-5 col-md-4 col-12 col-sm-6">
                        <div class="product-cart-wrap mb-30">
                            <div class="product-img-action-wrap">
                                <div class="product-img product-img-zoom">
                                    <a href="shop-product-right.html">
                                        <img class="default-img" src="assets/imgs/shop/product-8-1.jpg"
                                            alt="" />
                                        <img class="hover-img" src="assets/imgs/shop/product-8-2.jpg" alt="" />
                                    </a>
                                </div>
                                <div class="product-action-1">
                                    <a aria-label="Add To Wishlist" class="action-btn"
                                        href="shop-wishlist.html"><i class="fi-rs-heart"></i></a>
                                    <a aria-label="Compare" class="action-btn" href="shop-compare.html"><i
                                            class="fi-rs-shuffle"></i></a>
                                    <a aria-label="Quick view" class="action-btn" data-bs-toggle="modal"
                                        data-bs-target="#quickViewModal"><i class="fi-rs-eye"></i></a>
                                </div>
                                <div class="product-badges product-badges-position product-badges-mrg">
                                    <span class="new">New</span>
                                </div>
                            </div>
                            <div class="product-content-wrap">
                                <div class="product-category">
                                    <a href="shop-grid-right.html">Snack</a>
                                </div>
                                <h2><a href="shop-product-right.html">Angie’s Boomchickapop Sweet & Salty Kettle
                                        Corn</a></h2>
                                <div class="product-rate-cover">
                                    <div class="product-rate d-inline-block">
                                        <div class="product-rating" style="width: 85%"></div>
                                    </div>
                                    <span class="font-small ml-5 text-muted"> (4.0)</span>
                                </div>
                                <div>
                                    <span class="font-small text-muted">By <a
                                            href="vendor-details-1.html">StarKist</a></span>
                                </div>
                                <div class="product-card-bottom">
                                    <div class="product-price">
                                        <span>$48.85</span>
                                        <span class="old-price">$52.8</span>
                                    </div>
                                    <div class="add-cart">
                                        <a class="add" href="shop-cart.html"><i
                                                class="fi-rs-shopping-cart mr-5"></i>Add </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--end product card-->
                    <div class="col-lg-1-5 col-md-4 col-12 col-sm-6">
                        <div class="product-cart-wrap mb-30">
                            <div class="product-img-action-wrap">
                                <div class="product-img product-img-zoom">
                                    <a href="shop-product-right.html">
                                        <img class="default-img" src="assets/imgs/shop/product-9-1.jpg"
                                            alt="" />
                                        <img class="hover-img" src="assets/imgs/shop/product-9-2.jpg" alt="" />
                                    </a>
                                </div>
                                <div class="product-action-1">
                                    <a aria-label="Add To Wishlist" class="action-btn"
                                        href="shop-wishlist.html"><i class="fi-rs-heart"></i></a>
                                    <a aria-label="Compare" class="action-btn" href="shop-compare.html"><i
                                            class="fi-rs-shuffle"></i></a>
                                    <a aria-label="Quick view" class="action-btn" data-bs-toggle="modal"
                                        data-bs-target="#quickViewModal"><i class="fi-rs-eye"></i></a>
                                </div>
                            </div>
                            <div class="product-content-wrap">
                                <div class="product-category">
                                    <a href="shop-grid-right.html">Vegetables</a>
                                </div>
                                <h2><a href="shop-product-right.html">Foster Farms Takeout Crispy Classic
                                        Buffalo Wings</a></h2>
                                <div class="product-rate-cover">
                                    <div class="product-rate d-inline-block">
                                        <div class="product-rating" style="width: 90%"></div>
                                    </div>
                                    <span class="font-small ml-5 text-muted"> (4.0)</span>
                                </div>
                                <div>
                                    <span class="font-small text-muted">By <a
                                            href="vendor-details-1.html">NestFood</a></span>
                                </div>
                                <div class="product-card-bottom">
                                    <div class="product-price">
                                        <span>$17.85</span>
                                        <span class="old-price">$19.8</span>
                                    </div>
                                    <div class="add-cart">
                                        <a class="add" href="shop-cart.html"><i
                                                class="fi-rs-shopping-cart mr-5"></i>Add </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--end product card-->
                    <div class="col-lg-1-5 col-md-4 col-12 col-sm-6">
                        <div class="product-cart-wrap mb-30">
                            <div class="product-img-action-wrap">
                                <div class="product-img product-img-zoom">
                                    <a href="shop-product-right.html">
                                        <img class="default-img" src="assets/imgs/shop/product-5-1.jpg"
                                            alt="" />
                                        <img class="hover-img" src="assets/imgs/shop/product-5-2.jpg" alt="" />
                                    </a>
                                </div>
                                <div class="product-action-1">
                                    <a aria-label="Add To Wishlist" class="action-btn"
                                        href="shop-wishlist.html"><i class="fi-rs-heart"></i></a>
                                    <a aria-label="Compare" class="action-btn" href="shop-compare.html"><i
                                            class="fi-rs-shuffle"></i></a>
                                    <a aria-label="Quick view" class="action-btn" data-bs-toggle="modal"
                                        data-bs-target="#quickViewModal"><i class="fi-rs-eye"></i></a>
                                </div>
                                <div class="product-badges product-badges-position product-badges-mrg">
                                    <span class="best">-14%</span>
                                </div>
                            </div>
                            <div class="product-content-wrap">
                                <div class="product-category">
                                    <a href="shop-grid-right.html">Pet Foods</a>
                                </div>
                                <h2><a href="shop-product-right.html">Blue Diamond Almonds Lightly Salted
                                        Vegetables</a></h2>
                                <div class="product-rate-cover">
                                    <div class="product-rate d-inline-block">
                                        <div class="product-rating" style="width: 90%"></div>
                                    </div>
                                    <span class="font-small ml-5 text-muted"> (4.0)</span>
                                </div>
                                <div>
                                    <span class="font-small text-muted">By <a
                                            href="vendor-details-1.html">NestFood</a></span>
                                </div>
                                <div class="product-card-bottom">
                                    <div class="product-price">
                                        <span>$23.85</span>
                                        <span class="old-price">$25.8</span>
                                    </div>
                                    <div class="add-cart">
                                        <a class="add" href="shop-cart.html"><i
                                                class="fi-rs-shopping-cart mr-5"></i>Add </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--end product card-->
                    <div class="col-lg-1-5 col-md-4 col-12 col-sm-6">
                        <div class="product-cart-wrap">
                            <div class="product-img-action-wrap">
                                <div class="product-img product-img-zoom">
                                    <a href="shop-product-right.html">
                                        <img class="default-img" src="assets/imgs/shop/product-6-1.jpg"
                                            alt="" />
                                        <img class="hover-img" src="assets/imgs/shop/product-6-2.jpg" alt="" />
                                    </a>
                                </div>
                                <div class="product-action-1">
                                    <a aria-label="Add To Wishlist" class="action-btn"
                                        href="shop-wishlist.html"><i class="fi-rs-heart"></i></a>
                                    <a aria-label="Compare" class="action-btn" href="shop-compare.html"><i
                                            class="fi-rs-shuffle"></i></a>
                                    <a aria-label="Quick view" class="action-btn" data-bs-toggle="modal"
                                        data-bs-target="#quickViewModal"><i class="fi-rs-eye"></i></a>
                                </div>
                            </div>
                            <div class="product-content-wrap">
                                <div class="product-category">
                                    <a href="shop-grid-right.html">Hodo Foods</a>
                                </div>
                                <h2><a href="shop-product-right.html">Chobani Complete Vanilla Greek Yogurt</a>
                                </h2>
                                <div class="product-rate-cover">
                                    <div class="product-rate d-inline-block">
                                        <div class="product-rating" style="width: 90%"></div>
                                    </div>
                                    <span class="font-small ml-5 text-muted"> (4.0)</span>
                                </div>
                                <div>
                                    <span class="font-small text-muted">By <a
                                            href="vendor-details-1.html">NestFood</a></span>
                                </div>
                                <div class="product-card-bottom">
                                    <div class="product-price">
                                        <span>$54.85</span>
                                        <span class="old-price">$55.8</span>
                                    </div>
                                    <div class="add-cart">
                                        <a class="add" href="shop-cart.html"><i
                                                class="fi-rs-shopping-cart mr-5"></i>Add </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--end product card-->
                    <div class="col-lg-1-5 col-md-4 col-12 col-sm-6">
                        <div class="product-cart-wrap">
                            <div class="product-img-action-wrap">
                                <div class="product-img product-img-zoom">
                                    <a href="shop-product-right.html">
                                        <img class="default-img" src="assets/imgs/shop/product-7-1.jpg"
                                            alt="" />
                                        <img class="hover-img" src="assets/imgs/shop/product-7-2.jpg" alt="" />
                                    </a>
                                </div>
                                <div class="product-action-1">
                                    <a aria-label="Add To Wishlist" class="action-btn"
                                        href="shop-wishlist.html"><i class="fi-rs-heart"></i></a>
                                    <a aria-label="Compare" class="action-btn" href="shop-compare.html"><i
                                            class="fi-rs-shuffle"></i></a>
                                    <a aria-label="Quick view" class="action-btn" data-bs-toggle="modal"
                                        data-bs-target="#quickViewModal"><i class="fi-rs-eye"></i></a>
                                </div>
                            </div>
                            <div class="product-content-wrap">
                                <div class="product-category">
                                    <a href="shop-grid-right.html">Meats</a>
                                </div>
                                <h2><a href="shop-product-right.html">Canada Dry Ginger Ale – 2 L Bottle - 200ml
                                        - 400g</a></h2>
                                <div class="product-rate-cover">
                                    <div class="product-rate d-inline-block">
                                        <div class="product-rating" style="width: 90%"></div>
                                    </div>
                                    <span class="font-small ml-5 text-muted"> (4.0)</span>
                                </div>
                                <div>
                                    <span class="font-small text-muted">By <a
                                            href="vendor-details-1.html">NestFood</a></span>
                                </div>
                                <div class="product-card-bottom">
                                    <div class="product-price">
                                        <span>$32.85</span>
                                        <span class="old-price">$33.8</span>
                                    </div>
                                    <div class="add-cart">
                                        <a class="add" href="shop-cart.html"><i
                                                class="fi-rs-shopping-cart mr-5"></i>Add </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--end product card-->
                    <div class="col-lg-1-5 col-md-4 col-12 col-sm-6">
                        <div class="product-cart-wrap">
                            <div class="product-img-action-wrap">
                                <div class="product-img product-img-zoom">
                                    <a href="shop-product-right.html">
                                        <img class="default-img" src="assets/imgs/shop/product-8-1.jpg"
                                            alt="" />
                                        <img class="hover-img" src="assets/imgs/shop/product-8-2.jpg" alt="" />
                                    </a>
                                </div>
                                <div class="product-action-1">
                                    <a aria-label="Add To Wishlist" class="action-btn"
                                        href="shop-wishlist.html"><i class="fi-rs-heart"></i></a>
                                    <a aria-label="Compare" class="action-btn" href="shop-compare.html"><i
                                            class="fi-rs-shuffle"></i></a>
                                    <a aria-label="Quick view" class="action-btn" data-bs-toggle="modal"
                                        data-bs-target="#quickViewModal"><i class="fi-rs-eye"></i></a>
                                </div>
                                <div class="product-badges product-badges-position product-badges-mrg">
                                    <span class="sale">Sale</span>
                                </div>
                            </div>
                            <div class="product-content-wrap">
                                <div class="product-category">
                                    <a href="shop-grid-right.html">Snack</a>
                                </div>
                                <h2><a href="shop-product-right.html">Encore Seafoods Stuffed Alaskan Salmon</a>
                                </h2>
                                <div class="product-rate-cover">
                                    <div class="product-rate d-inline-block">
                                        <div class="product-rating" style="width: 90%"></div>
                                    </div>
                                    <span class="font-small ml-5 text-muted"> (4.0)</span>
                                </div>
                                <div>
                                    <span class="font-small text-muted">By <a
                                            href="vendor-details-1.html">NestFood</a></span>
                                </div>
                                <div class="product-card-bottom">
                                    <div class="product-price">
                                        <span>$35.85</span>
                                        <span class="old-price">$37.8</span>
                                    </div>
                                    <div class="add-cart">
                                        <a class="add" href="shop-cart.html"><i
                                                class="fi-rs-shopping-cart mr-5"></i>Add </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--end product card-->
                    <div class="col-lg-1-5 col-md-4 col-12 col-sm-6">
                        <div class="product-cart-wrap">
                            <div class="product-img-action-wrap">
                                <div class="product-img product-img-zoom">
                                    <a href="shop-product-right.html">
                                        <img class="default-img" src="assets/imgs/shop/product-9-1.jpg"
                                            alt="" />
                                        <img class="hover-img" src="assets/imgs/shop/product-9-2.jpg" alt="" />
                                    </a>
                                </div>
                                <div class="product-action-1">
                                    <a aria-label="Add To Wishlist" class="action-btn"
                                        href="shop-wishlist.html"><i class="fi-rs-heart"></i></a>
                                    <a aria-label="Compare" class="action-btn" href="shop-compare.html"><i
                                            class="fi-rs-shuffle"></i></a>
                                    <a aria-label="Quick view" class="action-btn" data-bs-toggle="modal"
                                        data-bs-target="#quickViewModal"><i class="fi-rs-eye"></i></a>
                                </div>
                                <div class="product-badges product-badges-position product-badges-mrg">
                                    <span class="hot">Hot</span>
                                </div>
                            </div>
                            <div class="product-content-wrap">
                                <div class="product-category">
                                    <a href="shop-grid-right.html">Coffes</a>
                                </div>
                                <h2><a href="shop-product-right.html">Gorton’s Beer Battered Fish Fillets with
                                        soft paper</a></h2>
                                <div class="product-rate-cover">
                                    <div class="product-rate d-inline-block">
                                        <div class="product-rating" style="width: 90%"></div>
                                    </div>
                                    <span class="font-small ml-5 text-muted"> (4.0)</span>
                                </div>
                                <div>
                                    <span class="font-small text-muted">By <a href="vendor-details-1.html">Old
                                            El Paso</a></span>
                                </div>
                                <div class="product-card-bottom">
                                    <div class="product-price">
                                        <span>$23.85</span>
                                        <span class="old-price">$25.8</span>
                                    </div>
                                    <div class="add-cart">
                                        <a class="add" href="shop-cart.html"><i
                                                class="fi-rs-shopping-cart mr-5"></i>Add </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--end product card-->
                    <div class="col-lg-1-5 col-md-4 col-12 col-sm-6 d-none d-xl-block">
                        <div class="product-cart-wrap">
                            <div class="product-img-action-wrap">
                                <div class="product-img product-img-zoom">
                                    <a href="shop-product-right.html">
                                        <img class="default-img" src="assets/imgs/shop/product-10-1.jpg"
                                            alt="" />
                                        <img class="hover-img" src="assets/imgs/shop/product-10-2.jpg" alt="" />
                                    </a>
                                </div>
                                <div class="product-action-1">
                                    <a aria-label="Add To Wishlist" class="action-btn"
                                        href="shop-wishlist.html"><i class="fi-rs-heart"></i></a>
                                    <a aria-label="Compare" class="action-btn" href="shop-compare.html"><i
                                            class="fi-rs-shuffle"></i></a>
                                    <a aria-label="Quick view" class="action-btn" data-bs-toggle="modal"
                                        data-bs-target="#quickViewModal"><i class="fi-rs-eye"></i></a>
                                </div>
                            </div>
                            <div class="product-content-wrap">
                                <div class="product-category">
                                    <a href="shop-grid-right.html">Cream</a>
                                </div>
                                <h2><a href="shop-product-right.html">Haagen-Dazs Caramel Cone Ice Cream
                                        Ketchup</a></h2>
                                <div class="product-rate-cover">
                                    <div class="product-rate d-inline-block">
                                        <div class="product-rating" style="width: 50%"></div>
                                    </div>
                                    <span class="font-small ml-5 text-muted"> (2.0)</span>
                                </div>
                                <div>
                                    <span class="font-small text-muted">By <a
                                            href="vendor-details-1.html">Tyson</a></span>
                                </div>
                                <div class="product-card-bottom">
                                    <div class="product-price">
                                        <span>$22.85</span>
                                        <span class="old-price">$24.8</span>
                                    </div>
                                    <div class="add-cart">
                                        <a class="add" href="shop-cart.html"><i
                                                class="fi-rs-shopping-cart mr-5"></i>Add </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--end product card-->
                </div>
                <!--End product-grid-4-->
            </div>
            <!--En tab six-->
            <div class="tab-pane fade" id="tab-seven" role="tabpanel" aria-labelledby="tab-seven">
                <div class="row product-grid-4">
                    <div class="col-lg-1-5 col-md-4 col-12 col-sm-6">
                        <div class="product-cart-wrap mb-30">
                            <div class="product-img-action-wrap">
                                <div class="product-img product-img-zoom">
                                    <a href="shop-product-right.html">
                                        <img class="default-img" src="assets/imgs/shop/product-5-1.jpg"
                                            alt="" />
                                        <img class="hover-img" src="assets/imgs/shop/product-5-2.jpg" alt="" />
                                    </a>
                                </div>
                                <div class="product-action-1">
                                    <a aria-label="Add To Wishlist" class="action-btn"
                                        href="shop-wishlist.html"><i class="fi-rs-heart"></i></a>
                                    <a aria-label="Compare" class="action-btn" href="shop-compare.html"><i
                                            class="fi-rs-shuffle"></i></a>
                                    <a aria-label="Quick view" class="action-btn" data-bs-toggle="modal"
                                        data-bs-target="#quickViewModal"><i class="fi-rs-eye"></i></a>
                                </div>
                                <div class="product-badges product-badges-position product-badges-mrg">
                                    <span class="hot">Hot</span>
                                </div>
                            </div>
                            <div class="product-content-wrap">
                                <div class="product-category">
                                    <a href="shop-grid-right.html">Snack</a>
                                </div>
                                <h2><a href="shop-product-right.html">Seeds of Change Organic Quinoa, Brown, &
                                        Red Rice</a></h2>
                                <div class="product-rate-cover">
                                    <div class="product-rate d-inline-block">
                                        <div class="product-rating" style="width: 90%"></div>
                                    </div>
                                    <span class="font-small ml-5 text-muted"> (4.0)</span>
                                </div>
                                <div>
                                    <span class="font-small text-muted">By <a
                                            href="vendor-details-1.html">NestFood</a></span>
                                </div>
                                <div class="product-card-bottom">
                                    <div class="product-price">
                                        <span>$28.85</span>
                                        <span class="old-price">$32.8</span>
                                    </div>
                                    <div class="add-cart">
                                        <a class="add" href="shop-cart.html"><i
                                                class="fi-rs-shopping-cart mr-5"></i>Add </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--end product card-->
                    <div class="col-lg-1-5 col-md-4 col-12 col-sm-6">
                        <div class="product-cart-wrap mb-30">
                            <div class="product-img-action-wrap">
                                <div class="product-img product-img-zoom">
                                    <a href="shop-product-right.html">
                                        <img class="default-img" src="assets/imgs/shop/product-3-1.jpg"
                                            alt="" />
                                        <img class="hover-img" src="assets/imgs/shop/product-3-2.jpg" alt="" />
                                    </a>
                                </div>
                                <div class="product-action-1">
                                    <a aria-label="Add To Wishlist" class="action-btn"
                                        href="shop-wishlist.html"><i class="fi-rs-heart"></i></a>
                                    <a aria-label="Compare" class="action-btn" href="shop-compare.html"><i
                                            class="fi-rs-shuffle"></i></a>
                                    <a aria-label="Quick view" class="action-btn" data-bs-toggle="modal"
                                        data-bs-target="#quickViewModal"><i class="fi-rs-eye"></i></a>
                                </div>
                                <div class="product-badges product-badges-position product-badges-mrg">
                                    <span class="sale">Sale</span>
                                </div>
                            </div>
                            <div class="product-content-wrap">
                                <div class="product-category">
                                    <a href="shop-grid-right.html">Hodo Foods</a>
                                </div>
                                <h2><a href="shop-product-right.html">All Natural Italian-Style Chicken
                                        Meatballs</a></h2>
                                <div class="product-rate-cover">
                                    <div class="product-rate d-inline-block">
                                        <div class="product-rating" style="width: 80%"></div>
                                    </div>
                                    <span class="font-small ml-5 text-muted"> (3.5)</span>
                                </div>
                                <div>
                                    <span class="font-small text-muted">By <a
                                            href="vendor-details-1.html">Stouffer</a></span>
                                </div>
                                <div class="product-card-bottom">
                                    <div class="product-price">
                                        <span>$52.85</span>
                                        <span class="old-price">$55.8</span>
                                    </div>
                                    <div class="add-cart">
                                        <a class="add" href="shop-cart.html"><i
                                                class="fi-rs-shopping-cart mr-5"></i>Add </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--end product card-->
                    <div class="col-lg-1-5 col-md-4 col-12 col-sm-6">
                        <div class="product-cart-wrap mb-30">
                            <div class="product-img-action-wrap">
                                <div class="product-img product-img-zoom">
                                    <a href="shop-product-right.html">
                                        <img class="default-img" src="assets/imgs/shop/product-7-1.jpg"
                                            alt="" />
                                        <img class="hover-img" src="assets/imgs/shop/product-7-2.jpg" alt="" />
                                    </a>
                                </div>
                                <div class="product-action-1">
                                    <a aria-label="Add To Wishlist" class="action-btn"
                                        href="shop-wishlist.html"><i class="fi-rs-heart"></i></a>
                                    <a aria-label="Compare" class="action-btn" href="shop-compare.html"><i
                                            class="fi-rs-shuffle"></i></a>
                                    <a aria-label="Quick view" class="action-btn" data-bs-toggle="modal"
                                        data-bs-target="#quickViewModal"><i class="fi-rs-eye"></i></a>
                                </div>
                                <div class="product-badges product-badges-position product-badges-mrg">
                                    <span class="new">New</span>
                                </div>
                            </div>
                            <div class="product-content-wrap">
                                <div class="product-category">
                                    <a href="shop-grid-right.html">Snack</a>
                                </div>
                                <h2><a href="shop-product-right.html">Angie’s Boomchickapop Sweet & Salty Kettle
                                        Corn</a></h2>
                                <div class="product-rate-cover">
                                    <div class="product-rate d-inline-block">
                                        <div class="product-rating" style="width: 85%"></div>
                                    </div>
                                    <span class="font-small ml-5 text-muted"> (4.0)</span>
                                </div>
                                <div>
                                    <span class="font-small text-muted">By <a
                                            href="vendor-details-1.html">StarKist</a></span>
                                </div>
                                <div class="product-card-bottom">
                                    <div class="product-price">
                                        <span>$48.85</span>
                                        <span class="old-price">$52.8</span>
                                    </div>
                                    <div class="add-cart">
                                        <a class="add" href="shop-cart.html"><i
                                                class="fi-rs-shopping-cart mr-5"></i>Add </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--end product card-->
                    <div class="col-lg-1-5 col-md-4 col-12 col-sm-6">
                        <div class="product-cart-wrap mb-30">
                            <div class="product-img-action-wrap">
                                <div class="product-img product-img-zoom">
                                    <a href="shop-product-right.html">
                                        <img class="default-img" src="assets/imgs/shop/product-9-1.jpg"
                                            alt="" />
                                        <img class="hover-img" src="assets/imgs/shop/product-9-2.jpg" alt="" />
                                    </a>
                                </div>
                                <div class="product-action-1">
                                    <a aria-label="Add To Wishlist" class="action-btn"
                                        href="shop-wishlist.html"><i class="fi-rs-heart"></i></a>
                                    <a aria-label="Compare" class="action-btn" href="shop-compare.html"><i
                                            class="fi-rs-shuffle"></i></a>
                                    <a aria-label="Quick view" class="action-btn" data-bs-toggle="modal"
                                        data-bs-target="#quickViewModal"><i class="fi-rs-eye"></i></a>
                                </div>
                            </div>
                            <div class="product-content-wrap">
                                <div class="product-category">
                                    <a href="shop-grid-right.html">Vegetables</a>
                                </div>
                                <h2><a href="shop-product-right.html">Foster Farms Takeout Crispy Classic
                                        Buffalo Wings</a></h2>
                                <div class="product-rate-cover">
                                    <div class="product-rate d-inline-block">
                                        <div class="product-rating" style="width: 90%"></div>
                                    </div>
                                    <span class="font-small ml-5 text-muted"> (4.0)</span>
                                </div>
                                <div>
                                    <span class="font-small text-muted">By <a
                                            href="vendor-details-1.html">NestFood</a></span>
                                </div>
                                <div class="product-card-bottom">
                                    <div class="product-price">
                                        <span>$17.85</span>
                                        <span class="old-price">$19.8</span>
                                    </div>
                                    <div class="add-cart">
                                        <a class="add" href="shop-cart.html"><i
                                                class="fi-rs-shopping-cart mr-5"></i>Add </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--end product card-->
                    <div class="col-lg-1-5 col-md-4 col-12 col-sm-6">
                        <div class="product-cart-wrap mb-30">
                            <div class="product-img-action-wrap">
                                <div class="product-img product-img-zoom">
                                    <a href="shop-product-right.html">
                                        <img class="default-img" src="assets/imgs/shop/product-10-1.jpg"
                                            alt="" />
                                        <img class="hover-img" src="assets/imgs/shop/product-10-2.jpg" alt="" />
                                    </a>
                                </div>
                                <div class="product-action-1">
                                    <a aria-label="Add To Wishlist" class="action-btn"
                                        href="shop-wishlist.html"><i class="fi-rs-heart"></i></a>
                                    <a aria-label="Compare" class="action-btn" href="shop-compare.html"><i
                                            class="fi-rs-shuffle"></i></a>
                                    <a aria-label="Quick view" class="action-btn" data-bs-toggle="modal"
                                        data-bs-target="#quickViewModal"><i class="fi-rs-eye"></i></a>
                                </div>
                                <div class="product-badges product-badges-position product-badges-mrg">
                                    <span class="best">-14%</span>
                                </div>
                            </div>
                            <div class="product-content-wrap">
                                <div class="product-category">
                                    <a href="shop-grid-right.html">Pet Foods</a>
                                </div>
                                <h2><a href="shop-product-right.html">Blue Diamond Almonds Lightly Salted
                                        Vegetables</a></h2>
                                <div class="product-rate-cover">
                                    <div class="product-rate d-inline-block">
                                        <div class="product-rating" style="width: 90%"></div>
                                    </div>
                                    <span class="font-small ml-5 text-muted"> (4.0)</span>
                                </div>
                                <div>
                                    <span class="font-small text-muted">By <a
                                            href="vendor-details-1.html">NestFood</a></span>
                                </div>
                                <div class="product-card-bottom">
                                    <div class="product-price">
                                        <span>$23.85</span>
                                        <span class="old-price">$25.8</span>
                                    </div>
                                    <div class="add-cart">
                                        <a class="add" href="shop-cart.html"><i
                                                class="fi-rs-shopping-cart mr-5"></i>Add </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--end product card-->
                    <div class="col-lg-1-5 col-md-4 col-12 col-sm-6">
                        <div class="product-cart-wrap">
                            <div class="product-img-action-wrap">
                                <div class="product-img product-img-zoom">
                                    <a href="shop-product-right.html">
                                        <img class="default-img" src="assets/imgs/shop/product-16-1.jpg"
                                            alt="" />
                                        <img class="hover-img" src="assets/imgs/shop/product-16-2.jpg" alt="" />
                                    </a>
                                </div>
                                <div class="product-action-1">
                                    <a aria-label="Add To Wishlist" class="action-btn"
                                        href="shop-wishlist.html"><i class="fi-rs-heart"></i></a>
                                    <a aria-label="Compare" class="action-btn" href="shop-compare.html"><i
                                            class="fi-rs-shuffle"></i></a>
                                    <a aria-label="Quick view" class="action-btn" data-bs-toggle="modal"
                                        data-bs-target="#quickViewModal"><i class="fi-rs-eye"></i></a>
                                </div>
                            </div>
                            <div class="product-content-wrap">
                                <div class="product-category">
                                    <a href="shop-grid-right.html">Hodo Foods</a>
                                </div>
                                <h2><a href="shop-product-right.html">Chobani Complete Vanilla Greek Yogurt</a>
                                </h2>
                                <div class="product-rate-cover">
                                    <div class="product-rate d-inline-block">
                                        <div class="product-rating" style="width: 90%"></div>
                                    </div>
                                    <span class="font-small ml-5 text-muted"> (4.0)</span>
                                </div>
                                <div>
                                    <span class="font-small text-muted">By <a
                                            href="vendor-details-1.html">NestFood</a></span>
                                </div>
                                <div class="product-card-bottom">
                                    <div class="product-price">
                                        <span>$54.85</span>
                                        <span class="old-price">$55.8</span>
                                    </div>
                                    <div class="add-cart">
                                        <a class="add" href="shop-cart.html"><i
                                                class="fi-rs-shopping-cart mr-5"></i>Add </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--end product card-->
                    <div class="col-lg-1-5 col-md-4 col-12 col-sm-6">
                        <div class="product-cart-wrap">
                            <div class="product-img-action-wrap">
                                <div class="product-img product-img-zoom">
                                    <a href="shop-product-right.html">
                                        <img class="default-img" src="assets/imgs/shop/product-7-1.jpg"
                                            alt="" />
                                        <img class="hover-img" src="assets/imgs/shop/product-7-2.jpg" alt="" />
                                    </a>
                                </div>
                                <div class="product-action-1">
                                    <a aria-label="Add To Wishlist" class="action-btn"
                                        href="shop-wishlist.html"><i class="fi-rs-heart"></i></a>
                                    <a aria-label="Compare" class="action-btn" href="shop-compare.html"><i
                                            class="fi-rs-shuffle"></i></a>
                                    <a aria-label="Quick view" class="action-btn" data-bs-toggle="modal"
                                        data-bs-target="#quickViewModal"><i class="fi-rs-eye"></i></a>
                                </div>
                            </div>
                            <div class="product-content-wrap">
                                <div class="product-category">
                                    <a href="shop-grid-right.html">Meats</a>
                                </div>
                                <h2><a href="shop-product-right.html">Canada Dry Ginger Ale – 2 L Bottle - 200ml
                                        - 400g</a></h2>
                                <div class="product-rate-cover">
                                    <div class="product-rate d-inline-block">
                                        <div class="product-rating" style="width: 90%"></div>
                                    </div>
                                    <span class="font-small ml-5 text-muted"> (4.0)</span>
                                </div>
                                <div>
                                    <span class="font-small text-muted">By <a
                                            href="vendor-details-1.html">NestFood</a></span>
                                </div>
                                <div class="product-card-bottom">
                                    <div class="product-price">
                                        <span>$32.85</span>
                                        <span class="old-price">$33.8</span>
                                    </div>
                                    <div class="add-cart">
                                        <a class="add" href="shop-cart.html"><i
                                                class="fi-rs-shopping-cart mr-5"></i>Add </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--end product card-->
                    <div class="col-lg-1-5 col-md-4 col-12 col-sm-6">
                        <div class="product-cart-wrap">
                            <div class="product-img-action-wrap">
                                <div class="product-img product-img-zoom">
                                    <a href="shop-product-right.html">
                                        <img class="default-img" src="assets/imgs/shop/product-8-1.jpg"
                                            alt="" />
                                        <img class="hover-img" src="assets/imgs/shop/product-8-2.jpg" alt="" />
                                    </a>
                                </div>
                                <div class="product-action-1">
                                    <a aria-label="Add To Wishlist" class="action-btn"
                                        href="shop-wishlist.html"><i class="fi-rs-heart"></i></a>
                                    <a aria-label="Compare" class="action-btn" href="shop-compare.html"><i
                                            class="fi-rs-shuffle"></i></a>
                                    <a aria-label="Quick view" class="action-btn" data-bs-toggle="modal"
                                        data-bs-target="#quickViewModal"><i class="fi-rs-eye"></i></a>
                                </div>
                                <div class="product-badges product-badges-position product-badges-mrg">
                                    <span class="sale">Sale</span>
                                </div>
                            </div>
                            <div class="product-content-wrap">
                                <div class="product-category">
                                    <a href="shop-grid-right.html">Snack</a>
                                </div>
                                <h2><a href="shop-product-right.html">Encore Seafoods Stuffed Alaskan Salmon</a>
                                </h2>
                                <div class="product-rate-cover">
                                    <div class="product-rate d-inline-block">
                                        <div class="product-rating" style="width: 90%"></div>
                                    </div>
                                    <span class="font-small ml-5 text-muted"> (4.0)</span>
                                </div>
                                <div>
                                    <span class="font-small text-muted">By <a
                                            href="vendor-details-1.html">NestFood</a></span>
                                </div>
                                <div class="product-card-bottom">
                                    <div class="product-price">
                                        <span>$35.85</span>
                                        <span class="old-price">$37.8</span>
                                    </div>
                                    <div class="add-cart">
                                        <a class="add" href="shop-cart.html"><i
                                                class="fi-rs-shopping-cart mr-5"></i>Add </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--end product card-->
                    <div class="col-lg-1-5 col-md-4 col-12 col-sm-6">
                        <div class="product-cart-wrap">
                            <div class="product-img-action-wrap">
                                <div class="product-img product-img-zoom">
                                    <a href="shop-product-right.html">
                                        <img class="default-img" src="assets/imgs/shop/product-9-1.jpg"
                                            alt="" />
                                        <img class="hover-img" src="assets/imgs/shop/product-9-2.jpg" alt="" />
                                    </a>
                                </div>
                                <div class="product-action-1">
                                    <a aria-label="Add To Wishlist" class="action-btn"
                                        href="shop-wishlist.html"><i class="fi-rs-heart"></i></a>
                                    <a aria-label="Compare" class="action-btn" href="shop-compare.html"><i
                                            class="fi-rs-shuffle"></i></a>
                                    <a aria-label="Quick view" class="action-btn" data-bs-toggle="modal"
                                        data-bs-target="#quickViewModal"><i class="fi-rs-eye"></i></a>
                                </div>
                                <div class="product-badges product-badges-position product-badges-mrg">
                                    <span class="hot">Hot</span>
                                </div>
                            </div>
                            <div class="product-content-wrap">
                                <div class="product-category">
                                    <a href="shop-grid-right.html">Coffes</a>
                                </div>
                                <h2><a href="shop-product-right.html">Gorton’s Beer Battered Fish Fillets with
                                        soft paper</a></h2>
                                <div class="product-rate-cover">
                                    <div class="product-rate d-inline-block">
                                        <div class="product-rating" style="width: 90%"></div>
                                    </div>
                                    <span class="font-small ml-5 text-muted"> (4.0)</span>
                                </div>
                                <div>
                                    <span class="font-small text-muted">By <a href="vendor-details-1.html">Old
                                            El Paso</a></span>
                                </div>
                                <div class="product-card-bottom">
                                    <div class="product-price">
                                        <span>$23.85</span>
                                        <span class="old-price">$25.8</span>
                                    </div>
                                    <div class="add-cart">
                                        <a class="add" href="shop-cart.html"><i
                                                class="fi-rs-shopping-cart mr-5"></i>Add </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--end product card-->
                    <div class="col-lg-1-5 col-md-4 col-12 col-sm-6 d-none d-xl-block">
                        <div class="product-cart-wrap">
                            <div class="product-img-action-wrap">
                                <div class="product-img product-img-zoom">
                                    <a href="shop-product-right.html">
                                        <img class="default-img" src="assets/imgs/shop/product-10-1.jpg"
                                            alt="" />
                                        <img class="hover-img" src="assets/imgs/shop/product-10-2.jpg" alt="" />
                                    </a>
                                </div>
                                <div class="product-action-1">
                                    <a aria-label="Add To Wishlist" class="action-btn"
                                        href="shop-wishlist.html"><i class="fi-rs-heart"></i></a>
                                    <a aria-label="Compare" class="action-btn" href="shop-compare.html"><i
                                            class="fi-rs-shuffle"></i></a>
                                    <a aria-label="Quick view" class="action-btn" data-bs-toggle="modal"
                                        data-bs-target="#quickViewModal"><i class="fi-rs-eye"></i></a>
                                </div>
                            </div>
                            <div class="product-content-wrap">
                                <div class="product-category">
                                    <a href="shop-grid-right.html">Cream</a>
                                </div>
                                <h2><a href="shop-product-right.html">Haagen-Dazs Caramel Cone Ice Cream
                                        Ketchup</a></h2>
                                <div class="product-rate-cover">
                                    <div class="product-rate d-inline-block">
                                        <div class="product-rating" style="width: 50%"></div>
                                    </div>
                                    <span class="font-small ml-5 text-muted"> (2.0)</span>
                                </div>
                                <div>
                                    <span class="font-small text-muted">By <a
                                            href="vendor-details-1.html">Tyson</a></span>
                                </div>
                                <div class="product-card-bottom">
                                    <div class="product-price">
                                        <span>$22.85</span>
                                        <span class="old-price">$24.8</span>
                                    </div>
                                    <div class="add-cart">
                                        <a class="add" href="shop-cart.html"><i
                                                class="fi-rs-shopping-cart mr-5"></i>Add </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--end product card-->
                </div>
                <!--End product-grid-4-->
            </div>
            <!--En tab seven-->
        </div>
        <!--End tab-content-->
    </div>
</section>

</main>
<footer class="main">
    <section class="newsletter mb-15">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="position-relative newsletter-inner">
                        <div class="newsletter-content">
                            <h2 class="mb-20">
                                Stay home & get your daily <br />
                                needs from our shop
                            </h2>
                            <p class="mb-45">Start You'r Daily Shopping with <span class="text-brand">Nest Mart</span></p>
                            <form class="form-subcriber d-flex">
                                <input type="email" placeholder="Your emaill address" />
                                <button class="btn" type="submit">Subscribe</button>
                            </form>
                        </div>
                        <img src="{{ asset('assets/imgs/banner/banner-9.png') }}" alt="newsletter" />
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="featured section-padding">
        <div class="container">
            <div class="row">
                <div class="col-lg-1-5 col-md-4 col-12 col-sm-6 mb-md-4 mb-xl-0">
                    <div class="banner-left-icon d-flex align-items-center wow fadeIn animated">
                        <div class="banner-icon">
                            <img src="{{ asset('assets/imgs/theme/icons/icon-1.svg') }}" alt="" />
                        </div>
                        <div class="banner-text">
                            <h3 class="icon-box-title">Best prices & offers</h3>
                            <p>Orders $50 or more</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-1-5 col-md-4 col-12 col-sm-6">
                    <div class="banner-left-icon d-flex align-items-center wow fadeIn animated">
                        <div class="banner-icon">
                            <img src="{{ asset('assets/imgs/theme/icons/icon-2.svg') }}" alt="" />
                        </div>
                        <div class="banner-text">
                            <h3 class="icon-box-title">Free delivery</h3>
                            <p>24/7 amazing services</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-1-5 col-md-4 col-12 col-sm-6">
                    <div class="banner-left-icon d-flex align-items-center wow fadeIn animated">
                        <div class="banner-icon">
                            <img src="{{ asset('assets/imgs/theme/icons/icon-3.svg') }}" alt="" />
                        </div>
                        <div class="banner-text">
                            <h3 class="icon-box-title">Great daily deal</h3>
                            <p>When you sign up</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-1-5 col-md-4 col-12 col-sm-6">
                    <div class="banner-left-icon d-flex align-items-center wow fadeIn animated">
                        <div class="banner-icon">
                            <img src="{{ asset('assets/imgs/theme/icons/icon-4.svg') }}" alt="" />
                        </div>
                        <div class="banner-text">
                            <h3 class="icon-box-title">Wide assortment</h3>
                            <p>Mega Discounts</p>
                        </div>
                    </div>
                </div>
                
                <div class="col-lg-1-5 col-md-4 col-12 col-sm-6 d-xl-none">
                    <div class="banner-left-icon d-flex align-items-center wow fadeIn animated">
                        <div class="banner-icon">
                            <img src="{{ asset('assets/imgs/theme/icons/icon-6.svg') }}" alt="" />
                        </div>
                        <div class="banner-text">
                            <h3 class="icon-box-title">Safe delivery</h3>
                            <p>Within 30 days</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="section-padding footer-mid">
        <div class="container pt-15 pb-20">
            <div class="row">
                <div class="col">
                    <div class="widget-about font-md mb-md-3 mb-lg-3 mb-xl-0">
                        <div class="logo mb-30">
                            <a href="index.html" class="mb-15"><img src="{{ asset('assets/imgs/theme/logo.svg') }}" alt="logo" /></a>
                            <p class="font-lg text-heading">Awesome grocery store website template</p>
                        </div>
                        <ul class="contact-infor">
                            <li><img src="assets/imgs/theme/icons/icon-location.svg" alt="" /><strong>Address: </strong> <span>5171 W Campbell Ave undefined Kent, Utah 53127 United States</span></li>
                            <li><img src="{{ asset('assets/imgs/theme/icons/icon-contact.svg') }}" alt="" /><strong>Call Us:</strong><span>(+91) - 540-025-124553</span></li>
                            <li><img src="{{ asset('assets/imgs/theme/icons/icon-email-2.svg') }}" alt="" /><strong>Email:</strong><span>sale@Nest.com</span></li>
                            <li><img src="{{ asset('assets/imgs/theme/icons/icon-clock.svg') }}" alt="" /><strong>Hours:</strong><span>10:00 - 18:00, Mon - Sat</span></li>
                        </ul>
                    </div>
                </div>
                <div class="footer-link-widget col">
                    <h4 class="widget-title">Company</h4>
                    <ul class="footer-list mb-sm-5 mb-md-0">
                        <li><a href="#">About Us</a></li>
                        <li><a href="#">Delivery Information</a></li>
                        <li><a href="#">Privacy Policy</a></li>
                        <li><a href="#">Terms &amp; Conditions</a></li>
                        <li><a href="#">Contact Us</a></li>
                        <li><a href="#">Support Center</a></li>
                        <li><a href="#">Careers</a></li>
                    </ul>
                </div>
                <div class="footer-link-widget col">
                    <h4 class="widget-title">Account</h4>
                    <ul class="footer-list mb-sm-5 mb-md-0">
                        <li><a href="#">Sign In</a></li>
                        <li><a href="#">View Cart</a></li>
                        <li><a href="#">My Wishlist</a></li>
                        <li><a href="#">Track My Order</a></li>
                        <li><a href="#">Help Ticket</a></li>
                        <li><a href="#">Shipping Details</a></li>
                        <li><a href="#">Compare products</a></li>
                    </ul>
                </div>
                <div class="footer-link-widget col">
                    <h4 class="widget-title">Corporate</h4>
                    <ul class="footer-list mb-sm-5 mb-md-0">
                        <li><a href="#">Become a Vendor</a></li>
                        <li><a href="#">Affiliate Program</a></li>
                        <li><a href="#">Farm Business</a></li>
                        <li><a href="#">Farm Careers</a></li>
                        <li><a href="#">Our Suppliers</a></li>
                        <li><a href="#">Accessibility</a></li>
                        <li><a href="#">Promotions</a></li>
                    </ul>
                </div>
                <div class="footer-link-widget col">
                    <h4 class="widget-title">Popular</h4>
                    <ul class="footer-list mb-sm-5 mb-md-0">
                        <li><a href="#">Milk & Flavoured Milk</a></li>
                        <li><a href="#">Butter and Margarine</a></li>
                        <li><a href="#">Eggs Substitutes</a></li>
                        <li><a href="#">Marmalades</a></li>
                        <li><a href="#">Sour Cream and Dips</a></li>
                        <li><a href="#">Tea & Kombucha</a></li>
                        <li><a href="#">Cheese</a></li>
                    </ul>
                </div>
                <div class="footer-link-widget widget-install-app col">
                    <h4 class="widget-title">Install App</h4>
                    <p class="wow fadeIn animated">From App Store or Google Play</p>
                    <div class="download-app">
                        <a href="#" class="hover-up mb-sm-2 mb-lg-0"><img class="active" src="{{ asset('assets/imgs/theme/app-store.jpg') }}" alt="" /></a>
                        <a href="#" class="hover-up mb-sm-2"><img src="{{ asset('assets/imgs/theme/google-play.jpg') }}" alt="" /></a>
                    </div>
                    <p class="mb-20">Secured Payment Gateways</p>
                    <img class="wow fadeIn animated" src="{{ asset('assets/imgs/theme/payment-method.png') }}" alt="" />
                </div>
            </div>
        </div>
    </section>
</footer>
<!-- Preloader Start -->
<div id="preloader-active">
    <div class="preloader d-flex align-items-center justify-content-center">
        <div class="preloader-inner position-relative">
            <div class="text-center">
                <img src="{{ asset('assets/imgs/theme/loading.gif') }}" alt="" />
            </div>
        </div>
    </div>
</div>
</body>
<!-- Vendor JS-->
<script src="{{ asset('assets/js/vendor/modernizr-3.6.0.min.js') }}"></script>
<script src="{{ asset('assets/js/vendor/jquery-3.6.0.min.js') }}"></script>
<script src="{{ asset('assets/js/vendor/jquery-migrate-3.3.0.min.js') }}"></script>
<script src="{{ asset('assets/js/vendor/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('assets/js/plugins/slick.js') }}"></script>
<script src="{{ asset('assets/js/plugins/jquery.syotimer.min.js') }}"></script>
<script src="{{ asset('assets/js/plugins/waypoints.js') }}"></script>
<script src="{{ asset('assets/js/plugins/wow.js') }}"></script>
<script src="{{ asset('assets/js/plugins/perfect-scrollbar.js') }}"></script>
<script src="{{ asset('assets/js/plugins/magnific-popup.js') }}"></script>
<script src="{{ asset('assets/js/plugins/select2.min.js') }}"></script>
<script src="{{ asset('assets/js/plugins/counterup.js') }}"></script>
<script src="{{ asset('assets/js/plugins/jquery.countdown.min.js') }}"></script>
<script src="{{ asset('assets/js/plugins/images-loaded.js') }}"></script>
<script src="{{ asset('assets/js/plugins/isotope.js') }}"></script>
<script src="{{ asset('assets/js/plugins/scrollup.js') }}"></script>
<script src="{{ asset('assets/js/plugins/jquery.vticker-min.js') }}"></script>
<script src="{{ asset('assets/js/plugins/jquery.theia.sticky.js') }}"></script>
<script src="{{ asset('assets/js/plugins/jquery.elevatezoom.js') }}"></script>
<!-- Template  JS -->
<script src="{{ asset('assets/js/main.js?v=6.0') }}"></script>
<script src="{{ asset('assets/js/shop.js?v=6.0') }}"></script>
<script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>

  <script>
    $(document).ready(function() {
    $('#categoryFilter').change(function() {
        $(this).closest('form').submit(); 
    });
});

    document.addEventListener('DOMContentLoaded', function(){
    console.log('DOMContentLoaded')
    document.querySelector('.upload_button').addEventListener('click',function(e){
    console.log('clicked')
    e.preventDefault();
    document.getElementById('file').click();
    })

});  
</script>

</html>
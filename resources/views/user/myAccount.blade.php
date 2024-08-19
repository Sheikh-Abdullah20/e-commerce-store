<!DOCTYPE html>
<html class="no-js" lang="en">

<head>
<meta charset="utf-8" />
<title>Product - Account</title>
<meta http-equiv="x-ua-compatible" content="ie=edge" />
<meta name="description" content="" />
<meta name="viewport" content="width=device-width, initial-scale=1" />
<meta property="og:title" content="" />
<meta property="og:type" content="" />
<meta property="og:url" content="" />
<meta property="og:image" content="" />
<!-- Favicon -->
<link rel="shortcut icon" type="image/x-icon" href="{{ asset('assets/imgs/theme/favicon.svg') }}" />
<!-- Template CSS -->

<link rel="stylesheet" href="{{ asset('assets/css/main.css?v=6.0') }}" />
</head>

<body>
<!-- Quick view -->

<header class="header-area header-style-1 header-height-2">
<div class="mobile-promotion">
<span>Grand opening, <strong>up to 15%</strong> off all items. Only <strong>3 days</strong> left</span>
</div>

</header>
<div class="mobile-header-active mobile-header-wrapper-style">
<div class="mobile-header-wrapper-inner">
<div class="mobile-header-top">
<div class="mobile-header-logo">
<a href="index.html"><img src="assets/imgs/theme/logo.svg" alt="logo" /></a>
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
<form action="#">
    <input type="text" placeholder="Search for items…" />
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
{{-- main --}}

<main class="main pages">
<div class="page-header breadcrumb-wrap">
<div class="container">
<div class="breadcrumb">
<a href="{{ route('home') }}" rel="nofollow"><i class="fi-rs-home mr-5"></i>Home</a>
<span></span> Pages <span></span> My Account
</div>
</div>
</div>
<div class="page-content pt-150 pb-150">
<div class="container">
<div class="row">
<div class="col-lg-10 m-auto">
    <div class="row">
        <div class="col-md-3">
            <div class="dashboard-menu">
                <ul class="nav flex-column" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" id="dashboard-tab" data-bs-toggle="tab"
                            href="#dashboard" role="tab" aria-controls="dashboard"
                            aria-selected="false"><i
                                class="fi-rs-settings-sliders mr-10"></i>Dashboard</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" id="account-detail-tab" data-bs-toggle="tab"
                            href="#account-detail" role="tab" aria-controls="account-detail"
                            aria-selected="true"><i class="fi-rs-user mr-10"></i>Account details</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" id="account-detail-tab" data-bs-toggle="tab"
                            href="#edit-password" role="tab" aria-controls="account-detail"
                            aria-selected="true"><i class="fi-rs-user mr-10"></i>Edit Password</a>
                    </li>

                    <li class="nav-item">
                        <form action="{{ route('logout') }}" method="POST">
                            @csrf
                            <button type='submit' class="nav-link w-100 text-dark"
                                href="page-login.html"><i
                                    class="fi-rs-sign-out mr-10"></i>Logout</button>
                        </form>
                    </li>
                </ul>
            </div>
        </div>
        <div class="col-md-9">
            <div class="tab-content account dashboard-content pl-50">
                <div class="tab-pane fade active show" id="dashboard" role="tabpanel"
                    aria-labelledby="dashboard-tab">
                    <div class="card">

                        <div class="card-body">
                            <div class="row">
                                <div
                                    class="col-md-6 d-flex justify-content-center align-items-center">
                                    <h4 class="mb-0">Hello {{ Auth::user()->name }}</h4>
                                </div>
                                <div
                                    class="col-md-6 d-flex justify-content-center align-items-center  my-3">
                                    <figure class="text-lg-center">
                                        @isset($user->profile)
                                        <img class="img-lg mb-3 img-avatar" id="img"
                                            src="{{ asset('storage/'. $user->profile) }}"
                                            alt="User Photo"
                                            style="width: 200px; clip-path: circle();" />
                                        @else
                                        <img class="img-lg mb-3 img-avatar" id="img"
                                            src="{{ asset('images/Add_image2.jpg') }}"
                                            alt="User Photo" />
                                        @endisset
                                    </figure>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>


                <div class="tab-pane fade" id="account-detail" role="tabpanel"
                    aria-labelledby="account-detail-tab">
                    <div class="card">
                        <div class="card-body">

                            <div class="row">
                                <div
                                    class="col-md-6 d-flex justify-content-center align-items-center">
                                    <h4>Edit Details</h4>
                                </div>
                                <div class="col-md-6 d-flex justify-content-center align-items-center my-3">
                                    <figure class="text-lg-center">
                                        @isset($user->profile)
                                        <img class="img-lg mb-3 img-avatar" id="image"
                                            src="{{ asset('storage/'. $user->profile) }}"
                                            alt="User Photo"
                                            style="width: 200px; clip-path: circle();" />
                                        @else
                                        <img class="img-lg mb-3 img-avatar" id="image"
                                            src="{{ asset('images/Add_image2.jpg') }}"
                                            alt="User Photo" />
                                        @endisset
                                        <figcaption class="text-center">
                                            <button id="upload_button"
                                                class="btn btn-light rounded font-md text-center text-dark"> <i
                                                    class="icons material-icons md-backup font-md"></i>
                                                Change </button>
                                        </figcaption>
                                    </figure>
                                </div>
                            </div>

                            <form method="POST" action="{{ route('update.profile') }}"
                                enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <div class="row">
                                    <div class="form-group col-md-12">
                                        <label>Display Name <span class="required"></span></label>
                                        <input class="form-control" name="name" type="text"
                                            value="{{ $user->name }}" />
                                        @error('name')
                                        <span class="text-danger">
                                            {{ $message }}
                                        </span>
                                        @enderror
                                    </div>
                                    <div class="form-group col-md-12">
                                        <label>Email Address <span class="required"></span></label>
                                        <input class="form-control" name="email" type="email"
                                            value="{{ $user->email }}" />
                                        @error('email')
                                        <span class="text-danger">
                                            {{ $message }}
                                        </span>
                                        @enderror
                                    </div>

                                    {{-- <div class="form-group col-md-12">
                                        <label>Password <span class="required"></span></label>
                                        <input class="form-control" name="password"
                                            type="password" />
                                        @error('password')
                                        <span class="text-danger">
                                            {{ $message }}
                                        </span>
                                        @enderror
                                    </div>

                                    <div class="form-group col-md-12">
                                        <label>Confirm Password <span
                                                class="required"></span></label>
                                        <input class="form-control" name="password_confirmation"
                                            type="password" />
                                        @error('password_confirmation')
                                        <span class="text-danger">
                                            {{ $message }}
                                        </span>
                                        @enderror
                                    </div> --}}

                                    <input type="file" hidden
                                        onchange="document.getElementById('image').src=window.URL.createObjectURL(this.files[0])"
                                        name="profile" id="file">
                                    </figure>


                                    <div class="col-md-12">
                                        <button type="submit"
                                            class="btn btn-fill-out submit fw-bold text-dark"
                                            name="submit" value="Submit">Save Change</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>


                </div>


                <div class="tab-pane fade" id="edit-password" role="tabpanel"
                    aria-labelledby="edit-password-tab">
                    <div class="card">
                        <div class="card-header">
                            <div class="row">
                                <div
                                    class="col-md-6  d-flex jutify-content-center align-items-center">
                                    <h2>Edit Password</h2>
                                </div>
                            </div>

                        </div>
                        <div class="card-body">
                            <form method="POST" action="{{ route('update.password') }}">
                                @csrf
                                @method('PUT')
                                <div class="row">

                                    <div class="form-group col-md-12">
                                        <label>Current Password <span
                                                class="required"></span></label>
                                        <input class="form-control" name="current_password"
                                            type="password" />
                                        @error('current_password')
                                        <span class="text-danger">
                                            {{ $message }}
                                        </span>
                                        @enderror
                                    </div>

                                    <div class="form-group col-md-12">
                                        <label>Password <span class="required"></span></label>
                                        <input class="form-control" name="password"
                                            type="password" />
                                        @error('new_password')
                                        <span class="text-danger">
                                            {{ $message }}
                                        </span>
                                        @enderror
                                    </div>

                                    <div class="form-group col-md-12">
                                        <label>Confirm Password <span
                                                class="required"></span></label>
                                        <input class="form-control" name="password_confirmation"
                                            type="password" />
                                        @error('password_confirmation')
                                        <span class="text-danger">
                                            {{ $message }}
                                        </span>
                                        @enderror
                                    </div>

                                    <input type="file" hidden
                                        onchange="document.getElementById('image').src=window.URL.createObjectURL(this.files[0])"
                                        name="profile" id="file">
                                    </figure>


                                    <div class="col-md-12">
                                        <button type="submit"
                                            class="btn btn-fill-out submit fw-bold text-dark"
                                            name="submit" value="Submit">Save Change</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>


                </div>
            </div>
        </div>
    </div>
</div>
</div>
</div>
</div>
</main>

{{-- main --}}

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
            <p class="mb-45">Start You'r Daily Shopping with <span class="text-brand">Nest
                    Mart</span></p>
                    <form class="form-subcriber d-flex" action="{{ route('subscription.mail') }}" method="POST"> 
                        @csrf
                        <input type="email" placeholder="Your emaill address" name="subsriptionMail" />
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
<div class="col-lg-1-5 col-md-4 col-12 col-sm-6">
    <div class="banner-left-icon d-flex align-items-center wow fadeIn animated">
        <div class="banner-icon">
            <img src="a{{ asset('ssets/imgs/theme/icons/icon-5.svg') }}" alt="" />
        </div>
        <div class="banner-text">
            <h3 class="icon-box-title">Easy returns</h3>
            <p>Within 30 days</p>
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
            <a href="index.html" class="mb-15"><img src="{{ asset('assets/imgs/theme/logo.svg') }}"
                    alt="logo" /></a>
            <p class="font-lg text-heading">Awesome grocery store website template</p>
        </div>
        <ul class="contact-infor">
            <li><img src="assets/imgs/theme/icons/icon-location.svg" alt="" /><strong>Address:
                </strong> <span>5171 W Campbell Ave undefined Kent, Utah 53127 United States</span>
            </li>
            <li><img src="{{ asset('assets/imgs/theme/icons/icon-contact.svg') }}"
                    alt="" /><strong>Call Us:</strong><span>(+91) - 540-025-124553</span></li>
            <li><img src="{{ asset('assets/imgs/theme/icons/icon-email-2.svg') }}"
                    alt="" /><strong>Email:</strong><span>sale@Nest.com</span></li>
            <li><img src="{{ asset('assets/imgs/theme/icons/icon-clock.svg') }}"
                    alt="" /><strong>Hours:</strong><span>10:00 - 18:00, Mon - Sat</span></li>
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
        <a href="#" class="hover-up mb-sm-2 mb-lg-0"><img class="active"
                src="{{ asset('assets/imgs/theme/app-store.jpg') }}" alt="" /></a>
        <a href="#" class="hover-up mb-sm-2"><img
                src="{{ asset('assets/imgs/theme/google-play.jpg') }}" alt="" /></a>
    </div>
    <p class="mb-20">Secured Payment Gateways</p>
    <img class="wow fadeIn animated" src="{{ asset('assets/imgs/theme/payment-method.png') }}"
        alt="" />
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
document.getElementById('upload_button').addEventListener('click',function(e){
console.log('clicked')
e.preventDefault();
document.getElementById('file').click();
});  
</script>

</html>
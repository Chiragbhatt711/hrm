<!DOCTYPE html>
<html lang="en" class="no-js">

<head>
    <title>HR Hub Services</title>

    <!-- Meta -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="keywords" content="Bootstrap Theme, Freebies, UI Kit, MIT license">
    <meta name="description" content="Bootstrap 4 Template by WebThemez">
    <meta name="author" content="webthemez.com">

    <!-- Favicon -->
    <link rel="shortcut icon" href="favicon.ico" type="image/x-icon">

    <!-- Styles -->
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/home/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" />
    {{--  <link rel="stylesheet" type="text/css" href="{{ asset('assets/home/css/fontawesome-all.min.css') }}">  --}}
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/home/css/slick.css') }}">
    <link href="{{ asset('assets/home/css/ace-responsive-menu.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets/home/css/aos.css') }}" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/home/css/theme.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/home/css/styles.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/home/css/saas_main.css') }}">

</head>

<body>
    <div class="hidden-xs hidden-sm nav-top bg-primary py-2">
        <div class="container">
            <div class="row">
                <div class="col-sm-6">
                    <div class="nav-top-contact">
                        <!-- Social links -->
                        <ul class="list-inline text-center text-md-left mb-0">
                            <li class="list-inline-item mx-2"><i class="fa fa-phone"></i> +91 7984322008</li>
                            <li class="list-inline-item mx-2"><i class="fa fa-envelope" aria-hidden="true"></i>
                                contactus@rudratechnovation.com</li>
                        </ul>
                    </div>
                </div>
                <div class="col-sm-6 text-right">
                    <ul class="list-inline text-center text-md-right mb-0">
                        <li class="list-inline-item mx-2" data-toggle="tooltip" data-placement="top" title="Facebook">
                            <a target="_blank" href="#">
                                <i class="fab fa-facebook"></i>
                            </a>
                        </li>
                        <li class="list-inline-item mx-2" data-toggle="tooltip" data-placement="top" title="Instagram">
                            <a target="_blank" href="#">
                                <i class="fab fa-instagram"></i>
                            </a>
                        </li>
                        <li class="list-inline-item mx-2" data-toggle="tooltip" data-placement="top" title="Twitter">
                            <a target="_blank" href="#">
                                <i class="fab fa-twitter"></i>
                            </a>
                        </li>

                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!-- Header -->
    <header class="main-header">
        <div class="container">
            <div class="logo">
                <img src="https://hrhubservices.com/assets/img/HR1.png" width="220" height="85">
            </div>
            <!-- Navbar -->
            <nav class="mainNav">
                <!-- Menu Toggle btn-->
                <div class="menu-toggle">
                    <h3>Menu</h3>
                    <button type="button" id="menu-btn">
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                </div>
                <!-- Responsive Menu Structure-->
                <!--Note: declare the Menu style in the data-menu-style="horizontal" (options: horizontal, vertical, accordion) -->
                <ul id="respMenu" class="ace-responsive-menu" data-menu-style="horizontal">
                    <li class="nav-item">
                        <a href="index.html" class="active">
                            <span class="title">Home</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="#services">
                            <span class="title">Services</span>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a href="#pricing">
                            <span class="title">Price</span>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a href="contact.html">
                            <span class="title">Contact Us</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('login') }}">
                            <span class="title">Login</span>
                        </a>
                    </li>
                </ul>
            </nav>
        </div>
    </header>
    <!-- End Navbar -->
    <section class="wt-section hero-large position-relative overflow-hidden mt-md-2">
        <div class="hero-img bg-overlay" data-overlay="0"
            style="background-image: url(assets/home/img/banner-1.png);" data-aos="fade-right"
            data-aos-easing="linear" data-aos-delay="50"></div>
        <div class="container">
            <div class="row align-items-center my-5">
                <div class="col-md-6 py-5" data-aos="fade-left" data-aos-easing="linear" data-aos-delay="100">
                    <!-- heading -->
                    <h1 class="text-uppercase mb-3 display-4 font-weight-bolder">
                        Grow Your Business together
                    </h1>
                    <p class="mb-4 h5">Let us handle your Compliances.</br> Get Freedom & Be Focused </p>
                    <div class=" mb-0">
                        <a href="http://hrhubservices.com/contact.html"
                            class="btn btn-pill btn-primary mr-3 mb-md-0 mb-3">
                            Quick Contact
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End Header -->

    <main role="main">
        <section id="services" class="wt-section">
            <div class="container">
                <div class="row justify-content-md-center text-center pb-lg-4 mb-lg-5 mb-4">
                    <div class="col-md-8 text-center w-md-50 mx-auto mb-0 ">
                        <h2 class="mb-md-2">Our Services</h2>
                        <!--  <p class="lead text-muted">Lorem ipsum dolor sit amet, consectetur adipiscing elit sed do eiusmod.

</p> -->
                    </div>
                </div>
                <div class="row">

                    <div class="col-md-4">
                        <div class="bg-white p-4 mb-4 text-center border rounded-md py-5" data-aos="fade-up"
                            data-aos-easing="linear" data-aos-delay="200">
                            <div class="mb-4"><img src="assets/img/services/3.svg" width="80px"
                                    alt="" /></div>
                            <h5 class="mb-2">Attendance Management</h5>
                            <p class="text-muted">Track employee attendance effortlessly with detailed reports and
                                real-time tracking.</p>
                        </div>

                    </div>
                    <div class="col-md-4">
                        <div class="bg-white p-4 mb-4 text-center border rounded-md py-5" data-aos="fade-up"
                            data-aos-easing="linear" data-aos-delay="50">
                            <div class="mb-4"><img src="assets/img/services/1.svg" width="80px"
                                    alt="" /></div>
                            <h5 class="mb-2">Employee Management</h5>
                            <p class="text-muted">Manage employee information, records, and profiles in a centralized
                                space.</p>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="bg-white p-4 mb-4 text-center border rounded-md py-5" data-aos="fade-up"
                            data-aos-easing="linear" data-aos-delay="150">
                            <div class="mb-4"><img src="assets/img/services/2.svg" width="80px"
                                    alt="" /></div>
                            <h5 class="mb-2">Payroll Management</h5>
                            <p class="text-muted">Simplify payroll processing with automated calculations and salary
                                disbursements.</p>
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="bg-white p-4 mb-4 text-center border rounded-md py-5" data-aos="fade-up"
                            data-aos-easing="linear" data-aos-delay="200">
                            <div class="mb-4"><img src="assets/img/services/3.svg" width="80px"
                                    alt="" /></div>
                            <h5 class="mb-2">Employee Salary Management</h5>
                            <p class="text-muted">Handle salary details, bonuses, deductions, and salary slips
                                efficiently. </p>
                        </div>

                    </div>
                    <div class="col-md-4">
                        <div class="bg-white p-4 mb-4 text-center border rounded-md py-5" data-aos="fade-up"
                            data-aos-easing="linear" data-aos-delay="50">
                            <div class="mb-4"><img src="assets/img/services/1.svg" width="80px"
                                    alt="" /></div>
                            <h5 class="mb-2">Leave Management</h5>
                            <p class="text-muted">Manage employee leave requests and approvals seamlessly.</p>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="bg-white p-4 mb-4 text-center border rounded-md py-5" data-aos="fade-up"
                            data-aos-easing="linear" data-aos-delay="150">
                            <div class="mb-4"><img src="assets/img/services/2.svg" width="80px"
                                    alt="" /></div>
                            <h5 class="mb-2">Holidays Management</h5>
                            <p class="text-muted">Set and manage company-wide holidays and schedules with ease.</p>
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="bg-white p-4 mb-4 text-center border rounded-md py-5" data-aos="fade-up"
                            data-aos-easing="linear" data-aos-delay="200">
                            <div class="mb-4"><img src="assets/img/services/3.svg" width="80px"
                                    alt="" /></div>
                            <h5 class="mb-2">Performance Management</h5>
                            <p class="text-muted">Track and evaluate employee performance with customizable KPIs and
                                reports.</p>
                        </div>

                    </div>
                    <div class="col-md-4">
                        <div class="bg-white p-4 mb-4 text-center border rounded-md py-5" data-aos="fade-up"
                            data-aos-easing="linear" data-aos-delay="150">
                            <div class="mb-4"><img src="assets/img/services/2.svg" width="80px"
                                    alt="" /></div>
                            <h5 class="mb-2">Training Management</h5>
                            <p class="text-muted">Organize and track employee training programs and progress.</p>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="bg-white p-4 mb-4 text-center border rounded-md py-5" data-aos="fade-up"
                            data-aos-easing="linear" data-aos-delay="150">
                            <div class="mb-4">
                                <img src="assets/img/services/2.svg" width="80px" alt="" />
                            </div>
                            <h5 class="mb-2">Role and Permission Management</h5>
                            <p class="text-muted">Define user roles and control access permissions for different
                                modules and features to ensure data security and user accountability.</p>
                        </div>
                    </div>
                </div>
        </section>

        <!-- Start Pricing Table Area -->
        <section id="pricing" class="pricing-table section">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="section-title">
                            <h3 class="wow zoomIn" data-wow-delay=".2s">Pricing</h3>
                            <h2 class="wow fadeInUp" data-wow-delay=".4s">Pricing Plan</h2>
                            <p class="wow fadeInUp" data-wow-delay=".6s">The HR Hub offers a range of valuable
                                features to enhance the company experience:</p>
                        </div>
                    </div>
                </div>
                <div class="row">
                    {{--  <div class="col-md-6 col-xl-4 col-xxl-3 pp-plans-container wow fadeInUp" data-wow-delay="0.2s">
                    <div class="pp-plans pxp-is-featured">
                        <div class="pp-plans-top">
                                                    <div class="pp-plans-featured-label">Recommended</div>
                                                    <div class="pp-plans-title">
                                TRY & USE <small>(we charge Rs.99/- to reduce Spam this will be adjusted if you upgrade)</small>                            </div>
                            <div class="pp-plans-price">
                                <div class="pxp-plans-price-monthly">


                                                        ₹99.0<span>/  Lifetime</span>
                                                        </div>
                            </div>
                            <div class="pp-plans-list">
                                <ul class="list-unstyled pricing-feature-list">
                                    <li><i class="fa-solid fa-user"></i>Student Limit : 10</li>
                                    <li><i class="fa-solid fa-user"></i>Parents Limit : 5</li>
                                    <li><i class="fa-solid fa-user"></i>Staff Limit : 5</li>
                                    <li><i class="fa-solid fa-user"></i>Teacher Limit : 5</li>
                                                                            <li><i class="lni lni-close"></i> Attachments Book</li>
                                                                            <li><i class="fa-solid fa-check"></i>    Attendance</li>
                                                                            <li><i class="lni lni-close"></i> Bulk Sms And Email</li>
                                                                            <li><i class="lni lni-close"></i> Card Management</li>
                                                                            <li><i class="lni lni-close"></i> Certificate</li>
                                                                            <li><i class="lni lni-close"></i> Custom Domain</li>
                                                                            <li><i class="fa-solid fa-check"></i>    Events</li>
                                                                            <li><i class="fa-solid fa-check"></i>    Homework</li>
                                                                            <li><i class="lni lni-close"></i> Hostel</li>
                                                                            <li><i class="fa-solid fa-check"></i>    Human Resource</li>
                                                                            <li><i class="lni lni-close"></i> Inventory</li>
                                                                            <li><i class="fa-solid fa-check"></i>    Library</li>
                                                                            <li><i class="lni lni-close"></i> Live Class</li>
                                                                            <li><i class="fa-solid fa-check"></i>    Office Accounting</li>
                                                                            <li><i class="lni lni-close"></i> Online Exam</li>
                                                                            <li><i class="fa-solid fa-check"></i>    Reception</li>
                                                                            <li><i class="fa-solid fa-check"></i>    Student Accounting</li>
                                                                            <li><i class="lni lni-close"></i> Transport</li>
                                                                            <li><i class="lni lni-close"></i> Website</li>
                                                                    </ul>
                            </div>
                        </div>
                        <div class="pp-plans-bottom">
                            <div class="pp-plans-cta button">
                                                                    <button class="btn plans-purchase" data-id="1" data-loading-text="<i class='fas fa-spinner fa-spin'></i> Processing"> Choose Plan</button>
                                                            </div>
                        </div>
                    </div>
                </div>  --}}
                    <div class="col-md-6 col-xl-4 col-xxl-3 pp-plans-container wow fadeInUp" data-wow-delay="0.4s">
                        <div class="pp-plans pxp-is-featured">
                            <div class="pp-plans-top">
                                <div class="pp-plans-featured-label">Recommended</div>
                                <div class="pp-plans-title">
                                    BASIC </div>
                                <div class="pp-plans-price">
                                    <div class="pxp-plans-price-monthly">


                                        <div class="discount">
                                            ₹1000.0 </div>
                                        ₹700.0<span>/ 1 Months </span>
                                    </div>
                                </div>
                                <div class="pp-plans-list">
                                    <ul class="list-unstyled pricing-feature-list">
                                        <li><i class="fa-solid fa-user"></i>Employee Limit : 50</li>
                                        <li><i class="fa-solid fa-user"></i>Trainers Limit : 50</li>
                                        <li><i class="fa-solid fa-check"></i>    Attendance</li>
                                        {{--  <li><i class="lni lni-close"></i> Custom Domain</li>  --}}
                                        <li><i class="fa-solid fa-check"></i>    Payroll managment</li>
                                        <li><i class="fa-solid fa-check"></i>    Employee salary</li>
                                        {{--  <li><i class="lni lni-close"></i> Human Resource</li>  --}}
                                        <li><i class="fa-solid fa-check"></i>    Epmloyee Performance</li>
                                    </ul>
                                </div>
                            </div>
                            <div class="pp-plans-bottom">
                                <div class="pp-plans-cta button">
                                    <button class="btn plans-purchase" data-id="2"
                                        data-loading-text="<i class='fas fa-spinner fa-spin'></i> Processing"> Choose
                                        Plan</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-xl-4 col-xxl-3 pp-plans-container wow fadeInUp" data-wow-delay="0.6s">
                        <div class="pp-plans pxp-is-featured">
                            <div class="pp-plans-top">
                                <div class="pp-plans-featured-label">Recommended</div>
                                <div class="pp-plans-title">
                                    ADVANCE </div>
                                <div class="pp-plans-price">
                                    <div class="pxp-plans-price-monthly">


                                        <div class="discount">
                                            ₹4500.0 </div>
                                        ₹3500.0<span>/ 6 Months </span>
                                    </div>
                                </div>
                                <div class="pp-plans-list">
                                    <ul class="list-unstyled pricing-feature-list">
                                        <li><i class="fa-solid fa-user"></i>Employee Limit : 75</li>
                                        <li><i class="fa-solid fa-user"></i>Trainers Limit : 75</li>
                                        <li><i class="fa-solid fa-check"></i>    Attendance</li>
                                        {{--  <li><i class="lni lni-close"></i> Custom Domain</li>  --}}
                                        <li><i class="fa-solid fa-check"></i>    Payroll managment</li>
                                        <li><i class="fa-solid fa-check"></i>    Employee salary</li>
                                        {{--  <li><i class="lni lni-close"></i> Human Resource</li>  --}}
                                        <li><i class="fa-solid fa-check"></i>    Epmloyee Performance</li>
                                    </ul>
                                </div>
                            </div>
                            <div class="pp-plans-bottom">
                                <div class="pp-plans-cta button">
                                    <button class="btn plans-purchase" data-id="3"
                                        data-loading-text="<i class='fas fa-spinner fa-spin'></i> Processing"> Choose
                                        Plan</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-xl-4 col-xxl-3 pp-plans-container wow fadeInUp" data-wow-delay="0.8s">
                        <div class="pp-plans pxp-is-featured">
                            <div class="pp-plans-top">
                                <div class="pp-plans-featured-label">Recommended</div>
                                <div class="pp-plans-title">
                                    PREMIUM </div>
                                <div class="pp-plans-price">
                                    <div class="pxp-plans-price-monthly">


                                        <div class="discount">
                                            ₹10000.0 </div>
                                        ₹8000.0<span>/ 1 Years </span>
                                    </div>
                                </div>
                                <div class="pp-plans-list">
                                    <ul class="list-unstyled pricing-feature-list">
                                        <li><i class="fa-solid fa-user"></i>Employee Limit : 100</li>
                                        <li><i class="fa-solid fa-user"></i>Trainers Limit : 100</li>
                                        <li><i class="fa-solid fa-check"></i>    Attendance</li>
                                        {{--  <li><i class="lni lni-close"></i> Custom Domain</li>  --}}
                                        <li><i class="fa-solid fa-check"></i>    Payroll managment</li>
                                        <li><i class="fa-solid fa-check"></i>    Employee salary</li>
                                        {{--  <li><i class="lni lni-close"></i> Human Resource</li>  --}}
                                        <li><i class="fa-solid fa-check"></i>    Epmloyee Performance</li>
                                    </ul>
                                </div>
                            </div>
                            <div class="pp-plans-bottom">
                                <div class="pp-plans-cta button">
                                    <button class="btn plans-purchase" data-id="4"
                                        data-loading-text="<i class='fas fa-spinner fa-spin'></i> Processing"> Choose
                                        Plan</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="bg-ring-right"></div>
        </section>
        <!--/ End Pricing Table Area -->

        {{--  <section class="wt-section bg-light">
            <div class="container">
                <div class="row justify-content-md-center text-center">
                    <div class="col-md-8" data-aos="fade-up" data-aos-easing="linear" data-aos-delay="50">
                        <h2 class="mb-md-4">Our Presence in Other Segments also:</h2>
                        <p class="lead text-muted">Finance & Taxation | Legal | Digital | Website Development</p>
                        <div class="mt-md-5">
                            <a href="https://hrhubservices.com/services.html" class="btn btn-primary btn-pill">Read
                                More</a>
                        </div>
                    </div>
                </div>
            </div>

        </section>
        <section class="wt-section">
            <div class="container">
                <div class="row justify-content-md-center align-items-center text-center mb-lg-5 mb-4 pb-lg-5"
                    data-aos="fade-left" data-aos-easing="linear" data-aos-delay="50">
                    <div class="col-md-6 px-md-5">
                        <i class="fab fa-connectdevelop display-4 text-primary mb-4"></i>
                        <h2 class="mb-md-4 mt-3">We are among top emerging leaders in the consulting industry</h2>
                        <p class="text-muted">Exploring every vertical of Business , We act as a catalyst in growth.
                        </p>
                        <div class="mb-md-5 mb-4">
                            <a href="https://hrhubservices.com/services.html" class="btn btn-primary btn-pill">Read
                                More</a>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <img class="rounded mw-100" src="assets/img/intro/team.jpg" alt="">
                    </div>
                </div>

            </div>
        </section>
        <div class="card bg-primary border-0 rounded-0 p-5">
            <div class="container">
                <div class="row justify-content-between align-items-center text-center text-md-left"
                    data-aos="fade-in" data-aos-easing="linear" data-aos-delay="50">
                    <div class="col-md-8">
                        <h5 class="mb-1" style="text-transform: uppercase;font-weight:bold">Looking for a first
                            class Business Consultant ! </h5>
                        <p class="mb-0">We are here to serve you! </p>
                    </div>
                    <div class="col-md-4 text-lg-right mt-md-0 mt-3">
                        <a href="contact.html" class="btn btn btn-outline-light btn-pill">Request Quote</a>
                    </div>
                </div>
            </div>
        </div>
        <!-- <div class="wt-section pb-0">
    <div class="container">
        <div class="row justify-content-between align-items-center" data-aos="fade-right" data-aos-easing="linear" data-aos-delay="50">
            <div class="col-md-5">
                <h2 class="mb-4">Industry leader in consulting services</h2>
                <p class="text-muted">There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Eius eligendi fugiat!</p>
            </div>
            <div class="col-md-6">
                <img src="assets/img/intro/img-woman-1.jpg" class="w-100" alt="">
            </div>
        </div>
    </div>
</div> -->

        <section class="wt-section bg-light">
            <div class="container">
                <header class="text-center w-md-50 mx-auto mb-5">
                    <h2 class="h1 mb-0">Our Clients</h2>
                </header>

                <div class="js-clients wt-clients mb-4" data-aos="fade-up" data-aos-easing="linear"
                    data-aos-delay="50">
                    <div>
                        <img class="wt-clients__image" src="assets/img/clients/img1.png" alt="Image Description"
                            height="70">
                    </div>
                    <div>
                        <img class="wt-clients__image" src="assets/img/clients/img4.png" alt="Image Description">
                    </div>

                    <div>
                        <img class="wt-clients__image" src="assets/img/clients/img3.png" alt="Image Description">
                    </div>

                    <div>
                        <img class="wt-clients__image" src="assets/img/clients/img5.png" alt="Image Description">
                    </div>
                    <div>
                        <img class="wt-clients__image" src="assets/img/clients/img6.png" alt="Image Description">
                    </div>

                    <div>
                        <img class="wt-clients__image" src="assets/img/clients/img7.png" alt="Image Description">
                    </div>

                    <div>
                        <img class="wt-clients__image" src="assets/img/clients/img8.png" alt="Image Description">
                    </div>
                    <div>
                        <img class="wt-clients__image" src="assets/img/clients/img9.png" alt="Image Description">
                    </div>
                    <div>
                        <img class="wt-clients__image" src="assets/img/clients/img10.png" alt="Image Description">
                    </div>
                </div>
            </div>
        </section>  --}}
    </main>

    <!-- Footer -->
    <footer class="wt-section bg-dark main-footer">
        <div class="container">
            <div class="row">
                <div class=" col-sm-8 col-md col-sm-4 col-12 col mb-4">
                    <h5 class="mb-4">Reach us</h5>

                    <p><i class="fa fa-location-arrow mr-2"></i>
                        REGD. Address: </BR>Shyamal crossroad, ahmedabad 380015 </p>
                    <p><i class="fa fa-phone mr-2"></i>+91 7984322008</p>
                    <p><i class="fa fa fa-envelope mr-2"></i> contactus@rudratechnovation.com </p>


                </div>


                <div class="col-sm-4 col-md  col-6 col mb-4">
                    <h5 class="mb-4">Site links</h5>

                    <ul class="list-inline">
                        <li class="list-block-item mx-2"><a href="#">Home</a></li>
                        <li class="list-block-item mx-2"><a href="#services">Services</a></li>
                        <li class="list-block-item mx-2"><a href="#pricing">Price</a></li>
                        <li class="list-block-item mx-2"><a href="https://rudratechnovation.com">Contact Us</a></li>
                    </ul>

                </div>


                <div class="col-sm-4 col-md  col-6 col mb-4">
                    <h5 class="mb-4">Quick links</h5>

                    <ul class="list-inline">
                        <li class="list-block-item mx-2"><a href="#">Contact Us</a></li>
                        <li class="list-block-item mx-2"><a href="#">Privacy Policy</a></li>
                        <li class="list-block-item mx-2"><a href="https://rudratechnovation.com">Terms & Conditions</a></li>
                    </ul>

                </div>


                {{--  <div class="col-sm-4 col-md  col-12 col mb-4">
                    <h5 class="mb-4">Follow us</h5>
                    <ul class="social_footer_ul list-inline text-left mb-0">
                        <li class="list-inline-item mx-2"><a href="#"><i class="fab fa-facebook-f"></i></a>
                        </li>
                        <li class="list-inline-item mx-2"><a href="#"><i class="fab fa-twitter"></i></a></li>
                        <li class="list-inline-item mx-2"><a href="#"><i class="fab fa-linkedin"></i></a></li>
                    </ul>
                </div>  --}}
            </div>
            <div class="row">
                <div class="col-md-12 pt-4">

                    <p class="text-center copyrights"><a class="text-white"
                            href="https://rudratechnovation.com">Website Design and Developed by</a>
                        Rudra Technovation<br>© All Rights Reserved</p>
                </div>
            </div>
        </div>
    </footer>
    <!-- End Footer -->

    <!-- JS Script Files -->
    <!-- Global Vendor -->
    <script src="{{ asset('assets/home/js/jquery.min.js') }}"></script>
    <script src="{{ asset('assets/home/js/jquery.migrate.min.js') }}"></script>
    <script src="{{ asset('assets/home/js/popper.min.js') }}"></script>
    <script src="{{ asset('assets/home/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('assets/home/js/aos.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/js/all.min.js"></script>

    <!-- Components Vendor  -->
    <script src="{{ asset('assets/home/js/slick.min.js') }}"></script>
    <script src="{{ asset('assets/home/js/ace-responsive-menu.js') }}"></script>

    <!--Plugin Initialize-->
    <script src="{{ asset('assets/home/js/global.js') }}"></script>
    <script src="{{ asset('assets/home/js/carousel.js') }}"></script>

    <!-- END JAVASCRIPTS -->
</body>

</html>

<!DOCTYPE html>
<!-- <html lang="en" data-bs-theme="dark"> -->
<html lang="en" data-bs-theme="auto">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Title Icon Web -->
    <title>@yield('title')</title>
    <link rel="icon" href="/assets/img/avatar-1.png" type="image/x-icon">
    
    <!-- Fonts and Main Stylesheets -->
    <link rel="stylesheet" href="/css/new-style.css">
    <link rel="stylesheet" href="/css/checkout.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&family=Nunito:wght@300;400;500;600;700;800;900&display=swap"/>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.css"/>

    <script src="https://app.sandbox.midtrans.com/snap/snap.js" data-client-key="{{ config('midtrans.client_key') }}"></script>

</head>
<body>
    <div id="page-container" class="remember-theme page-header-fixed">
        <header id="page-header" class="mobile-active">
            <nav class="navbar shadow navbar-expand-lg bg-alternativ">
                <div class="container">
                    <div class="d-flex align-items-center">
                        <button class="btn btn-alt-secondary d-lg-none me-4" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                            <i class="fa-solid fa-bars"></i>
                        </button>
                            
                        <a class="logo" href="#">
                            <!-- <img src="assets/img/Header-1.png" alt="Logo" width="30" height="24"> -->
                            <img src="/images/core/Logo.png" alt="Logo" height="50">
                        </a>
                    </div>
                    <div class="collapse navbar-collapse justify-content-end" id="navbarSupportedContent">
                        <ul class="navbar-nav mb-2 mb-lg-0">
                            <li class="nav-item">
                                <a class="nav-link fw-bold" aria-current="page" href="/">Home</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link fw-bold" href="about">About US</a>
                            </li>
                            <li class="nav-item dropdown">
                                <a class="nav-link fw-bold dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                    Pesanan
                                </a>
                                <ul class="dropdown-menu">
                                    <li>
                                        <a class="dropdown-item" href="/checkout-search">Cek Status Pemesanan</a>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                    <!-- <div class="d-flex align-items-center" aria-labelledby="bd-theme">
                        <button type="button" class="btn btn-alt-secondary me-4" data-bs-theme-value="dark">
                            <i class="fa-sharp fa-solid fa-moon" ></i>
                        </button>
                    </div> -->
                </div>
            </nav>
        </header> 
        
        <main id="page-main">
            @yield('content')
        </main>
        
        <footer id="page-footer" class="footer-static">
            <div class="container py-4">
                <div class="row items-push fs-sm border-bottom py-4 px-3 px-lg-0">
                    <div class="col-md-4 col-lg-4 mb-5">
                        <ul class="list list-simple-mini">
                            <h3 class="h5 fw-bold">Legal</h3>
                            <li>
                                <a class="fw-semibold" href="">
                                    Terms of Use
                                </a>
                            </li>
                            <li>
                                <a class="fw-semibold" href="">
                                    Privacy Policy
                                </a>
                            </li>
                            <li>
                                <a class="fw-semibold" href="">
                                    Refund Policy
                                </a>
                            </li>
                            <li>
                                <a class="fw-semibold" href="">
                                    Newsroom
                                </a>
                            </li>
                        </ul>
                    </div>
                    <div class="col-md-4 col-lg-4 mb-5">
                        <ul class="list list-simple-mini">
                            <h3 class="h5 fw-bold">Informasi</h3>
                            <li>
                                <a class="fw-semibold" href="#">
                                    Kabar dan Promosi
                                </a>
                            </li>
                            <li>
                                <a class="fw-semibold" href="#">
                                    Untuk Penerbit Game
                                </a>
                            </li>
                            <li>
                                <a class="fw-semibold" href="#">
                                    Program Referral
                                </a>
                            </li>
                        </ul>
                    </div>
                    <div class="col-md-4 col-lg-4 mb-5">
                        <ul class="list list-simple-mini">
                            <h3 class="h5 fw-bold">Butuh Bantuan?</h3>
                            <li>
                                <a class="fw-semibold" href="#" target="_blank">
                                    Hubungi Messenger
                                </a>
                            </li>
                            <li>
                                <a class="fw-semibold" href="#">
                                    Email: admin@cakstore.com
                                </a>
                            </li>
                            <li>
                                <a class="fw-semibold" href="#" target="_blank">
                                    Kritik dan Saran
                                </a>
                            </li>
                        </ul>
                    </div>
                    <div class="row fs-sm pt-4 pb-5 pb-lg-0 align-items-center gy-3 mb-6 mb-md-0">
                        <div class="col-sm-6 order-sm-1">
                            <a class="fw-semibold fs-3 me-4" href="#"><i class="fa-brands fa-instagram"></i></ion-icon></a>
                            <a class="fw-semibold fs-3 me-4" href="#"><i class="fa-brands fa-whatsapp"></i></ion-icon></a>
                            <a class="fw-semibold fs-3 me-4" href="#"><i class="fa-brands fa-facebook"></i></ion-icon></a>
                            <a class="fw-semibold fs-3 me-4" href="#"><i class="fa-brands fa-twitter"></i></a>
                        </div>    
                        <div class="col-sm-6 order-sm-2 mb-1 mb-sm-0 text-center text-sm-end">
                            <p>@COPYRIGHT 2022 | ALL RIGHTS</p>
                        </div>
                    </div>
                </div>
            </div>
        </footer>
    </div>
    <!-- Plugin Script -->
    <script src="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/swiper@9/swiper-element-bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
    
    @yield('script')
</body>
</html>


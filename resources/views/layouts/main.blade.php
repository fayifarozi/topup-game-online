<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>@yield('title')</title>

    <link rel="stylesheet" href="/css/style.css" />
    <link rel="stylesheet" href="/css/slider.css" />
    
    <link rel="stylesheet" href="/css/checkout.css" />
    <link rel="stylesheet" href="/css/utilities.css" />
    <link rel="stylesheet" href="">

    <script src="https://app.sandbox.midtrans.com/snap/snap.js" data-client-key="{{ config('midtrans.client_key') }}"></script>
    
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" />

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  </head>
  <body>
    <header>
      <nav class="navbar">
        <div class="logo">
          <a href="/">CAKSTORE</a>
        </div>
        <input type="checkbox" id="menu-bar" />
        <label for="menu-bar"><i class="fa-solid fa-bars"></i></label>
        <div class="navbar-list">
          <ul>
            <li><a href="/">Home</a></li>
            <li><a href="/hero-product">Product</a></li>
            <li><a href="/checkout-search">Search</a></li>
            <li><a href="/about">About Us</a></li>
          </ul>
        </div>
      </nav>
    </header> 

    @yield('content')
    
    <footer>
      <ul class="social_icon">
        <li>
          <a href="#"><i class="fa-brands fa-instagram"></i></ion-icon></a>
        </li>
        <li>
          <a href="#"><i class="fa-brands fa-whatsapp"></i></ion-icon></a>
        </li>
        <li>
          <a href="#"><i class="fa-brands fa-facebook"></i></ion-icon></a>
        </li>
        <li>
          <a href="#"><i class="fa-brands fa-twitter"></i></a>
        </li>
      </ul>
      <ul class="menu">
        <li><a href="/">Home</a></li>
        <li><a href="/hero-product">Product</a></li>
        <li><a href="/about">About Us</a></li>
      </ul>
      <p>@COPYRIGHT 2022 | ALL RIGHTS</p>
    </footer>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
    <script
      type="module"
      src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"
    ></script>
    <script
      nomodule
      src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"
    ></script>

</body>
</html>


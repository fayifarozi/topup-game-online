<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Overview StoreGG</title>
        
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="/assets/dist/css/bootstrap.min.css" />
    <!-- Custom CSS -->
    <link rel="stylesheet" href="/css/admin.css" />
    <link rel="stylesheet" href="/css/utilities.css" />

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined" rel="stylesheet" />
    <link
        href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
        rel="stylesheet" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
</head>
    <body>
        <div class="wrapper">
            @include('master.layouts.header')
            <div class="container-fluid">
                @include('master.layouts.sidebar')
                <div class="row">
                    <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4 p-5">
                        @yield('content')
                    </main>
                </div>
            </div>
        </div>
        <script src="/js/admin.js"></script>
        <script src="/assets/dist/js/bootstrap.bundle.min.js"></script>
    </body>
</html>

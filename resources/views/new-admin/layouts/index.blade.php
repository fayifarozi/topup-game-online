<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    
    <link rel="stylesheet" href="/assets/css/app.css">
    <link rel="stylesheet" href="/assets/css/app-style.css">
    <link rel="stylesheet" href="/assets/css/app-dark.css">

    <link rel="shortcut icon" href="assets/images/logo/favicon.svg" type="image/x-icon">
    <link rel="shortcut icon" href="assets/images/logo/favicon.png" type="image/png">
    <link rel='stylesheet' href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css'>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <link rel='stylesheet'href='https://cdn.jsdelivr.net/npm/sweetalert2@11.7.5/dist/sweetalert2.min.css'>
</head>
<body>
    <div id="app">
        @include('new-admin.layouts.sidebar')
        <div id="main" class="layout-navbar">
            @include('new-admin.layouts.header')
            <div id="main-content">
                <div class="container">
                    @yield('content')
                </div>
            </div>
        </div>
    </div>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="/assets/js/app.js"></script>
    @yield('script')
    <script type="text/javascript">
        @if(session()->has('toast')){
            const toastMessage = @json(session('toast'));
            if (toastMessage) {
                toast(toastMessage.type, toastMessage.message);
            }
        }
        @endif

        async function toast(icon, title) {
            const Toast = Swal.mixin({
                toast: true,
                position: "top-right",
                iconColor: "white",
                customClass: {
                    popup: "colored-toast",
                },
                showConfirmButton: false,
                timer: 1500,
                timerProgressBar: true,
            });

            await Toast.fire({
                icon: icon,
                title: title,
            });
        }
    </script>
</body>
</html>
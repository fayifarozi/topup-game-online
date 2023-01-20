<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="/css/login.css">
    <link rel="stylesheet" href="/assets/dist/css/bootstrap.min.css" />
</head>
<body>
    <div class="login-container">
        <div class="login-card">
            @if(session()->has('loginError'))
            <div class="alert alert-danger" role="alert">
                {{ session('loginError')}}
            </div>
            @endif
            <h1>Login</h1>
            <form action="/login" method="POST">
                @csrf
                <div class="txt_field">
                    <input type="text" name="email" required />
                    <label>Email</label>
                </div>
                <div class="txt_field">
                    <input type="text" name="password" required />
                    <label>Password</label>
                </div>
                <button class="btn-login" type="submit">Login</button>
            </form>
        </div>
    </div>
</body>
</html>
<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="{{ asset('adminlte') }}/login-form-09/fonts/icomoon/style.css">

    <link rel="stylesheet" href="{{ asset('adminlte') }}/login-form-09/css/owl.carousel.min.css">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{ asset('adminlte') }}/login-form-09/css/bootstrap.min.css">

    <!-- Style -->
    <link rel="stylesheet" href="{{ asset('adminlte') }}/login-form-09/css/style.css">

    <title>Login</title>
</head>

<body>
    <div class="content">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-6 contents">
                    <div class="row justify-content-center">
                        <div class="col-md-12">
                            <div class="form-block">
                                <div class="mb-4">
                                    <h3>Sign In to <strong>POS APP</strong></h3>
                                    <p class="mb-4">Sign in to start your session.</p>
                                </div>
                                @if ($errors->any())
                                    <div class="alert alert-danger">
                                        <ul>
                                            @foreach ($errors->all() as $error)
                                                <li>{{ $error }}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                @endif
                                <form action="{{ route('login') }}" method="post">
                                    @csrf
                                    <div class="form-group first">
                                        <label for="username">Email</label>
                                        <input type="email" name="email" class="form-control" id="email">
                                    </div>

                                    <div class="form-group">
                                        <label for="password">Password</label>
                                        <input type="password" name="password" class="form-control" id="password">
                                    </div>

                                    <div class="d-flex mb-5 align-items-center">
                                        <label class="control control--checkbox mb-0"><span class="caption">Remember
                                                me</span>
                                            <input type="checkbox" checked="checked" />
                                            <div class="control__indicator"></div>
                                        </label>
                                        <span class="ml-auto"><a href="#" class="forgot-pass">Forgot
                                                Password</a></span>
                                    </div>

                                    <input type="submit" value="Log In"
                                        class="btn btn-pill text-white btn-block btn-info">

                                    <span class="d-block text-center my-4 text-muted"> or sign in with</span>

                                    <div class="social-login text-center">
                                        <a href="#" class="google">
                                            <span class="icon-google mr-3"></span>
                                        </a>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>

                </div>

            </div>
        </div>
    </div>


    <script src="{{ asset('adminlte') }}/login-form-09/js/jquery-3.3.1.min.js"></script>
    <script src="{{ asset('adminlte') }}/login-form-09/js/popper.min.js"></script>
    <script src="{{ asset('adminlte') }}/login-form-09/js/bootstrap.min.js"></script>
    <script src="{{ asset('adminlte') }}/login-form-09/js/main.js"></script>
</body>

</html>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Register - LUCKY BOOKMARK</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <link rel="stylesheet" href="{{ asset('adminlte') }}/plugins/fontawesome-free/css/all.min.css">
    <link rel="stylesheet" href="{{ asset('adminlte') }}/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
    <link rel="stylesheet" href="{{ asset('adminlte') }}/dist/css/adminlte.min.css">
</head>
<body class="hold-transition login-page" style="background: url('{{ asset('assets/images/background.jpg') }}'); background-size: cover;">
    <div class="login-box">
        <!-- /.login-logo -->
        @include('layouts.partials.notifications')
        <div class="card card-outline card-warning">

            <div class="card-header text-center">
                <span class="h1"><b>REGISTER</b></span>
            </div>
            <div class="card-body">
                <p class="login-box-msg">Create New Account</p>

                <form action="{{ URL::to('/do-register') }}" method="post">
                    @csrf
                    <div class="input-group mb-3">
                        <input type="text" class="form-control" placeholder="Name" name="name" required="">
                    </div>

                    <div class="input-group mb-3">
                        <input type="email" class="form-control" placeholder="Email" name="email" required="">
                    </div>

                    <div class="input-group mb-3">
                        <input type="text" class="form-control" placeholder="Username" name="username" required="">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-user"></span>
                            </div>
                        </div>
                    </div>

                    <div class="input-group mb-3">
                        <input type="password" class="form-control" placeholder="Password" name="password" required="">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-lock"></span>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <button type="submit" class="btn btn-warning btn-block">
                                <i class="fa fa-users"></i> Register
                            </button>
                        </div>
                    </div>
                </form>
                <p class="mb-0 mt-3">
                    <a href="{{ URL::to('/login') }}" class="text-center">Already have an account? Login now</a>
                </p>
            </div>
        <!-- /.card-body -->
    </div>
    <!-- /.card -->
</div>
<!-- /.login-box -->

<!-- jQuery -->
<script src="{{ asset('adminlte') }}plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="{{ asset('adminlte') }}plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="{{ asset('adminlte') }}dist/js/adminlte.min.js"></script>
</body>
</html>

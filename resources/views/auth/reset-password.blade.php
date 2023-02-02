
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Reset Password Page</title>
      
        <!-- Google Font: Source Sans Pro -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
        <!-- Font Awesome -->
        <link rel="stylesheet" href="dashboard/plugins/fontawesome-free/css/all.min.css">
        <!-- icheck bootstrap -->
        <link rel="stylesheet" href="dashboard/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
        <!-- Theme style -->
        <link rel="stylesheet" href="dashboard/dist/css/adminlte.min.css">
      </head>
<body class="hold-transition login-page">
<div class="login-box">
<div class="login-logo">
<a href="../../index2.html"><b>Safal</b>Course</a>
</div>

<div class="card">
<div class="card-body login-card-body">
<p class="login-box-msg">Reset your password.</p>
    @if ($errors->any())
    <div class="text-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif   
<form action="/reset-password" method="post">
    @csrf
<div class="input-group mb-3">
    <input type="email" class="form-control" placeholder="Email" name="email" value="{{ $email }}" readonly>
    <div class="input-group-append">
        <div class="input-group-text">
            <span class="fas fa-envelope"></span>
        </div>
    </div>
</div>
<div class="input-group mb-3">
    <input type="number" class="form-control" placeholder="Pin Number" name="pin_number">
    <div class="input-group-append">
        <div class="input-group-text">
            <span class="fas fa-envelope"></span>
        </div>
    </div>
</div>
<div class="input-group mb-3">
    <input type="password" class="form-control" placeholder="Password" name="password">
    <div class="input-group-append">
        <div class="input-group-text">
            <span class="fas fa-envelope"></span>
        </div>
    </div>
</div>
<div class="input-group mb-3">
    <input type="password" class="form-control" placeholder="Re-type Password" name="password_confirmation">
    <div class="input-group-append">
        <div class="input-group-text">
            <span class="fas fa-envelope"></span>
        </div>
    </div>
</div>
<div class="row">
<div class="col-12">
<button type="submit" class="btn btn-primary btn-block">Confirm</button>
</div>
</div>
</form>
<p class="mt-3 mb-1">
<a href="{{ route('login') }}">Login</a>
</p>
<p class="mb-0">
<a href="{{ route('register') }}" class="text-center">Register a new membership</a>
</p>
</div>

</div>
</div>


<script src="../../plugins/jquery/jquery.min.js"></script>

<script src="../../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>

<script src="../../dist/js/adminlte.min.js?v=3.2.0"></script>
</body>
</html>

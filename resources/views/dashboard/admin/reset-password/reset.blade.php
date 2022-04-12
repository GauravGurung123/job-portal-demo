<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Reset Password</title>
    
    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    
</head>
<body style="background-color:#c8d9e8 !important">
    <div class="container">
        <div class="row">
            <div class="col-md-4 offset-md-4" style="margin-top: 45px">
                 <h4>Reset Password</h4><hr>
                 <form action="{{ route('admin.reset-pwd-now') }}" method="post">
                    @if (Session::get('fail'))
                        <div class="alert alert-danger">
                            {{ Session::get('fail') }}
                        </div>
                    @endif
                    @csrf
                    <input type="hidden" name="token" value="{{$token}}" />
                     <div class="form-group">
                         <label for="email">Email</label>
                         <input type="text" class="form-control" name="email"  value="{{ $email ?? old('email') }}">
                         <span class="text-danger">@error('email'){{ $message }}@enderror</span>
                     </div>
                     <div class="form-group my-2">
                         <label for="password">New Password</label>
                         <input type="password" class="form-control" name="password" placeholder="Enter your new password">
                         <span class="text-danger">@error('password'){{ $message }}@enderror</span>
                     </div>
                     <div class="form-group my-2">
                        <label for="password">Confirm Password</label>
                        <input type="password" class="form-control" name="cpassword" placeholder="Enter password to confirm" >
                        <span class="text-danger">@error('cpassword'){{ $message }}@enderror</span>
                    </div>
                    
                     <div class="form-group my-2">
                         <button type="submit" class="btn btn-primary">Reset Password Now</button>
                     </div>
                    <p>
                    <a href="{{ route('admin.login') }}">Login</a>
                    </p>
                 </form>
            </div>
        </div>
    </div>
</body>
</html>
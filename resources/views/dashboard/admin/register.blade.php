<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>User Register</title>
    
    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

</head>
<body>
    <div class="container">
        
        {{-- Admin register form --}}
        <div class="row">
            <div class="col-md-4 offset-md-4" style="margin-top: 45px">
                 <h4>Admin Registeration Form</h4><hr>
                 <form action="{{ route('admin.create') }}" enctype="multipart/form-data" method="post">
                    @if (Session::get('success'))
                        <div class="alert alert-success">
                            {{ Session::get('success') }}
                        </div>
                    @endif
                    @if (Session::get('fail'))
                    <div class="alert alert-danger">
                        {{ Session::get('fail') }}
                    </div>
                    @endif

                    @csrf
                     <div class="form-group">
                         <label for="name">Name</label>
                         <input type="text" class="form-control" name="name" placeholder="Enter full name" value="{{ old('name') }}">
                         <span class="text-danger">@error('name'){{ $message }}@enderror</span>
                     </div>
                     <div class="form-group">
                        <label for="username">UserName</label>
                        <input type="text" class="form-control" name="username" placeholder="Enter your username" value="{{ old('username') }}">
                        <span class="text-danger">@error('username'){{ $message }}@enderror</span>
                    </div>
                     <div class="form-group">
                        <label for="email">Email</label>
                        <input type="text" class="form-control" name="email" placeholder="Enter email address" value="{{ old('email') }}">
                        <span class="text-danger">@error('email'){{ $message }}@enderror</span>
                    </div>
                    <div class="form-group">
                        <label for="image">Upload Profile Picture</label>
                        <input type="file" class="form-control" name="image" value="{{ old('image') }}">
                        <span class="text-danger">@error('image'){{ $message }}@enderror</span>
                    </div>
                     <div class="form-group">
                         <label for="password">Password</label>
                         <input type="password" class="form-control" name="password" placeholder="Enter password" value="{{ old('password') }}">
                         <span class="text-danger">@error('password'){{ $message }}@enderror</span>
                     </div>
                     <div class="form-group">
                        <label for="cpassword">Confirm Password</label>
                        <input type="password" class="form-control" name="cpassword" placeholder="Enter confirm password" value="{{ old('cpassword') }}">
                        <span class="text-danger">@error('cpassword'){{ $message }}@enderror</span>
                    </div>
                     <div class="form-group">
                         <button type="submit" class="btn btn-primary">Register</button>
                     </div>
                     <br>
                     <a href="{{ route('admin.login') }}">I already have an account, Login now</a>
                 </form>
            </div>
        </div>
        
    </div>
</body>
</html>
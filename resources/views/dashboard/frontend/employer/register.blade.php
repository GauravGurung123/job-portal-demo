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
        <div class="row">
            {{-- Employer register form --}}
            <div class="col-lg-12 ">
                <div class="col-md-6 offset-md-3" style="margin-top: 45px">
                    <h4>Employer Register</h4><hr>
                    <form action="{{ route('employer.usr.store') }}" method="post">
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
                        @method('POST')
                        <div class="form-group">
                            <label for="username">UserName</label>
                            <input type="text" class="form-control" name="username" placeholder="Enter your username" value="{{ old('username') }}">
                            <span class="text-danger">@error('username'){{ $message }}@enderror</span>
                        </div>
                        <div class="form-group">
                            <label for="employer">Organisation Name</label>
                            <input type="text" class="form-control" name="org_name" placeholder="Enter your organisation name" value="{{ old('org_name') }}">
                            <span class="text-danger">@error('org_name'){{ $message }}@enderror</span>
                        </div>
                        <div class="form-group">
                            <label for="industry">Industry</label>
    
                            <select class="form-control" name="industry_id" aria-label="Default select example">
                                @foreach ($industries as $industry)                                
                                    <option value="{{$industry['id']}}" >{{$industry['name']}}</option>
                                @endforeach
                            </select>
                            <span class="text-danger">@error('industry_id'){{ $message }}@enderror</span>
                        </div>

                        <div class="form-group">
                            <label for="location">Location</label>
    
                            <select class="form-control" name="location_id" aria-label="Default select example">
                                @foreach ($locations as $location)                                
                                    <option value="{{$location['id']}}" >{{$location['name']}}</option>
                                @endforeach
                            </select>
                            <span class="text-danger">@error('location_id'){{ $message }}@enderror</span>
                        </div>

                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="text" class="form-control" name="email" placeholder="Enter email address" value="{{ old('email') }}">
                            <span class="text-danger">@error('email'){{ $message }}@enderror</span>
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
                        <a href="{{ route('employer.login') }}">I already have an account, Login now</a>
                    </form>
                </div>
            </div>
        </div>
    </div> 
</body>
</html>
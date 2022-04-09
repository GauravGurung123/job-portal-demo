@extends('dashboard.admin.layouts.app')

@section('content-header')
<div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">Edit Profile</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
          </ol>
        </div><!-- /.col -->
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>
@endsection

@section('content-main')
{{-- Edit Profile form --}}
<div class="row">
    <div class="col-md-6 offset-md-3" style="margin-top: 45px">            
        <form action="{{route('admin.usr-j.update',['usr_j' => $jobseeker->id])}}" enctype="multipart/form-data" method="POST">
        @method('PUT')
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
                <label for="name">Full Name</label>
                <input type="text" class="form-control" name="name" value="{{ old('name') ?? $jobseeker->name}}">
                <span class="text-danger">@error('name'){{ $message }}@enderror</span>
            </div>
            <div class="form-group">
            <label for="username">UserName</label>
            <input type="text" class="form-control" name="username" value="{{ old('username') ?? $jobseeker->username }}">
            <span class="text-danger">@error('username'){{ $message }}@enderror</span>
        </div>
            <div class="form-group">
            <label for="email">Email</label>
            <input type="text" class="form-control" name="email" value="{{ old('email') ?? $jobseeker->email }}">
            <span class="text-danger">@error('email'){{ $message }}@enderror</span>
        </div>
        <div class="form-group">
            <label for="image">Upload Profile Picture</label>
            <input type="file" class="form-control" name="image" value="{{ old('image') }}">
            <span class="text-danger">@error('image'){{ $message }}@enderror</span>
            
        </div>
        {{-- <div class="form-group">
            <label for="password">Password</label>
            <input type="password" class="form-control" name="password" placeholder="Enter password" value="{{ old('password') }}">
            <span class="text-danger">@error('password'){{ $message }}@enderror</span>
        </div>
        <div class="form-group">
            <label for="cpassword">Confirm Password</label>
            <input type="password" class="form-control" name="cpassword" placeholder="Enter confirm password" value="{{ old('cpassword') }}">
            <span class="text-danger">@error('cpassword'){{ $message }}@enderror</span>
        </div> --}}
            <div class="form-group">
                <button type="submit" class="btn btn-primary">Update</button>
            </div>
            <br>
            
        </form>
    </div>
    {{-- <img src="{{ asset('images/'.$admin['profile_photo_path']) }}" height="34px" width="44px" alt="no image"> --}}
    
</div>
@endsection
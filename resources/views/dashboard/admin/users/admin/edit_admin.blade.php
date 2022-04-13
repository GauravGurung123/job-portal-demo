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
            <li class="breadcrumb-item"><a href="{{ route('admin.dashboard-users-list') }}">User List</a></li>
          </ol>
        </div><!-- /.col -->
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>
@endsection

@section('content-main')
  <!-- START card-->
  <div class="card card-primary card-outline card-outline-tabs">
    <div class="card-header p-0 border-bottom-0" style="background-color: #e8e8f7;">
        <ul class="nav nav-tabs h5" id="custom-tabs-four-tab" role="tablist">
            <li class="nav-item box">
            <a class="nav-link" id="custom-tabs-four-profile-tab" data-toggle="pill" href="#custom-tabs-four-profile" role="tab" aria-controls="custom-tabs-four-profile" aria-selected="true">Profile</a>
            </li>
            <li class="nav-item box">
            <a class="nav-link" id="custom-tabs-four-password-tab" data-toggle="pill" href="#custom-tabs-four-password" role="tab" aria-controls="custom-tabs-four-password" aria-selected="false">Password</a>
            </li>
            <li class="nav-item box">
            <a class="nav-link" id="custom-tabs-four-role-tab" data-toggle="pill" href="#custom-tabs-four-role" role="tab" aria-controls="custom-tabs-four-role" aria-selected="false">Role</a>
            </li>
            <li class="nav-item box">
              <a class="nav-link" id="custom-tabs-four-role-permission" data-toggle="pill" href="#custom-tabs-four-permission" role="tab" aria-controls="custom-tabs-four-permission" aria-selected="false">Permission</a>
            </li>
            
        </ul>
    </div>
    <!-- card-header ended -->
    <div class="card-body">
        <div class="tab-content" id="custom-tabs-four-tabContent">
            <div class="tab-pane fade show active" id="custom-tabs-four-profile" role="tabpanel" aria-labelledby="custom-tabs-four-profile-tab">
                {{-- Edit Profile tab --}}
              @include('dashboard.admin.users.admin.includes.profile')
            </div>
            <div class="tab-pane fade" id="custom-tabs-four-password" role="tabpanel" aria-labelledby="custom-tabs-four-password-tab">
              {{-- change password tab --}}
              @include('dashboard.admin.users.admin.includes.change_password')
            </div>
            <div class="tab-pane fade" id="custom-tabs-four-role" role="tabpanel" aria-labelledby="custom-tabs-four-role-tab">
              {{-- Change Role tab --}}
              @include('dashboard.admin.users.admin.includes.role')
            </div>
            <div class="tab-pane fade" id="custom-tabs-four-permission" role="tabpanel" aria-labelledby="custom-tabs-four-permission-tab">
              {{-- Change Permission tab --}}
              @include('dashboard.admin.users.admin.includes.permission')
            </div>
        </div>
    </div>
    <!-- /.card-body ended -->
</div>
<!-- card card-primary ended -->
@endsection
<style>
    li.box{
        border: 2px solid;
        font-size: 1rem;
        border-color: #ffffff;
    }
    
    .nav-tabs .nav-link.active{
        transform: translateY(-8%);
        font-size: 1.2rem;
        transition: 0.1s ease-in-out;
        background-color: #6259ca;
        color: #000000 !important;
        box-shadow: 0 3px 6px rgba(0,0,0,0.16), 0 3px 6px rgba(0,0,0,0.23);
    }
</style>

<!-- jQuery -->
<script src="{{ asset('vendor/plugins/daterangepicker/daterangepicker.js')}}"></script>
<script src="{{ asset('vendor/plugins/jquery/jquery.min.js')}}"></script>
<script type="text/javascript">
    $(function() {
  
    $('a[data-toggle="pill"]').on('shown.bs.tab', function (e) {
      localStorage.setItem('lastTab', $(this).attr('href'));
    });
    var lastTab = localStorage.getItem('lastTab');
    
    if (lastTab) {
      $('[href="' + lastTab + '"]').tab('show');
    }
      
    });
  
  </script>
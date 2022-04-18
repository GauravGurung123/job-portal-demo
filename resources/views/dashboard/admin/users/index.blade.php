@extends('dashboard.admin.layouts.app')

@section('content-header')
<div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">All Users</h1>
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
{{-- Admins Table --}}
@can('view-admins')
<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">All Admins</h3>
                <div class="card-tools">
                    <form action="">
                            <div class="input-group input-group-sm" style="width: 100%;">
                            <input type="text" name="admin_search" class="form-control float-right" placeholder="Search" value="{{$admin_search}}">
                            <div class="input-group-append">
                                <button type="submit" class="btn btn-default">
                                    <i class="fas fa-search"></i>
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            
            <div class="card-body table-responsive p-0">
                @include('dashboard.admin.users.admin.admin_table', ['admins' => $admins])
            </div>

        </div>
    </div>
</div>  
@endcan

{{-- Employers Table --}}
@can('view-employers')  
<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">All Employers</h3>
                <div class="card-tools">
                    <form action="">
                        <div class="input-group input-group-sm" style="width: 100%;">
                            <input type="text" name="employer_search" class="form-control float-right" placeholder="Search" value="{{$employer_search}}">
                            <div class="input-group-append">
                                <button type="submit" class="btn btn-default">
                                    <i class="fas fa-search"></i>
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            
            <div class="card-body table-responsive p-0">
                @include('dashboard.admin.users.employer.employer_table', ['employers' => $employers])
            </div>

        </div>  
    </div>
</div>
@endcan

{{-- Jobseekers Table --}}
@can('view-jobseekers')
<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">All Jobseekers</h3>
                <div class="card-tools">
                    <form action="">
                        <div class="input-group input-group-sm" style="width: 100%;">
                        <input type="text" name="jobseeker_search" class="form-control float-right" placeholder="Search" value="{{$jobseeker_search}}">
                            <div class="input-group-append">
                                <button type="submit" class="btn btn-default">
                                    <i class="fas fa-search"></i>
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            
            <div class="card-body table-responsive p-0">
                @include('dashboard.admin.users.jobseeker.jobseeker_table', ['jobseekers' => $jobseekers])
            </div>

        </div>
    </div>
</div> 
@endcan

@endsection

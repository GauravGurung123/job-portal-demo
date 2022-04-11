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
                <table class="table table-hover text-nowrap">
                    <thead>
                        <tr>
                            <th>S/N</th>
                            <th>User</th>
                            <th>Username</th>
                            <th>Email Address</th>
                            <th>Profile Image</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($admins as $key => $admin)
                            <tr>
                                
                                <td>{{++$key}}</td>
                                <td>{{ $admin->name }}</td>
                                <td>{{ $admin->username }}</td>
                                <td>{{ $admin->email }}</td>
                                <td>
                                    <img src="{{ asset('images/'.$admin['profile_photo_path']) }}" height="34px" width="44px" alt="no image">
                                </td>
                                <td>
                                    <div class="btn-group">
                                    @can('update-admins')                                        
                                    <a href="{{route('admin.usr-a.edit',['usr_a' => $admin->username])}}" class="btn btn-outline-info m-1">
                                        <i class="fa fa-pencil"></i>
                                    </a>
                                    @endcan
                                    @can('delete-admins')                                        
                                    <form action="{{ route('admin.usr-a.destroy',['usr_a' => $admin->id ]) }}" method="POST" >
                                        @method('DELETE')
                                        @csrf
                                        <button class="btn btn-outline-danger m-1"><i class="fa fa-trash"></i>&nbsp;Del
                                        </button>
                                    </form>
                                    @endcan
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr><td>No Admin Yet</td></tr>
                        @endforelse
                        
                
                    </tbody>
                </table>
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
                <table class="table table-hover text-nowrap">
                    <thead>
                        <tr>
                            <th>S/N</th>
                            <th>Username</th>
                            <th>Organisation</th>
                            <th>Email Address</th>
                            <th>Org. Logo</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($employers as $key => $employer)
                            <tr>
                                
                                <td>{{++$key}}</td>
                                <td>{{ $employer->username }}</td>
                                <td>{{ $employer->org_name }}</td>
                                <td>{{ $employer->email }}</td>
                                <td>
                                    <img src="{{ asset('images/'.$employer['profile_photo_path']) }}" height="34px" width="44px" alt="no image">
                                </td>
                                <td>
                                    <div class="btn-group">
                                        @can('update-employers')                                            
                                        <a href="{{route('admin.usr-e.edit',['usr_e' => $employer->username])}}" class="btn btn-outline-info m-1">
                                            <i class="fa fa-pencil"></i>
                                        </a>
                                        @endcan
                                        @can('delete-employers')                        
                                        <form action="{{route('admin.usr-e.destroy',['usr_e' => $employer->id])}}" method="POST" >
                                            @method('DELETE')
                                            @csrf
                                            <button class="btn btn-outline-danger m-1"><i class="fa fa-trash"></i>&nbsp;Del
                                            </button>
                                        </form>
                                        @endcan
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr><td>No Employer Yet</td></tr>
                        @endforelse
                        
                
                    </tbody>
                </table>
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
                <table class="table table-hover text-nowrap">
                    <thead>
                        <tr>
                            <th>S/N</th>
                            <th>Fullname</th>
                            <th>username</th>
                            <th>Email Address</th>
                            <th>Profile Image</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($jobseekers as $key => $jobseeker)
                            <tr>
                                
                                <td>{{++$key}}</td>
                                <td>{{ $jobseeker->name }}</td>
                                <td>{{ $jobseeker->username }}</td>
                                <td>{{ $jobseeker->email }}</td>
                                <td>
                                    <img src="{{ asset('images/'.$jobseeker['profile_photo_path']) }}" height="34px" width="44px" alt="no image">
                                </td>
                                <td>
                                    <div class="btn-group">
                                        @can('edit-jobseekers')                                
                                        <a href="{{route('admin.usr-j.edit',['usr_j' => $jobseeker->username])}}" class="btn btn-outline-info m-1">
                                            <i class="fa fa-pencil"></i>
                                        </a>
                                        @endcan
                                        @can('delete-jobseekers')
                                        <form action="{{ route('admin.usr-j.destroy',['usr_j' => $jobseeker->id ]) }}" method="POST" >
                                            @method('DELETE')
                                            @csrf
                                            <button class="btn btn-outline-danger m-1"><i class="fa fa-trash"></i>&nbsp;Del
                                            </button>
                                        </form>
                                        @endcan
                                </div>
                                </td>
                            </tr>
                        @empty
                            <tr><td>No Jobseeker Yet</td></tr>
                        @endforelse
                        
                
                    </tbody>
                </table>
            </div>

        </div>
    </div>
</div> 
@endcan

@endsection

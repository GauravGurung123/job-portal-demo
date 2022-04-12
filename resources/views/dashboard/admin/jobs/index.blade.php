@extends('dashboard.admin.layouts.app')

@section('content-header')
<div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">All Jobs</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">Home</a></li>
          </ol>
        </div><!-- /.col -->
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>
@endsection

@section('content-main')
<div class="row">
    <div class="col-12">

        <div class="box box-solid box-primary">
            <!-- /.box-header -->
            <div class="box-body">
                <div class="table-responsive">
                    <table id="example1" class="table table-bordered table-striped">
                        <thead>
                        <tr>
                            <th>Job Name</th>
                            <th>Action</th>
                      </tr>
                        </thead>
                        <tbody>
                        @foreach($jobs as $job)
                        <tr>
                        <td>{{$job->title}}</td>
                        <td class="d-flex">
                            <div class="btn-group">
                              @can('update-jobs')
                              <a href="{{route('admin.jobs.edit', $job->id)}}" class="btn btn-outline-info m-1">
                                  <i class="fa fa-pencil"></i>
                              </a>
                              @endcan
                                @can('delete-jobs')                                      
                                <form action="{{route('admin.jobs.destroy',['job'=> $job->id])}}" method="POST" >
                                    @method('DELETE')
                                    @csrf
                                    <button class="btn btn-outline-danger m-1"><i class="fa fa-trash"></i>&nbsp;Del
                                    </button>
                                </form>
                                @endcan
                            </div>
                        </td>
                        </tr>
                        @endforeach
                        </tbody>
                        <tfoot>
                        <tr> 
                        </tr>

                      @can('create-jobs')                
                      <a href="{{ route('admin.jobs.create') }}" class="btn btn-success mb-5">
                      <i class="fa fa-plus"></i> Add New Job</a>
                      @endcan
                </tfoot>
                    </table>
                </div>
            </div>
            <!-- /.box-body -->
        </div>
        <!-- /.box -->

    </div>
    <!-- /.col -->
</div>

@endsection

@extends('dashboard.admin.layouts.app')

@section('content-header')
<div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">All Industries</h1>
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
              @if(session('success'))
                <div class="alert alert-success">
                  {{ session('success') }}
                </div>
              @endif
                <div class="table-responsive">
                    <table id="example1" class="table table-bordered table-striped">
                        <thead>
                        <tr>
                          <th>Industry Name</th>
                          <th>Company</th>
                          <th>Vacancy</th>
                          <th>Active</th>
                          <th>Action</th>
                      </tr>
                        </thead>
                        <tbody>
                        @foreach($industries as $industry)
                        <tr>
                        <td>{{ucwords($industry->name)}}</td>
                        <td>{{$industry->employers_count}}</td>
                        <td>{{$industry->jobs_count}}</td>
                        <td>
                          {{$c=null}}
                          @foreach ($activeJobs as $active)
                            @if ($active->industry_id==$industry->id)
                               <?php   $c =$c+1 ?>
                            @endif 
                          @endforeach
                          {{$c ?? 0}}
                        </td>
                        <td class="d-flex">
                            <div class="btn-group">
                              @can('update-industries')
                              <a href="{{route('admin.industries.edit', $industry->slug)}}" class="btn btn-outline-info m-1">
                                  <i class="fa fa-pencil"></i>
                              </a>
                              @endcan
                                @can('delete-industries')                                      
                                <form action="{{route('admin.industries.destroy',['industry'=> $industry->id])}}" method="POST" >
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

                      @can('create-industries')                
                      <a href="{{ route('admin.industries.create') }}" class="btn btn-success mb-5">
                      <i class="fa fa-plus"></i> Add New industry</a>
                      @endcan
                </tfoot>
                    </table>
                </div>
            </div>
            <!-- /.box-body -->
            {{$industries->links()}}
            <style>
              .w-5{display: none;}
            </style>
        </div>
        <!-- /.box -->

    </div>
    <!-- /.col -->
</div>

@endsection

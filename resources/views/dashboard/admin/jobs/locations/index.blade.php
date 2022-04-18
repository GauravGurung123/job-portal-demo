@extends('dashboard.admin.layouts.app')

@section('content-header')
<div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">All Locations</h1>
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
                        <th>Location Name</th>
                        <th>Vacancy</th>
                        <th>Active</th>
                        {{-- <th>Employer</th> --}}
                        <th>Employer</th>
                        <th>Action</th>
                  </tr>
                    </thead>
                    <tbody>
                    @foreach($locations as $location)
                    <tr>
                    <td>{{$location->name}}</td>
                    <td>{{$location->jobs_count}}</td>
                    <td>
                      {{$c=null}}
                      @foreach ($active_jobs as $active)
                        @if ($active->location_id==$location->id)
                            <?php $c =$c+1 ?>
                        @endif
                      @endforeach
                      {{$c ?? 0}}
                    </td>
                    <td>
                      {{$c=null}}
                    @foreach ($location->employers as $emp)
                    @if ($emp->location_id==$location->id)                          
                    {{-- ({{$emp->org_name}}) --}}
                    <?php $c =$c+1 ?>
                    @endif
                    @endforeach
                    {{$c ?? 0}}
                    </td>
                    {{-- <td>{{$c}}</td> --}}
                    <td class="d-flex">
                        <div class="btn-group">
                          @can('update-locations')
                          <a href="{{route('admin.locations.edit', $location->slug)}}" class="btn btn-outline-info m-1">
                              <i class="fa fa-pencil"></i>
                          </a>
                          @endcan
                            @can('delete-locations')                                      
                            <form action="{{route('admin.locations.destroy',['location'=> $location->id])}}" method="POST" >
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

                  @can('create-locations')                
                  <a href="{{ route('admin.locations.create') }}" class="btn btn-success mb-5">
                  <i class="fa fa-plus"></i> Add New location</a>
                  @endcan
                </tfoot>
              </table>
            </div>
          </div>
          <!-- /.box-body -->
            {{$locations->links()}}
            <style>
              .w-5{display: none;}
            </style>
        </div>
        <!-- /.box -->

    </div>
    <!-- /.col -->
</div>

@endsection

@extends('dashboard.admin.layouts.app')

@section('content-header')
<div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">All Roles</h1>
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
<div class="row">
        <div class="col-12">

            <div class="box box-solid box-primary">
                <!-- /.box-header -->
                <div class="box-body">
                    <div class="table-responsive">
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                            <tr>
                                <th>Role Name</th>
                                <th>Action</th>
                          </tr>
                            </thead>
                            <tbody>
                            @foreach($permissions as $permission)
                            <tr>
                            <td>
                                {{$permission->name}}
                            </td>

                            <td class="d-flex">
                                <div class="btn-group">
                                    <a href="#" class="btn btn-outline-info m-1">
                                        <i class="fa fa-pencil"></i>
                                    </a>
                                    <form action="#" method="POST" >
                                        @method('DELETE')
                                        @csrf
                                        <button class="btn btn-outline-danger m-1"><i class="fa fa-trash"></i>&nbsp;Del
                                        </button>
                                    </form>
                            </td>
                            </tr>
                            @endforeach
                            </tbody>
                            <tfoot>
                            <tr> 
                            </tr>
                            
                    @can('create-roles')        
                        <a href="{{ route('admin.roles.create') }}" class="btn btn-success mb-5">
                            <i class="fa fa-plus"></i> Add New Role</a>
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

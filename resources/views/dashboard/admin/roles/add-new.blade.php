@extends('dashboard.admin.layouts.app')

@section('content-header')
<div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">Add New Role</h1>
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
<section class="content">
     
    <!-- Basic Forms -->
     <div class="box box-solid box-primary">
       <div class="box-header with-border">
         <h6 class="box-subtitle text-white">Add New Role</h6>
       </div>
       <!-- /.box-header -->
       <div class="box-body">
         <div class="row">
           <div class="col">
           <form method="POST" action="{{ route('admin.roles.store') }}" enctype="multipart/form-data">
            @csrf
            @method('POST')
            <div class="form-group">
              @if ($errors->has('name'))
              <span class="text-danger">{{ $errors->first('name') }}</span>
          @endif
              <h5>Role Name <span class="text-danger">*</span> </h5>
              <div class="controls">
                   <input type="text" name="name" class="form-control" required> <div class="help-block"></div>
              </div>
           </div>
              <h5>Permission</h5>
              <div class="row">
                @foreach ($permissions as $key=>$permission)
           <div class="col-md-4">
            <div class="form-group">
              <div class="controls">
              <input type="checkbox" id="checkbox_{{ $key }}" name="permission[]" value="{{ $permission->name}}">
              <label for="checkbox_{{$key}}">{{$permission->name }}</label>
            </div>								
          </div>
          </div>
        @endforeach
              </div>
          
               <div class="text-xs-right">
                    <button type="submit" class="btn btn-info">Add Role</button>
                   </div>
               </form>
                           
           </div>
           <!-- /.col -->
         </div>
         <!-- /.row -->
       </div>
       <!-- /.box-body -->
     </div>
     <!-- /.box -->
     
   </section>
@endsection

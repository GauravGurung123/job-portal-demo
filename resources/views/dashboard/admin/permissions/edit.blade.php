@extends('dashboard.admin.layouts.app')

@section('content-header')
<div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">Edit Permission</h1>
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
       <h6 class="box-subtitle text-white">Edit Permission</h6>
     </div>
     <!-- /.box-header -->
     <div class="box-body">
       <div class="row">
         <div class="col">
         <form method="POST" action="{{ route('admin.permissions.update', $permission->id) }}" enctype="multipart/form-data">
          @csrf
          @method('patch')
          <div class="form-group">
            <h5>Permission Name</h5>
            <div class="controls">
            <input type="text" value="{{ $permission->name }}" name="name" class="form-control"> <div class="help-block"></div>
            </div>
           <div class="text-xs-right">
              <button type="submit" class="btn btn-info">Update Permission</button>
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

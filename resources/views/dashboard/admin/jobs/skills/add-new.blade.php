@extends('dashboard.admin.layouts.app')

@section('content-header')
<div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">Add New Skill</h1>
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
       <h6 class="box-subtitle text-white">Add New Skill</h6>
     </div>
     <!-- /.box-header -->
     <div class="box-body">
       <div class="row">
         <div class="col">
          <form method="POST" action="{{ route('admin.skills.store') }}" enctype="multipart/form-data">
            @csrf
            @method('POST')
            <div class="form-group">
              <h5>Skill Name (<small>use comma to insert multiple skill</small>)</h5>
              <div class="controls">
                <input type="text" name="skills" class="form-control" value="{{old('skills')}}"> <div class="help-block"></div>
                  @if ($errors->has('photos'))
                    <span class="help-block">
                      <strong>{{ $errors->first('photos') }}</strong>
                    </span>
                  @endif
              </div>
            </div>
            <div class="text-xs-right">
              <button type="submit" class="btn btn-info">Add Skill</button>
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

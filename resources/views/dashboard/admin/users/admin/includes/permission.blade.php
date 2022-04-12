<div class="box box-solid box-primary">
    <div class="box-header with-border">
      <h6 class="box-subtitle text-white">Edit Permission</h6>
    </div>
    <!-- /.box-header -->
    <div class="box-body">
        <div class="row">
            <div class="col col-md-12">
                <form method="POST" action="{{ route('admin.changePermission', $admin->id) }}" enctype="multipart/form-data">
                    @csrf
                    @method('patch')
                    <div class="form-group">             
                        <h5>Permission</h5><hr>
                        <div class="row">
                            @foreach ($permissions as $key=>$permission)
                            <div class="col-md-4">
                                <div class="form-group"
                                    <div class="controls">
                                    <input type="checkbox" id="checkbox_{{ $key }}" name="permission[]" value="{{ $permission->name}}" 
                                    {{ $admin->hasPermissionTo($permission->name) ? 'checked' : ''}}>
                                    <label for="checkbox_{{$key}}">{{$permission->name }}</label>
                                </div>								
                            </div>
                            @endforeach
                        </div>
                    </div>
                
                    <div class="text-xs-right">
                        <button type="submit" class="btn btn-info">Update Permission</button>
                    </div>
                </form>
            </div>
        </div>                
    </div>
    <!-- /.box-body -->
</div>
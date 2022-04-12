<div class="row">
    <div class="col-md-6 offset-md-3">            

        <form action="{{route('admin.changeRole',$admin->id) }}" enctype="multipart/form-data" method="POST">
            @method('PATCH')
            @csrf
            @if (Session::get('success-r'))
                <div class="alert alert-success">
                    {{ Session::get('success-r') }}
                </div>
            @endif
            @if (Session::get('fail-r'))
            <div class="alert alert-danger">
                {{ Session::get('fail-r') }}
            </div>
        @endif
            <div class="form-group">
                <label for="role">Current Role:&nbsp;</label>{{$r = $admin->getRoleNames()->first()}}
                <p><label for="role">Select Role</label></p>
                <select class="form-control" name="name" aria-label="Default select example">
                    @foreach ($roles as $role)                                
                        <option {{$r==$role['name'] ? 'selected' : ''}} value="{{$role['name']}}" >{{ucfirst($role['name'])}}</option>
                    @endforeach
                </select>
                <span class="text-danger">@error('role_id'){{ $message }}@enderror</span>
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-primary">Update</button>
            </div>
                
        </form>
    </div>
</div>
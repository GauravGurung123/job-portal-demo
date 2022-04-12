<div class="row">
    <div class="col-md-6 offset-md-3">            
        <form action="{{route('admin.changePwd',$admin->id) }}" enctype="multipart/form-data" method="POST">
        @method('PATCH')
        @csrf
        @if (Session::get('success'))
            <div class="alert alert-success">
                {{ Session::get('success') }}
            </div>
        @endif

        <div class="form-group">
            <label for="password">Current Password</label>
            <input type="password" class="form-control" name="current_password" placeholder="Enter your current password">
            <span class="text-danger">@error('current_password'){{ $message }}@enderror</span>
        </div>
        <div class="form-group">
            <label for="password">Password</label>
            <input type="password" class="form-control" name="new_password" placeholder="Enter new password">
            <span class="text-danger">@error('password'){{ $message }}@enderror</span>
        </div>
        <div class="form-group">
            <label for="cpassword">Confirm Password</label>
            <input type="password" class="form-control" name="new_cpassword" placeholder="confirm password" >
            <span class="text-danger">@error('cpassword'){{ $message }}@enderror</span>
        </div>
        <div class="form-group">
            <button type="submit" class="btn btn-primary">Update</button>
        </div>
            
            
        </form>
    </div>
  
</div>

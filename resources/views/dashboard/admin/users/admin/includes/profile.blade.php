<div class="row">
    <div class="col-md-6 offset-md-3">            
        <form action="{{route('admin.usr-a.update',['usr_a' => $admin->id])}}" enctype="multipart/form-data" method="POST">
        @method('PUT')
        @if (Session::get('success-p'))
            <div class="alert alert-success">
                {{ Session::get('success-p') }}
            </div>
        @endif
        @if (Session::get('fail'))
        <div class="alert alert-danger">
            {{ Session::get('fail') }}
        </div>
        @endif

        @csrf
            <div class="form-group">
                <label for="name">Full Name</label>
                <input type="text" class="form-control" name="name" value="{{ old('name') ?? $admin->name}}">
                <span class="text-danger">@error('name'){{ $message }}@enderror</span>
            </div>
            <div class="form-group">
            <label for="username">UserName</label>
            <input type="text" class="form-control" name="username" value="{{ old('username') ?? $admin->username }}">
            <span class="text-danger">@error('username'){{ $message }}@enderror</span>
        </div>
            <div class="form-group">
            <label for="email">Email</label>
            <input type="text" class="form-control" name="email" value="{{ old('email') ?? $admin->email }}">
            <span class="text-danger">@error('email'){{ $message }}@enderror</span>
        </div>
        <div class="form-group">
            <label for="image">Upload Profile Picture</label>
            <input type="file" class="form-control" name="image" value="{{ old('image') }}">
            <span class="text-danger">@error('image'){{ $message }}@enderror</span>
            
        </div>
        <div class="form-group">
            <button type="submit" class="btn btn-primary">Update</button>
        </div>
            
        </form>
    </div>
    {{-- <img src="{{ asset('images/'.$admin['profile_photo_path']) }}" height="34px" width="44px" alt="no image"> --}}
    
</div>

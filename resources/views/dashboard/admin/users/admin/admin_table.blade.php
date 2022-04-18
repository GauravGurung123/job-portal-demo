<table class="table table-hover text-nowrap">
    <thead>
        <tr>
            <th>S/N</th>
            <th>Status</th>
            <th>User</th>
            <th>Username</th>
            <th>Email Address</th>
            <th>Profile Image</th>
            @if (auth()->user()->hasRole('super admin'))                                        
            <th>Action</th>
            @endif    
        </tr>
    </thead>
    <tbody>
        @forelse ($admins as $admin)
            <tr>
                
                <td>{{ $loop->iteration }}</td>
                <td>
                <span class="badge badge-@if($admin['status'] == 'Active')success @elseif($admin['status'] == 'Blocked')danger @endif ">{{$admin['status']}}</span>   
                </td>
                <td>{{ $admin->name }}</td>
                <td>{{ $admin->username }}</td>
                <td>{{ $admin->email }}</td>
                <td>
                    <img src="{{ asset('images/'.$admin['profile_photo_path']) }}" height="34px" width="44px" alt="no image">
                </td>
                <td>
                    @if (auth()->user()->hasRole('super admin'))                                        
                    <div class="btn-group">
                        @if ($admin->hasRole('super admin'))
                        #    
                        @else
                            @can('update-admins')                                        
                            <a href="{{route('admin.usr-a.edit',['usr_a' => $admin->username])}}" class="btn btn-outline-info m-1">
                                <i class="fa fa-pencil"></i>
                            </a>
                            @endcan
                            @can('delete-admins')                                        
                            <form action="{{ route('admin.usr-a.destroy',['usr_a' => $admin->id ]) }}" method="POST" >
                                @method('DELETE')
                                @csrf
                                <button class="btn btn-outline-danger m-1"><i class="fa fa-trash"></i>&nbsp;Del
                                </button>
                            </form>
                            @endcan
                        @endif
                    </div>
                    @endif
                </td>
            </tr>
        @empty
            <tr><td>No Admin Yet</td></tr>
        @endforelse
        

    </tbody>
</table>
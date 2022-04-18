<table class="table table-hover text-nowrap">
    <thead>
        <tr>
            <th>S/N</th>
            <th>Status</th>
            <th>Username</th>
            <th>Organisation</th>
            <th>Email Address</th>
            <th>Org. Logo</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        @forelse ($employers as $employer)
            <tr>
                
                <td>{{ $loop->iteration }}</td>
                <td>
                    <span class="badge badge-@if($employer['status'] == 'Active')success @elseif($employer['status'] == 'Blocked')danger @endif ">{{$employer['status']}}</span>   
                </td>
                <td>{{ $employer->username }}</td>
                <td>{{ $employer->org_name }}</td>
                <td>{{ $employer->email }}</td>
                <td>
                    <img src="{{ asset('images/'.$employer['profile_photo_path']) }}" height="34px" width="44px" alt="no image">
                </td>
                <td>
                    <div class="btn-group">
                        @can('update-employers')                                            
                        <a href="{{route('admin.usr-e.edit',['usr_e' => $employer->username])}}" class="btn btn-outline-info m-1">
                            <i class="fa fa-pencil"></i>
                        </a>
                        @endcan
                        @can('delete-employers')                        
                        <form action="{{route('admin.usr-e.destroy',['usr_e' => $employer->id])}}" method="POST" >
                            @method('DELETE')
                            @csrf
                            <button class="btn btn-outline-danger m-1"><i class="fa fa-trash"></i>&nbsp;Del
                            </button>
                        </form>
                        @endcan
                    </div>
                </td>
            </tr>
        @empty
            <tr><td>No Employer Yet</td></tr>
        @endforelse
        

    </tbody>
</table>
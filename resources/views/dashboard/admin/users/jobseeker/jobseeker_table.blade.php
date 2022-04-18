<table class="table table-hover text-nowrap">
    <thead>
        <tr>
            <th>S/N</th>
            <th>Status</th>
            <th>Fullname</th>
            <th>username</th>
            <th>Email Address</th>
            <th>Profile Image</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        @forelse ($jobseekers as $jobseeker)
            <tr>
                
                <td>{{ $loop->iteration }}</td>
                <td>
                    <span class="badge badge-@if($jobseeker['status'] == 'Active')success @elseif($jobseeker['status'] == 'Blocked')danger @endif ">{{$jobseeker['status']}}</span>   
                </td>
                <td>{{ $jobseeker->name }}</td>
                <td>{{ $jobseeker->username }}</td>
                <td>{{ $jobseeker->email }}</td>
                <td>
                    <img src="{{ asset('images/'.$jobseeker['profile_photo_path']) }}" height="34px" width="44px" alt="no image">
                </td>
                <td>
                    <div class="btn-group">
                        @can('edit-jobseekers')                                
                        <a href="{{route('admin.usr-j.edit',['usr_j' => $jobseeker->username])}}" class="btn btn-outline-info m-1">
                            <i class="fa fa-pencil"></i>
                        </a>
                        @endcan
                        @can('delete-jobseekers')
                        <form action="{{ route('admin.usr-j.destroy',['usr_j' => $jobseeker->id ]) }}" method="POST" >
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
            <tr><td>No Jobseeker Yet</td></tr>
        @endforelse
        

    </tbody>
</table>
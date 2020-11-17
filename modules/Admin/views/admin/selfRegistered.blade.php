@extends('home')

@section('cont')
<h3 class="p-3 display-4" style="display:inline">Activate Users</h3>
<input type="text" 
    style=" float: right; padding: 6px; margin-top: 20px; margin-right: 16px;border: none;font-size: 17px;" 
    placeholder="Search..." size="30">
<hr>
<div class="flex row border-secondary rounded-lg ml-3">
    <span>
        <h5 class="p-3">User Details</h5>
    </span>
    <span class="ml-5">
        <h3 class="text-center bg-success text-light">{{session('message')}}</h3>
    </span>


    <table class="table table-dark table-striped border-secondary rounded-lg mr-4">
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Organization</th>
                <th>Email</th>
                <th>Role</th>
                <th>Status</th>
                <th>More Data</th>
                <th>Activate</th>
            </tr>
        </thead>
        <tbody>
        @foreach($users as $user)
            <tr>
                <td>{{$user->id}}</td>
                <td>{{$user->name}}</td>
                @if($user->organization == NULL)
                <td>Unassigned</td>
                @else
                <td>{{$user->organization->title}}</td>
                @endif
                <td>{{$user->email}}</td>
                @if($user->role == NULL)
                <td>Unassigned</td>
                @else
                <td>{{$user->role->title}}</td>
                @endif
                @switch($user->status)
                @case('0')
                <td>Inactive</td>
                @break;
                @case('1')
                <td>Active</td>
                @break;
                @endswitch

                <!-- Opens the more view -->
                <td><a href="/user/more/{{$user->id}}" class="btn btn-outline-info" role="button">...</a></td>

                <!-- opens the activate view -->
                <td><a href="/admin/showActivate/{{$user->id}}" class="btn btn-outline-success" role="button">Activate</a></td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>

@endsection
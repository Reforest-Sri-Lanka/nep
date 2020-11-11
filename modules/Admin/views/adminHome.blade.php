@extends('home')

@section('cont')
<h3 class="p-3 display-4" style="display:inline">Administrator</h3>
<input type="text" style=" float: right; padding: 6px; margin-top: 20px; margin-right: 16px;border: none;font-size: 17px;" placeholder="Search..." size="30">
<hr>
<div class="flex row border-secondary rounded-lg ml-3 justify-content-between">
    <span>
        <h5 class="p-3">User Details</h5>
    </span>
    <span>
        <h3 class="text-center bg-success text-light">{{session('message')}}</h3>
    </span>
    <span>
        <h3 class="text-center bg-danger text-light">{{session('danger')}}</h3>
    </span>
    <span>
        <a href="/admin/selfRegistered" class="btn btn-success mr-4" role="button">Activate Users</a>
        <a href="/admin/create" class="btn btn-info mr-4" role="button">Create User</a>
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
                <th>Change Privilege</th>
                <th>Edit User</th>
                <th>Disable User</th>
            </tr>
        </thead>
        <tbody>
            @foreach($users as $user)
            <tr>
                <td>{{$user->id}}</td>
                <td>{{$user->name}}</td>
                @switch($user->organization)
                    @case('0')
                    <td>Reforest Sri Lanka</td>
                    @break;
                    @case('1')
                    <td>Ministry of Environment</td>
                    @break;
                    @case('2')
                    <td>Central Environmental Authority</td>
                    @break;
                    @case('3')
                    <td>Ministry of Wildlife</td>
                    @break;
                    @case('4')
                    <td>Road Development Authority</td>
                    @break;
                    @default
                    <td>Other</td>
                @endswitch
                <td>{{$user->email}}</td>
                @switch($user->role)
                    @case('0')
                    <td>Admin</td>
                    @break;
                    @case('1')
                    <td>Head Of Organization</td>
                    @break;
                    @case('2')
                    <td>Manager</td>
                    @break;
                    @case('3')
                    <td>Staff</td>
                    @break;
                    @case('4')
                    <td>Citizen</td>
                    @break;
                @endswitch
                @switch($user->status)
                    @case('0')
                    <td>Inactive</td>
                    @break;
                    @case('1')
                    <td>Active</td>
                    @break;
                @endswitch
                <td class="text-center"><a href="/admin/more/{{$user->id}}" class="btn btn-outline-info mr-4" role="button">...</a></td>
                <td class="text-center"><a href="/administrator/editpriviledge/{{$user->id}}" class="btn btn-outline-info" role="button">Privilege</a></td>
                <td><a href="/admin/edit/{{$user->id}}" class="btn btn-outline-warning" role="button">Edit</a></td>
                <!-- Delete button using JS and form-->
                <td>
                    <button class="btn btn-outline-danger" onclick="event.preventDefault();
                            document.getElementById('form-delete-{{$user->id}}').submit()">Delete</button>

                    <form id="{{'form-delete-'.$user->id}}" style="display:none" method="post" action="/admin/delete/{{$user->id}}">
                        @csrf
                        @method('delete');
                    </form>
                </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
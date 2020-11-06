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
        <a href="#" class="btn btn-info mr-4" role="button" data-toggle="modal" data-target="#userCreate">Create User</a>
    </span>
    
    @include('test.modals')

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
            @for($i = 0; $i < 10; $i++) <tr>
                <td>735242</td>
                <td>Saman Perera</td>
                <td>Environment Ministry</td>
                <td>saman@gmail.com</td>
                <td>Admin</td>
                <td>Active</td>
                <td class="text-center"><a href="#" class="btn btn-outline-info" role="button" data-toggle="modal" data-target="#moreInfo">...</a></td>
                <td class="text-center"><a href="#" class="btn btn-outline-info" role="button" data-toggle="modal" data-target="#privilege">Privilege</a></td>
                <td><a href="#" class="btn btn-outline-warning" role="button" data-toggle="modal" data-target="#userEdit">Edit</a></td>
                <td><a href="#" class="btn btn-outline-danger" role="button">Disable</a></td>
                </tr>
                @endfor
        </tbody>
    </table>
</div>
@endsection
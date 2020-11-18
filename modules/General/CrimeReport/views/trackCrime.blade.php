@extends('home')

@section('cont')
<div class="row justify-content-between">
    <span>
    <h3 class="p-3 display-4">My crime reports</h3>
    </span>
    <span>
        <h3 class="text-center bg-success text-light">{{session('message')}}</h3>
    </span>
    <span>
        <h3 class="text-center bg-danger text-light">{{session('danger')}}</h3>
    </span>    
<hr>
</div>
<div class="row justify-content-center border-secondary rounded-lg ml-3">
    <table class="table table-dark table-striped border-secondary rounded-lg mr-4">
        <thead>
            <tr>
                <th>ID</th>
                <th>crime type</th>
                <th>description</th>
                <th>Location</th>
                <th>Date complained logged</th>
                <th>Action taken</th>
                <th>Status</th>
            </tr>
        </thead>
        <tbody>
            @foreach($Crimes as $row) <tr>
                <td>{{$row['id']}}</td>
                <td>{{$row['crime_type']}}</td>
                <td>{{$row['description']}}</td>
                <td>{{$row['polygon']}}</td>
                <td>{{$row['created_at']}}</td>
                <td>{{$row['action_taken']}}</td>
                <td>{{$row['status']}}</td>
                </tr>
                @endforeach
        </tbody>
    </table>
</div>
@endsection
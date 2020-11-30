@extends('home')

@section('cont')
<div class="row justify-content-between">
    <span>
    <h3 class="p-3 display-4">Applications assigned to me</h3>
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
                <th>Description</th>
                <th>prerequisite</th>
                <th>Date assigned</th>
            </tr>
        </thead>
        <tbody>
            @foreach($Process_items as $row) <tr>
                <td>{{$row['id']}}</td>
                <td>{{$row['remark']}}</td>
                <td>Crime report</td>
                <td>{{$row['created_at']}}</td>
                <td><a href='/check/{{ $row['id'] }}' class="btn btn-outline-warning" role="button" >check</a></td>
                </tr>
                @endforeach
        </tbody>
    </table>
</div>
@endsection

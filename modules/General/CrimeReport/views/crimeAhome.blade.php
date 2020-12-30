@extends('home')

@section('cont')

<span>
<h3 class="p-3 display-4">Applications to be assigned to authorities</h3>
</span>
<span>
    <h3 class="text-center bg-success text-light">{{session('message')}}</h3>
</span>
<span>
    <h3 class="text-center bg-danger text-light">{{session('danger')}}</h3>
</span>
    
<hr>
<div class="row justify-content-center border-secondary rounded-lg ml-3">
<table class="table table-dark table-striped border-secondary rounded-lg mr-4">
        <thead>
            <tr>
                <th>ID</th>
                <th>Application type</th>
                <th>status</th>
                
                <th>Date application logged</th>
                <th>Assign</th>
            </tr>
        </thead>
        <tbody>
            @foreach($Process_Items as $row) <tr>
                <td>{{$row['id']}}</td>
                <td>{{$row['form_type']}}</td>
                <td>{{$row['status']}}</td>
                
                <td>{{$row['created_at']}}</td>
                <td><a href='/assign/{{ $row['id'] }}' class="btn btn-outline-warning" role="button" >Assign</a></td>
                <!-- <td><a href="#" class="btn btn-outline-danger" role="button">Disable</a></td> -->
                </tr>
                @endforeach
        </tbody>
    </table>
</div>
@endsection
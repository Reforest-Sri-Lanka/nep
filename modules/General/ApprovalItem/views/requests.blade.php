@extends('home')

@section('cont')

<kbd><a href="/user/index" class="text-white font-weight-bolder"><i class="fas fa-chevron-left"></i></i> BACK</a></kbd>
<div class="flex row border-secondary rounded-lg ml-3 justify-content-between">
    <span>
        <h3 class="p-3">Your Requests</h3>
    </span>
    <table class="table table-dark table-striped border-secondary rounded-lg mr-4">
        <thead>
            <tr>
                <th>Process ID</th>
                <th>Type</th>
                <th>Date Created</th>
                <th>Status</th>
                <th>More Data</th>
            </tr>
        </thead>
        <tbody>
            @foreach($items as $item)
            <tr>
                <td>{{$item->id}}</td>
                <td>{{$item->form_type->type}}</td>
                <td>{{$item->created_at}}</td>
                <td>{{$item->status->type}}</td>
                <td><a href="/dev-project/show/{{$item->id}}" class="text-light">See full request</a></td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
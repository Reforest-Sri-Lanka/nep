@extends('home')

@section('cont')

<kbd><a href="/user/index" class="text-white font-weight-bolder"><i class="fas fa-chevron-left"></i></i> BACK</a></kbd>
<div class="flex row border-secondary rounded-lg ml-3 justify-content-between">

    <h3 class="p-3 display-5" style="display:inline">Your Requests</h3>

    <table class="table table-hover table-light mr-4">
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
                @if($item->form_type_id == 1)
                <td><a href="/tree-removal/show/{{$item->id}}" class="text-dark">See full request</a></td>
                @elseif($item->form_type_id == 2)
                <td><a href="/dev-project/show/{{$item->id}}" class="text-dark">See full request</a></td>
                @elseif($item->form_type_id == 3)
                <td><a href="/env-restoration/show/{{$item->id}}" class="text-dark">See full request</a></td>
                @elseif($item->form_type_id == 4)
                <td><a href="/crime-report/viewcrime/{{$item->id}}" class="text-dark">See full request</a></td>
                @elseif($item->form_type_id == 5)
                <td><a href="/land/show/{{$item->id}}" class="text-dark">See full request</a></td>
                @endif
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
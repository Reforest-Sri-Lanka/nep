@extends('home')

@section('cont')
<h3 class="p-3 display-4" style="display:inline">Environment Restoration Module</h3>
<hr>
<div class="flex row border-secondary rounded-lg ml-3 justify-content-between">
    <span>
        <h5 class="p-3">Environment Restoration Projects</h5>
    </span>
    <span>
        <h3 class="text-center bg-success text-light">{{session('message')}}</h3>
    </span>
    <span>
	<a href="/env-restoration/myIndex" class="btn btn-info mr-4" role="button">View My Projects</a>
        <a href="/env-restoration/create" class="btn btn-info mr-4" role="button">Add New Project</a>
    </span>

    <table class="table table-dark table-striped border-secondary rounded-lg mr-4">
        <thead>
            <tr>
                <th>ID</th>
                <th>Project Title</th>
                <th>Restoration Activity</th> 
                <th>Ecosystem</th>
                <th>Organization</th>
                <th>Status</th>
                <th>More Data</th>
            </tr>
        </thead>
        <tbody>
            @foreach($restorations as $restoration)
            <tr>
                <td>{{$restoration->id}}</td>
                <td>{{$restoration->title}}</td>

                @if($restoration->environment_restoration_activity == NULL)
                <td>Unassigned</td>
                @else
                <td>{{$restoration->environment_restoration_activity->title}}</td>
                @endif

                @if($restoration->eco_system == NULL)
                <td>Unassigned</td>
                @else
		        <td>{{$restoration->eco_system->title}}</td>
                @endif

                @if($restoration->organization == NULL)
                <td>Unassigned</td>
                @else
                <td>{{$restoration->organization->title}}</td>
                @endif 

                @switch($restoration->status)
                @case('1')
                <td>Pending</td>
                @break;
                @case('3')
                <td>Completed</td>
                @endswitch

                <td class="text-center"><a href="/env-restoration/show/{{$restoration->id}}" class="btn btn-outline-info" role="button">...</a></td>
            </tr>
            @endforeach
        </tbody>
    </table>
    <div class="row align-items-center">
        <button type="button" class="btn btn-link" > Previous
            <a href="{{$restorations->previousPageUrl()}}"></a>
        </button>
        @for($i=1;$i<=$restorations->lastPage();$i++)
            <button type="button" class="btn btn-link">
                <a href="{{$restorations->url($i)}}">{{$i}}</a>
            <button type="button" class="btn btn-link">
        @endfor
        <button type="button" class="btn btn-link"> Next
            <a href="{{$restorations->nextPageUrl()}}"></a>
        </button>
    </div>
</div>
@endsection
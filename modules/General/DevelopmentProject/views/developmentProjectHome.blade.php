@extends('general')

@section('general')
<div class="row justify-content-center border-secondary rounded-lg ml-3">
    <div class="col-md-3 ">
        <a href="{{ route('create-development-project') }}" class="btn btn-info mr-4" role="button">New Development Project</a>
    </div>
</div>
<div class="row border-secondary rounded-lg ml-3">
<br>
</div>
<div class="row border-secondary rounded-lg ml-3">
    <div class="col border border-muted rounded-lg mr-2 p-4">
        <h5 class="p-3">All development projects in the system</h5>
        <table class="table table-striped mr-4">
            <thead>
                <tr>
                    <th>Date Submitted</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($development_projects as $projects)<tr>
                    <td>{{date('d-m-Y',strtotime($projects->created_at))}}</td>
                    <td>{{$projects->status->type}}</td>
                    <td><a href="/env-restoration/view_environment_restoration_progress/{{$restoration->id}}" class="text-dark"  role="button">View Progress</a></td>
                </tr>
                @endforeach
            </tbody>
        </table>
        <div class="col-sm-12" style="display:flex; align-items:center; justify-content:center;">
            {!!$development_projects->links();!!}
        </div>   
    </div>
</div>
@endsection
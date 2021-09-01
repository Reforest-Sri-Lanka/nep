@extends('general')

@section('general')
<div class="row justify-content-center border-secondary rounded-lg ml-3">
    <div class="col-md-3 ">
        <a href="{{ route('create-environment-restoration') }}" class="btn btn-info mr-4" role="button">New Environment Restoration Project</a>
    </div>
</div>
<div class="row border-secondary rounded-lg ml-3">
<br>
</div>
<div class="row border-secondary rounded-lg ml-3">
    <div class="col border border-muted rounded-lg mr-2 p-4">
        <h5 class="p-3">All environment restorations registered in the system</h5>
        <table class="table table-striped mr-4">
            <thead>
                <tr>
                    <th>Date Submitted</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($restorations as $restoration)<tr>
                    <td>{{date('d-m-Y',strtotime($restoration->created_at))}}</td>
                    <td>{{$restoration->status->type}}</td>
                    <td><a href="/env-restoration/view_environment_restoration_progress/{{$restoration->id}}" class="text-dark"  role="button">View Progress</a></td>
                </tr>
                @endforeach
            </tbody>
        </table>
        <div class="col-sm-12" style="display:flex; align-items:center; justify-content:center;">
            {!!$restorations->links();!!}
        </div>   
    </div>
</div>
@endsection
@extends('general')

@section('general')
<div class="row justify-content-center border-secondary rounded-lg ml-3">
    <div class="col-md-3 ">
        <a href="{{ route('tree-removal') }}" class="btn btn-info mr-4" role="button">New Tree Removal Request</a>
    </div>
</div>
<div class="row border-secondary rounded-lg ml-3">
<br>
</div>
<div class="row border-secondary rounded-lg ml-3">
    <div class="col border border-muted rounded-lg mr-2 p-4">
        <h5 class="p-3">All tree removal requests in the system</h5>
        <table class="table table-striped mr-4">
            <thead>
                <tr>
                    <th>Date Submitted</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($tree_removals as $tree_removal)<tr>
                    <td>{{date('d-m-Y',strtotime($tree_removal->created_at))}}</td>
                    <td>{{$tree_removal->status->type}}</td>
                    <td><a href="/tree-removal/show/{{$tree_removal->id}}" class="text-dark"  role="button">See full request</a></td>
                </tr>
                @endforeach
            </tbody>
        </table>
        <div class="col-sm-12" style="display:flex; align-items:center; justify-content:center;">
            {!!$tree_removals->links();!!}
        </div>   
    </div>
</div>
@endsection
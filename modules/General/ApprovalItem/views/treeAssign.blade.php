@extends('home')

@section('cont')
<h3 class="p-3 display-4">Tree removal request handling</h3>
<hr>
<span>
    <h3 class="text-center bg-success text-light">{{session('message')}}</h3>
</span>
<div class="row justify-content-between">
    <div class="col-md-12">
        <h6>Tree cutting request details</h6>
        <table class="table table-dark table-striped border-secondary rounded-lg mr-4">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Province</th>
                    <th>GS Division</th>
                    <th>Location</th>
                    <th>Special approval</th>
                    <th>Date application made</th>
                    <th>Land size</th>
                    <th>unit</th>
                    <th>No of Trees</th>
                    <th>No of Tree Species</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>{{$treecut->id}}</td>
                    @if($treecut->gs_division == NULL)
                    <td>Unassigned</td>
                    @else
                    <td>{{$treecut->gs_division->gs_division}}</td>
                    @endif
                    @if($treecut->province == NULL)
                    <td>Unassigned</td>
                    @else
                    <td>{{$treecut->province->province}}</td>
                    @endif 
                    <td>----</td>
                    <td>{{$treecut->special_approval}}</td>
                    <td>{{date('d-m-Y',strtotime($treecut->created_at))}}</td>
                    <td>{{$treecut->land_size}}</td>
                    <td>{{$treecut->no_of_trees}}</td>
                    <td>{{$treecut->no_of_tree_species}}<td>
                </tr>
            </tbody>
        </table>
    </div>
</div>
</br>
<div class="row justify-content-between">
    <div class="col-md-8">
        <h6>Prerequisites</h6>
        <table class="table table-dark table-striped border-secondary rounded-lg mr-4">
            <thead>
                <tr>
                    <th>Requested by</th>
                    <th>status</th>
                    <th>remarks</th>
                </tr>
            </thead>
            <tbody>
            @foreach($Prerequisites as $prerequisite)<tr>
                    <td>{{$prerequisite->remark}}</td>
                    <td>{{$prerequisite->requst_organization}}</td>
                    <td>{{$prerequisite->email}}</td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
</div>
<hr>
</br>
<div class="row justify-content-between">
    <div class="col-md-8">
    @switch(Auth::user()->role_id)
    @case('3')
        <h6>Assign Manager/Staff</h6>
    @break;
    @case('4')
        <h6>Assign Staff</h6>
    @endswitch
        <table class="table table-dark table-striped border-secondary rounded-lg mr-4">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>name</th>
                    <th>email</th>
                    <th>assign</th>
                </tr>
            </thead>
            <tbody>
                @foreach($Users as $user)<tr>
                    <td>{{$user->id}}</td>
                    <td>{{$user->name}}</td>
                    <td>{{$user->email}}</td>
                    <td><a href="/approval-item/confirmassign/{{$user->id}}/{{$Process_item->id}}" class="text-muted">assign</a></td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
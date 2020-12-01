@extends('home')

@section('cont')
<h3 class="p-3 display-4">Development Project approval handling</h3>
<hr>
<span>
    <h3 class="text-center bg-success text-light">{{session('message')}}</h3>
</span>

<div class="row justify-content-between">
    <div class="col-md-12">
        <h6>Crime information</h6>
        <table class="table table-dark table-striped border-secondary rounded-lg mr-4">
            <thead>
                <tr>
                    <th>Title</th>
                    <th>Gazzete</th>
                    <th>...</th>
                    <th>Protected Area</th>
                    <th>Land Parcel</th>
                    <th>...</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>{{$devp->title}}</td>
                    <td>{{$devp->gazzete_id}}</td>
                    <td><a href="#" class="text-muted">View</a></td>
                    <td>{{$devp->protected_area}}</td>
                    <td>{{$devp->land_parcel_id}}</td>
                    <td><a href="#" class="text-muted">View</a></td>                 
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


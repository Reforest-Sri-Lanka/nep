@extends('home')

@section('cont')
<div class="container">
    <div class="container bg-white">
        @isset($process_item)
            <div class="row p-4 bg-white">
                <kbd><a href="/general/pending" class="text-white font-weight-bolder"><i class="fas fa-chevron-left"></i></i> BACK</a></kbd>
            </div>
            <div class="row p-4 bg-white">
                <div class="col border border-muted rounded-lg mr-2 p-4">
                        <table class="table table-light table-striped border-secondary rounded-lg mr-4">
                            <thead>
                                <tr>
                                    <th>Type</th>
                                    <th>Date Application logged</th>
                                    @if($process_item->activity_organization ==null)
                                        <th>Organization Assigned (Non registered)</th>
                                    @else
                                        <th>Organization Assigned</th>
                                    @endif
                                    <th>View Application</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>{{$process_item->form_type->type}}</td>
                                    <td>{{date('d-m-Y',strtotime($process_item->created_at))}}</td>
                                    @if($process_item->activity_organization ==null)
                                        <td>{{$process_item->ext_requestor}}</td>
                                    @else
                                        <td>{{$process_item->Activity_organization->title}}</td>
                                    @endif
                                    @if($process_item->form_type_id == 1)
                                    <td><a href="/tree-removal/show/{{$process_item->id}}" class="text-dark">See full request</a></td>
                                    @elseif($process_item->form_type_id == 2)
                                    <td><a href="/dev-project/show/{{$process_item->id}}" class="text-dark">See full request</a></td>
                                    @elseif($process_item->form_type_id == 3)
                                    <td><a href="/env-restoration/show/{{$process_item->id}}" class="text-dark">See full request</a></td>
                                    @elseif($process_item->form_type_id == 4)
                                    <td><a href="/crime-report/viewcrime/{{$process_item->id}}" class="text-dark">See full request</a></td>
                                    @elseif($process_item->form_type_id == 5)
                                    <td><a href="/land/show/{{$process_item->id}}" class="text-dark">See full request</a></td>
                                    @endif
                                </tr>
                            </tbody>
                        </table>
                </div>
            </div>
        @endisset
        @isset($user)
            <div class="row p-4 bg-white">
                <kbd><a href="/user/index" class="text-white font-weight-bolder"><i class="fas fa-chevron-left"></i></i> BACK</a></kbd>
            </div>
            <div class="row p-4 bg-white">
                <div class="col border border-muted rounded-lg mr-2 p-4">
                        <table class="table table-light table-striped border-secondary rounded-lg mr-4">
                            <thead>
                                <tr>
                                    <th>User name</th>
                                    <th>Role</th>
                                    <th>Organization</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>{{$user->name}}</td>
                                    <td>{{$user->role->title}}</td>
                                    @if($user->organization_id ==null)
                                        <td>Not assigned</td>
                                    @else
                                        <td>{{$user->organization->title}}</td>
                                    @endif
                                </tr>
                            </tbody>
                        </table>
                </div>
            </div>
        @endisset
        <div class="row p-4 bg-white">
            <div class="col border border-muted rounded-lg mr-2 p-4">
                <h6>Audit records for the application</h6>
                @if($Audits == null && $Form_Audits == null)
                    <h1>No data</h1>
                @else
                    <table class="table table-light table-striped border-secondary rounded-lg mr-4">
                        <thead>
                            <tr>
                                <th>User Name</th>
                                <th>Organization</th>
                                <th>Action</th>
                                <th>View more details</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($Audits as $audit)
                                <tr>
                                    <td>{{ $audit['user']->name }}</td>
                                    <td>{{ $audit['user']->Organization->title }}</td>
                                    <td>{{ $audit['event'] }}</td>
                                    @isset($process_item)
                                    <td><a href="/security/individual/{{ $audit['id'] }}/{{$process_item->id}}/0" class="text-muted">More</a></td></td>
                                    @endisset
                                    @isset($user)
                                    <td><a href="/security/user-individual/{{ $audit['id'] }}/{{$user->id}}" class="text-muted">More</a></td></td>
                                    @endisset
                                </tr>
                            @endforeach
                            @isset($process_item)
                            @foreach($Form_Audits as $audit)
                                <tr>
                                    <td>{{ $audit['user']->name }}</td>
                                    <td>{{ $audit['user']->Organization->title }}</td>
                                    <td>{{ $audit['event'] }}</td>
                                    <td><a href="/security/individual/{{ $audit['id'] }}/{{$process_item->id}}/1" class="text-muted">More</a></td></td>
                                </tr>
                            @endforeach
                            @endisset
                        </tbody>
                    </table>
                @endif
            </div>      
        </div>
    
    </div>
</div>


@endsection
@extends('home')

@section('cont')
<h3 class="p-3 display-4">General Module</h3>
<hr>
<div class="row justify-content-center">
    <div class="col-md-3">
        <div class="card bg-dark text-light">
            <div class="card-header text-center">
                <a class="nav-link text-light font-italic p-2" href="#">Tree cutting</a>

            </div>
            <div class="card-body text-center text-light">
                <p class="card-text p-2">Quick links</p>
                <a class="nav-link text-light font-italic p-2" href="/tree-removal/form">Application form</a>
                <a class="nav-link text-light font-italic p-2" href="#">Check status</a>
            </div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="card bg-dark text-light">
            <div class="card-header text-center">
                <a class="nav-link text-light font-italic p-2" href="/dev-project/home">Development project </a>
            </div>
            <div class="card-body text-center text-light">
                <p class="card-text p-2">Quick links</p>
                <a class="nav-link text-light font-italic p-2" href="/dev-project/applicationForm">Application form</a>
                <a class="nav-link text-light font-italic p-2" href="#">Check status</a>
            </div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="card bg-dark text-light">
            <div class="card-header text-center">
                <a class="nav-link text-light font-italic p-2" href="/env-restoration/index">Reforest Project</a>
            </div>
            <div class="card-body text-center text-light">
                <p class="card-text p-2">Quick links</p>
                <a class="nav-link text-light font-italic p-2" href="/env-restoration/create">Register new project</a>
                <a class="nav-link text-light font-italic p-2" href="#">Check for reforest details</a>
            </div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="card bg-dark text-light">
            <div class="card-header text-center">
                <a class="nav-link text-light font-italic p-2" href="/crime-report/crimehome">Complaints</a>
            </div>
            <div class="card-body text-center text-light">
                <p class="card-text p-2">Quick links</p>
                <a class="nav-link text-light font-italic p-2" href="/crime-report/newcrime">Make a complaint</a>
                <a class="nav-link text-light font-italic p-2" href="#">Check status</a>
            </div>
        </div>
    </div>


</div>
<hr>
<div class="row border-secondary rounded-lg ml-3">
    <h5 class="p-3">Requests assigned to me</h5>
    <table class="table table-dark table-striped mr-4">
        <thead>
            <tr>
                <th>Category</th>
                <th>Date Submitted</th>
                <th>Requested_by</th>
                <th>remark</th>
                <th>Check and assign</th>
            </tr>
        </thead>
        <tbody>
        @foreach($Process_items as $row)<tr>
            @switch($row['form_type_id']) 
            @case('1')
                <td>Tree Cutting Request</td>
            @break;
            @case('2')
                <td>Development Project</td>
            @break;
            @case('3')
                <td>Reforest project</td>
            @break;
            @case('4')
                <td>Crime Report</td>
            @endswitch
                <td>{{$row['created_at']}}</td>
                <td>{{$row['requst_organization']}}</td>
                <td>{{$row['remark']}}</td>
                <td><a href="/approval-item/assignstaff/{{ $row['id'] }}" class="text-muted">Check</a></td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
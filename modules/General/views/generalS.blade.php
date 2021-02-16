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
                <a class="nav-link text-light font-italic p-2" href="#">Application form</a>
                <a class="nav-link text-light font-italic p-2" href="#">Check status</a>
            </div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="card bg-dark text-light">
        <div class="card-header text-center">
                <a class="nav-link text-light font-italic p-2" href="#">Development project </a>
            </div>
            <div class="card-body text-center text-light">
                <p class="card-text p-2">Quick links</p>
                <a class="nav-link text-light font-italic p-2" href="#">Application form</a>
                <a class="nav-link text-light font-italic p-2" href="#">Check status</a>
            </div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="card bg-dark text-light">
            <div class="card-header text-center">
                <a class="nav-link text-light font-italic p-2" href="#">Reforest Project</a>
            </div>
            <div class="card-body text-center text-light">
                <p class="card-text p-2">Quick links</p>
                <a class="nav-link text-light font-italic p-2" href="#">Register new project</a>
                <a class="nav-link text-light font-italic p-2" href="#">Check for reforest details</a>
            </div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="card bg-dark text-light">
            <div class="card-header text-center">
                <a class="nav-link text-light font-italic p-2" href="#">Crime Reporting</a>
            </div>
            <div class="card-body text-center text-light">
                <p class="card-text p-2">Quick links</p>
                <a class="nav-link text-light font-italic p-2" href="#">Make a complaint</a>
                <a class="nav-link text-light font-italic p-2" href="#">Check status</a>
            </div>
        </div>
    </div>
</div>
<hr>
<div class="row border-secondary rounded-lg ml-3">
    <h5 class="p-3">Requests assigned to me</h5>
</div>
<form action="/general/filterItems" method="get">
      @csrf
    <div class="row justify-content-center">
        <div class="col-md-4">
            <select name="form_type" class="custom-select" required>
                <option value="0" selected>Select</option>
                <option value="1">Tree Cutting permission Requests</option>
                <option value="2">Development project permission Requests</option>
                <option value="3">Environment Restoration Requests</option>
                <option value="4">Crime Reports</option>
            </select>            
        </div>
        <div class="col-md-3">
            <button type="submit" class="btn btn-primary" >Filter</button>
        </div>
    </div>
</form>

</br>
<div class="row border-secondary rounded-lg ml-3">
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
                <td>{{date('d-m-Y',strtotime($row['created_at']))}}</td>
                <td>{{$row['requst_organization']}}</td>
                <td>{{$row['remark']}}</td>
                <td><a href="/approval-item/assignstaff/{{ $row['id'] }}" class="text-muted">Check</a></td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection

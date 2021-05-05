@extends('home')

@section('cont')
<div class="row border-secondary rounded-lg ml-3">

    <div class="col-md-5">
        <h3 class="p-3 display-5">Your Requests</h3>
    </div>
    <div class="col mt-3">
        <form action="/approval-item/filterRequests" method="get">
            <div class="row">
                <div class="col-md-1 mt-2">Filter:</div>
                <div class="col-md-4">
                    <input class="date form-control" type="text" placeholder="Select Date" name="date">
                </div>
                <div class="col-md-4">
                    <select name="organization" class="custom-select">
                        <option selected disabled value="">Select Org.</option>
                        @foreach($organizations as $organization)
                        <option value="{{$organization->id}}">{{$organization->title}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-md-3">
                    <button type="submit" class="btn bg-primary text-light">Submit</button>
                    <a class="btn btn-warning ml-1" href="/approval-item/showRequests"><i class="fa fa-retweet" aria-hidden="true"></i></a>
                </div>
            </div>
        </form>
    </div>
</div>


<div class="row"></div>
<table class="table table-hover table-light mr-4">
    <thead>
        <tr>
            <th>Process ID</th>
            <th>Type</th>
            <th>Date Created</th>
            <th>Request Org.</th>
            <th>Request From</th>
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

            @if($item->request_organization)
            <td>{{$item->requesting_organization->title}}</td>
            @else
            <td>{{$item->other_land_owner_name}} (External)</td>
            @endif

            @if($item->activity_organization)
            <td>{{$item->Activity_organization->title}}</td>
            @else
            <td>{{$item->other_removal_requestor_name}} (External)</td>
            @endif

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
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.0/css/bootstrap.min.css" />
<link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.5.0/css/bootstrap-datepicker.css" rel="stylesheet">
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.5.0/js/bootstrap-datepicker.js"></script>
<script type="text/javascript">
    $('.date').datepicker({
        format: 'yyyy-mm-dd'
    });
</script>
@endsection
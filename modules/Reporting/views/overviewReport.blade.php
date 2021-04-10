<!DOCTYPE html>
<html lang="en">

<head>
    <title>National Environment Platform</title>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <style>
        .img {
            background-position: center center;
            background-repeat: no-repeat;
            background-size: cover;
            width: 100%;
        }
    </style>
</head>

<body>
    <div class="row p-4 bg-white">
        <div class="col border border-muted rounded-lg mr-2 p-4">
            <h1> National Environment Platform</h1>
            <h3>Overview Report of User Requests</h3>
        </div>
    </div>
    <div class="row p-4 bg-white">
        <div class="col border border-muted rounded-lg mr-2 p-4">
            <p>Your customized user request report where</p>
            <table class="table table-striped mr-4">
                <thead>
                    <tr>
                        <th>Category</th>
                        <th>Date Submitted</th>
                        @if(Auth::user()->role_id == 6)
                        <th>Status</th>
                        @else
                        <th>Requested_by</th>
                        @endif
                        <th>Remark</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($process_items as $process_item)
                    <tr>
                        <td>{{$process_item->form_type->type}}</td>
                        <td>{{date('d-m-Y',strtotime($process_item->created_at))}}</td>
                        @if($process_item->request_organization==null && $process_item->other_land_owner_name==null)
                        @if($process_item->created_by_user != null)
                        <td>{{$process_item->created_by_user->name}}</td>
                        @else
                        <td>No details available</td>
                        @endif
                        @elseif($process_item->request_organization==null)
                        <td>{{$process_item->other_land_owner_name}}</td>
                        @else
                        <td>{{$process_item->requesting_organization->title}}</td>
                        @endif
                        <td>{{$process_item->remark}}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    <div class="row p-4 bg-white">
        <div class="col border border-muted rounded-lg mr-2 p-4">
            <p>The following depicts the number of all requests within the last 5 months</p>
            <img src="{{$chart1}}" class="img">
        </div>
    </div>
    <div class="row p-4 bg-white">
        <div class="col border border-muted rounded-lg mr-2 p-4">
            <p>The following depicts the classification of user request based on request type made</p>
            <img src="{{$chart2}}" class="img">
        </div>
    </div>
    <div class="row p-4 bg-white">
        <div class="col border border-muted rounded-lg mr-2 p-4">
            <p>The following depicts the classification of user request based on the organization the request has been assigned to</p>
            <img src="{{$chart3}}" class="img">
        </div>
    </div>
    <div class="row p-4 bg-white">
        <div class="col border border-muted rounded-lg mr-2 p-4">
            <div class="d-flex bg-light justify-content-center">
                <h5 class="text-secondary"> &copy; 2021 by RFSL - LSF - Ministry of Environment</h5><br>
            </div>
        </div>
    </div>
</body>

</html>
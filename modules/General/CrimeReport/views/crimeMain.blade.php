@extends('general')

@section('general')
<div class="row justify-content-center border-secondary rounded-lg ml-3">
    <div class="col-md-3 ">
        <a href="{{ route('crime') }}" class="btn btn-info mr-4" role="button">Make new complaint</a>
    </div>
</div>
<div class="row border-secondary rounded-lg ml-3">
<br>
</div>
<div class="row border-secondary rounded-lg ml-3">
    <div class="col border border-muted rounded-lg mr-2 p-4">
        @if(Auth::user()->role_id == 1 || Auth::user()->role_id == 2)
        <h5 class="p-3">Confirm Organization assigning for new crime reports</h5>
        @elseif(Auth::user()->role_id == 3 || Auth::user()->role_id == 4 )
        <h5 class="p-3">Crime reports assigned to organization</h5>
        @elseif(Auth::user()->role_id == 5) 
        <h5 class="p-3">Crime reports to be investigated</h5>
        @endif
        <table class="table table-striped mr-4">
            <thead>
                <tr>
                    <th>Date Submitted</th>
                    <th>Status</th>
                    @if(Auth::user()->role_id !== 6)
                    <th>Check and Assign</th>
                    @else
                    <th>Check Progress</th>
                    @endif
                    @if(Auth::user()->role_id < 5) 
                        <th>Audit</th>
                    @endif
                </tr>
            </thead>
            <tbody>
                @foreach($Process_items as $process_item)<tr>
                    <td>{{date('d-m-Y',strtotime($process_item->created_at))}}</td>
                    <td>{{$process_item->status->type}}</td>
                    @if($process_item->form_type_id == 3 && $process_item->status_id == 5)
                    <td><a href="/env-restoration/progressView/{{$process_item->id}}" class="text-muted">View Progress</a></td>
                    @elseif(Auth::user()->role_id == 1 ||Auth::user()->role_id == 2)
                    <td><a href="/approval-item/assignorganization/{{$process_item->id}}" class="text-muted">Assign</a></td>
                    @elseif(Auth::user()->role_id == 3 ||Auth::user()->role_id == 4)
                    <td><a href="/approval-item/assignstaff/{{$process_item->id}}" class="text-muted">Assign</a></td>
                    @elseif(Auth::user()->role_id == 5)
                    <td><a href="/approval-item/investigate/{{$process_item->id}}" class="text-muted">Investigate</a></td>
                    @elseif(Auth::user()->role_id == 6)
                    <td><a href="#" class="text-muted">View More Details</a></td>
                    @endif
                    @if(Auth::user()->role_id < 5)
                    <td><a href="/security/process-item/{{$process_item->id}}" class="text-muted">Audit</a></td>
                    @endif
                </tr>
                @endforeach
            </tbody>
        </table>
        <div class="col-sm-12" style="display:flex; align-items:center; justify-content:center;">
            {!!$Process_items->links();!!}
        </div>
    </div>
    <div class="col border border-muted rounded-lg mr-2 p-4">
        <h5 class="p-3">All crime reports made through the system</h5>
        <table class="table table-striped mr-4">
            <thead>
                <tr>
                    <th>Date Submitted</th>
                    <th>Status</th>
                    <th>More Details</th>
                </tr>
            </thead>
            <tbody>
                @foreach($view_crimes as $view_crime)<tr>
                    <td>{{date('d-m-Y',strtotime($view_crime->created_at))}}</td>
                    <td>{{$view_crime->status->type}}</td>
                    <td><a href="/crime-report/viewcrime/{{$view_crime->id}}" class="text-dark">See full request</a></td>
                </tr>
                @endforeach
            </tbody>
        </table>
        <div class="col-sm-12" style="display:flex; align-items:center; justify-content:center;">
            {!!$view_crimes->links();!!}
        </div>   
    </div>
</div>
@endsection
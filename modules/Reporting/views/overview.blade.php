@extends('index')

@section('reporting') 
<div class="container">
    <div class="row p-1 bg-white">
        <div class="col border border-muted rounded-lg mr-1 p-2" style="width:50vw">
            <!-- top -->
            <canvas id="myAreaChart"></canvas>
        </div>
    </div>
    <div class="row p-4 bg-white">
        <div class="col border border-muted rounded-lg mr-1 p-2">
            <!-- middle left -->
            <canvas id="processItemTypeChart" ></canvas>
        </div>
        <div class="col border border-muted rounded-lg mr-1 p-2">
            <!-- middle right -->
            <canvas id="AssignedOrganizationChart"></canvas>
        </div>
    </div>
    @if(Auth::user()->role_id!==6)
    <div class="row p-4 bg-white">
        <div class="col border border-muted rounded-lg mr-1 p-2" style="width:50vw">
            <h4>Customize your report for the requests assigned to your organization</h4>
            <table class="table table-striped mr-4">
                <thead>
                    <tr>
                        <th>Form ID</th>
                        <th>Category</th>
                        <th>Date Submitted</th>
                        <th>Status</th>
                        <th>Requested_by</th>
                        <th>Remark</th>

                    </tr>
                </thead>
                <tbody>
                    @foreach($items as $item)<tr>
                        <td>{{$item->form_id}}</td>
                        <td>{{$item->form_type->type}}</td>
                        <td>{{date('d-m-Y',strtotime($item->created_at))}}</td>
                        <td>{{$item->status_id}}</td>
                        @if($item->requst_organization==null)
                        <td>{{$item->created_by_user->name}}</td>
                        @else
                        <td>{{$item->requsting_organization->title}}</td>
                        @endif
                        <td>{{$item->remark}}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    @endif
</div>
@endsection
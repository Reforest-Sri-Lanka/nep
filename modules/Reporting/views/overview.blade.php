@extends('reportingIndex')

@section('reporting')
<div class="container">

    <div class="row p-1 bg-white">
        <div class="col border border-muted rounded-lg mr-1 p-2" style="height:100%">
            <!-- top -->
            <canvas id="ProcessItemsAreaChart"></canvas>
            <a id="download1" download="ProcessItemsAreaChartImage.png" href="" class="btn btn-primary float-right bg-flat-color-1">
                <!-- Download Icon -->
                <i class="fa fa-download"></i> Download Chart
            </a>
            <!-- <input type="hidden" class="form-control" name="chart1" id="chart1" value=""> -->
        </div>
    </div>

    <div class="row p-1 bg-white" style="height:auto">
        <div class="col border border-muted rounded-lg mr-1 p-2 height:100%">
            <!-- middle left -->
            <canvas id="processItemTypeChart"></canvas>
            <a id="download2" download="processItemTypeChart.png" href="" class="btn btn-primary float-right bg-flat-color-1">
                <!-- Download Icon -->
                <i class="fa fa-download"></i> Download Chart
            </a>
            <!-- <input type="hidden" class="form-control" name="chart2" id="chart2" value=""> -->
        </div>
        <div class="col border border-muted rounded-lg mr-1 p-2 height:100%">
            <!-- middle right -->
            <canvas id="AssignedOrganizationChart"></canvas>
            <a id="download3" download="AssignedOrganizationChart.png" href="" class="btn btn-primary float-right bg-flat-color-1">
                <!-- Download Icon -->
                <i class="fa fa-download"></i> Download
            </a>
            <!-- <input type="hidden" class="form-control" name="chart3" id="chart3" value=""> -->
        </div>
    </div>
    <form action="/reporting/filterOverview" method="get">
        @csrf
        @if(Auth::user()->role_id == 6)
        <h5 class="p-3">Customize my request report</h5>
        @elseif(Auth::user()->role_id < 3)
        <h5 class="p-3">Customize request report of all user requests made</h5>
        @else
        <h5 class="p-3">Customize requests assigned to my organization report</h5>
        @endif
        <div class="row justify-content-center">
            <div class="col-md-4">
                <select name="form_type" class="custom-select" required>
                
                    <option value="0" selected>Select Request Type</option>
                    <option value="1">Tree Cutting permission Requests</option>
                    <option value="2">Development project permission Requests</option>
                    <option value="3">Restoration project permission Requests</option>
                    <option value="4">Crime Reports</option>
                </select>
            </div>

            <div class="col-md-4">
                <select name="time" class="custom-select" required>
                    <option value="0">Select Time Period</option>
                    <option value="1">This Month</option>
                    <option value="2">This Quarter </option>
                    <option value="3">This Year </option>
                </select>
            </div>
            <div class="col-md-3">
                <button type="submit" class="btn btn-primary" name="filter">Filter</button>
            </div>
        </div>
    </form>
    <form action="/reporting/overview-report" method="post" id="overviewReport">
        @csrf
        </br>
        <div class="row border-secondary rounded-lg ml-3">
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
            <input type="hidden" class="form-control" name="chart1" id="chart1" value="">
            <input type="hidden" class="form-control" name="chart2" id="chart2" value="">
            <input type="hidden" class="form-control" name="chart3" id="chart3" value="">
        </div>
        <div style="float:right;">
            <button type="submit" id="overviewReportSubmit" class="btn bd-navbar text-light">Download Request Overview Report</button>
        </div>
    </form>
</div>
<script>
    //Process Items Charts

    //Download Monthly Process Items Chart Image
    document.getElementById("download1").addEventListener('click', function() {
        /*Get image of canvas element*/
        var url_base64jp = document.getElementById("ProcessItemsAreaChart").toDataURL("image/png");
        /*get download button (tag: <a></a>) */
        var a = document.getElementById("download1");
        /*insert chart image url to download button (tag: <a></a>) */
        var inputfield = document.getElementById("");
        a.href = url_base64jp;
    });

    //Download Process Items Type Bar Chart Image
    document.getElementById("download2").addEventListener('click', function() {
        /*Get image of canvas element*/
        var url_base64jp = document.getElementById("processItemTypeChart").toDataURL("image/png");
        /*get download button (tag: <a></a>) */
        var a = document.getElementById("download2");
        /*insert chart image url to download button (tag: <a></a>) */
        a.href = url_base64jp;
    });

    //Download Monthly Process Items Assigned Organization Pie Chart Image
    document.getElementById("download3").addEventListener('click', function() {
        /*Get image of canvas element*/
        var url_base64jp = document.getElementById("AssignedOrganizationChart").toDataURL("image/png");
        /*get download button (tag: <a></a>) */
        var a = document.getElementById("download3");
        /*insert chart image url to download button (tag: <a></a>) */
        a.href = url_base64jp;
    });



    document.getElementById('overviewReport').addEventListener('submit', function(evt) {
        /*Get image of canvas element*/
        var ch1 = document.getElementById("ProcessItemsAreaChart").toDataURL("image/png");
        var ch2 = document.getElementById("processItemTypeChart").toDataURL("image/png");
        var ch3 = document.getElementById("AssignedOrganizationChart").toDataURL("image/png");

        var input1 = document.getElementById("chart1");
        var input2 = document.getElementById("chart2");
        var input3 = document.getElementById("chart3");

        input1.value = ch1;
        input2.value = ch2;
        input3.value = ch3;
    })
</script>
@endsection
@extends('index')

@section('reporting') 
<div class="container">
    <div class="row p-1 bg-white">
        <div class="col border border-muted rounded-lg mr-1 p-2" style="width:50vw">
            <!-- top -->
            <canvas id="TreeRemovalAreaChart"></canvas>
        </div>
    </div>
    <div class="row p-4 bg-white">
        <div class="col border border-muted rounded-lg mr-1 p-2">
            <!-- bottom left -->
            <canvas id="ProvinceTreeRemovalPieChart" ></canvas>
        </div>
        <div class="col border border-muted rounded-lg mr-1 p-2">
            <!-- bottom left -->
            <canvas id="DistrictTreeRemovalPieChart"></canvas>
        </div>
    </div>
</div>
@endsection
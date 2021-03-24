@extends('index')

@section('reporting') 
<div class="container">
    <div class="row p-4 bg-white">
        <div class="col border border-muted rounded-lg mr-2 p-4">
            <!-- top -->
            <canvas id="myAreaChart"></canvas>
        </div>
    </div>
    <div class="row p-4 bg-white">
        <div class="col border border-muted rounded-lg mr-2 p-4">
            <!-- bottom left -->
            <canvas id="processItemTypeChart"></canvas>
        </div>
        <div class="col border border-muted rounded-lg mr-2 p-4">
            <!-- bottom left -->
            <canvas id="AssignedOrganizationChart"></canvas>
        </div>
    </div>
</div>
@endsection
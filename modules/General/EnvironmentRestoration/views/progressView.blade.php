@extends('general')

@section('general')
<h4>Environment Restoration Progress</h4>
<hr>
<div class="container">
    <div class="container bg-white">
        <div class="row p-4 bg-white">
            <div class="col border border-muted rounded-lg mr-2 p-4">
                <dl class="row">
                    <dt class="col-sm-4">Title</dt>
                    <dd class="col-sm-8">: {{$restoration->title}}</dd>
                    <dt class="col-sm-4">Restoration Type</dt>
                    <dd class="col-sm-8">: {{$restoration->Environment_Restoration_Activity->title}}</dd>
                    <dt class="col-sm-4">Ecosystem</dt>
                    <dd class="col-sm-8">: {{$restoration->ecosystems_type->type}}</dd>
                    <dt class="col-sm-4">Eco System Description</dt>
                    <dd class="col-sm-8">: {{$restoration->ecosystems_type->description}}</dd>
                    <dt class="col-sm-4">Plan No </dt>
                    <dd class="col-sm-8">: {{$land->title}}</dd>
                    <dt class="col-sm-4">Surveyor </dt>
                    <dd class="col-sm-8">: {{$land->surveyor_name}}</dd>
                    <dt class="col-sm-4">Province </dt>
                    @if($land->province_id ==0)
                        <dd class="col-sm-8">: No province details</dd>
                    @else
                        <dd class="col-sm-8">: {{$land->province->province}}</dd>
                    @endif
                </dl>
            </div>
            <div class="col border border-muted rounded-lg mr-2 p-4">
                <div id="mapid" style="height:400px;" name="map"></div>
            </div>
        </div>
        <div class="row p-4 bg-white">
            <h5>Progress of the reforestation project in general</h5>
        </div>
        <div class="row p-4 bg-white">
            @if($Updates != null)
                <table class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>Date</th>
                            <th>Situation in general</th>
                            <th>Suggestions made</th>
                            <th>Other Remarks</th>
                            <th>Updated by</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($Updates as $update)
                            <tr>
                            <td>{{date('d-m-Y',strtotime($update->created_at))}}</td>
                            <td>{{$update->situation_update}}</td>
                            <td>{{$update->suggestions}}</td>
                            <td>{{$update->further_remarks}}</td>
                            <td>{{$update->create_user->name}}</td>
                            <tr>
                        @endforeach
                    </tbody>
                </table> 
            @else
                <h6>No progress recorded yet</h6>
            @endif 
        </div>            
        <div class="row p-4 bg-white">
            <h5>Individual species and their latest growth information</h5>
        </div>
        <div class="row p-4 bg-white">
            @if($Species != null)
                <table class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Species Name</th>
                            <th>Scientefic Name</th>
                            <th>Number of trees planted</th>
                            <th>Height</th>
                            <th>Dimentions</th>
                            <th>Previous Remark</th>
                            <th>Current Height</th>
                            <th>Number of successfully grown trees</th>
                            <th>Suggestions for improvement</th>
                            <th>Further Remarks</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($Species as $data)
                            <tr>
                            <td>{{$data->id}}</td>
                            <td>{{$data->environment_restoration_species->Species->title}}</td>
                            <td>{{$data->environment_restoration_species->Species->scientefic_name}}</td>
                            <td>{{$data->environment_restoration_species->quantity}}</td>
                            <td>{{$data->environment_restoration_species->height}}</td>
                            <td>{{$data->environment_restoration_species->dimensions}}</td>
                            <td>{{$data->environment_restoration_species->remarks}}</td>
                            <td>{{$data->current_height}}</td>
                            <td>{{$data->qty_of_successful_trees}}</td>
                            <td>{{$data->improvement_suggestions}}</td>
                            <td>{{$data->futher_remarks}}</td>
                            <tr>
                        @endforeach
                    </tbody>
                </table>
            @else
                <h6>No progress recorded yet</h6>   
            @endif
        </div>
        <div class="row p-4 bg-white">
            @if(($process_item->status_id == 5) && (Auth::user()->organization_id == ($process_item->actvity_organization || $process_item->request_organization)) )
                <a href="/env-restoration/progressUpdate/{{$process_item->id}}" class="btn btn-info mr-4"  role="button">Update Progress</a>
            @endif
        </div>
    </div>
</div>

<script type="text/javascript">
    var center = [7.2906, 80.6337];

    // Create the map
    var map = L.map('mapid').setView(center, 10);

    // Set up the OSM layer 
    L.tileLayer(
        'https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            attribution: 'Data © <a href="http://osm.org/copyright">OpenStreetMap</a>',
            maxZoom: 18
        }).addTo(map);

    

    //FROM LARAVEL THE COORDINATES ARE BEING TAKEN TO THE SCRIPT AND CONVERTED TO JSON
    var polygon = @json($polygon);
    var layer = L.geoJSON(JSON.parse(polygon)).addTo(map);
    

    // Adjust map to show the kml
    var bounds = layer.getBounds();
    map.fitBounds(bounds);

    //add new species data
    
    
        
    
</script>
@endsection
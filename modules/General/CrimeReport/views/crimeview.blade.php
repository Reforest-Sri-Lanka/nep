@extends('home')

@section('cont')

@if(Auth::user())
    <kbd><a href="/approval-item/showRequests" class="text-white font-weight-bolder"><i class="fas fa-chevron-left"></i></i> BACK</a></kbd>
@endif
<div class="container border bg-light">
    @if(($process_item->status_id < 10 || $process_item->status_id == 9) && (Auth::user()->id == $process_item->created_by_user_id)) 
        <div class="row" style="float:right;">
        <a href="/crime-report/crimeedit/{{$process_item->id}}" class="btn btn-info mr-4"  role="button">Edit</a>
        </div>
    @endif
    <dl class="row">

        <dt class="col-sm-3">Category:</dt>
        <dd class="col-sm-9">{{$process_item->form_type->type}}</dd>

        <dt class="col-sm-3">Crime Type:</dt>
        <dd class="col-sm-9">{{$crime->Crime_type->type}}</dd>

        <dt class="col-sm-3">Description:</dt>
        <dd class="col-sm-9">{{$crime->description}}</dd>

        <dt class="col-sm-3">Land Parcel Title:</dt>
        <dd class="col-sm-9">
            <p>{{$crime->land_parcel->title}}</p>
        </dd>

        <dt class="col-sm-3">Activity Organization:</dt>
        <dd class="col-sm-9">
            <p>{{$process_item->Activity_organization->title}}</p>
        </dd>

        <dt class="col-sm-3">complainant's contact:</dt>
        <dd class="col-sm-9">
            <p>{{$process_item->requestor_email}}</p>
        </dd>

        <dt class="col-sm-3">Status:</dt>
        <dd class="col-sm-9">{{$process_item->status->type}}</dd>

        <dt class="col-sm-3">Created at:</dt>
        <dd class="col-sm-9">{{$crime->created_at}}</dd>
    </dl>
    <div id="mapid" style="height:400px;" name="map"></div>
    <div class="row">
        @isset($Photos)
            <div class="row p-4 bg-white">
                <div class="card-deck">
                    @foreach($Photos as $photo)
                    <div class="card" style="background-color:#99A3A4">
                        <img class="card-img-top" src="{{asset('/storage/'.$photo)}}" alt="photo">
                        <div class="card-body text-center">
                        <a class="nav-link text-dark font-italic p-2" href="/crime-report/downloadimage/{{$photo}}">Download Image</a>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        @endisset
        @empty($Photos)
            <p>No photos included in the application</p>
        @endempty
    </div>
</div>



<script type="text/javascript">
    

    /// MAP MODULE
    var center = [7.2906, 80.6337];

    // Create the map
    var map = L.map('mapid').setView(center, 10);

    // Set up the OSM layer 
    L.tileLayer(
        'https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            attribution: 'Data © <a href="http://osm.org/copyright">OpenStreetMap</a>',
            maxZoom: 18
        }).addTo(map);


    var polygon = @json($polygon);
    var layer = L.geoJSON(JSON.parse(polygon)).addTo(map);

    // Adjust map to show the kml
    var bounds = layer.getBounds();
    map.fitBounds(bounds);
    
</script>
@endsection
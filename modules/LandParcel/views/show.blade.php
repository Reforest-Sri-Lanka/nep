@extends('home')

@section('cont')

<kbd><a href="/approval-item/showRequests" class="text-white font-weight-bolder"><i class="fas fa-chevron-left"></i></i> BACK</a></kbd>
<hr>
<div class="container">

    <dl class="row">
        <dt class="col-sm-3">Title:</dt>
        <dd class="col-sm-9">{{$land->title}}</dd>

        <dt class="col-sm-3">Governing Organizations:</dt>
        <dd class="col-sm-9">
            <ul class="list-unstyled">
                @foreach($land->governing_organizations as $governing_organization)
                @switch($governing_organization)
                @case(1)
                <li>Reforest Sri Lanka</li>
                @break
                @case(2)
                <li>Ministry of Environment</li>
                @break
                @case(3)
                <li>Central Environmental Authority</li>
                @break
                @case(4)
                <li>Ministry of Wildlife</li>
                @break
                @case(5)
                <li>Road Development Authority</li>
                @break
                @default
                <li>Other</li>
                @endswitch
                @endforeach
            </ul>
        </dd>

        <dt class="col-sm-3">Status:</dt>
        <dd class="col-sm-9">{{$land->status->type}}</dd>

        <dt class="col-sm-3 text-truncate">Created at:</dt>
        <dd class="col-sm-9">{{$land->created_at}}</dd>
    </dl>
    <div class="container border border-dark border-rounded"><div id="mapid" style="height:400px;" name="map"></div></div>
</div>

<script>
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
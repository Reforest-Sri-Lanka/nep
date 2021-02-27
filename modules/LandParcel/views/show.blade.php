@extends('home')

@section('cont')

<kbd><a href="/approval-item/showRequests" class="text-white font-weight-bolder"><i class="fas fa-chevron-left"></i></i> BACK</a></kbd>
<div class="container">
    <form>
        <div class="input-group mb-3">
            <div class="input-group-prepend">
                <span class="input-group-text">Title: </span>
            </div>
            <input type="text" class="form-control" placeholder="{{$land->title}}" readonly>
        </div>

        <div class="form-check border-secondary rounded-lg mb-3" style="background-color:#ebeef0">
            <label class="mt-2"> Governing Organizations: </label>
            <hr>
            <ul class="list-unstyled">
                @foreach($land->governing_organizations as $governing_organization)
                @switch($governing_organization)
                @case(1)
                <li class="ml-5">Reforest Sri Lanka</li>
                @break
                @case(2)
                <li class="ml-5">Ministry of Environment</li>
                @break
                @case(3)
                <li class="ml-5">Central Environmental Authority</li>
                @break
                @case(4)
                <li class="ml-5">Ministry of Wildlife</li>
                @break
                @case(5)
                <li class="ml-5">Road Development Authority</li>
                @break
                @default
                <li class="ml-5">Other</li>
                @endswitch
                @endforeach
            </ul>
        </div>

        <div class="input-group mb-3">
            <div class="input-group-prepend">
                <span class="input-group-text">Status: </span>
            </div>
            <input type="text" class="form-control" placeholder="{{$land->status->type}}" readonly>
        </div>


        <div class="input-group mb-3">
            <div class="input-group-prepend">
                <span class="input-group-text">Created at</span>
            </div>
            <input type="text" class="form-control" placeholder="{{$land->created_at}}" readonly>
        </div>
        <hr>
        <br>
        <div id="mapid" style="height:400px;" name="map"></div>
    </form>
</div>

<script>
    /// BACK BUTTON
    function goBack() {
        window.history.back();
    }

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

    // add a marker in the given location
    L.marker(center).addTo(map);

    var polygon = @json($polygon);
    L.geoJSON(JSON.parse(polygon)).addTo(map);
</script>
@endsection
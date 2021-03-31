@extends('home')

@section('cont')

<kbd><a href="/approval-item/showRequests" class="text-white font-weight-bolder"><i class="fas fa-chevron-left"></i></i> BACK</a></kbd>

<div class="container border bg-light">
    <form>
        <div class="input-group mb-3 mt-3">
            <div class="input-group-prepend">
                <span class="input-group-text">Crime Type</span>
            </div>
            <input type="text" class="form-control" placeholder="{{$crime->Crime_type->type}}" readonly>
        </div>

        <div class="input-group mb-3">
            <div class="input-group-prepend">
                <span class="input-group-text">Description</span>
            </div>
            <input type="text" class="form-control" placeholder="{{$crime->description}}" readonly>
        </div>

        <div class="input-group mb-3">
            <div class="input-group-prepend">
                <span class="input-group-text">Photos</span>
            </div>
            
            <div class="input-group-prepend">
                @isset($Photos)
                    @if (count($Photos) > 0)
                            @foreach($Photos as $photo)
                                <div class="col border border-muted rounded-lg mr-2 p-4">
                                    <img class="img-responsive" src="{{URL::asset('/storage/crimeEvidence/27NO041NO0oie_7M8XMhI9uOs1 (2).png')}}" alt="photo">
                                    <a class="nav-link text-dark font-italic p-2" href="/crime-report/downloadimage/{{$photo}}">Download Image</a>
                                </div>
                            @endforeach
                    @endif
                    @if (count($Photos) < 1)
                            <p>No photos included in the application</p>
                    @endif
                @endisset
                @empty($Photos)
                    <p>No photos included in the application</p>
                @endempty
            </div>
        </div>

        <div class="input-group mb-3">
            <div class="input-group-prepend">
                <span class="input-group-text">Land Parcel</span>
            </div>
            <input type="text" class="form-control" placeholder="{{$crime->land_parcel->title}}" readonly>
        </div>

        <div class="input-group mb-3">
            <div class="input-group-prepend">
                <span class="input-group-text">Status</span>
            </div>
            <input type="text" class="form-control" placeholder="{{$crime->status_id}}" readonly>
        </div>

        <div class="input-group mb-3">
            <div class="input-group-prepend">
                <span class="input-group-text">Created at</span>
            </div>
            <input type="text" class="form-control" placeholder="{{$crime->created_at}}" readonly>
        </div>

        <div id="mapid" style="height:400px;" name="map"></div>
    </form>

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
    console.log(polygon);

    //ADDING THE JSOON COORDINATES TO MAP
    L.geoJSON(JSON.parse(polygon)).addTo(map);
    
</script>
@endsection
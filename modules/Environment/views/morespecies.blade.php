@extends('Envmain')

@section('env')

<kbd><a href="/environment/updatedataspecies" class="text-white font-weight-bolder"><i class="fas fa-chevron-left"></i></i> BACK</a></kbd>

<div class="container">
    <h2 style="text-align:center;" class="text-dark">Details of the Request</h2>
    <hr>
    <div class="row justify-content-md-center border p-4 bg-white">
        <div class="col-6 ml-3">
            <form>
                 <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text">User Id</span>
                    </div>
                    <input type="integer" class="form-control" placeholder="{{ $species->created_by_user_id}}" readonly>
                </div>

                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text">Species Type</span>
                    </div>
                    <input type="text" class="form-control" placeholder="{{$species->type}}" readonly>
                </div>
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text">Species Title</span>
                    </div>
                    <input type="text" class="form-control" placeholder="{{$species->title}}" readonly>
                </div>

                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text">Scientific Name</span>
                    </div>
                    <input type="text" class="form-control" placeholder="{{$species->scientefic_name}}" readonly>
                </div>

                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text">Description</span>
                    </div>
                    <input type="text" class="form-control" placeholder="{{$species->description}}" readonly>
                </div>
                <div class="border border-dark border-rounded">
                    <div id="mapid" style="height:400px;" name="map"></div>
                </div>

<hr>



                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text">Status Of the Request</span>
                    </div>
                 
                    @switch($species->status_id)
                    @case('0')
                    <input type="text" class="form-control" placeholder="Not Approved" readonly>
                    @break;
                    @case('1')
                    <input type="text" class="form-control" placeholder="Approved" readonly>
                    @break;
                    @endswitch
               


                </div>
            </form>
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
    console.log(polygon);

    //ADDING THE JSON COORDINATES TO MAP
    var layer = L.geoJSON(JSON.parse(polygon)).addTo(map);

    // Adjust map to show the kml
    var bounds = layer.getBounds();
    map.fitBounds(bounds);
</script>
@endsection
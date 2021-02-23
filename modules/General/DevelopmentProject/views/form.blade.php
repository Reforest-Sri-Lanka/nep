@extends('home')

@section('cont')

<kbd><a href="/general/general" class="text-white font-weight-bolder"><i class="fas fa-chevron-left"></i></i> BACK</a></kbd>
<div class="container border bg-light">
    <form action="/dev-project/saveForm" method="post">
        @csrf
        <div class="form-group">
            <label for="title">Title:</label>
            <input type="text" class="form-control" placeholder="Enter Title" id="title" name="title">
        </div>
        <hr>
        <div id="accordion">

            <div class="card">
                <div class="card-header">
                    <a class="card-link text-dark" data-toggle="collapse" href="#collapseOne">
                        Select Relavant Gazette
                    </a>
                </div>
                <div id="collapseOne" class="collapse" data-parent="#accordion">
                    <div class="card-body bg-secondary text-light">
                        <strong>Select One</strong>
                        @foreach($gazettes as $gazette)
                        <div class="form-check">
                            <label class="form-check-label">
                                <input type="radio" class="form-check-input" name="gazette" value="{{$gazette->id}}">{{$gazette->title}}
                            </label>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>

            <div class="card">
                <div class="card-header">
                    <a class="collapsed card-link text-dark" data-toggle="collapse" href="#collapseTwo">
                        Select Relavant Organizations
                    </a>
                </div>
                <div id="collapseTwo" class="collapse" data-parent="#accordion">
                    <div class="card-body bg-secondary text-light">
                        <strong>Select Multiple</strong>
                        <fieldset>
                            @foreach($organizations as $organization)
                            <input type="checkbox" name="governing_orgs[]" value="{{$organization->id}}"><label class="ml-2">{{$organization->title}}</label> <br>
                            @endforeach
                        </fieldset>
                    </div>
                </div>
            </div>
            <hr>

            <input id="polygon" type="hidden" name="polygon" value="{{request('polygon')}}">


            <div class="form-group">
                <label for="title">Land Title:</label>
                <input type="text" class="form-control" placeholder="Enter Land Title" id="landTitle" name="landTitle">
            </div>

            <!-- ////////MAP GOES HERE -->
            <div id="mapid" style="height:400px;" name="map"></div>

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

                // Initialise the FeatureGroup to store editable layers
                var editableLayers = new L.FeatureGroup();
                map.addLayer(editableLayers);

                var drawPluginOptions = {
                    position: 'topright',
                    draw: {
                        polygon: {
                            allowIntersection: false, // Restricts shapes to simple polygons
                            drawError: {
                                color: '#e1e100', // Color the shape will turn when intersects
                                message: '<strong>Oh snap!<strong> you can\'t draw that!' // Message that will show when intersect
                            },
                            shapeOptions: {
                                color: '#97009c'
                            }
                        },
                        // disable toolbar item by setting it to false
                        polyline: true,
                        circle: false, // Turns off this drawing tool
                        rectangle: false,
                        marker: true,
                    },
                    edit: {
                        featureGroup: editableLayers, //REQUIRED!!
                        remove: false
                    }
                };

                // Initialise the draw control and pass it the FeatureGroup of editable layers
                var drawControl = new L.Control.Draw(drawPluginOptions);
                map.addControl(drawControl);

                var editableLayers = new L.FeatureGroup();
                map.addLayer(editableLayers);

                map.on('draw:created', function(e) {
                    var type = e.layerType,
                        layer = e.layer;

                    if (type === 'marker') {
                        layer.bindPopup('A popup!');
                    }
                    editableLayers.addLayer(layer);


                    var shape = layer.toGeoJSON()
                    var shape_for_db = JSON.stringify(shape);

                    // console.log(shape);
                    // console.log(shape_for_db);
                    // $('#polygon').val(shape_for_db);

                    //console.log(layer.toGeoJSON());
                    $('#polygon').val(JSON.stringify(layer.toGeoJSON()));

                });
            </script>

            <br>
            <div class="custom-control custom-checkbox">
                <input type="checkbox" class="custom-control-input" id="customCheck" value="1" name="isProtected">
                <label class="custom-control-label" for="customCheck"><strong>Check if land is a protected area</strong></label>
            </div>
            <input type="hidden" class="form-control" name="createdBy" value="{{Auth::user()->id}}">
            <hr>
            <div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
    </form>
</div>
@endsection
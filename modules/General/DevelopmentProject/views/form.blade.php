@extends('general')

@section('general')

<div class="container">
    <form action="/dev-project/saveForm" method="post">
        @csrf

        <div class="container">
            <div class="row p-4 bg-white">
                <div class="col border border-muted rounded-lg mr-2 p-4">
                    <div class="form-group">
                        <label for="title">Title:</label>
                        <input type="text" class="form-control" placeholder="Enter Title" id="title" name="title">
                    </div>

                    <div class="form-group">
                        Gazette:<input type="text" class="form-control typeahead" placeholder="Search" />
                    </div>
                    <div class="form-group">
                        Organization:<input type="text" class="form-control typeahead3" placeholder="Search" />
                    </div>
                    
                    <div class="form-group">
                        <label for="title">Land Title:</label>
                        <input type="text" class="form-control" placeholder="Enter Land Title" id="landTitle" name="landTitle">
                    </div>

                    <div>
                        <button type="submit" class="btn bd-navbar text-light">Submit</button>
                    </div>
                </div>
                <div class="col border border-muted rounded-lg p-4">
                    <!-- ////////MAP GOES HERE -->
                    <div id="mapid" style="height:400px;" name="map"></div>
                    <br>
                    <div class="custom-control custom-checkbox">
                        <input type="checkbox" class="custom-control-input" id="customCheck" value="1" name="isProtected">
                        <label class="custom-control-label" for="customCheck"><strong>Check if land is a protected area</strong></label>
                    </div>
                </div>
            </div>
        </div>
        <input type="hidden" class="form-control" name="createdBy" value="{{Auth::user()->id}}">
        <input id="polygon" type="hidden" name="polygon" value="{{request('polygon')}}">
    </form>
</div>













<script type="text/javascript">
    var path = "{{route('gazette')}}";
    $('input.typeahead').typeahead({
        source: function(terms, process) {

            return $.get(path, {
                terms: terms
            }, function(data) {
                console.log(data);
                objects = [];
                data.map(i => {
                    objects.push(i.gazette_number)
                })
                console.log(objects);
                return process(objects);
            })
        },
    });

    //THIS USES THE AUTOMECOMPLETE FUNCTION IN TREE REMOVAL CONTROLLER
    var path3 = "{{route('organization')}}";
    $('input.typeahead3').typeahead({
        source: function(terms, process) {

            return $.get(path3, {
                terms: terms
            }, function(data) {
                console.log(data);
                objects = [];
                data.map(i => {
                    objects.push(i.title)
                })
                console.log(objects);
                return process(objects);
            })
        },
    });



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


@endsection
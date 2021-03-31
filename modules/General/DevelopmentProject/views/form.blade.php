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
                        <input type="text" class="form-control" placeholder="Enter Title" id="title" name="title" value="{{ old('title') }}">
                        @error('title')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group">
                        Gazette:<input type="text" class="form-control typeahead" placeholder="Search" name="gazette" value="{{ old('gazette') }}" />
                        @error('gazette')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        Organization:<input type="text" class="form-control typeahead3" placeholder="Search" name="organization" value="{{ old('organization') }}" />
                        @error('organization')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="title">Land Title:</label>
                        <input type="text" class="form-control" placeholder="Enter Land Title" id="landTitle" name="landTitle" value="{{ old('landTitle') }}">
                        @error('landTitle')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div>
                        <button type="submit" class="btn bd-navbar text-light">Submit</button>
                    </div>
                </div>
                <div class="col border border-muted rounded-lg p-4">
                    <!-- ////////MAP GOES HERE -->
                    <div id="mapid" style="height:400px;" name="map"></div>
                    @error('polygon')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                    <br>
                    <input id="polygon" type="text" class="form-control" name="polygon" value="{{request('polygon')}}">
                    <div class="custom-control custom-checkbox">
                        <input type="checkbox" class="custom-control-input" id="customCheck" value="1" name="isProtected">
                        <label class="custom-control-label" for="customCheck"><strong>Check if land is a protected area</strong></label>
                    </div>
                </div>
            </div>
        </div>
        <input type="hidden" class="form-control" name="createdBy" value="{{Auth::user()->id}}">
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


    ///SCRIPT FOR THE MAP
    var center = [7.2906, 80.6337];

    // Create the map
    var map = L.map('mapid').setView(center, 10);

    // Set up the OSM layer 
    L.tileLayer(
        'https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            attribution: 'Data © <a href="http://osm.org/copyright">OpenStreetMap</a>',
            maxZoom: 18
        }).addTo(map);

    var drawnItems = new L.FeatureGroup();
    map.addLayer(drawnItems);

    var drawControl = new L.Control.Draw({
        position: 'topright',
        draw: {
            polygon: {
                shapeOptions: {
                    color: 'purple'
                },
                allowIntersection: false,
                drawError: {
                    color: 'orange',
                    timeout: 1000
                },
                showArea: true,
                metric: false,
                repeatMode: true
            },
            polyline: {
                shapeOptions: {
                    color: 'red'
                },
            },
            circlemarker: false,
            rect: {
                shapeOptions: {
                    color: 'green'
                },
            },
            circle: false,
        },
        edit: {
            featureGroup: drawnItems
        }
    });
    map.addControl(drawControl);

    map.on('draw:created', function(e) {
        var type = e.layerType,
            layer = e.layer;

        if (type === 'marker') {
            layer.bindPopup('A popup!');
        }

        drawnItems.addLayer(layer);
        $('#polygon').val(JSON.stringify(drawnItems.toGeoJSON()));

        ///COnverting your layer to a KML
        var json = drawnItems.toGeoJSON();
        var kml = tokml(json);
        console.log(kml);

    });
</script>
@endsection
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
                        Request Organization:<input type="text" class="form-control typeahead3" placeholder="Search" name="organization" value="{{ old('organization') }}" />
                        @error('organization')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="province">Province:</label>
                        <select class="custom-select @error('province') is-invalid @enderror" name="province">
                            <option disabled selected value="">Select</option>
                            @foreach ($provinces as $province)
                                <option value="{{ $province->id }}" {{ Request::old()?(Request::old('province')==$province->id?'selected="selected"':''):'' }}>{{ $province->province }}</option>
                            @endforeach
                        </select>
                        @error('province')
                            <div class="alert">                                   
                                <strong>{{ $message }}</strong>
                            </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="district">District:</label>
                        <select class="custom-select @error('district') is-invalid @enderror" name="district">
                            <option disabled selected value="">Select</option>
                            @foreach ($districts as $district)
                            <option value="{{ $district->id }}" {{ Request::old()?(Request::old('district')==$district->id?'selected="selected"':''):'' }}>{{ $district->district }}</option>
                            @endforeach
                        </select>
                        @error('district')
                            <div class="alert">                                   
                                <strong>{{ $message }}</strong>
                            </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="title">Plan Number:</label>
                        <input type="text" class="form-control @error('planNo') is-invalid @enderror" value="{{ old('planNo') }}" placeholder="Enter Plan Number" id="planNo" name="planNo">
                        @error('planNo')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="title">Surveyor Name:</label>
                        <input type="text" class="form-control @error('surveyorName') is-invalid @enderror" value="{{ old('surveyorName') }}" placeholder="Enter Surveyor Name" id="surveyorName" name="surveyorName">
                        @error('surveyorName')
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
                    <input id="polygon" type="hidden" class="form-control" name="polygon" value="{{request('polygon')}}">
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


    /// SCRIPT FOR THE MAP
    var map = L.map('mapid', {
        center: [7.2906, 80.6337], //if the location cannot be fetched it will be set to Kandy
        zoom: 12
    });

    window.onload = function() {
        var popup = L.popup();
        //false,               ,popup, map.center
        function geolocationErrorOccurred(geolocationSupported, popup, latLng) {
            popup.setLatLng(latLng);
            popup.setContent(geolocationSupported ?
                '<b>Error:</b> Geolocation service failed. Enable Location.' :
                '<b>Error:</b> This browser doesn\'t support geolocation.');
            popup.openOn(map);
        }
        //If theres an error then 

        if (navigator.geolocation) { //using an inbuilt function to get the lat and long of the user.
            navigator.geolocation.getCurrentPosition(function(position) {
                var latLng = {
                    lat: position.coords.latitude,
                    lng: position.coords.longitude
                };

                popup.setLatLng(latLng);
                popup.setContent('This is your current location');
                popup.openOn(map);
                //setting the map to the user location
                map.setView(latLng);

            }, function() {
                geolocationErrorOccurred(true, popup, map.getCenter());
            });
        } else {
            //No browser support geolocation service
            geolocationErrorOccurred(false, popup, map.getCenter());
        }
    }

    // Set up the OSM layer 
    //map tiles are “square bitmap graphics displayed in a grid arrangement to show a map.”
    //There are a number of different tile providers (or tileservers), some are free and open source. We are using OSM
    L.tileLayer(
        'https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            attribution: 'Data © <a href="http://osm.org/copyright">OpenStreetMap</a>',
            maxZoom: 18
        }).addTo(map);
    //we’re calling tilelayer() to create the tile layer, passing in the OSM URL first, then the second argument is an object containing the options for our new tile 
    //layer (including attribution is critical here to comply with licensing), and then the tile layer is added to the map using addTo().

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


        drawnItems.addLayer(layer);
        $('#polygon').val(JSON.stringify(drawnItems.toGeoJSON())); //geoJSON converts a layer to JSON

        ///Converting your layer to a KML
        //$('#kml').val(tokml(drawnItems.toGeoJSON()));
    });
    //SEARCH FUNCTIONALITY
    var searchControl = new L.esri.Controls.Geosearch().addTo(map);

    var results = new L.LayerGroup().addTo(map);

    searchControl.on('results', function(data) {
        results.clearLayers();
        for (var i = data.results.length - 1; i >= 0; i--) {
            results.addLayer(L.marker(data.results[i].latlng));
        }
    });

    setTimeout(function() {
        $('.pointer').fadeOut('slow');
    }, 3400);
</script>
@endsection
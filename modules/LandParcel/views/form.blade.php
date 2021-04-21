@extends('general')

@section('general')
<div class="container">

    @if(\Session::has('success'))
    <div class="alert alert-success">
        <p>{{\Session::get('success') }}</p>
    </div>
    @endif

    <form action="/land/save" method="post" id="upload_form" enctype="multipart/form-data">
        @csrf

        <div class="container">
            <div class="row p-4 bg-white">
                <div class="col border border-muted rounded-lg mr-2 p-4">
                    <div class="form-group">
                        <label for="title">Land Title:</label>
                        <input type="text" class="form-control @error('landTitle') is-invalid @enderror" value="{{ old('landTitle') }}" placeholder="Enter Land Title" id="landTitle" name="landTitle">
                        @error('landTitle')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        Province:<input type="text" class="form-control typeahead @error('province') is-invalid @enderror" value="{{ old('province') }}" placeholder="Search" name="province" />
                    </div>
                    <div class="form-group">
                        District:<input type="text" class="form-control typeahead2 @error('district') is-invalid @enderror" value="{{ old('district') }}" placeholder="Search" name="district" />
                    </div>
                    <div class="form-group">
                        GS Division:<input type="text" class="form-control typeahead4 @error('gs_division') is-invalid @enderror" value="{{ old('gs_division') }}" placeholder="Search" name="gs_division" />
                    </div>

                    <div id="accordion" class="mb-3">
                        <div class="card mb-3">
                            <div class="card-header bg-white">
                                <a class="collapsed card-link text-dark" data-toggle="collapse" href="#collapseone">
                                    Organizations Governing Land (Optional)
                                </a>
                            </div>
                            <div id="collapseone" class="collapse" data-parent="#accordion">
                                <div class="card-body">
                                    <strong>Select 1 or More</strong>
                                    <fieldset>
                                        @foreach($organizations as $organization)
                                        <input type="checkbox" name="governing_orgs[]" value="{{$organization->id}}" @if( is_array(old('governing_orgs')) && in_array($organization->id, old('governing_orgs'))) checked @endif><label class="ml-2">{{$organization->title}}</label> <br>
                                        @endforeach
                                    </fieldset>
                                </div>
                            </div>
                        </div>

                        <div class="card">
                            <div class="card-header bg-white">
                                <a class="collapsed card-link text-dark" data-toggle="collapse" href="#collapsetwo">
                                    Gazettes Relavant to Land (Optional)
                                </a>
                            </div>
                            <div id="collapsetwo" class="collapse" data-parent="#accordion">
                                <div class="card-body">
                                    <strong>Select 1 or More</strong>
                                    <fieldset>
                                        @foreach($gazettes as $gazette)
                                        <input type="checkbox" name="gazettes[]" value="{{$gazette->id}}" @if( is_array(old('gazettes')) && in_array($gazette->id, old('gazettes'))) checked @endif> <label class="ml-2">{{$gazette->title}}</label> <br>
                                        @endforeach
                                    </fieldset>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col border border-muted rounded-lg p-4">


                    <div>
                        <label>Upload KML File</label>
                        <input type="file" name="select_file" id="select_file" />
                        <input type="button" name="upload" id="upload" class="btn btn-primary" value="Upload">
                    </div>
                    <br>
                    <!-- ////////MAP GOES HERE -->
                    <div id="mapid" style="height:400px;" name="map"></div>
                    @error('polygon')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                    <br>
                    <div class="custom-control custom-checkbox">
                        <input type="checkbox" class="custom-control-input" id="customCheck" value="1" name="isProtected">
                        <label class="custom-control-label" for="customCheck"><strong>Check if land is a protected area</strong></label>
                    </div>
                    <div style="float:right;">
                        <button type="submit" name="submit" class="btn bd-navbar text-white">Submit</button>
                    </div>
                </div>
            </div>
        </div>
        <input id="polygon" type="hidden" name="polygon" value="{{request('polygon')}}">
        <input id="loc" type="hidden" name="file" value="{{request('loc')}}">
        <input type="hidden" class="form-control" name="createdBy" value="{{Auth::user()->id}}">
    </form>
</div>

<script type="text/javascript">
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



    ///UPLOADING A FILE AND RETRIEVING AND CREATING A LAYER FROM IT.
    document.getElementById("upload").addEventListener("click", function() {
        var data = new FormData(document.getElementById("upload_form"));
        event.preventDefault();
        $.ajax({
            url: "{{ route('ajaxmap.action') }}",
            method: "POST",
            data: data,
            dataType: 'JSON',
            contentType: false,
            cache: false,
            processData: false,
            success: function(data) {
                $('#message').css('display', 'block');
                $('#message').html(data.message);
                $('#message').addClass(data.class_name);
                $('#uploaded_image').html(data.uploaded_image);
                var tmp = data.uploaded_image;
                $('#loc').val(JSON.stringify(tmp));
                console.log(tmp);
                fetch(`/${tmp}`)
                    .then(res => res.text())
                    .then(kmltext => {
                        // Create new kml overlay
                        const track = new omnivore.kml.parse(kmltext);
                        map.addLayer(track);

                        //SAVING THE UPLOADED COORDIATE LAYER TO GEOJSON
                        $('#polygon').val(JSON.stringify(track.toGeoJSON()));

                        // Adjust map to show the kml
                        const bounds = track.getBounds();
                        map.fitBounds(bounds);
                    }).catch((e) => {
                        console.log(e);
                    })
            }
        })

    });

    ///TYPEAHEAD
    var path = "{{route('province')}}";
    $('input.typeahead').typeahead({
        source: function(terms, process) {

            return $.get(path, {
                terms: terms
            }, function(data) {
                console.log(data);
                objects = [];
                data.map(i => {
                    objects.push(i.province)
                })
                console.log(objects);
                return process(objects);
            })
        },
    });

    var path2 = "{{route('district')}}";
    $('input.typeahead2').typeahead({
        source: function(terms, process) {

            return $.get(path2, {
                terms: terms
            }, function(data) {
                console.log(data);
                objects = [];
                data.map(i => {
                    objects.push(i.district)
                })
                console.log(objects);
                return process(objects);
            })
        },
    });

    var path4 = "{{route('gramasevaka')}}";
    $('input.typeahead4').typeahead({
        source: function(terms, process) {

            return $.get(path4, {
                terms: terms
            }, function(data) {
                console.log(data);
                objects = [];
                data.map(i => {
                    objects.push(i.gs_division)
                })
                console.log(objects);
                return process(objects);
            })
        },
    });
</script>
@endsection
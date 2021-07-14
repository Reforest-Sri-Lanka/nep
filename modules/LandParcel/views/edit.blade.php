@extends('general')

@section('general')
<div class="container">

    @if(\Session::has('success'))
    <div class="alert alert-success">
        <p>{{\Session::get('success') }}</p>
    </div>
    @endif
    <form action="/land/update" method="post" id="upload_form" enctype="multipart/form-data">
        @csrf
        @method('patch')
        <div class="container">
            <div class="row p-4 bg-white">
                <div class="col border border-muted rounded-lg mr-2 p-4">

                    <div class="form-group">
                        <label for="title">Plan Number:</label>
                        @if($land->title != null && old('planNo') == null)
                        <input type="text" class="form-control" value="{{ $land->title }}" id="planNo" name="planNo" required>
                        @else
                        <input type="text" class="form-control @error('planNo') is-invalid @enderror" value="{{ old('planNo') }}" placeholder="Enter Plan Number" id="planNo" name="planNo" required>
                        @endif
                        @error('planNo')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="title">Surveyor Name:</label>
                        @if($land->surveyor_name != null && old('planNo') == null))
                        <input type="text" class="form-control placeholder="Enter Surveyor Name" id="surveyorName" name="surveyorName" value="{{ $land->surveyor_name }}" required>
                        @else
                        <input type="text" class="form-control @error('surveyorName') is-invalid @enderror" placeholder="Enter Surveyor Name" id="surveyorName" name="surveyorName" required>
                        @endif
                        @error('surveyorName')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="province">Province:</label>
                        <select class="custom-select @error('province') is-invalid @enderror" name="province" required>
                            @if($land->province_id != null && old('province') == null))
                            <option selected value="{{$land->province_id}}">Select</option>
                            @endif
                            @foreach ($provinces as $province)
                            <option value="{{ $province->id }}" {{ Request::old()?(Request::old('province')==$province->id?'selected="selected"':''):'' }}>{{ $province->province }}</option>
                            @endforeach
                        </select>
                        @error('province')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="province">District:</label>
                        <select class="custom-select @error('district') is-invalid @enderror" name="district" required>
                            @if($land->district_id != null && old('district') == null))
                                <option selected value="{{$land->district_id}}">Select</option>
                            @endif
                            @foreach ($districts as $district)
                            <option value="{{ $district->id }}" {{ Request::old()?(Request::old('district')==$district->id?'selected="selected"':''):'' }}>{{ $district->district }}</option>
                            @endforeach
                        </select>
                        @error('district')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="province">Grama Sevaka Division:</label>
                        <select class="custom-select @error('gs_division') is-invalid @enderror" name="gs_division">
                            @if($land->gs_division_id != null && old('gs_division') == null))
                                <option selected value="{{$land->gs_division_id}}">Select</option>
                            @endif
                            @foreach ($gs as $gs_division)
                            <option value="{{ $gs_division->id }}" {{ Request::old()?(Request::old('gs_division')==$gs_division->id?'selected="selected"':''):'' }}>{{ $gs_division->gs_division }}</option>
                            @endforeach
                        </select>
                        @error('gs_division')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
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
                                        @if($land_orgs ==null || is_array(old('governing_orgs')))
                                        <input type="checkbox" name="governing_orgs[]" value="{{$organization->id}}" @if( is_array(old('governing_orgs')) && in_array($organization->id, old('governing_orgs'))) checked @endif><label class="ml-2">{{$organization->title}}</label> <br>
                                        @else
                                        <input type="checkbox" name="governing_orgs[]" value="{{$organization->id}}" @if( in_array($organization->id, $land_orgs)) checked @endif><label class="ml-2">{{$organization->title}}</label> <br>
                                        @endif
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
                                        @if($land_gazettes ==null || is_array(old('gazettes')))
                                        <input type="checkbox" name="gazettes[]" value="{{$gazette->id}}" @if( is_array(old('gazettes')) && in_array($gazette->id, old('gazettes'))) checked @endif> <label class="ml-2">{{$gazette->title}}</label> <br>
                                        @else
                                        <input type="checkbox" name="gazettes[]" value="{{$gazette->id}}" @if( in_array($gazette->id, $land_gazettes)) checked @endif><label class="ml-2">{{$gazette->title}}</label> <br>
                                        @endif
                                        @endforeach
                                    </fieldset>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col border border-muted rounded-lg p-4">


                    <div>
                        <label>If coordinates are available as KML, upload KML File</label>
                        <input type="file" name="select_file" id="select_file" />
                        <input type="button" name="upload" id="upload" class="btn btn-primary" value="Upload">
                    </div>
                    <div class="alert mt-3" id="message" style="display: none"></div>
                    <br>
                    <!-- ////////MAP GOES HERE -->
                    @include('faq')
                    <label>Select Location On Map*</label>
                    <span style="float:right; cursor:pointer;"><kbd><a title="How to Draw Shapes on the Map" class="text-white" data-toggle="modal" data-target="#mapHelp">How To Mark Location</a></kbd></span>
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
        <input id="old_polygon" type="hidden" name="old_polygon" value="{{$land->polygon}}">
        <input id="lid" type="hidden" name="lid" value="{{$land->id}}">
        <input id="loc" type="hidden" name="file" value="{{request('loc')}}">
        <input type="hidden" class="form-control" name="createdBy" value="{{Auth::user()->id}}">
    </form>
</div>

<script type="text/javascript">
    //THIS USES THE AUTOMECOMPLETE FUNCTION IN TREE REMOVAL CONTROLLER
    
    /// SCRIPT FOR THE MAP
    var map = L.map('mapid', {
        center: [7.2906, 80.6337], //if the location cannot be fetched it will be set to Kandy
        zoom: 12
    });
    var polygon = @json($polygon);
    var layer = L.geoJSON(JSON.parse(polygon)).addTo(map);
    map.addLayer(layer);
    var bounds = layer.getBounds();
    map.fitBounds(bounds); 

    
   

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
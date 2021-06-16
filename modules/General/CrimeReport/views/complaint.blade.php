@extends('home')

@section('cont')

<div class="container">
  <!-- FAQ button -->
  <div class="d-flex mb-2 justify-content-end">
    <span><a title="FAQ" style="font-size:24px;cursor:pointer;" data-toggle="modal" data-target="#complaintsHelp"><i class="fa fa-info-circle" aria-hidden="true"></i></a></span>
  </div>
  @include('faq')
  <form action="\crime-report\crimecreate" method="post" enctype="multipart/form-data">
    @csrf
    <div class="container bg-white">
        <div class="row p-4 bg-white">
        <h6>Please enter details of any environmental crimes or disasters for us to inform authorities or carry out suitable investigations.</h6>
        </div>
        <div class="row p-4 bg-white">
            <div class="col border border-muted rounded-lg mr-2 p-4">
                <div class="form-group">
                    <label for="crime_type">Crime type:</label>
                    <select name="crime_type" class="custom-select" required>
                        <option disabled selected value="">Select Crime Type</option>
                        @foreach ($crime_types as $crime_type)
                            <option value="{{ $crime_type->id }}" {{ ( $crime_type->id == '6') ? 'selected' : '' }} {{ Request::old()?(Request::old('crime_type')==$crime_type->id?'selected="selected"':''):'' }} >{{ $crime_type->type }}</option>
                        @endforeach
                    </select>
                    @error('crime_type')
                        <div class="alert">                                   
                            <strong>{{ $message }}</strong>
                        </div>
                    @enderror
                </div>
                <!-- <div class="form-group">
                    <label for="district">District:</label>
                    <select class="custom-select @error('district') is-invalid @enderror" name="district" required>
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
                </div> -->
                <div class="form-group">
                    <label for="images">Photos:</label>
                    
                    <input type="file" id="image" name="file[]" multiple>
                    @if ($errors->has('file.*'))
                        <div class="alert">
                            <strong>{{ $errors->first('file.*') }}</strong>
                        </div>
                    @endif   
                </div>
                <div class="form-group">
                    <label for="description">Description:</label>
                    <textarea  class="form-control" rows="3" name="description" required>{{{ old('description') }}}</textarea>
                    @error('description')
                        <div class="alert">
                            <strong>{{ $message }}</strong>
                        </div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="contact">Contact of complainant:</label>
                    <input type="text" class="form-control" placeholder="Phone/Email" name="contact" value="{{ old('contact') }}">
                    @error('contact')
                        <div class="alert">
                            <strong>{{ $message }}</strong>
                        </div>
                    @enderror
                </div>
            </div>
            <div class="col border border-muted rounded-lg p-4">
                <div class="form-group">
                    <label for="planNo">Area name:</label>
                    <input type="text" class="form-control" placeholder="Enter Area name" id="planNo" name="planNo" value="{{ old('planNo') }}" required>
                    @error('planNo')
                        <div class="alert">
                            <strong>{{ $message }}</strong>
                        </div>
                    @enderror
                </div>
                <div class="form-group">
                    <span style="float:right; cursor:pointer;"><kbd><a title="How to Draw Shapes on the Map" class="text-white" data-toggle="modal" data-target="#mapHelp">How To Mark Location</a></kbd></span>
                    <label>Select Location On Map*</label>
                </div>
                <div id="mapid" style="height:400px;" name="map"></div>
                <br>
                @error('polygon')
                    <div class="alert">
                        <strong>{{ $message }}</strong>
                    </div>
                @enderror
            </div>
        </div>
        <div class="row p-4 bg-white">
            <div class="form-check">
                <input id="polygon" type="hidden" name="polygon" value="{{request('polygon')}}">
                <label class="form-check-label">
                <input type="checkbox" class="form-check-input" name="confirm" required><strong>I confirm these information to be true</strong>
                @error('confirm')
                    <div class="alert">
                        <strong>{{ $message }}</strong>
                    </div>
                @enderror
                </label>
                <button type="submit" class="btn bd-navbar text-light" >Submit</button>
            </div>
        </div>
    </div>
  </form>
</div>
<script type="text/javascript">
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


  // SCRIPT FOR THE MAP
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
        //keeping the dynamic components open if checked
        if ($("#customCheck1").is(':checked')) {
            $("#extLandOwner").show();
        } else {
            $("#extLandOwner").hide()
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
    map.addControl(new L.Control.Fullscreen());
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
   
  

  $(document).ready(function() {
    $('#image').change(function() {
      var fp = $("#image");
      var lg = fp[0].files.length; // get length
      var items = fp[0].files;
      var fileSize = 0;

      if (lg > 0) {
        for (var i = 0; i < lg; i++) {
          fileSize = fileSize + items[i].size; // get file size
        }
        if (fileSize > 5242880) {
          alert('You should not uplaod files exceeding 4 MB. Please compress files size and uplaod agian');
          $('#image').val('');
        }
      }
    });
  });

  
</script>
@endsection
@extends('general')

@section('general')
<div class="container">
<hr>
    <form action="\crime-report\crimecreate" method="post" enctype="multipart/form-data">
    @csrf
        <div class="container bg-white">
            <div class="row p-4 bg-white">
                <div class="col border border-muted rounded-lg mr-2 p-4">
                    <div class="form-group">
                        <label for="crime_type">Crime type:</label>
                        <select name="crime_type" class="custom-select" required>
                            <option value="0" selected>Select Crime Type</option>
                            @foreach($crime_types as $crime_type)
                                <option value="{{$crime_type->id}}">{{$crime_type->type}}</option>
                            @endforeach
                        </select>
                        @error('crime_type')
                            <div class="alert">                                   
                                <strong>{{ $message }}</strong>
                            </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="organization">Make complaint to:</label>
                            <input type="text" class="form-control typeahead3" placeholder="Search" name="organization" value="{{ old('organization') }}"/>
                            
                        @error('organization')
                            <div class="alert">                                   
                                <strong>{{ $message }}</strong>
                            </div>
                        @enderror    
                    </div>
                    <div class="form-group">
                    <input type="checkbox" class="form-check-input" name="nonregorg" ><strong>Other</strong>
                    </div>
                    <div class="form-group" id="dynamicAddRemove">
                        <label for="images">Photos:</label>
                        <input type="file" id="images" name="images[0]">
                        <button type="button" name="add" id="add-btn" class="btn btn-success">Add More</button>
                    </div>
                    <div class="form-group">
                        <label for="description">Description:</label>
                        <textarea  class="form-control" rows="3" name="description">
                        </textarea>
                        @error('description')
                            <div class="alert">
                                <strong>{{ $message }}</strong>
                            </div>
                        @enderror
                    </div>
                    <hr>
                    <div class="form-group">
                        <input type="checkbox" name="nonreguser" value="1" ><strong>Creating on behalf of non registered user</strong>
                        <label for="description">Inform investigation result to Mr/Ms:</label>
                        <input type="text" class="form-control" placeholder="Enter complainant name" name="Requestor" value=""/>
                        @error('confirm')
                            <div class="alert">
                                <strong>{{ $message }}</strong>
                            </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="description">Through email:</label>
                        <input type="text" class="form-control" placeholder="Enter complainant's email" name="Requestor_email" value=""/>
                        @error('confirm')
                            <div class="alert">
                                <strong>{{ $message }}</strong>
                            </div>
                        @enderror
                    </div>
                    <hr>
                    <div class="form-check">
                    <input type="hidden" class="form-control" name="create_by" value="{{ Auth::user()->id }}">  `   1
                        <input id="polygon" type="hidden" name="polygon" value="{{request('polygon')}}">
                        <label class="form-check-label">
                        <input type="checkbox" class="form-check-input" name="confirm" ><strong>I confirm these information to be true</strong>
                        @error('confirm')
                            <div class="alert">
                                <strong>{{ $message }}</strong>
                            </div>
                        @enderror
                        </label>
                        <button type="submit" class="btn btn-primary" >Submit</button>
                    </div>
                </div>
                <div class="col border border-muted rounded-lg p-4">
                    <div class="form-group">
                        <label for="landTitle">Area name:</label>
                        <input type="text" class="form-control" placeholder="Enter Area name" id="landTitle" name="landTitle">
                    </div>
                    <!-- ////////MAP GOES HERE -->
                    <div id="mapid" style="height:400px;" name="map"></div>
                    <br>
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

    //photos add
    var i = 0;
    $("#add-btn").click(function() {
        ++i;
        $("#dynamicAddRemove").append(
        '<input type="file" id="images" name="images['+ i +']">');
    });
    




  /// SCRIPT FOR THE MAP
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

    //console.log(layer.toGeoJSON());
    $('#polygon').val(JSON.stringify(layer.toGeoJSON()));

  });

</script>
@endsection
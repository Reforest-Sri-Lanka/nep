@extends('home')

@section('cont')
<kbd><a href="/general/general" class="text-white font-weight-bolder"><i class="fas fa-chevron-left"></i></i> BACK</a></kbd>
<div class="container">
    <span>
        <h3 class="text-center bg-success text-light">{{session('message')}}</h3>
    </span>
    <span>
        <h3 class="text-center bg-danger text-light">{{session('danger')}}</h3>
    </span>
    <div class='row justify-content-center'>
        </br>
        @error('create_by')
            <div class="alert">                                   
                <strong>{{ "You need to be be logged in first" }}</strong>
            </div>
        @enderror
        <h2>Report a crime</h2>
        </br>
    </div>
    <hr>
    <form action="\crime-report\crimecreate" method="post" enctype="multipart/form-data">
      @csrf
        <!-- <div class='row justify-content-between'>  -->
            <h6>Crime type</h6>
            <div class="input-group mb-3">
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
            </br>
            <h6>Make complaint to</h6>
            <div class="input-group mb-3">
                <select name="organization" class="custom-select" required>
                    <option value="0" selected>Select Organization</option>
                @foreach($Organizations as $organization)
                    <option value="{{$organization->id}}">{{$organization->title}}</option>
                @endforeach
                </select>
                @error('organization')
                    <div class="alert">                                   
                        <strong>{{ $message }}</strong>
                    </div>
                @enderror                   
            </div>
            <h6>Photos</h6>
            <div class="form-group" id="dynamicAddRemove">
                <input type="file" id="images" name="images[0]">    
            </div>
            <button type="button" name="add" id="add-btn" class="btn btn-success">Add More</button>
            </br>
            <h6>Description</h6>
            <div class="input-group mb-3">
                <textarea  class="form-control" rows="5" name="description">
                </textarea>
                @error('description')
                    <div class="alert">
                        <strong>{{ $message }}</strong>
                    </div>
                @enderror
            </div>
            </br>
            <div class="input-group mb-3">
				<input id="polygon" type="hidden" name="polygon" value="polygon">
                <div class="input-group-prepend">
                    <span class="input-group-text">Land Parcel Name</span>
                </div>
                <input type="text" class="form-control" name="landTitle">
                @error('landTitle')
                <div class="alert">
                    <strong>{{ $message }}</strong>
                </div>
                @enderror
                <input type="hidden" class="form-control" name="create_by" value="{{ Auth::user()->id }}">
            </div>    
            <!-- ////////MAP GOES HERE -->
            <div id="mapid" style="height:400px;" name="map"></div>
            <div class="input-group mb-3">
                @error('polygon')
                <div class="alert">
                    <strong>Mark the area on the map</strong>
                </div>
                @enderror
            </div>
            <br>
            <div class="form-check">
                <label class="form-check-label">
                <input type="checkbox" class="form-check-input" name="confirm" ><strong>I confirm these information to be true</strong>
                @error('confirm')
                    <div class="alert">
                        <strong>{{ $message }}</strong>
                    </div>
                @enderror
                </label>
                </br>
                <button type="submit" class="btn btn-primary" >Submit</button>
            </div>
    </form>
</div>
<script type="text/javascript">

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
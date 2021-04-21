@extends('general')

@section('general')

<div class="container">
  <!-- @if(count($errors) >0)
  <div class="alert alert-danger">
    <ul>
      @foreach($errors->all() as $error)
      <li>{{$error}}</li>
      @endforeach
    </ul>
  </div>
  @endif

  @if(\Session::has('success'))
  <div class="alert alert-success">
    <p>{{\Session::get('success') }}</p>
  </div>
  @endif -->


  <form action="/tree-removal/save" method="post" id="regForm" enctype="multipart/form-data">
    @csrf
    <!-- One "tab" for each step in the form: -->
    <div class="tab">
      <div class="container">
        <div class="row border rounded-lg p-4 bg-white">
          <div class="col border border-muted rounded-lg mr-2 p-2">


            <div class="form-group">
              <label for="title">Land Title:</label>
              <input type="text" class="form-control @error('landTitle') is-invalid @enderror" value="{{ old('landTitle') }}" placeholder="Enter Land Title" id="landTitle" name="landTitle">
              @error('landTitle')
              <div class="alert alert-danger">{{ $message }}</div>
              @enderror
            </div>

            <div class="row p-2">
              <div class="col p-2">
                <div class="form-group">
                  <label for="province">Province:</label>
                  <input type="text" class="form-control typeahead @error('province') is-invalid @enderror" value="{{ old('province') }}" placeholder="Search" name="province" />
                  @error('province')
                  <div class="alert alert-danger">{{ $message }}</div>
                  @enderror
                </div>



                <div class="form-group">
                  <label for="gs_division">GS Division:</label>
                  <input type="text" class="form-control typeahead4 @error('gs_division') is-invalid @enderror" value="{{ old('gs_division') }}" placeholder="Search" name="gs_division" />
                  @error('gs_division')
                  <div class="alert alert-danger">{{ $message }}</div>
                  @enderror
                </div>

              </div>
              <div class="col p-2">

                <div class="form-group">
                  <label for="district">District:</label>
                  <input type="text" class="form-control typeahead2 @error('district') is-invalid @enderror" value="{{ old('district') }}" placeholder="Search" name="district" />
                  @error('district')
                  <div class="alert alert-danger">{{ $message }}</div>
                  @enderror
                </div>

                <div class="form-group">
                  <label for="land_extent">Land Extent (In Acres)</label>
                  <input type="text" class="form-control typeahead3 @error('removal_requestor') is-invalid @enderror" value="{{ old('land_extent') }}" id="land_extent" name="land_extent">
                  @error('land_extent')
                  <div class="alert alert-danger">{{ $message }}</div>
                  @enderror
                </div>

              </div>
            </div>





            <!-- ////////MAP GOES HERE -->
            <div id="mapid" style="height:400px;" name="map"></div>
            @error('polygon')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
            <input id="polygon" type="hidden" name="polygon" class="form-control @error('polygon') is-invalid @enderror" value="{{request('polygon')}}" />
            <div class="custom-control custom-checkbox">
              <input type="checkbox" class="custom-control-input" id="customCheck" value="1" name="isProtected">
              <label class="custom-control-label" for="customCheck"><strong>Is Land a Protected Area?</strong></label>
            </div>





            <br>
            <hr><br>
            <div class="row p-2">
              <div class="col p-2">
                <div class="form-group">
                  <label>Land Owner Type:</label>
                  <div class="form-check">
                    <input class="form-check-input" type="radio" name="landownertype" id="landownertype1" value="1" {{(old('landownertype') == '1') ? 'checked' : ''}}>
                    <label class="form-check-label" for="landownertype1">
                      Government
                    </label>
                  </div>
                  <div class="form-check">
                    <input class="form-check-input" type="radio" name="landownertype" id="landownertype2" value="2" {{(old('landownertype') == '2') ? 'checked' : ''}}>
                    <label class="form-check-label" for="landownertype2">
                      Private
                    </label>
                  </div>
                  @error('landownertype')
                  <div class="alert alert-danger">Please Select the Type</div>
                  @enderror
                </div>

                <div class="form-group">
                  Land Owner:<input type="text" class="form-control typeahead3 @error('land_owner') is-invalid @enderror" value="{{ old('land_owner') }}" placeholder="Search" name="land_owner" />
                  @error('land_owner')
                  <div class="alert alert-danger">{{ $message }}</div>
                  @enderror
                  <div class="custom-control custom-checkbox">
                    <input type="checkbox" class="custom-control-input" id="customCheck1" value="1" name="checklandowner" {{ old('checklandowner') == "1" ? 'checked' : ''}}>
                    <label class="custom-control-label" for="customCheck1"><strong>Is Unregistered</strong></label>
                  </div>
                </div>
              </div>

              <div class="col p-2">
                <div class="form-group">
                  <label>Removal Requestor Type:</label>
                  <div class="form-check">
                    <input class="form-check-input" type="radio" name="removalrequestortype" id="removalrequestortype1" value="1" {{(old('removalrequestortype') == '1') ? 'checked' : ''}}>
                    <label class="form-check-label" for="removalrequestortype1">
                      Government
                    </label>
                  </div>
                  <div class="form-check">
                    <input class="form-check-input" type="radio" name="removalrequestortype" id="removalrequestortype2" value="2" {{(old('removalrequestortype') == '2') ? 'checked' : ''}} <label class="form-check-label" for="removalrequestortype2">
                    Private
                    </label>
                  </div>
                  @error('removalrequestortype')
                  <div class="alert alert-danger">Please Select the Type</div>
                  @enderror
                </div>

                <div class="form-group">
                  Removal Requestor:<input type="text" class="form-control typeahead3 @error('removal_requestor') is-invalid @enderror" value="{{ old('removal_requestor') }}" name="removal_requestor" placeholder="Search" />
                  @error('removal_requestor')
                  <div class="alert alert-danger">{{ $message }}</div>
                  @enderror
                  <div class="custom-control custom-checkbox">
                    <input type="checkbox" class="custom-control-input" id="customCheck2" value="1" name="checkremovalrequestor" {{ old('checkremovalrequestor') == "1" ? 'checked' : ''}}>
                    <label class="custom-control-label" for="customCheck2"><strong>Is Unregistered</strong></label>
                  </div>

                  <div class="form-group">
                    Removal Requestor Email:<input type="text" class="form-control @error('removal_requestor_email') is-invalid @enderror" value="{{ old('removal_requestor_email') }}" name="removal_requestor_email" placeholder="Enter Email" />
                    @error('removal_requestor_email')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                  </div>
                </div>
              </div>
            </div>









          </div>
          <div class="col border border-muted rounded-lg">
            <div class="row p-2 mt-2">
              <div class="col">
                <div class="form-group">
                  <label for="number_of_trees">Number of Trees</label>
                  <input type="text" class="form-control @error('number_of_trees') is-invalid @enderror" value="{{ old('number_of_trees') }}" id="number_of_trees" name="number_of_trees">
                  @error('number_of_trees')
                  <div class="alert alert-danger">{{ $message }}</div>
                  @enderror
                </div>

                <div class="form-group">
                  <label for="number_of_tree_species">Number of Tree Species</label>
                  <input type="text" class="form-control" id="number_of_tree_species" name="number_of_tree_species">
                </div>

                <div class="form-group">
                  <label for="number_of_flora_species">Number of Flora Species</label>
                  <input type="text" class="form-control" id="number_of_flora_species" name="number_of_flora_species">
                </div>
                <div class="form-group">
                  <label for="number_of_reptile_species">Number of Reptile Species</label>
                  <input type="text" class="form-control" id="number_of_reptile_species" name="number_of_reptile_species">
                </div>
              </div>
              <div class="col">
                <div class="form-group">
                  <label for="number_of_mammal_species">Number of Mammal Species</label>
                  <input type="text" class="form-control" id="number_of_mammal_species" name="number_of_mammal_species">
                </div>

                <div class="form-group">
                  <label for="number_of_amphibian_species">Number of Ambhibian Species</label>
                  <input type="text" class="form-control" id="number_of_amphibian_species" name="number_of_amphibian_species">
                </div>

                <div class="form-group">
                  <label for="number_of_fish_species">Number of Fish Species</label>
                  <input type="text" class="form-control" id="number_of_fish_species" name="number_of_fish_species">
                </div>

                <div class="form-group">
                  <label for="number_of_avian_species">Number of Avian Species</label>
                  <input type="text" class="form-control" id="number_of_avian_species" name="number_of_avian_species">
                </div>
              </div>
            </div>
            <div class="form-group">
              <label for="species_special_notes">Species Special Notes</label>
              <textarea class="form-control" rows="1" id="species_special_notes" name="species_special_notes"></textarea>
            </div>

            <div class="form-group">
              <label for="description">Description</label>
              <textarea class="form-control @error('description') is-invalid @enderror" rows="2" id="description" name="description">{{{ old('description') }}}</textarea>
              @error('description')
              <div class="alert alert-danger">{{ $message }}</div>
              @enderror
            </div>

            <div class="form-group" id="dynamicAddRemove">
              <label for="images">Photos: (Optional)</label>       
                <input type="file" id="image" name="file[]" multiple>
                @if ($errors->has('file.*'))
                  <div class="alert">
                    <strong>{{ $errors->first('file.*') }}</strong>
                  </div>
                @endif   
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="tab">
      <div class="container">
        <div class="row border rounded-lg p-4 bg-white">
          <table class="table" id="dynamicAddRemove">
            <tr>
              <th>Species</th>
              <th>Tree ID</th>
              <th>Width at Breast Height</th>
              <th>Height</th>
              <th>Timber Volume</th>
              <th>Cubic Feet</th>
              <th>Age</th>
            </tr>
            <tr>
              <td><input type="text" name="location[0][tree_species_id]" placeholder="Enter ID" class="form-control typeahead5" /></td>
              <td><input type="text" name="location[0][tree_id]" placeholder="Enter ID" class="form-control" /></td>
              <td><input type="text" name="location[0][width_at_breast_height]" placeholder="Enter Width" class="form-control" /></td>
              <td><input type="text" name="location[0][height]" placeholder="Enter Height" class="form-control" /></td>
              <td><input type="text" name="location[0][timber_volume]" placeholder="Enter Volume" class="form-control" /></td>
              <td><input type="text" name="location[0][timber_cubic]" placeholder="Enter Cubic" class="form-control" /></td>
              <td><input type="text" name="location[0][age]" placeholder="Enter Age" class="form-control" /></td>
              <td rowspan="2"><button type="button" name="add" id="add-btn" class="btn bd-navbar text-white">Add</button></td>
            </tr>
            <tr>
              <td colspan="7"><textarea name="location[0][remark]" placeholder="Enter Remarks" class="form-control" rows="3"></textarea></td>
            </tr>
          </table>
        </div>
      </div>
    </div>
    <br>
    <div style="overflow:auto;">
      <div style="float:right;">
        <button type="button" id="prevBtn" class="btn bd-navbar text-white" onclick="nextPrev(-1)">Previous</button>
        <button type="button" id="nextBtn" class="btn bd-navbar text-white" onclick="nextPrev(1)">Next</button>
      </div>
    </div>
    <!-- Circles which indicates the steps of the form: -->
    <div style="text-align:center;margin-top:40px;">
      <span class="step"></span>
      <span class="step"></span>
    </div>
    <input type="hidden" class="form-control" name="createdBy" value="{{Auth::user()->id}}">
  </form>
</div>


<script>
  //photos add
  var i = 0;
  $("#add-btn2").click(function() {
    ++i;
    $("#dynamicAddRemove2").append(
      '<input type="file" id="images" name="images[' + i + ']">');
  });

  //STEPPER
  var currentTab = 0; // Current tab is set to be the first tab (0)
  showTab(currentTab); // Display the current tab

  function showTab(n) {
    // This function will display the specified tab of the form...
    var x = document.getElementsByClassName("tab");
    x[n].style.display = "block";
    //... and fix the Previous/Next buttons:
    if (n == 0) {
      document.getElementById("prevBtn").style.display = "none";
    } else {
      document.getElementById("prevBtn").style.display = "inline";
    }
    if (n == (x.length - 1)) {
      document.getElementById("nextBtn").innerHTML = "Submit";
    } else {
      document.getElementById("nextBtn").innerHTML = "Next";
    }
    //... and run a function that will display the correct step indicator:
    fixStepIndicator(n)
  }

  function nextPrev(n) {
    // This function will figure out which tab to display
    var x = document.getElementsByClassName("tab");
    // Exit the function if any field in the current tab is invalid:
    if (n == 1 && !validateForm()) return false;
    // Hide the current tab:
    x[currentTab].style.display = "none";
    // Increase or decrease the current tab by 1:
    currentTab = currentTab + n;
    // if you have reached the end of the form...
    if (currentTab >= x.length) {
      // ... the form gets submitted:
      document.getElementById("regForm").submit();
      return false;
    }
    // Otherwise, display the correct tab:
    showTab(currentTab);
  }

  function validateForm() {
    // This function deals with validation of the form fields
    var x, y, i, valid = true;
    x = document.getElementsByClassName("tab");
    y = x[currentTab].getElementsByClassName("verifythis");
    // A loop that checks every input field in the current tab:
    for (i = 0; i < y.length; i++) {
      // If a field is empty...
      if (y[i].value == "") {
        // add an "invalid" class to the field:
        y[i].className += " invalid";
        // and set the current valid status to false
        valid = false;
      }
    }
    // If the valid status is true, mark the step as finished and valid:
    if (valid) {
      document.getElementsByClassName("step")[currentTab].className += " finish";
    }
    return valid; // return the valid status
  }

  function fixStepIndicator(n) {
    // This function removes the "active" class of all steps...
    var i, x = document.getElementsByClassName("step");
    for (i = 0; i < x.length; i++) {
      x[i].className = x[i].className.replace(" active", "");
    }
    //... and adds the "active" class on the current step:
    x[n].className += " active";
  }


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


  var path5 = "{{route('species')}}";
  $('input.typeahead5').typeahead({
    source: function(terms, process) {

      return $.get(path5, {
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

  

  /// SCRIPT FOR THE DYNAMIC COMPONENT
  var i = 0;
  $("#add-btn").click(function() {
    ++i;
    $("#dynamicAddRemove").append(
      '<tr><td><input type="text" name="location[' + i + '][tree_species_id]" placeholder="Enter ID" class="form-control" /></td><td><input type="text" name="location[' + i + '][tree_id]" placeholder="Tree ID" class="form-control" /></td><td><input type="text" name="location[' + i + '][width_at_breast_height]" placeholder="Enter Width" class="form-control" /></td><td><input type="text" name="location[' + i + '][height]" placeholder="Enter Height" class="form-control" /></td><td><input type="text" name="location[' + i + '][timber_volume]" placeholder="Enter Volume" class="form-control" /></td><td><input type="text" name="location[' + i + '][timber_cubic]" placeholder="Enter Cubic" class="form-control" /></td><td><input type="text" name="location[' + i + '][age]" placeholder="Enter Age" class="form-control" /></td></td><td><button type="button" class="btn btn-danger remove-tr">Remove</button></td></tr><tr><td colspan="7"><textarea name="location[' + i + '][remark]" placeholder="Enter Remarks" class="form-control" rows="3"></textarea></td></tr>');
  });
  $(document).on('click', '.remove-tr', function() {
    $(this).parents('tr').next('tr').remove()
    $(this).parents('tr').remove();
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

  $(document).ready(function(){
        $('#image').change(function(){
            var fp = $("#image");
            var lg = fp[0].files.length; // get length
            var items = fp[0].files;
            var fileSize = 0;
           
            if (lg > 0) {
                for (var i = 0; i < lg; i++) {
                    fileSize = fileSize+items[i].size; // get file size
                }
                if(fileSize > 5242880) {
                    alert('You should not upload files exceeding 4 MB. Compress image size and try again.');
                    $('#image').val('');
                }
            }
        });
    });
</script>
@endsection
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

  <form action="/tree-removal/save" method="post" id="regForm">
    @csrf
    <!-- One "tab" for each step in the form: -->
    <div class="tab">
      <div class="container">
        <div class="row border rounded-lg p-4 bg-white">
          <div class="col border border-muted rounded-lg mr-2 p-2">
            <div class="form-group">
              <label for="title">Land Title:</label>
              <input type="text" class="form-control verifythis" oninput="this.className = 'form-control'" placeholder="Enter Land Title" id="landTitle" name="landTitle">
            </div>

            <div class="row p-2">
              <div class="col p-2">
                <div class="form-group">
                  Province:<input type="text" class="form-control typeahead verifythis" oninput="this.className = 'form-control typeahead'" placeholder="Search" name="province" />
                </div>
                <div class="form-group">
                  District:<input type="text" class="form-control typeahead2 verifythis" oninput="this.className = 'form-control typeahead2'" placeholder="Search" name="district" />
                </div>
                <div class="form-group">
                  GS Division:<input type="text" class="form-control typeahead4" oninput="this.className = 'form-control typeahead4'" placeholder="Search" name="gs_division" />
                </div>
              </div>
              <div class="col p-2">
                <div class="form-group">
                  <label>Removal Requestor Type:</label>
                  <div class="form-check form-check-inline">
                    <input class="form-check-input verifythis" oninput="this.className = 'form-check-input'" type="radio" name="removalrequestortype" id="removalrequestortype1" value="1">
                    <label class="form-check-label" for="removalrequestortype1">
                      Government
                    </label>
                  </div>
                  <div class="form-check form-check-inline">
                    <input class="form-check-input verifythis" oninput="this.className = 'form-check-input'" type="radio" name="removalrequestortype" id="removalrequestortype2" value="2">
                    <label class="form-check-label" for="removalrequestortype2">
                      Private
                    </label>
                  </div>
                </div>
                <div class="form-group">
                  Removal Requestor:<input type="text" class="form-control typeahead3 verifythis" oninput="this.className = 'form-control typeahead3'" name="removal_requestor" placeholder="Search" />
                  <div class="custom-control custom-checkbox">
                    <input type="checkbox" class="custom-control-input" id="customCheck2" value="1" name="checkremovalrequestor">
                    <label class="custom-control-label" for="customCheck2"><strong>Other</strong></label>
                  </div>
                </div>
              </div>
            </div>


            <div class="form-group">
              <label for="land_extent">Land Extent (In Acres)</label>
              <input type="text" class="form-control" id="land_extent" name="land_extent">
            </div>
            <div class="form-group">
              <label>Land Owner Type:</label>
              <div class="form-check form-check-inline">
                <input class="form-check-input verifythis" oninput="this.className = 'form-check-input'" type="radio" name="landownertype" id="landownertype1" value="1" required>
                <label class="form-check-label" for="landownertype1">
                  Government
                </label>
              </div>
              <div class="form-check form-check-inline">
                <input class="form-check-input verifythis" oninput="this.className = 'form-check-input'" type="radio" name="landownertype" id="landownertype2" value="2" required>
                <label class="form-check-label" for="landownertype2">
                  Private
                </label>
              </div>
            </div>
            <div class="form-group">
              Land Owner:<input type="text" class="form-control typeahead3 verifythis" oninput="this.className = 'form-control typeahead3'" placeholder="Search" name="land_owner" />
              <div class="custom-control custom-checkbox">
                <input type="checkbox" class="custom-control-input" id="customCheck1" value="1" name="checklandowner">
                <label class="custom-control-label" for="customCheck1"><strong>Other</strong></label>
              </div>
            </div>
            <!-- ////////MAP GOES HERE -->
            <div id="mapid" style="height:400px;" name="map"></div>
            <input id="polygon" type="hidden" name="polygon" value="{{request('polygon')}}" />
            <div class="custom-control custom-checkbox">
              <input type="checkbox" class="custom-control-input" id="customCheck" value="1" name="isProtected">
              <label class="custom-control-label" for="customCheck"><strong>Check if land is a protected area</strong></label>
            </div>
          </div>
          <div class="col border border-muted rounded-lg">
            <div class="row p-2 mt-2">
              <div class="col">
                <div class="form-group">
                  <label for="number_of_trees">Number of Trees</label>
                  <input type="text" class="form-control verifythis" oninput="this.className = 'form-control'" id="number_of_trees" name="number_of_trees">
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
              <textarea class="form-control verifythis" oninput="this.className = 'form-control'" rows="2" id="description" name="description"></textarea>
            </div>
            <div class="form-group">
              <label for="images">Image (Optional)</label>
              <div class="custom-file mb-3">
                <input type="file" id="images" name="images">
              </div>
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
              <td><input type="text" name="location[0][tree_species_id]" placeholder="Enter ID" class="form-control" /></td>
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
  ///STEPPER
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

    //console.log(layer.toGeoJSON());
    $('#polygon').val(JSON.stringify(layer.toGeoJSON()));

  });
</script>
@endsection
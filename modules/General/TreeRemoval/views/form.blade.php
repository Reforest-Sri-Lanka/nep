@extends('home')

@section('cont')

<kbd><a onclick="goBack()" class="text-white font-weight-bolder"><i class="fas fa-chevron-left"></i></i> BACK</a></kbd>
<div class="container">
  <h2 align="center">Tree removal Application</h2>

  @if(count($errors) >0)
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
  @endif

  <form action="/tree-removal/save" method="post" id="treeRemoval">
    @csrf
    <div id="accordion" class="mb-3">
      <div class="card">
        <div class="card-header">
          <a class="card-link text-dark" data-toggle="collapse" href="#collapseOne">
            Province
          </a>
        </div>
        <div id="collapseOne" class="collapse" data-parent="#accordion">
          <div class="card-body">
            @foreach($provinces as $province)
            <div class="form-check">
              <label class="form-check-label">
                <input type="radio" class="form-check-input" name="province_id" value="{{$province->id}}">{{$province->province}}
              </label>
            </div>
            @endforeach
          </div>
        </div>
      </div>

      <div class="card">
        <div class="card-header">
          <a class="collapsed card-link text-dark" data-toggle="collapse" href="#collapseTwo">
            District
          </a>
        </div>
        <div id="collapseTwo" class="collapse" data-parent="#accordion">
          <div class="card-body">
            @foreach($districts as $district)
            <div class="form-check">
              <label class="form-check-label">
                <input type="radio" class="form-check-input" name="district_id" value="{{$district->id}}">{{$district->district}}
              </label>
            </div>
            @endforeach
          </div>
        </div>
      </div>

      <div class="card">
        <div class="card-header">
          <a class="collapsed card-link text-dark" data-toggle="collapse" href="#collapseThree">
            GS Division
          </a>
        </div>
        <div id="collapseThree" class="collapse" data-parent="#accordion">
          <div class="card-body">
            @foreach($gs_divisions as $gs_division)
            <div class="form-check">
              <label class="form-check-label">
                <input type="radio" class="form-check-input" name="gs_division_id" value="{{$gs_division->id}}">{{$gs_division->gs_division}}
              </label>
            </div>
            @endforeach
          </div>
        </div>
      </div>

      <div class="card">
        <div class="card-header">
          <a class="collapsed card-link text-dark" data-toggle="collapse" href="#collapseFour">
            Land Parcel ID
          </a>
        </div>
        <div id="collapseFour" class="collapse" data-parent="#accordion">
          <div class="card-body">
            @foreach($lands as $land)
            <div class="form-check">
              <label class="form-check-label">
                <input type="radio" class="form-check-input" name="land_parcel_id" value="{{$land->id}}">{{$land->title}}
              </label>
            </div>
            @endforeach
          </div>
        </div>
      </div>

      <div class="card">
        <div class="card-header">
          <a class="collapsed card-link text-dark" data-toggle="collapse" href="#collapseFive">
            Organizations
          </a>
        </div>
        <div id="collapseFive" class="collapse" data-parent="#accordion">
          <div class="card-body bg-secondary text-light">
            <strong>Select Multiple</strong>
            <fieldset>
              @foreach($organizations as $organization)
              <input type="checkbox" name="governing_orgs[]" value="{{$organization->id}}"><label class="ml-2">{{$organization->title}}</label> <br>
              @endforeach
            </fieldset>
          </div>
        </div>
      </div>
    </div>


    <div class="form-group">
      <label for="land_extent">Land Extent (In Acres)</label>
      <input type="text" class="form-control" id="land_extent" name="land_extent">
    </div>

    <div class="form-group">
      <label for="number_of_trees">Number of Trees</label>
      <input type="text" class="form-control" id="number_of_trees" name="number_of_trees">
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

    <div class="form-group">
      <label for="number_of_reptile_species">Number of Reptile Species</label>
      <input type="text" class="form-control" id="number_of_reptile_species" name="number_of_reptile_species">
    </div>

    <div class="form-group">
      <label for="species_special_notes">Species Special Notes</label>
      <textarea class="form-control" rows="5" id="species_special_notes" name="species_special_notes"></textarea>
    </div>

    <div class="form-group">
      <label for="description">Description</label>
      <textarea class="form-control" rows="5" id="description" name="description"></textarea>
    </div>

    <div class="form-group">
      <label for="images">Image (Optional)</label>
      <div class="custom-file mb-3">
        <input type="file" id="images" name="images">
      </div>
    </div>

    <table class="table table-bordered" id="dynamicAddRemove">
      <tr>
        <th>Species ID</th>
        <th>Tree ID</th>
        <th>Width at Breast Height</th>
        <th>Height</th>
        <th>Timber Volume</th>
        <th>Timber Cubic</th>
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
        <td rowspan="2"><button type="button" name="add" id="add-btn" class="btn btn-success">Add More</button></td>
      </tr>
      <tr>
        <td colspan="7"><textarea name="location[0][remark]" placeholder="Enter Remarks" class="form-control" rows="3"></textarea></td>
      </tr>
    </table>

    <input type="hidden" class="form-control" name="createdBy" value="{{Auth::user()->id}}">
    <br><br>
    <button type="submit" name="submit" class="btn btn-success">Submit</button>
    <button type="button" class="btn btn-danger" onclick="document.getElementById('treeRemoval').reset();">Clear</button>
    <br>
    <br>
    <hr>

  </form>
</div>

<script type="text/javascript">
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
</script>
@endsection

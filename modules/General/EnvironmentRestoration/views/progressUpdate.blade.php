@extends('general')

@section('general')
<h4>Update Environment Restoration Progress</h4>
<hr>
<div class="container">
    <div class="container bg-white">
        <div class="row p-4 bg-white">
            <div class="col border border-muted rounded-lg mr-2 p-4">
                <dl class="row">
                    <dt class="col-sm-4">Title</dt>
                    <dd class="col-sm-8">: {{$restoration->title}}</dd>
                    <dt class="col-sm-4">Restoration Type</dt>
                    <dd class="col-sm-8">: {{$restoration->Environment_Restoration_Activity->title}}</dd>
                    <dt class="col-sm-4">Ecosystem</dt>
                    <dd class="col-sm-8">: {{$restoration->ecosystems_type->type}}</dd>
                    <dt class="col-sm-4">Eco System Description</dt>
                    <dd class="col-sm-8">: {{$restoration->ecosystems_type->description}}</dd>
                    <dt class="col-sm-4">Plan No </dt>
                    <dd class="col-sm-8">: {{$land->title}}</dd>
                    <dt class="col-sm-4">Surveyor </dt>
                    <dd class="col-sm-8">: {{$land->surveyor_name}}</dd>
                    <dt class="col-sm-4">Province </dt>
                    @if($land->province_id ==0)
                        <dd class="col-sm-8">: No province details</dd>
                    @else
                        <dd class="col-sm-8">: {{$land->province->province}}</dd>
                    @endif
                </dl>
            </div>
            <div class="col border border-muted rounded-lg mr-2 p-4">
                <div id="mapid" style="height:400px;" name="map"></div>
            </div>
        </div>
        <form action="/env-restoration/progressSave"  method="post">
            @csrf
            <div class="row p-4 bg-white">
                <h5>Update On Progress Of The Reforestation Project In General</h5>
            </div>
            <div class="row p-4 bg-white">
                <div class="col border border-muted rounded-lg mr-2 p-4">
                    <div class="form-group">
                        <label for="description">Current situation:</label>
                        <textarea  class="form-control" rows="3" name="description" placeholder="Brief description of the current progress" required>{{{ old('description') }}}</textarea>
                        @error('description')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="images">Photos:</label>
                        <input type="file" id="image" name="file[]" multiple>
                        @if ($errors->has('file.*'))
                            <div class="alert">
                                <strong>{{ $errors->first('file.*') }}</strong>
                            </div>
                        @endif   
                    </div>
                </div>
                <div class="col border border-muted rounded-lg mr-2 p-4">
                    <div class="form-group">
                        <label for="general_suggestions">General Suggestions for improvement:</label>
                        <textarea  class="form-control" rows="3" name="general_suggestions" placeholder="Suggestions to improve the growth of trees in general">{{{ old('description') }}}</textarea>
                        @error('general_suggestions')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="general_remark">Additional Remarks:</label>
                        <textarea  class="form-control" rows="3" name="general_remark" placeholder="Any other remarks">{{{ old('description') }}}</textarea>
                        @error('general_remark')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                        <input type="hidden" id="restoration_id" name="restoration_id" class="form-control" value="{{ $restoration->id }}" />
                        @if(auth()->user())
                        <input type="hidden" id="created_by" name="created_by" class="form-control" value="{{ Auth::user()->id }}" />
                        @endif
                    </div>
                </div>
            </div>
            <div class="row p-4 bg-white">
                <h5>Update Individual Species Information</h5>
                <form method="post" id="speciesdata">
                    <table class="table table-bordered table-striped" id="species">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Species Name</th>
                                <th>Scientefic Name</th>
                                <th>Number of trees planted</th>
                                <th>Height</th>
                                <th>Dimentions</th>
                                <th>Previous Remark</th>
                                <th>Current Height</th>
                                <th>Number of successfully grown trees</th>
                                <th>Suggestions for improvement</th>
                                <th>Further Remarks</th>
                            </tr>
                        </thead>
                        <tbody>

                        </tbody>
                    </table>   
                </form>
                <button type="Submit" id="submit" class="btn bd-navbar text-white">submit</button>
            </div>
        </form>
    </div>
</div>

<script type="text/javascript">
    var center = [7.2906, 80.6337];

    // Create the map
    var map = L.map('mapid').setView(center, 10);

    // Set up the OSM layer 
    L.tileLayer(
        'https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            attribution: 'Data © <a href="http://osm.org/copyright">OpenStreetMap</a>',
            maxZoom: 18
        }).addTo(map);

    

    //FROM LARAVEL THE COORDINATES ARE BEING TAKEN TO THE SCRIPT AND CONVERTED TO JSON
    var polygon = @json($polygon);
    var layer = L.geoJSON(JSON.parse(polygon)).addTo(map);
    

    // Adjust map to show the kml
    var bounds = layer.getBounds();
    map.fitBounds(bounds);

    //add new species data
    
    $(document).ready(function() {
        var data ={!! json_encode($data, JSON_HEX_TAG) !!};
        var count = 1;
        species_progress(count,data);

        function species_progress(number,data) {
            html = '<tr>';
            for(var count=0; count < data.length; count++)
            {
                id = data[count]['id'];
                species_id = data[count]['species']['id'];
                species = data[count]['species']['title'];
                scientific_name =data[count]['species']['title'];
                qty_planted=data[count]['quantity'];
                height=data[count]['height'];
                dimentions=data[count]['dimensions'];
                p_remark=data[count]['remark']
                html +='<tr>';
                html += '<input type="hidden" id="species_id[]" name="species_id[]" class="form-control" value=' + species_id + ' />';
                html += '<td><input type="hidden" id="id[]" name="id[]" class="form-control" value=' + id + ' />'+id+'</td>';
                html += '<td>'+species+'</td>';
                html +='<td>'+scientific_name+'</td>'
                html +='<td>'+qty_planted+'</td>'
                html +='<td>'+height+'</td>'
                html +='<td>'+dimentions+'</td>'
                html +='<td>'+p_remark+'</td>'
                html += '<td><input type="text" id="new_height[]" name="new_height[]" class="form-control"  Required/></td>';
                html += '<td><input type="text" id="tree_qty[]" name="tree_qty[]" class="form-control"  /></td>';
                html += '<td><input type="text" id="suggestions[]" name="suggestions[]" class="form-control"  /></td>';
                html += '<td><input type="text" id="remark[]" name="remark[]" class="form-control"  /></td>';
                
            }
            $('tbody').append(html);
        }
		
        $('#speciesdata').on('submit', function(event) {
            event.preventDefault();
            $.ajax({
                url: '{{ route("update.species") }}',
                method: 'post',
                data: $(this).serialize(),
                dataType: 'json',
                beforeSend: function() {
                    $('#save').attr('disabled', 'disabled');
                },
                success: function(data) {
                    if (data.error) {
                        var error_html = '';
                        for (var count = 0; count < data.error.length; count++) {
                            error_html += '<p>' + data.error[count] + '</p>';
                        }
                        $('#result').html('<div class="alert alert-danger">' + error_html + '</div>');
                    } else {
                        dynamic_field(1);
                        $('#result').html('<div class="alert alert-success">' + data.success + '</div>');
                    }
                    $('#save').attr('disabled', false);
                }
            })
        });

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
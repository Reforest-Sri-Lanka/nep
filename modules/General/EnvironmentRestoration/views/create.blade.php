@extends('general')

@section('general')

<div class="container">
    <form action="/env-restoration/store" method="post">
        @csrf

        <div class="container">
            <div class="row p-4 bg-white">
                <div class="col border border-muted rounded-lg mr-2 p-4">
                    <div class="form-group">
                        <label for="title">Title:</label>
                        <input type="text" class="form-control" placeholder="Enter Title" id="title" name="title">
                    </div>
		            <div class="form-group">
                        <label for="title">Restored Land Parcel Name:</label>
                        <input type="text" class="form-control" placeholder="Enter Land Parcel Name" name="landparceltitle">
                    </div>

		            <div class="form-group">
                        <label for="title">Environment Restoration Activity:</label>
                        <select name="environment_restoration_activity" class="custom-select">
                            <option selected>Select Activity</option>
                            <option value=1>Forest Preservation</option>
                            <option value=2>Coral Preservation</option>
                            <option value=3>Wetland Preservation</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="title">Ecosystem:</label>
                        <select name="ecosystem" class="custom-select">
                            <option selected>Select Ecosystem</option>
                            <option value=1>RainForest</option>
                            <option value=2>Grassland</option>
                            <option value=3>Coral Reef</option>
                            <option value=4>Wetland</option>
                        </select>
                    </div>
                    <div class="card">
                        <div class="card-header">
                            <a class="collapsed card-link text-dark" data-toggle="collapse" href="#collapseOne">Governing Organization for selected Land Parcel </a>
                        </div>
                        <div id="collapseOne" class="collapse" >
                            <div class="card-body">
                                @foreach($organizations as $organization)
                                    <div class="form-check">
                                        <label class="form-check-label">
                                            <input type="checkbox" class="form-check-input" name="govOrg[]" value="{{$organization->id}}">{{$organization->title}}
                                        </label>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>

                    <div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </div>        
                <div class="col border border-muted rounded-lg p-4">
                    <!-- ////////MAP GOES HERE -->
                    <div id="mapid" style="height:400px;" name="map"></div>
                    <br>
                    <div class="custom-control custom-checkbox">
                        <input type="checkbox" class="custom-control-input" id="customCheck" value="1" name="isProtected">
                        <label class="custom-control-label" for="customCheck"><strong>Check if land is a protected area</strong></label>
                    </div>
                </div>
            </div>
        </div>
                <input type="hidden" class="form-control" name="status" value="1">
                <input type="hidden" class="form-control" name="organization" value="{{Auth::user()->organization_id}}">
                <input type="hidden" class="form-control" name="created_by" value="{{Auth::user()->id}}">
                <input id = "polygon" type="hidden" name="polygon" value="{{request('polygon')}}">
                <input type="hidden" class="form-control" name="logs" value="0">
    </form>
</div>


<script type="text/javascript">
    ///SCRIPT FOR THE MAP
    var center = [7.2906, 80.6337];

    // Create the map
    var map = L.map('mapid').setView(center, 10);

    // Set up the OSM layer 
    L.tileLayer(
        'https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            attribution: 'Data © <a href="http://osm.org/copyright">OpenStreetMap</a>',
            maxZoom: 18
        }).addTo(map);

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

		map.on('draw:created', function (e) {
			var type = e.layerType,
				layer = e.layer;

			if (type === 'marker') {
				layer.bindPopup('A popup!');
			}

			drawnItems.addLayer(layer);
            $('#polygon').val(JSON.stringify(layer.toGeoJSON()));
    });
</script>
@endsection
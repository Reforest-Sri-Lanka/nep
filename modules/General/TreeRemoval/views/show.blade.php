@extends('home')

@section('cont')

<kbd><a href="/approval-item/showRequests" class="text-white font-weight-bolder"><i class="fas fa-chevron-left"></i></i> BACK</a></kbd>
<div class="container">
    <form>

        <div class="input-group mb-3">
            <div class="input-group-prepend">
                <span class="input-group-text">Province</span>
            </div>
            <input type="text" class="form-control" placeholder="{{$tree->province->province}}" readonly>
        </div>

        <div class="input-group mb-3">
            <div class="input-group-prepend">
                <span class="input-group-text">District</span>
            </div>
            <input type="text" class="form-control" placeholder="{{$tree->district->district}}" readonly>
        </div>

        <div class="input-group mb-3">
            <div class="input-group-prepend">
                <span class="input-group-text">Grama Sevaka Division</span>
            </div>
            <input type="text" class="form-control" placeholder="{{$tree->gs_division_id}}" readonly>
        </div>

        <div class="form-group">
            <label for="description">Description</label>
            <textarea class="form-control" rows="5" id="description" readonly>{{$tree->description}}</textarea>
        </div>

        <div class="form-check border-secondary rounded-lg mb-3" style="background-color:#ebeef0">
            <label class="mt-2"> Governing Organizations: </label>
            <hr>
            <ul class="list-unstyled">
                @foreach($tree->governing_organizations as $governing_organization)
                @switch($governing_organization)
                @case(1)
                <li class="ml-5">Reforest Sri Lanka</li>
                @break
                @case(2)
                <li class="ml-5">Ministry of Environment</li>
                @break
                @case(3)
                <li class="ml-5">Central Environmental Authority</li>
                @break
                @case(4)
                <li class="ml-5">Ministry of Wildlife</li>
                @break
                @case(5)
                <li class="ml-5">Road Development Authority</li>
                @break
                @endswitch
                @endforeach
            </ul>
        </div>

        <div class="input-group mb-3">
            <div class="input-group-prepend">
                <span class="input-group-text">Category</span>
            </div>
            <input type="text" class="form-control" placeholder="Tree Removal Request" readonly>
        </div>

        <div class="input-group mb-3">
            <div class="input-group-prepend">
                <span class="input-group-text">Land Size</span>
            </div>
            <input type="text" class="form-control" placeholder="{{$tree->land_size}} {{$tree->land_size_unit}}" readonly>
        </div>

        <div class="input-group mb-3">
            <div class="input-group-prepend">
                <span class="input-group-text">Number of Trees</span>
            </div>
            <input type="text" class="form-control" placeholder="{{$tree->no_of_trees}}" readonly>
        </div>

        <div class="input-group mb-3">
            <div class="input-group-prepend">
                <span class="input-group-text">Number of Tree Species</span>
            </div>
            <input type="text" class="form-control" placeholder="{{$tree->no_of_tree_species}}" readonly>
        </div>

        <div class="input-group mb-3">
            <div class="input-group-prepend">
                <span class="input-group-text">Number of Mammal Species</span>
            </div>
            <input type="text" class="form-control" placeholder="{{$tree->no_of_mammal_species}}" readonly>
        </div>

        <div class="input-group mb-3">
            <div class="input-group-prepend">
                <span class="input-group-text">Number of Amphibian Species</span>
            </div>
            <input type="text" class="form-control" placeholder="{{$tree->no_of_amphibian_species}}" readonly>
        </div>

        <div class="input-group mb-3">
            <div class="input-group-prepend">
                <span class="input-group-text">Number of Reptile Species</span>
            </div>
            <input type="text" class="form-control" placeholder="{{$tree->no_of_reptile_species}}" readonly>
        </div>

        <div class="input-group mb-3">
            <div class="input-group-prepend">
                <span class="input-group-text">Number of Avian Species</span>
            </div>
            <input type="text" class="form-control" placeholder="{{$tree->no_of_avian_species}}" readonly>
        </div>

        <div class="input-group mb-3">
            <div class="input-group-prepend">
                <span class="input-group-text">Number of Flora Species</span>
            </div>
            <input type="text" class="form-control" placeholder="{{$tree->no_of_flora_species}}" readonly>
        </div>

        <div class="form-group">
            <label for="special_notes">Species Special Notes</label>
            <textarea class="form-control" rows="5" id="special_notes" readonly>{{$tree->species_special_notes}}</textarea>
        </div>

        <div class="input-group mb-3">
            <div class="input-group-prepend">
                <span class="input-group-text">Special Approval</span>
            </div>
            @if($tree->special_approval == 0)
            <input type="text" class="form-control" placeholder="None" readonly>
            @else
            <input type="text" class="form-control" placeholder="{{$tree->special_approval}}" readonly>
            @endif
        </div>

        <div class="input-group mb-3">
            <div class="input-group-prepend">
                <span class="input-group-text">Land Parcel</span>
            </div>
            <input type="text" class="form-control" placeholder="{{$tree->land_parcel->title}}" readonly>
        </div>

        <div class="input-group mb-3">
            <div class="input-group-prepend">
                <span class="input-group-text">Status</span>
            </div>
            <input type="text" class="form-control" placeholder="{{$tree->status->type}}" readonly>
        </div>

        <div class="input-group mb-3">
            <div class="input-group-prepend">
                <span class="input-group-text">Created at</span>
            </div>
            <input type="text" class="form-control" placeholder="{{$tree->created_at}}" readonly>
        </div>
        <hr>
        <br>

        @if($location==0)
        <h1>No properties</h1>
        @else
        <h3>Properties</h3>
        @for($x = 0; $x < count($location); $x++) <hr>
            <div class="form-group row">
                <div class="col-xs-2">
                    <label for="tree_species_id">Tree Species ID</label>
                    <input class="form-control" id="tree_species_id" type="text" readonly placeholder="{{$location[$x]['tree_species_id']}}">
                </div>
                <div class="col-xs-2">
                    <label for="tree_id">Tree ID</label>
                    <input class="form-control" id="tree_id" type="text" readonly placeholder="{{$location[$x]['tree_id']}}">
                </div>
            </div>
            <div class="form-group row">
                <div class="col-xs-2">
                    <label for="width_at_breast_height">Width at Breast Height</label>
                    <input class="form-control" id="width_at_breast_height" readonly placeholder="{{$location[$x]['width_at_breast_height']}}" type="text">
                </div>
                <div class="col-xs-2">
                    <label for="height">Height</label>
                    <input class="form-control" id="height" readonly placeholder="{{$location[$x]['height']}}" type="text">
                </div>
                <div class="col-xs-2">
                    <label for="timber_volume">Timber Volume</label>
                    <input class="form-control" id="timber_volume" readonly placeholder="{{$location[$x]['timber_volume']}}" type="text">
                </div>
                <div class="col-xs-2">
                    <label for="timber_cubic">Timber Cubic</label>
                    <input class="form-control" id="timber_cubic" readonly placeholder="{{$location[$x]['timber_cubic']}}" type="text">
                </div>
                <div class="col-xs-2">
                    <label for="age">Age (Approximate)</label>
                    <input class="form-control" id="age" readonly placeholder="{{$location[$x]['age']}}" type="text">
                </div>
            </div>
            <div class="form-group row">
                <label for="remarks">Remarks</label>
                <textarea class="form-control" rows="5" id="remarks" readonly>{{$location[$x]['remark']}}</textarea>
            </div>
            @endfor
            @endif
            <div id="mapid" style="height:400px;" name="map"></div>
    </form>
    
</div>

<script>
    /// BACK BUTTON
    function goBack() {
        window.history.back();
    }

    /// MAP MODULE
    var center = [7.2906, 80.6337];

    // Create the map
    var map = L.map('mapid').setView(center, 10);

    // Set up the OSM layer 
    L.tileLayer(
        'https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            attribution: 'Data © <a href="http://osm.org/copyright">OpenStreetMap</a>',
            maxZoom: 18
        }).addTo(map);


    var polygon = @json($polygon);
    var layer = L.geoJSON(JSON.parse(polygon)).addTo(map);
    
    // Adjust map to show the kml
    var bounds = layer.getBounds();
    map.fitBounds(bounds);
</script>
@endsection


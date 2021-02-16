@extends('home')

@section('cont')
<h3 class="p-3 display-4">Assigning Organizations</h3>
<hr>
<span>
    <h3 class="text-center bg-success text-light">{{session('message')}}</h3>
</span>
<div class="row justify-content-between">
    <div class="col-md-8">
    <table class="table table-dark table-striped border-secondary rounded-lg mr-4">
        <thead>
            <tr>
                <th>Type</th>
                <th>Date Application logged</th>
                <th>Organization Assigned</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>{{$process_item->form_type->type}}</td>
                <td>{{date('d-m-Y',strtotime($process_item->created_at))}}</td>
                <td>{{$process_item->Activity_organization->title}}</td>
            </tr>
        </tbody>
    </table>
    </div>
</div>
<div class="row justify-content-around">
    <div class="col-md-12">
        @switch($process_item->form_type_id)
        @case('1')
            <table class="table table-dark table-striped border-secondary rounded-lg mr-4">
                <thead>
                    <tr>
                        <th>Province</th>
                        <th>District</th>
                        <th>Grama Niladari Division</th>
                        <th>Description</th>
                        <th>Special approval</th>
                        <th>Land Size</th>
                        <th>Number of Trees</th>
                        <th>Number of Tree Species</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>{{$treecut->province->province}}</td>
                        <td>{{$treecut->district->district}}</td>
                        <td>{{$treecut->gs_division_id}}</td>
                        <td>{{$treecut->description}}</td>
                        @if($treecut->special_approval==0)
                        <td>Not a protected area</td>
                        @elseif($treecut->special_approval==1)
                        <td>Protected area</td>
                        @endif
                        <td>{{$treecut->land_size}}</td>
                        <td>{{$treecut->no_of_trees}}</td>
                        <td>{{$treecut->no_of_tree_species}}<td>
                    </tr>
                </tbody>
            </table>
            <h6>Additional Data</h6>
            <table class="table table-dark table-striped border-secondary rounded-lg mr-4">
                <thead>
                    <tr>
                        <th>Number of Mamal Species</th>
                        <th>Number of Amphibian Species</th>
                        <th>Number of Reptile Species</th>
                        <th>Number of Avian Species</th>
                        <th>Number of Flora Species</th>
                        <th>Tree Species special notes</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>{{$treecut->no_of_mammal_species}}</td>
                        <td>{{$treecut->no_of_amphibian_species}}</td>
                        <td>{{$treecut->no_of_reptile_species}}</td>
                        <td>{{$treecut->no_of_avian_species}}</td>
                        <td>{{$treecut->no_of_flora_species}}</td>
                        <td>{{$treecut->species_special_notes}}</td>
                    </tr>
                </tbody>
            </table>
        @break
        @case('2')
            <table class="table table-dark table-striped border-secondary rounded-lg mr-4">
                <thead>
                    <tr>
                        <th>Project Title</th>
                        <th>Gazette</th>
                        <th>Grama Niladari Division</th>
                        <th>Description</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>{{$devp->title}}</td>
                        <td>{{$devp->gazette->title}}</td>
                        <td>{{$devp->gs_division_id}}</td>
                        <td>{{$devp->description}}</td>
                    </tr>
                </tbody>
            </table>
        @break
        @case('3')
        <h6>nothing yet</h6>
        @break
        @case('4')
            <table class="table table-dark table-striped border-secondary rounded-lg mr-4">
                <thead>
                    <tr>
                        <th>Crime Type</th>
                        <th>Description</th>
                        <th>Land Parcel</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>{{$crime->crime_type->type}}</td>
                        <td>{{$crime->description}}</td>
                        <td>{{$crime->land_parcel->title}}</td>
                    </tr>
                </tbody>
            </table>
        @break
        @endswitch
        @isset($Photos)
        <h6>Photos <h6>
        <div class="card-deck">
            @foreach($Photos as $photo)
            <div class="card" style="background-color:#99A3A4">
                <img class="card-img-top" src="{{asset('/storage/'.$photo)}}" alt="photo">
                <div class="card-body text-center">
                <a class="nav-link text-dark font-italic p-2" href="/crime-report/downloadimage/{{$photo}}">Download Image</a>
                </div>
            </div>
            @endforeach
        </div>
        @endempty
        </br>
        <h5>Location</h5>
        <div id="mapid" style="height:400px;" name="map"></div>
    </div>
    
</div>
</br>
<hr>
</br>
<div class="row justify-content-between">
    <div class="col-md-8">
        <h6>Change Assigned Organization</h6>
        <table class="table table-dark table-striped border-secondary rounded-lg mr-4">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Change</th>
                </tr>
            </thead>
            <tbody>
                @foreach($Organizations as $organization)
                <tr>
                    <td>{{$organization->title}}</td>
                    <td><a href="/approval-item/changeassignOrganization/{{$organization->id}}/{{$process_item->id}}" class="text-light">assign</a></td>
                </tr>
                @endforeach
            </tbody>
        </table>
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

    // add a marker in the given location
    L.marker(center).addTo(map);

    //FROM LARAVEL THE COORDINATES ARE BEING TAKEN TO THE SCRIPT AND CONVERTED TO JSON
    var polygon = @json($polygon);
    console.log(polygon);

    //ADDING THE JSOON COORDINATES TO MAP
    L.geoJSON(JSON.parse(polygon)).addTo(map);
    
</script>
@endsection
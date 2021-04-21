@extends('general')

@section('general')
<div class="flex row border-secondary rounded-lg ml-3 justify-content-between">
    <!-- Sessions to display success or failure -->
    <span>
        <h3 class="text-center bg-success text-light">{{session('message')}}</h3>
    </span>
    <span>
        <h3 class="text-center bg-danger text-light">{{session('warning')}}</h3>
    </span>
    <span>
</div>
<h4>Application Information</h4>
<hr>
<div class="container">
    <div class="container bg-white">
        <div class="row p-4 bg-white">
            <div class="col border border-muted rounded-lg mr-2 p-4">
                <table class="table table-light table-striped border-secondary rounded-lg mr-4">
                    <thead>
                        <tr>
                            <th>Type</th>
                            <th>Date Application logged</th>
                            @if($process_item->activity_organization ==null)
                                <th>Organization Assigned (Non registered)</th>
                            @else
                                <th>Organization Assigned</th>
                            @endif
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>{{$process_item->form_type->type}}</td>
                            <td>{{date('d-m-Y',strtotime($process_item->created_at))}}</td>
                            @if($process_item->activity_organization ==null)
                                <td>{{$process_item->ext_requestor}}</td>
                            @else
                                <td>{{$process_item->Activity_organization->title}}</td>
                            @endif
                        </tr>
                    </tbody>
                </table>
                @switch($process_item->form_type_id)
                    @case('1')
                        <table class="table table-light table-striped border-secondary rounded-lg mr-4">
                            <thead>
                                <tr>
                                    <th>District</th>
                                    <th>Grama Niladari Division</th>
                                    <th>Description</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>{{$item->district->district}}</td>
                                    <td>{{$item->gs_division_id}}</td>
                                    <td>{{$item->description}}</td>
                                </tr>
                            </tbody>
                        </table>
                        <table class="table table-light table-striped border-secondary rounded-lg mr-4">
                            <thead>
                                <tr>
                                    <th>Land Size</th>
                                    <th>Number of Trees</th>
                                    <th>Number of Tree Species</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>{{$item->land_size}}</td>
                                    <td>{{$item->no_of_trees}}</td>
                                    <td>{{$item->no_of_tree_species}}<td>
                                </tr>
                            </tbody>
                        </table>
                    @break
                    @case('2')
                        <table class="table table-light table-striped border-secondary rounded-lg mr-4">
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
                                    <td>{{$item->title}}</td>
                                @if($item->gazette==null)
                                    <td>No Gazette</td>
                                @else
                                    <td>{{$item->gazette->title}}</td>
                                @endif
                                    <td>{{$item->gs_division_id}}</td>
                                    <td>{{$item->description}}</td>
                                </tr>
                            </tbody>
                        </table>
                    @break
                    @case('3')
                        <table class="table table-light table-striped border-secondary rounded-lg mr-4">
                            <thead>
                                <tr>
                                    <th>Title</th>
                                    <th>Activity</th>
                                    <th>Eco System</th>
                                    <th>Eco System Description</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>{{$item->title}}</td>
                                    <td>{{$item->environment_restoration_activity->title}}</td>
                                    <td>{{$item->eco_system->ecosystem_type}}</td>
                                    <td>{{$item->eco_system->description}}</td>
                                </tr>
                            </tbody>
                        </table>
                    @break
                    @case('4')
                        <table class="table table-light table-striped border-secondary rounded-lg mr-4">
                            <thead>
                                <tr>
                                    <th>Crime Type</th>
                                    <th>Description</th>
                                    <th>Land Parcel</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>{{$item->crime_type->type}}</td>
                                    <td>{{$item->description}}</td>
                                    <td>{{$item->land_parcel->title}}</td>
                                </tr>
                            </tbody>
                        </table>
                    @break
                    @case('5')
                        <table class="table table-light table-striped border-secondary rounded-lg mr-4">
                            <thead>
                                <tr>
                                    <th>District</th>
                                    <th>Grama Niladari Division</th>
                                    <th>Protected Area</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    @if($item->district==null)
                                        <td>Not assigned</td>
                                    @else
                                        <td>{{$item->district->district}}</td>
                                    @endif
                                    @if($item->gs_division==null)
                                        <td>Not assigned</td>
                                    @else
                                    <td>{{$item->gs_division->gs_division}}</td>
                                    @endif
                                    @if($item->special_approval==0)
                                        <td>Not a protected area</td>
                                    @else
                                        <td>Protected area</td>
                                    @endif
                                </tr>
                            </tbody>
                        </table>
                    @break
                @endswitch
            </div>
            <div class="col border border-muted rounded-lg mr-2 p-4">
                <div id="mapid" style="height:400px;" name="map"></div>
            </div>
        </div>
        @if($process_item->form_type_id==1)
        <div class="row p-4 bg-white"> 
                <h6>Additional Data</h6>
                    <table class="table table-light table-striped border-secondary rounded-lg mr-4">
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
                                <td>{{$item->no_of_mammal_species}}</td>
                                <td>{{$item->no_of_amphibian_species}}</td>
                                <td>{{$item->no_of_reptile_species}}</td>
                                <td>{{$item->no_of_avian_species}}</td>
                                <td>{{$item->no_of_flora_species}}</td>
                                <td>{{$item->species_special_notes}}</td>
                            </tr>
                        </tbody>
                    </table>
        </div>
        <div class="row p-4 bg-white">
                <h6>Tree Data</h6>
                @if(count($data) < 1)
                    <h1>No data</h1>
                @else
                    <table class="table table-light table-striped border-secondary rounded-lg mr-4">
                        <thead>
                            <tr>
                                <th>Tree Species ID</th>
                                <th>Tree ID</th>
                                <th>Width at Breast Height</th>
                                <th>Height</th>
                                <th>Timber Volume</th>
                                <th>Timber Cubic</th>
                                <th>Age</th>
                                <th>Remark</th>
                            </tr>
                        </thead>
                        <tbody>
                            @for($x = 0; $x < count($tree_data); $x++)
                            <tr>
                                <td>{{$data[$x]['tree_species_id']}}</td>
                                <td>{{$data[$x]['tree_id']}}</td>
                                <td>{{$data[$x]['width_at_breast_height']}}</td>
                                <td>{{$data[$x]['height']}}</td>
                                <td>{{$data[$x]['timber_volume']}}</td>
                                <td>{{$data[$x]['timber_cubic']}}</td>
                                <td>{{$data[$x]['age']}}</td>
                                <td>{{$data[$x]['remark']}}</td>
                            </tr>
                            @endfor
                        </tbody>
                    </table>
                @endif             
        </div>
        @endif
        
        @if($process_item->form_type_id==2 || $process_item->form_type_id==4 )
            @isset($Photos)
                <div class="row p-4 bg-white">
                    <div class="card-deck">
                        @foreach($Photos as $photo)
                        <div class="card" style="background-color:#99A3A4">
                            <img class="card-img-top" src="{{asset('/storage/'.$photo)}}" alt="photo">
                            <div class="card-body text-center">
                            <a class="nav-link text-dark font-italic p-2" href="/item-report/downloadimage/{{$photo}}">Download Image</a>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            @endisset
        @endif
    </div>
</div>
<div class="col-md">
    @yield('approval')
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
    
</script>
@endsection
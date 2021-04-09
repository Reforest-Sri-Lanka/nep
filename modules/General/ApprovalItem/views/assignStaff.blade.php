@extends('general')

@section('general')

<hr>
<span>
    <h3 class="text-center bg-success text-light">{{session('message')}}</h3>
</span>
<div class="container">
    <div class="container bg-white">
        <div class="row p-4 bg-white">
            <h3>Assigning Staff </h3>
        </div>   
        <div class="row p-4 bg-white">
            <div class="col border border-muted rounded-lg mr-2 p-4">
                @switch($Process_item->form_type_id)
                    @case('1')
                        <h6>Tree cutting request details</h6>
                        <table class="table table-light table-striped border-secondary rounded-lg mr-4">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Province</th>
                                    <th>District</th>
                                    <th>GS Division</th>
                                    <th>Special approval</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>{{$treecut->id}}</td>
                                    @if($treecut->province == NULL)
                                    <td>Unassigned</td>
                                    @else
                                    <td>{{$treecut->province->province}}</td>
                                    @endif 
                                    @if($treecut->district == NULL)
                                    <td>Unassigned</td>
                                    @else
                                    <td>{{$treecut->district->district}}</td>
                                    @endif 
                                    @if($treecut->gs_division == NULL)
                                    <td>Unassigned</td>
                                    @else
                                    <td>{{$treecut->gs_division->gs_division}}</td>
                                    @endif
                                    @if($treecut->special_approval==0)
                                        <td>Not a protected area</td>
                                    @elseif($treecut->special_approval==1)
                                        <td>Protected area</td>
                                    @endif
                                </tr>
                            </tbody>
                        </table>
                        <table class="table table-light table-striped border-secondary rounded-lg mr-4">
                            <thead>
                                <tr>
                                    <th>Date application made</th>
                                    <th>Land size</th>
                                    <th>unit</th>
                                    <th>No of Trees</th>
                                    <th>No of Tree Species</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                            
                                    <td>{{date('d-m-Y',strtotime($treecut->created_at))}}</td>
                                    <td>{{$treecut->land_size}}</td>
                                    <td>Acres<td>
                                    <td>{{$treecut->no_of_trees}}</td>
                                    <td>{{$treecut->no_of_tree_species}}<td>
                                </tr>
                            </tbody>
                        </table>
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
                        <h6>Development project information</h6>
                        <table class="table table-light table-striped border-secondary rounded-lg mr-4">
                            <thead>
                                <tr>
                                    <th>Title</th>
                                    <th>Gazzete</th>
                                    <th>Protected Area</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>{{$devp->title}}</td>
                                    <td>{{$devp->gazette->title}}</td>
                                    <td>{{$devp->protected_area}}</td>               
                                </tr>
                            </tbody>
                        </table>
                    @break
                    @case('4')
                        <h6>Crime information</h6>
                        <table class="table table-light table-striped border-secondary rounded-lg mr-4">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>crime type</th>
                                    <th>description</th>
                                    <th>Date complained logged</th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>{{$crime->id}}</td>
                                    <td>{{$crime->crime_type->type}}</td>
                                    <td>{{$crime->description}}</td>
                                    <td>{{date('d-m-Y',strtotime($crime->created_at))}}</td>
                                    <td>{{$crime->status}}</td>
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
    </div>
    <div class="container bg-white">
        <div class="row p-4 bg-white">
            <div class="col border border-muted rounded-lg mr-2 p-4">
                <h6>Prerequisites</h6>
                @if (count($Prerequisites) > 0)
                <table class="table table-light table-striped border-secondary rounded-lg mr-4">
                    <thead>
                        <tr>
                            <th>Requested by</th>
                            <th>Assigned Organization</th>
                            <th>remarks</th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach($Prerequisites as $prerequisite)<tr>
                            <td>{{$prerequisite->requesting_organization->title}}</td>
                            <td>{{$prerequisite->Activity_organization->title}}</td>
                            <td>{{$prerequisite->remark}}</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
                @endif
                @if (count($Prerequisites) < 1)
                    <p>No prerequisites made yet</p>
                @endif
            </div> 
            @if($Process_item->form_type_id == 1 || 4)
            <div class="row p-4 bg-white">
                @isset($Photos)
                    @if (count($Photos) > 0)
                            @foreach($Photos as $photo)
                                <div class="col border border-muted rounded-lg mr-2 p-4">
                                    <img class="img-responsive" src="{{URL::asset('/storage/'.$photo)}}" alt="photo">
                                    <a class="nav-link text-dark font-italic p-2" href="/crime-report/downloadimage/{{$photo}}">Download Image</a>
                                </div>
                            @endforeach
                    @endif
                    @if (count($Photos) < 1)
                            <p>No photos included in the application</p>
                    @endif
                @endisset
                @empty($Photos)
                    <p>No photos included in the application</p>
                @endempty
            </div>
        @endif
        </div>
        <div class="row p-4 bg-white">
            <div class="col border border-muted rounded-lg mr-2 p-4">
                @switch(Auth::user()->role_id)
                @case('3')
                    <h6>Assign Manager/Staff</h6>
                @break;
                @case('4')
                    <h6>Assign Staff</h6>
                @endswitch
                <br>
                <table class="table table-light table-striped border-secondary rounded-lg mr-4">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>name</th>
                            <th>email</th>
                            <th>assign</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($Users as $user)
                        <tr>
                            <td>{{$user->id}}</td>
                            <td>{{$user->name}}</td>
                            <td>{{$user->email}}</td>
                            <td><a href="/approval-item/confirmassign/{{$user->id}}/{{$Process_item->id}}" class="text-muted">assign</a></td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div class="col border border-muted rounded-lg mr-2 p-4">
                <h6>Request additional investigation</h6>
                <br>
                <form action="\approval-item\createprerequisite" method="post">
                    @csrf
                    <h6>Select Organization in charge</h6>
                    <div class="input-group mb-3">
                    <select name="organization" class="custom-select">
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
                    <h6>Request</h6>
                    <div class="input-group mb-3">
                    </br>
                        <textarea  class="form-control" rows="3" name="request">
                        </textarea>
                        @error('request')
                            <div class="alert">
                                <strong>{{ $message }}</strong>
                            </div>
                        @enderror
                        <input type="hidden" class="form-control" name="create_by" value="{{ Auth::user()->id }}">
                        <input type="hidden" class="form-control" name="create_organization" value="{{ Auth::user()->organization_id }}">
                        <input type="hidden" class="form-control" name="process_id" value="{{ $Process_item->id }}">
                    </div>
                    <div class="form-check">
                        <button type="submit" class="btn btn-primary" >Submit</button>
                    </div>
                </form>
            </div>
        </div>
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
@extends('home')

@section('cont')

<kbd><a href="/env-restoration/index" class="text-white font-weight-bolder"><i class="fas fa-chevron-left"></i></i> BACK</a></kbd>
<div class="container">
    <h2 style="text-align:center;" class="text-dark">Add New Environment Restoration Project</h2>
    <hr>
    <div class="row justify-content-md-center border p-4 bg-white">
        <div class="col-12 ml-3">
            <form method="post" action="/env-restoration/store">
                @csrf
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text">Title</span>
                    </div>
                    <input type="text" class="form-control" name="title" placeholder="Enter title">
                </div>

                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text">Environment Restoration Activity</span>
                        <select name="environment_restoration_activity" class="custom-select">
                            <option selected>Select Activity</option>
                            <option value=1>Forest Preservation</option>
                            <option value=2>Coral Preservation</option>
                            <option value=3>Wetland Preservation</option>
                        </select>
                    </div>

                </div>

                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text">Ecosystem</span>
                        <select name="ecosystem" class="custom-select">
                            <option selected>Select Ecosystem</option>
                            <option value=1>RainForest</option>
                            <option value=2>Grassland</option>
                            <option value=3>Coral Reef</option>
                            <option value=4>Wetland</option>
                        </select>
                    </div>

                </div>

                <!-- MAP MODULE WOULD COME HERE -->

                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text">Land Parcel</span>
                    </div>
                    <input type="text" class="form-control" name="land_parcel_id" placeholder="Enter the land parcel id">
                </div>

                <br/>

                <!-- creating the species table followed by ajax script to add and remove species in the table -->

                <div class="table-responsive">
                    <h5> Species </h5>
                    <form method="post" id="dynamic_form">
                    <span id="result"></span>
                    <table class="table table-bordered table-striped" id="species">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th >Quantity</th>
                                <th >Height</th>
                                <th >Dimensions</th>
                                <th>Remarks</th>
                                <th></th>
                                <input type="hidden" class="form-control" name="status_species" value="1">
                                
                                <script>
                                    $(document).ready(function(){
                                        var count = 1;
                                        dynamic_species(count);
                                        function dynamic_species(number)
                                        {
                                            html = '<tr>';
                                                html += '<input type="hidden" name="environment_restoration_id[]" class="form-control" value="" />';
                                                html += '<input type="hidden" name="statusSpecies[]" class="form-control" value="1" />'; 
                                                html += '<td><select name="species_id[]" class="custom-select"><option selected>Select Species</option><option value="1">treespeciesname1</option><option value="2">treespeciesname2</option><option value="3">treespeciesname3 </option><option value="4">treespeciesname4</option></select></td>';
                                                html += '<td><input type="text" name="quantity[]" class="form-control" /></td>';
                                                html += '<td><input type="text" name="height[]" class="form-control" /></td>';
                                                html += '<td><input type="text" name="dimension[]" class="form-control" /></td>';
                                                html += '<td><input type="text" name="remark[]" class="form-control" /></td>';

                                            if(number > 1)
                                            {
                                                html += '<td><button type="button" name="remove" id="" class="btn btn-danger remove">Remove Species</button></td></tr>';
                                                $('tbody').append(html);
                                            }
                                            else
                                            {   
                                                html += '<td><button type="button" name="add" id="add" class="btn btn-success">Add Species</button></td></tr>';
                                                $('tbody').html(html);
                                            }
                                        }

                                        $(document).on('click', '#add', function(){
                                        count++;
                                        dynamic_species(count);
                                        });

                                        $(document).on('click', '.remove', function(){
                                        count--;
                                        $(this).closest("tr").remove();
                                        });
                                        
                                        $('#dynamic_species').on('submit', function(event){
                                            event.preventDefault();
                                            $.ajax({
                                                url:'{{ route("store.dynamic-species") }}',
                                                method:'post',
                                                data:$(this).serialize(),
                                                dataType:'json',
                                                beforeSend:function(){
                                                    $('#save').attr('disabled','disabled');
                                                },
                                                success:function(data)
                                                {
                                                    if(data.error)
                                                    {
                                                        var error_html = '';
                                                        for(var count = 0; count < data.error.length; count++)
                                                        {
                                                            error_html += '<p>'+data.error[count]+'</p>';
                                                        }
                                                        $('#result').html('<div class="alert alert-danger">'+error_html+'</div>');
                                                    }
                                                    else
                                                    {
                                                        dynamic_field(1);
                                                        $('#result').html('<div class="alert alert-success">'+data.success+'</div>');
                                                    }
                                                    $('#save').attr('disabled', false);
                                                }
                                            })
                                        });



                                    });
                                </script>
                            </tr>
                        </thead>
                        <tbody>

                        </tbody>
                    </table>
                </div>
                
                <input type="hidden" class="form-control" name="status" value="1">
                <input type="hidden" class="form-control" name="organization" value="{{Auth::user()->organization_id}}">
                <input type="hidden" class="form-control" name="created_by" value="{{Auth::user()->id}}">
                
                <div style="float:right;">
                    @csrf
                    <button type="submit" name="save" id="save" value="1" class="btn btn-primary">Create</button>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection